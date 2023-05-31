<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class AuthorService {

    use ConsumesExternalServices;
    public $baseUri;

    public function __constructor(){

        $this->baseUri = env('AUTHOR_SERVICE_BASE_URL');

    }

    public static function obtainAuthors(){
        
        return ConsumesExternalServices::performRequest('GET','authors');
      
    }

}