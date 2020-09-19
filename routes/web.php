<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {

    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/{article}', 'ArticlesController@show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::get('/articles/{article}/', 'ArticlesController@show');



// GET, POST, PUT DELETE

// GET  /articles
// GET  /articles/:id 
// POST /articles
// PUT      /articles/:id
// DELETE   /articles/:id/