<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class BookService{

    use ConsumesExternalServices;

    public static function obtainAuthors(){
        $baseUrl = config('services.books.base_uri');
        return ConsumesExternalServices::performRequest('GET','authors',$baseUrl);
    }
}