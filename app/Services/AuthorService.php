<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class AuthorService {

    use ConsumesExternalServices;

    public static function obtainAuthors(){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('GET','authors',$baseUrl);
    }

    public static function createAuthors($data){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('POST','authors',$baseUrl, $data);
    }

    public static function obtainAuthor($author){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('GET',"/authors/{$author}",$baseUrl);
    } 

}