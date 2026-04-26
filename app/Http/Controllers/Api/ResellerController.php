<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResellerController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'key' => 'required',
            'action' => 'required|in:services,add,status,balance',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid parameters'], 400);
        }

        $user = User::where('api_token', $request->key)->first();
        if (!$user) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }

        return match ($request->action) {
            'services' => $this->services(),
            'balance' => $this->balance($user),
            'add' => $this->addOrder($user, $request),
            'status' => $this->status($user, $request),
            default => response()->json(['error' => 'Invalid action'], 400),
        };
    }

    protected function services()
    {
        $packages = Package::with('service.category')->active()->get();
        $data = $packages->map(function ($package) {
            return [
                'service' => $package->id,
                'name' => "[{$package->service->category->name}] {$package->service->name} - {$package->name}",
                'type' => 'Default',
                'category' => $package->service->category->name,
                'rate' => $package->price,
                'min' => $package->min_quantity,
                'max' => $package->max_quantity,
                'description' => $package->note,
            ];
        });

        return response()->json($data);
    }

    protected function balance(User $user)
    {
        return response()->json([
            'balance' => $user->balance,
            'currency' => 'VND',
        ]);
    }

    protected function addOrder(User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service' => 'required|exists:packages,id',
            'link' => 'required',
            'quantity' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid order parameters'], 400);
        }

        $package = Package::find($request->service);
        $total = $package->price * $request->quantity;

        if ($user->balance < $total) {
            return response()->json(['error' => 'Not enough funds on balance'], 400);
        }

        if ($request->quantity < $package->min_quantity || $request->quantity > $package->max_quantity) {
            return response()->json(['error' => "Quantity must be between {$package->min_quantity} and {$package->max_quantity}"], 400);
        }

        $orderId = DB::transaction(function () use ($user, $package, $request, $total) {
            $order = Order::create([
                'user_id' => $user->id,
                'package_id' => $package->id,
                'input' => $request->link,
                'quantity' => $request->quantity,
                'total' => $total,
                'status' => Order::PENDING,
            ]);

            $user->update(['balance' => $user->balance - $total]);

            Transaction::create([
                'user_id' => $user->id,
                'type' => Transaction::ORDER,
                'amount' => $total,
                'balance' => $user->balance,
                'description' => 'API Order #' . $order->id,
            ]);

            // Auto push to provider if configured
            if ($package->provider && $package->api_service_id) {
                try {
                    $smmService = new \App\Services\SmmService($package->provider);
                    $apiResponse = $smmService->createOrder([
                        'service' => $package->api_service_id,
                        'link' => $request->link,
                        'quantity' => $request->quantity,
                    ]);

                    if (isset($apiResponse['order'])) {
                        $order->update([
                            'api_order_id' => $apiResponse['order'],
                            'api_response' => json_encode($apiResponse),
                            'status' => Order::PROCESSING,
                        ]);
                    }
                } catch (\Exception $e) {
                    \Illuminate\Support\Facades\Log::error("API push error: " . $e->getMessage());
                }
            }

            return $order->id;
        });

        return response()->json(['order' => $orderId]);
    }

    protected function status(User $user, Request $request)
    {
        if (!$request->order) {
            return response()->json(['error' => 'Order ID required'], 400);
        }

        $orderIds = explode(',', $request->order);
        $orders = Order::where('user_id', $user->id)->whereIn('id', $orderIds)->get();

        $data = [];
        foreach ($orders as $order) {
            $status = match ($order->status) {
                Order::PENDING => 'Pending',
                Order::PROCESSING => 'Processing',
                Order::COMPLETED => 'Completed',
                Order::CANCELLED => 'Canceled',
                default => 'Pending',
            };

            $data[$order->id] = [
                'charge' => $order->total,
                'start_count' => 0,
                'status' => $status,
                'remains' => 0,
                'currency' => 'VND',
            ];
        }

        // Handle single order status vs multiple
        if (count($orderIds) === 1 && isset($data[$orderIds[0]])) {
            return response()->json($data[$orderIds[0]]);
        }

        return response()->json($data);
    }
}
