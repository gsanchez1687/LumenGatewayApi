<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

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
        
    }

    public function show( $id ){
        
    }

    public function update(Request $request, $id){
        
    }

    public function destroy($id){
        
    }
}
