<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/posts/{post}', function ($post) {
    $posts = [
        'my-first-post' => 'Hello, this is my first blog post!',
        'my-second-post' => 'Now I am getting the hand of this blogging thing'
    ];
    if (!array_key_exists($post, $posts)){
        abort (404, 'Sorry, that post was not found.');
    }

    return view('posts', [
        'post' => $posts[$post] 
        // ?? 'Nothing here yet'
    ]);
});

Route::get('/return', function () {
    $name = request('name');
    return view('return', [
        'name' => $name
    ]);
});

// Route::get('/welcome    ', function () {
//     return ['foo' => 'bar'] ;
// });
