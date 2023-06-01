<?php

use Illuminate\Support\Facades\Route;

//AUTHOR ROUTE
Route::get('/api/v1/authors','AuthorController@index');
Route::post('/api/v1/authors','AuthorController@store');
Route::get('/api/v1/authors/{author}','AuthorController@show');
Route::put('/api/v1/authors/{author}','AuthorController@update');
Route::patch('/api/v1/authors/{author}','AuthorController@destroy');

//BOOK ROUTE
Route::get('/api/v1/books','BookController@index');
Route::post('/api/v1/books','BookController@store');
Route::get('/api/v1/books/{book}','BookController@show');
Route::put('/api/v1/books/{book}','BookController@update');
Route::patch('/api/v1/books/{book}','BookController@destroy');