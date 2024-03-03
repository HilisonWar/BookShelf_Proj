<?php

use Illuminate\Support\Facades\Route;


Route::middleware("guest")->group(function()
{
        Route::name('login')->get('/login',function(){
            return view("login");
        });

        Route::get('/register',function(){
            return view("register");
        });

        Route::post('/login','AuthController@Login');

        Route::post('/register','AuthController@Register');
      
});


Route::middleware("auth")->group(function()
{
    Route::name("mainPage")->get('/',"MainPageController@Index");

    Route::post('/logout','AuthController@Logout');

    Route::get('/books',"BooksController@GetBooks");

    Route::post('/books',"BooksController@AddBook");
    
    Route::put('/books',"BooksController@UpdateBook");

    Route::get('/books/authors',"BooksController@GetAuthors");

    Route::get('/books/articles',"BooksController@GetArticles");


});

