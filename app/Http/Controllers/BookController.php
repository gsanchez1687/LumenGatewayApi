<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponser;
    public $bookService;

    public function __construct(BookService $bookService )
    {
        
    }

    public function index(){

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
