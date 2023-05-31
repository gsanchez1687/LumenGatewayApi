<?php 
namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

trait ConsumesExternalServices{

    public static function performRequest($method, $requestUrl, $formParams = [], $headers = []){
        $client = new Client([
            'base_uri' => env('AUTHOR_SERVICE_BASE_URL'),
        ]);
        $response = $client->request($method,$requestUrl,[
            'form_params'=>$formParams,
            'headers'=>$headers]
        );
        return $response->getBody()->getContents();
    }

}