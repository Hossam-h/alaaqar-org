<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlaaqarOrganization extends Controller
{
    public function handle(Request $request)
    {
        $adLicenseNumber = $request->input('adLicenseNumber');
        $advertiserId    = $request->input('advertiserId');
        $idType          = $request->input('idType');

        $headers = [
            'Content-Type'     => 'application/json',
            'XIBMClientSecret' => '463bfbe6614b78ede7eb20a99f0e62df',
            'XIBMClientId'     => 'f10cd077b722848c21f526b59d8eadce',
        ];

        $response = Http::withHeaders($headers)->get('https://integration-gw.housingapps.sa/nhc/dev/v1/brokerage/AdvertisementValidator', [
            'adLicenseNumber' => $adLicenseNumber,
            'advertiserId'    => $advertiserId,
            'idType'          => $idType,
        ]);

        $apiResponse = $response->json();
      
        return $apiResponse;
    }

}
