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
        $token = "aPWBdCK5GbWvZOL9NfHG2IeDaI4O56QYCCfscLjxqQX";
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

        $client = new Client();
        $apiEndpoint = "https://user.bnk48.io/timeline-video/".$id;
        $response = $client->get($apiEndpoint, [
            'headers' => [
                'Bnk48-Appcode' => 'BNK48_102',
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI4MTQzMDMiLCJ1bmlxdWVfbmFtZSI6IjgxNDMwMyIsImlzcyI6InVzZXItYXV0aC5ibms0OC5pbyIsIm5iZiI6MTcxMDIxNzQ4OSwiZXhwIjoxNzEwODIyMjg5LCJpYXQiOjE3MTAyMTc0ODl9.iiLMKlH1crEwmsI0H9E7L_DyTdDugRNHlsSScYez_4s',
                'Bnk48-Device-Id' => 'be2859ff8b2300f1',
                'Bnk48-Device-Model' => 'Android Android SDK built for arm64',
            ],
        ]);

        // Get the response body as an array or JSON
        $responseData = json_decode($response->getBody());
        if (isset($responseData->resourceUrl)) {
            return $responseData->resourceUrl;
        }
        return null;
    }
}
