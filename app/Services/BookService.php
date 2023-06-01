<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class BookService{

    use ConsumesExternalServices;

    public static function listBooks(){
        $baseUrl = config('services.books.base_uri');
        return ConsumesExternalServices::performRequest('GET','/api/v1/books',$baseUrl);
    }

    public static function storeBooks($data){
        $baseUrl = config('services.books.base_uri');
        return ConsumesExternalServices::performRequest('POST','/api/v1/books',$baseUrl, $data);
    }

    public static function showBooks($book){
        $baseUrl = config('services.books.base_uri');
        return ConsumesExternalServices::performRequest('GET',"/api/v1/books/{$book}",$baseUrl);
    } 

    public static function updateBooks($data, $book){
        $baseUrl = config('services.books.base_uri');
        return ConsumesExternalServices::performRequest('PUT',"/api/v1/books/{$book}",$baseUrl, $data); 
    } 

    public static function deleteBooks($book){
        $baseUrl = config('services.books.base_uri');
        return ConsumesExternalServices::performRequest('PATCH',"/api/v1/books/{$book}",$baseUrl);
    } 
}