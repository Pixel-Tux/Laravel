<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($slug){
        
        //dd($post);
        // $posts = [
        //             'my-first-post' => 'Hello, this is my first blog post!',
        //             'my-second-post' => 'Now I am getting the hand of this blogging thing'
        //         ];

        // if (!array_key_exists($post, $posts)){
        //     abort (404, 'Sorry, that post was not found.');
        // }

        //$post = DB::table('posts')->where('slug', $slug)->first();
        // if (!$post){
        //     abort(404);
        // }


        
        
        return view('posts', [
            'post' => Post::where('slug', $slug)->firstOrFail()
            // 'post' => $post 
        ]);
    }
}
