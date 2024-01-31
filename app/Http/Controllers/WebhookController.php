<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class WebhookController extends Controller
{
        /**
    * @param Request $request
    * @return json
    */
    public function webhook__handler(Request $request) {

        $payload = $request->all();
        $response = Http::get('https://webhook.site/6e95a2ae-2707-4d53-bf71-5e656373cc78');

        // if(isset($payload['data']['type'])) {
        //     $eventType = $payload['data']['type'];

        //     dd($eventType['data']);
        // } else {
        //     dd(false);
        // }


        if($response->successful()) {
            $apiData = $response->json();

            return response()->json(['status' => 'Webhook received successfully', 'payload' => $payload]);
        }

        \Log::info('Webhook received:', $payload);

    }
    public function webhook__get(Request $request)
    {
        // Get the data sent by Clerk.dev
        $payload = $request->all();

        // Log the data
        \Log::info('Webhook data received:', ['payload' => $payload]);

        // You can perform additional processing with the $payload data as needed

        // Make a GET request to Clerk.dev API
        $clerkApiUrl = 'https://webhook.site/6e95a2ae-2707-4d53-bf71-5e656373cc78';
        $client = new Client();

        try {
            $response = $client->get($clerkApiUrl);

            $statusCode = $response->getStatusCode();
            $responseContent = $response->getBody()->getContents();


            if ($statusCode == 200) {
                // Process the retrieved data
                // Perform additional processing with $responseContent if needed
                \Log::info('Clerk.dev API response:', ['responseContent' => $responseContent]);
                dd($client);
            } else {
                \Log::error("Error: $statusCode - Clerk.dev API request failed");
            }
        } catch (\Exception $e) {
            \Log::error('Clerk.dev API request error: ' . $e->getMessage());
        }

        // Respond to Clerk.dev, if necessary
        return response()->json(['status' => 'Webhook data received successfully']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
