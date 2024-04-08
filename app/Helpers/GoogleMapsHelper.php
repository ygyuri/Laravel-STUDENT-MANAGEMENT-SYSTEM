<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class GoogleMapsHelper
{
    public static function geocodeAddress($address)
    {
        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
            'query' => [
                'address' => $address,
                'key' => 'AIzaSyBCQsKJwCT3EtFiJE0CAwwOrqROQrcA0lU'
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
