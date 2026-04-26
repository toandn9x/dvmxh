<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\Package;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SmmIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_is_pushed_to_smm_api()
    {
        // Mock SMM API response
        Http::fake([
            'https://api.provider.com*' => Http::response(['order' => 12345], 200),
        ]);

        // Setup data
        $user = User::factory()->create(['balance' => 100000]);
        $category = Category::create([
            'name' => 'Facebook', 
            'slug' => 'facebook', 
            'type' => Category::SERVICE_TYPE
        ]);
        $service = Service::create([
            'category_id' => $category->id, 
            'name' => 'Like', 
            'slug' => 'like',
            'label' => 'Link bài viết',
            'placeholder' => 'Nhập link bài viết Facebook',
            'status' => Service::ACTIVE
        ]);
        $package = Package::create([
            'service_id' => $service->id,
            'name' => 'Like SV1',
            'price' => 10,
            'min_quantity' => 100,
            'max_quantity' => 10000,
            'provider' => 'testprovider',
            'api_service_id' => '101',
            'status' => Package::ACTIVE,
        ]);

        // Set settings for the provider
        setting(['smm_testprovider_url' => 'https://api.provider.com', 'smm_testprovider_key' => 'secretkey'])->save();

        $response = $this->actingAs($user)->post(route('service.store', [$category->slug, $service->slug]), [
            'package_id' => $package->id,
            'input' => 'https://facebook.com/post/1',
            'quantity' => 100,
        ]);

        $response->assertStatus(302);
        
        $order = Order::first();
        $this->assertNotNull($order);
        $this->assertEquals('12345', $order->api_order_id);
        $this->assertEquals(Order::PROCESSING, $order->status);
        
        // Check balance deduction
        $user->refresh();
        $this->assertEquals(100000 - (10 * 100), $user->balance);
    }
}
