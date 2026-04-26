<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Jobs\ProcessOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->latest()->paginate();

        return view('admin.orders.index', compact('orders'));
    }

    public function cancelled()
    {
        $orders = Order::query()
            ->where('status', Order::CANCELLED)
            ->latest()
            ->paginate();

        return view('admin.orders.cancelled', compact('orders'));
    }

    public function retry(Order $order)
    {
        if ($order->status != Order::CANCELLED) {
            return back()->with('error', 'Chỉ có thể thử lại đơn đã hủy.');
        }

        $user = $order->user;
        if ($user->balance < $order->total) {
            return back()->with('error', 'Người dùng không đủ số dư để khôi phục đơn (Tiền đã hoàn khi hủy).');
        }

        DB::transaction(function () use ($order, $user) {
            // Trừ lại tiền khi khôi phục đơn
            $user->decrement('balance', $order->total);
            
            // Chuyển về trạng thái Pending để Worker xử lý lại
            $order->update([
                'status' => Order::PENDING,
                'api_order_id' => null,
                'api_response' => null,
                'cancel_reason' => null,
                'cancelled_by' => null,
            ]);

            // Đẩy vào hàng chờ
            ProcessOrder::dispatch($order);
        });

        return back()->with('success', 'Đã khôi phục đơn hàng và đẩy vào hàng chờ xử lý.');
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        // ... existing update logic ...
        $user = $order->user;
        DB::transaction(function () use ($request, $order, $user) {
            $oldStatus = $order->status;
            $order->update($request->all());

            if ($request->status == Order::CANCELLED && $oldStatus != Order::CANCELLED) {
                $user->increment('balance', $order->total);
                $order->update([
                    'cancelled_by' => 'admin',
                    'cancel_reason' => 'Admin hủy thủ công'
                ]);
            }
        });

        return to_route('admin.orders.index')->with('success', 'Cập nhật đơn hàng thành công');
    }
}
