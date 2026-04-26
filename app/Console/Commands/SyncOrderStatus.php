<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Services\SmmService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SyncOrderStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync order status from SMM providers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::whereNotNull('api_order_id')
            ->whereIn('status', [Order::PENDING, Order::PROCESSING])
            ->get();

        if ($orders->isEmpty()) {
            $this->info('No orders to sync.');
            return 0;
        }

        $this->info("Syncing " . $orders->count() . " orders...");

        foreach ($orders as $order) {
            try {
                $provider = $order->package->provider;
                if (!$provider) continue;

                $smmService = new SmmService($provider);
                $statusData = $smmService->getStatus($order->api_order_id);

                if (isset($statusData['status'])) {
                    $newStatus = $this->mapStatus($statusData['status']);
                    if ($newStatus && $newStatus !== $order->status) {
                        $order->update(['status' => $newStatus]);
                        $this->line("Order #{$order->id} updated to: {$newStatus}");
                    }
                }
            } catch (\Exception $e) {
                Log::error("Sync error for order #{$order->id}: " . $e->getMessage());
            }
        }

        $this->info('Sync completed.');
        return 0;
    }

    protected function mapStatus($apiStatus)
    {
        $apiStatus = strtolower($apiStatus);
        return match ($apiStatus) {
            'pending' => Order::PENDING,
            'processing', 'inprogress' => Order::PROCESSING,
            'completed' => Order::COMPLETED,
            'canceled', 'cancelled', 'refunded' => Order::CANCELLED,
            default => null,
        };
    }
}
