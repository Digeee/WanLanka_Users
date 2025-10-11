<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class AdminApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('ADMIN_API_URL') . '/', // Ensure trailing slash
            'headers' => [
                'Authorization' => 'Bearer ' . env('ADMIN_API_KEY'),
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getPackages()
    {
        try {
            $response = $this->client->get('packages'); // Should resolve to /api/packages
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('Fetched packages: ' . json_encode($data));
            return $data;
        } catch (RequestException $e) {
            Log::error('Failed to fetch packages: ' . $e->getMessage());
            if ($e->hasResponse()) {
                Log::error('Response: ' . $e->getResponse()->getBody()->getContents());
            }
            return [];
        }
    }

    public function getPackage($id)
    {
        try {
            $response = $this->client->get("packages/{$id}");
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('Fetched package ID ' . $id . ': ' . json_encode($data));
            return $data;
        } catch (RequestException $e) {
            Log::error('Failed to fetch package ID ' . $id . ': ' . $e->getMessage());
            if ($e->hasResponse()) {
                Log::error('Response: ' . $e->getResponse()->getBody()->getContents());
            }
            return null;
        }
    }
}
