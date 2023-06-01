<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class AuthorService {

    use ConsumesExternalServices;

    public static function obtainAuthors(){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('GET','/api/v1/authors',$baseUrl);
    }

    public static function createAuthors($data){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('POST','/api/v1/authors',$baseUrl, $data);
    }

    public static function obtainAuthor($author){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('GET',"/api/v1/authors/{$author}",$baseUrl);
    } 

}