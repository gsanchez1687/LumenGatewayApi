<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;
    public $bookService;
    public $authorService;

    public function __construct(BookService $bookService, AuthorService $authorService )
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index(){
        return $this->successResponse( BookService::listBooks() );
    }

    public function store( Request $request ){
        BookService::showBooks( $request->author_id );
        return $this->successResponse( BookService::storeBooks( $request->all() ), Response::HTTP_CREATED );
    }

    public function show( $book ){
        return $this->successResponse( BookService::showBooks( $book ) );
    }

    public function update(Request $request, $book){
        return $this->successResponse( BookService::updateBooks( $request->all(), $book ) );
    }

    public function destroy($book){
        return $this->successResponse( BookService::deleteBooks( $book ) );
    }
}
