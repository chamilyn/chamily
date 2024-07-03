<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CallApiController extends Controller
{
    public static function callLineNotify($data)
    {

        $client = new Client();
        $apiEndpoint = "https://notify-api.line.me/api/notify";
        // Bearer token for authentication
        //Line chamily
        $token = "aPWBdCK5GbWvZOL9NfHG2IeDaI4O56QYCCfscLjxqQX";
        //Line Test
        //$token = "aEonqUxO5UsYWY0l3sKn1iMOAHkOaWwTM04M1W3c4vq";
        // Make the POST request with URL-encoded data and bearer token
        $response = $client->post($apiEndpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'form_params' => $data,
        ]);

        // Get the response body as an array or JSON
        $responseData = json_decode($response->getBody(), true);
        
        return $responseData;
    }

    public static function getIamVdoUrl($id)
    {
        try {
            $client = new Client();
            $apiEndpoint = "https://user.bnk48.io/timeline-video/".$id;
            $response = $client->get($apiEndpoint, [
                'headers' => [
                    'Bnk48-Appcode' => 'BNK48_102',
                    'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI4MTQzMDMiLCJ1bmlxdWVfbmFtZSI6IjgxNDMwMyIsImlzcyI6InVzZXItYXV0aC5ibms0OC5pbyIsIm5iZiI6MTcxOTUwNzM3OCwiZXhwIjoxNzIwMTEyMTc4LCJpYXQiOjE3MTk1MDczNzh9.-r4_mVrWj4ygDb3J0YZPsZKP0bMzY2HlXQUNnsSVe2A',
                    'Bnk48-Device-Id' => 'be2859ff8b2300f1',
                    'Bnk48-Device-Model' => 'Android Android SDK built for arm64',
                ],
            ]);

            // Get the response body as an array or JSON
            $responseData = json_decode($response->getBody());
            if (isset($responseData->resourceUrl)) {
                return $responseData->resourceUrl;
            }
        } catch (\Throwable $th) {
            return null;
        }
        return null;
    }
}
