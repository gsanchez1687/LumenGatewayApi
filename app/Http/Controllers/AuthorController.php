<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{

    use ApiResponser;
    public $authorService;

    public function __construct( AuthorService $authorService  )
    {
        $this->authorService = $authorService;
    }

    public function index(){
      
        return $this->successResponse( AuthorService::listAuthors() );
    }

    public function store( Request $request ){
        return $this->successResponse( AuthorService::storeAuthors( $request->all() ), Response::HTTP_CREATED );
    }

    public function show( $author ){
        return $this->successResponse( AuthorService::showAuthor( $author ) );
    }

    public function update(Request $request, $author){
        return $this->successResponse( AuthorService::updateAuthor( $request->all(), $author ) );
    }

    public function destroy($author){
        return $this->successResponse( AuthorService::deleteAuthor( $author ) );
    }
}
