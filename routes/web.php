<?php

use Illuminate\Support\Facades\Route;

//AUTHOR ROUTE
Route::get('/authors','AuthorController@index');
Route::post('/authors','AuthorController@store');
Route::get('/authors/{author}','AuthorController@show');
Route::put('/authors/{author}','AuthorController@update');
Route::patch('/authors/{author}','AuthorController@destroy');

//BOOK ROUTE
Route::get('/books','BookController@index');
Route::post('/books','BookController@store');
Route::get('/books/{book}','BookController@show');
Route::put('/books/{book}','BookController@update');
Route::patch('/books/{book}','BookController@destroy');