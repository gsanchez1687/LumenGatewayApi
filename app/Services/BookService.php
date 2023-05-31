<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class BookService{

    use ConsumesExternalServices;

    public $baseUri;

    public function __constructor(){
        $this->baseUri = config('services.books.base_uri');
    }
}