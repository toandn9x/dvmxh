<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmmService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct($provider = null)
    {
        $this->baseUrl = setting("smm_{$provider}_url");
        $this->apiKey = setting("smm_{$provider}_key");
    }

    public function createOrder($params)
    {
        return $this->request([
            'action' => 'add',
        ] + $params);
    }

    public function getServices()
    {
        return $this->request([
            'action' => 'services',
        ]);
    }

    public function getStatus($orderId)
    {
        return $this->request([
            'action' => 'status',
            'order' => $orderId,
        ]);
    }

    protected function request($params)
    {
        if (!$this->baseUrl || !$this->apiKey) {
            return ['error' => 'Provider not configured'];
        }

        $response = Http::post($this->baseUrl, [
            'key' => $this->apiKey,
        ] + $params);

        return $response->json();
    }
}
