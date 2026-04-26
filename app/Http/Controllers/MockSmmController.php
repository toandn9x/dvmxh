<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MockSmmController extends Controller
{
    /**
     * Mô phỏng một nhà cung cấp SMM API thực tế.
     * URL test: {your-domain}/api/mock-provider
     */
    public function handle(Request $request)
    {
        $action = $request->input('action');
        $key = $request->input('key');

        if (!$key || $key !== 'mock-api-key-123') {
            return response()->json(['error' => 'Invalid API Key'], 401);
        }

        switch ($action) {
            case 'services':
                return $this->getServices();
            case 'add':
                return $this->addOrder($request);
            case 'status':
                return $this->getStatus($request);
            default:
                return response()->json(['error' => 'Invalid action']);
        }
    }

    private function getServices()
    {
        return [
            [
                'service' => '101',
                'name' => '[Mock] Like Facebook - Siêu nhanh',
                'type' => 'Default',
                'category' => 'Facebook Mock',
                'rate' => '0.5',
                'min' => '100',
                'max' => '10000'
            ],
            [
                'service' => '102',
                'name' => '[Mock] Sub TikTok - Không tụt',
                'type' => 'Default',
                'category' => 'TikTok Mock',
                'rate' => '1.2',
                'min' => '50',
                'max' => '5000'
            ]
        ];
    }

    private function addOrder($request)
    {
        $quantity = $request->input('quantity');
        
        // Mô phỏng lỗi nếu số lượng quá lớn
        if ($quantity > 5000) {
            return response()->json(['error' => 'Quantity too high for mock testing']);
        }

        return response()->json([
            'order' => rand(100000, 999999)
        ]);
    }

    private function getStatus($request)
    {
        $statusArr = ['Pending', 'Processing', 'InProgress', 'Completed'];
        return response()->json([
            'status' => $statusArr[array_rand($statusArr)],
            'charge' => '0.5',
            'start_count' => '100',
            'remains' => '0',
            'currency' => 'USD'
        ]);
    }
}
