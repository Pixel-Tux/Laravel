<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // render a list of resurces.
    public function index() {
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    // shows a single resorce
    public function show($id) {
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    // shows a view to create a new resorce
    public function create() {

    }

    // persist the new resorce
    public function store() {

    }
    
    // show a wiew to edit an existing resource
    public function edit() {

    }

    // persist the edited rdsorce
    public function update() {

    }

    // delete the risisorce
    public function destroy() {

    }


}
