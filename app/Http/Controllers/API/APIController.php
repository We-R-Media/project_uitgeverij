<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function get__data(Request $request)
    {
        $url = "https://b2bapi.snelstart.nl/echo/resource";
        $param1 = "sample";
    
        $client = new Client();
    
        try {
            $response = $client->get($url, [
                'headers' => [
                    'Cache-Control' => 'no-cache',
                    'Ocp-Apim-Subscription-Key' => 'd7d5cfe3576a4eb3bcab162f4f57eaef',
                ],
                'query' => [
                    'param1' => $param1,
                ],
            ]);
    
            $body = $response->getBody();
            $data = json_decode($body, true); // Assuming the response is JSON, adjust accordingly
    
            // Handle the data as needed
            dd($response);
    
        } catch (RequestException $e) {
            // Handle errors
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse();
                $statusCode = $errorResponse->getStatusCode();
                $errorMessage = json_decode($errorResponse->getBody(), true)['message'] ?? 'Unknown error';
                echo "Error: $statusCode - $errorMessage\n";
            } else {
                echo "Request failed: " . $e->getMessage() . "\n";
            }
        }
    }

    public function get__token(Request $request)
    {
        $clientKey = "d7d5cfe3576a4eb3bcab162f4f57eaef"; // Vul dit met de koppelingsleutel verkregen op https://web.snelstart.nl

        if (empty($clientKey)) {
            return response()->json(['error' => 'De variabele clientKey moet een waarde hebben'], 400);
        }

        $bearerToken = $this->getBearerToken($clientKey);

        if (!$bearerToken) {
            return response()->json(['error' => 'Kon geen toegangstoken verkrijgen'], 500);
        }

        // Voeg hier verdere verwerking toe met het verkregen Bearer Token
        return response()->json(['access_token' => $bearerToken], 200);
    }

    private function getBearerToken($clientKey)
    {
        try {
            $response = Http::post('https://auth.snelstart.nl/b2b/token', [
                'authenticated' => true,
                'access-control-allow-origin' => '*',
                'content-length' => 61,

            ]);

            $data = $response->json();

            return $data['access_token'];

        } catch (\Exception $e) {
            // Log eventuele fouten
            return null;
        }
    }


    // Test GET request naar httpbin.org

    public function http__bin(Request $request) 
    {
        try {
            $client = new Client();
    
            $url = 'https://httpbin.org/get';
            $method = 'GET';
            $data = [
                'data1' => 'hello',
                'data2' => 'world',
            ];
        
            $url .= '?' . http_build_query($data);
        
            $response = $client->get($url);
        
            $response_body = $response->getBody()->getContents();
        
            $data = json_decode($response_body, true);
        
            dd($data);

        } catch(\RequestException $e) {
            dd($e);
        }
    }
}
