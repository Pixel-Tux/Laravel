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
    public function show(Article $article) {
        // $article = Article::findOrFail($id);
        return view('articles.show', ['article' => $article]);
    }

    // shows a view to create a new resorce
    public function create() {
        return view('articles.create');

    }

    // persist the new resorce
    public function store() {
        // dump(request()->all());
        // validation
        // clean up
        // $validatedAtributs = request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        Article::create($this->validateArticle()
            // request()->validate([
            // 'title' => 'required',
            // 'excerpt' => 'required',
            // 'body' => 'required'
            // ])
        );

        return redirect('/articles');

    }
    
    // show a wiew to edit an existing resource
    public function edit(Article $article) {
        // finde the articles associated with the id
        return view('articles.edit', compact('article') );
    }

    // persist the edited rdsorce
    public function update(Article $article) {
        $article->update( $this->validateArticle() 
        //     request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ])
        );
        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');
        // $article->save();

        return redirect('/articles/'. $article->id);
    }

    // delete the risisorce
    public function destroy() {

    }

        //--------------------------------------------------------------
    protected function validateArticle(){
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }


}
