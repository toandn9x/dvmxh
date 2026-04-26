<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    /**
     * Handle Bank Transfer Webhook (Generic for services like Casso, PayOS, etc.)
     */
    public function bankTransfer(Request $request)
    {
        Log::info('Bank Webhook received:', $request->all());

        // This is a stub. Real implementation depends on the service provider's payload structure.
        // Example for a generic structure:
        $amount = $request->input('amount');
        $description = $request->input('description'); // e.g. "NAP 123"
        $transactionId = $request->input('transaction_id');

        if (!$amount || !$description) {
            return response()->json(['status' => 'error', 'message' => 'Invalid payload'], 400);
        }

        // Extract user ID from description (NAP <ID>)
        preg_match('/NAP\s+(\d+)/i', $description, $matches);
        $userId = $matches[1] ?? null;

        if (!$userId) {
            return response()->json(['status' => 'error', 'message' => 'User ID not found in description'], 400);
        }

        $user = User::find($userId);
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }

        // Check if transaction already processed (using transactionId as description in Deposit table for now)
        if (Deposit::where('description', 'LIKE', "%#{$transactionId}%")->exists()) {
            return response()->json(['status' => 'error', 'message' => 'Transaction already processed'], 200);
        }

        DB::transaction(function () use ($user, $amount, $transactionId) {
            $desc = "Nạp tiền tự động qua Ngân hàng. Mã GD: #{$transactionId}";
            
            $deposit = Deposit::create([
                'user_id' => $user->id,
                'type' => Deposit::BANK, // Ensure BANK constant exists in Deposit model
                'amount' => $amount,
                'status' => Deposit::SUCCESS,
                'description' => $desc,
            ]);

            $user->update(['balance' => $user->balance + $amount]);

            Transaction::create([
                'user_id' => $user->id,
                'type' => Transaction::DEPOSIT,
                'amount' => $amount,
                'balance' => $user->balance,
                'description' => $desc,
            ]);

            // Auto upgrade level logic
            $totalDeposited = $user->amount_deposited;
            $vipThreshold = (int) setting('vip_threshold', 1000000);
            $collabThreshold = (int) setting('collaborator_threshold', 5000000);

            if ($totalDeposited >= $collabThreshold && $user->level !== User::COLLABORATOR) {
                $user->update(['level' => User::COLLABORATOR]);
            } elseif ($totalDeposited >= $vipThreshold && $user->level === User::MEMBER) {
                $user->update(['level' => User::VIP]);
            }
        });

        return response()->json(['status' => 'success']);
    }
}
