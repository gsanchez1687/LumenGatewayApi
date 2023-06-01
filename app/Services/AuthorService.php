<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class AuthorService {

    use ConsumesExternalServices;

    public static function listAuthors(){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('GET','/api/v1/authors',$baseUrl);
    }

    public static function storeAuthors($data){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('POST','/api/v1/authors',$baseUrl, $data);
    }

    public static function showAuthor($author){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('GET',"/api/v1/authors/{$author}",$baseUrl);
    } 

    public static function updateAuthor($data, $author){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('PUT',"/api/v1/authors/{$author}",$baseUrl, $data); 
    } 

    public static function deleteAuthor($author){
        $baseUrl = config('services.authors.base_uri');
        return ConsumesExternalServices::performRequest('PATCH',"/api/v1/authors/{$author}",$baseUrl);
    } 

}