<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function history()
    {
        $orders = Auth::user()
            ->orders()
            ->with('package')
            ->latest()
            ->paginate();

        return view('order.history', compact('orders'));
    }

    public function detail($id)
    {
        $order = Auth::user()
            ->orders()
            ->with('package')
            ->findOrFail($id);

        return view('order.detail', compact('order'));
    }

    public function sync($id)
    {
        $order = Auth::user()->orders()->findOrFail($id);

        if (!$order->api_order_id) {
            return back()->with('error', 'Đơn hàng này không hỗ trợ cập nhật tự động.');
        }

        try {
            $smmService = new \App\Services\SmmService($order->package->provider);
            $statusData = $smmService->getStatus($order->api_order_id);

            if (isset($statusData['status'])) {
                $apiStatus = strtolower($statusData['status']);
                $newStatus = match ($apiStatus) {
                    'pending' => \App\Models\Order::PENDING,
                    'processing', 'inprogress' => \App\Models\Order::PROCESSING,
                    'completed' => \App\Models\Order::COMPLETED,
                    'canceled', 'cancelled', 'refunded' => \App\Models\Order::CANCELLED,
                    default => null,
                };

                if ($newStatus && $newStatus !== $order->status) {
                    $order->update(['status' => $newStatus]);
                    return back()->with('success', 'Cập nhật trạng thái thành công.');
                }
            }

            return back()->with('info', 'Trạng thái đơn hàng chưa có thay đổi.');
        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi khi kết nối với nhà cung cấp: ' . $e->getMessage());
        }
    }
}
