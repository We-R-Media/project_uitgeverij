<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use App\Http\Resources\AdvertiserResource;
use Illuminate\Http\Request;
use App\Models\Contact;
use GuzzleHttp\Client;

//  https://docs.guzzlephp.org/en/stable/quickstart.html - Documentation when using Guzzle

class AdvertiserController extends Controller
{
    public function send__data(Request $request)
    {
        return [
            'data' => AdvertiserResource::collection(
                Advertiser::with(['contacts' => function ($query) {
                    $query->where('role', true);
                }])->paginate(10)
            ),
        ];        
    }

    public function get__data(Request $request)
    {
    $client = new Client();

    $headers = [
        'Ocp-Apim-Subscription-Key' => 'e5fbf30fd5c24f2598f5c2acc26285ba',
        'Cache-Control' => 'no-cache',
    ];

    // $options = [
    //     'headers' => $headers,
    // ];

    $promise = $client->getAsync('https://b2bapi.snelstart.nl/echo/resource', $headers);

    // Wait for the promise to resolve
    $response = $promise->wait();

    // Get the body content from the response
    $body = $response->getBody()->getContents();

    // Now you can work with the body content
    $data = json_decode($body, true);

    }

    public function http__bin(Request $request) 
    {
        $client = new Client();
        $url = 'https://httpbin.org/get';

        $response = $client->get($url);

        $body = $response->getBody()->getContents();

        $data = json_decode($body, true);

        return $data;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function show(Advertiser $advertiser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertiser $advertiser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advertiser $advertiser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertiser $advertiser)
    {
        //
    }
}
