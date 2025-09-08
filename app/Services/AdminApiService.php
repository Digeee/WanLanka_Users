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
               'base_uri' => env('ADMIN_API_URL'),
               'headers' => [
                   'Authorization' => 'Bearer ' . env('ADMIN_API_KEY'),
                   'Accept' => 'application/json',
               ],
           ]);
       }

       public function getPackages()
       {
           try {
               $response = $this->client->get('packages');
               return json_decode($response->getBody()->getContents(), true);
           } catch (RequestException $e) {
               Log::error('Failed to fetch packages: ' . $e->getMessage());
               return [];
           }
       }

       public function getPackage($id)
       {
           try {
               $response = $this->client->get("packages/{$id}");
               return json_decode($response->getBody()->getContents(), true);
           } catch (RequestException $e) {
               Log::error('Failed to fetch package ID ' . $id . ': ' . $e->getMessage());
               return null;
           }
       }
   }
