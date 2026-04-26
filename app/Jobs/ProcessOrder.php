<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\SmmService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;
    public $tries = 3;
    public $backoff = 60;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = $this->order;
        $package = $order->package;

        // Nếu không có provider thì bỏ qua (admin tự xử lý tay)
        if (!$package->provider || !$package->api_service_id) {
            return;
        }

        try {
            $smmService = new SmmService($package->provider);
            $response = $smmService->createOrder([
                'service' => $package->api_service_id,
                'link' => $order->input,
                'quantity' => $order->quantity,
            ]);

            if (isset($response['order'])) {
                $order->update([
                    'api_order_id' => $response['order'],
                    'api_response' => json_encode($response),
                    'status' => Order::PROCESSING,
                ]);
                Log::info("Order #{$order->id} pushed to API successfully. API ID: {$response['order']}");
            } else {
                $order->update([
                    'api_response' => json_encode($response),
                    'status' => Order::CANCELLED,
                    'cancel_reason' => $response['error'] ?? 'API Provider returned unknown error',
                    'cancelled_by' => 'api',
                    'note' => 'API Provider Error: ' . ($response['error'] ?? 'Unknown error'),
                ]);
                
                // Hoàn tiền nếu đơn bị lỗi API
                $user = $order->user;
                $user->increment('balance', $order->total);
                
                Log::error("Order #{$order->id} failed to push to API. Response: " . json_encode($response));
            }
        } catch (\Exception $e) {
            Log::error("Error processing order #{$order->id}: " . $e->getMessage());
            $this->release(60); // Thử lại sau 60 giây
        }
    }
}
