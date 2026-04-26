<?php

namespace Tests\Feature;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BankWebhookTest extends TestCase
{
    use RefreshDatabase;

    public function test_bank_transfer_webhook_increases_user_balance()
    {
        $user = User::factory()->create(['balance' => 1000]);

        $payload = [
            'amount' => 50000,
            'description' => "NAP {$user->id}",
            'transaction_id' => 'BANK123456'
        ];

        $response = $this->postJson('/api/webhooks/bank-transfer', $payload);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'success']);

        $user->refresh();
        $this->assertEquals(51000, $user->balance);

        $deposit = Deposit::first();
        $this->assertNotNull($deposit);
        $this->assertEquals(50000, $deposit->amount);
        $this->assertEquals(Deposit::SUCCESS, $deposit->status);
        $this->assertStringContainsString('BANK123456', $deposit->description);
    }

    public function test_webhook_rejects_duplicate_transaction()
    {
        $user = User::factory()->create(['balance' => 1000]);
        
        $payload = [
            'amount' => 50000,
            'description' => "NAP {$user->id}",
            'transaction_id' => 'BANK123456'
        ];

        // First time
        $this->postJson('/api/webhooks/bank-transfer', $payload);
        
        // Second time
        $response = $this->postJson('/api/webhooks/bank-transfer', $payload);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'error', 'message' => 'Transaction already processed']);
        
        $user->refresh();
        $this->assertEquals(51000, $user->balance); // Only credited once
    }
}
