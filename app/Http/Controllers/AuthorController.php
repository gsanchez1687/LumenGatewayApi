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
        
    }

    public function index(){
      
        return $this->successResponse( AuthorService::obtainAuthors() );
    }

    public function store( Request $request ){

        return $this->successResponse( AuthorService::createAuthors( $request->all() ), Response::HTTP_CREATED );

    }

    public function show( $author ){
        return $this->successResponse( AuthorService::obtainAuthor( $author ) );
    }

    public function update(Request $request, $id){
        
    }

    public function destroy($id){
        
    }
}
