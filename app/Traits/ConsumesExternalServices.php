<?php 
namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalServices{

    public static function performRequest($method, $requestUrl, $baseUrl, $formParams = [], $headers = []){
        $client = new Client([
            'base_uri' => $baseUrl
        ]);
        $response = $client->request($method,$requestUrl,[
            'form_params'=>$formParams,
            'headers'=>$headers]
        );
        return $response->getBody()->getContents();
    }

}