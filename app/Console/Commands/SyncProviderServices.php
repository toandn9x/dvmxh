<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Package;
use App\Models\Service;
use App\Services\SmmService;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SyncProviderServices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smm:sync-services {provider} {profit_member=50} {profit_vip=40} {profit_collaborator=30}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync services from SMM Provider API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $provider = $this->argument('provider');
        $profitMember = $this->argument('profit_member');
        $profitVip = $this->argument('profit_vip');
        $profitCollab = $this->argument('profit_collaborator');

        $smm = new SmmService($provider);
        
        $this->info("Fetching services from {$provider}...");
        $services = $smm->getServices();

        if (isset($services['error'])) {
            $this->error("API Error: " . $services['error']);
            return 1;
        }

        if (!is_array($services)) {
            $this->error("Invalid API response format.");
            return 1;
        }

        // Tính toán các mốc lợi nhuận
        $markupMember = 1 + ($profitMember / 100);
        $markupVip = 1 + ($profitVip / 100);
        $markupCollab = 1 + ($profitCollab / 100);

        $count = 0;
        foreach ($services as $item) {
            // Chuẩn hóa Category
            $categoryName = $item['category'] ?? 'Khác';
            $category = Category::updateOrCreate(
                ['slug' => Str::slug($categoryName)],
                [
                    'name' => $categoryName,
                    'type' => Category::SERVICE_TYPE,
                    'icon' => $this->getIconByCategory($categoryName),
                    'status' => Category::ACTIVE
                ]
            );

            // Chuẩn hóa Service
            $serviceName = $this->getServiceName($item['name']);
            $service = Service::updateOrCreate(
                ['slug' => Str::slug($serviceName), 'category_id' => $category->id],
                [
                    'name' => $serviceName,
                    'label' => 'Link / ID',
                    'placeholder' => 'Nhập thông tin cần buff',
                    'status' => Service::ACTIVE
                ]
            );

            // Tạo/Cập nhật Package
            Package::updateOrCreate(
                ['service_id' => $service->id, 'api_service_id' => $item['service'], 'provider' => $provider],
                [
                    'name' => $item['name'],
                    'price' => ceil($item['rate'] * $markupMember),
                    'price_vip' => ceil($item['rate'] * $markupVip),
                    'price_collaborator' => ceil($item['rate'] * $markupCollab),
                    'min_quantity' => $item['min'] ?? 100,
                    'max_quantity' => $item['max'] ?? 100000,
                    'note' => "Dịch vụ từ hệ thống {$provider}. Tự động cập nhật.",
                    'status' => Package::ACTIVE,
                ]
            );
            $count++;
        }

        $this->info("Successfully synced {$count} services from {$provider}.");
        return 0;
    }

    protected function getServiceName($name)
    {
        // Thường tên gói có dạng "Like bài viết - Server 1", chúng ta lấy phần trước dấu gạch ngang
        $parts = explode('-', $name);
        return trim($parts[0]);
    }

    protected function getIconByCategory($name)
    {
        $name = strtolower($name);
        if (str_contains($name, 'facebook')) return 'ri-facebook-box-fill';
        if (str_contains($name, 'tiktok')) return 'ri-tiktok-fill';
        if (str_contains($name, 'instagram')) return 'ri-instagram-fill';
        if (str_contains($name, 'youtube')) return 'ri-youtube-fill';
        if (str_contains($name, 'google')) return 'ri-google-fill';
        if (str_contains($name, 'twitter')) return 'ri-twitter-fill';
        if (str_contains($name, 'telegram')) return 'ri-telegram-fill';
        return 'ri-global-line';
    }
}
