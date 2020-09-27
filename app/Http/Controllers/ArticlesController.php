<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // render a list of resurces.
    public function index() {
        if (request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }
        else{
            $articles = Article::latest()->get();
        }
        return view('articles.index', ['articles' => $articles]);
    }

    // shows a single resorce
    public function show(Article $article) {
        // $article = Article::findOrFail($id);
        return view('articles.show', ['article' => $article]);
    }

    // shows a view to create a new resorce
    public function create() {
        // $tags = Tag::all();
        return view('articles.create', [
            'tags' => Tag::all()
        ]); 
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
        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();
        $article->tags()->attach(request('tags'));

        // Article::create($this->validateArticle()
        //     // request()->validate([
        //     // 'title' => 'required',
        //     // 'excerpt' => 'required',
        //     // 'body' => 'required'
        //     // ])
        // );

        return redirect(route('articles.index'));

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

        return redirect( $article->path() );
    }

    // delete the risisorce
    public function destroy() {

    }

        //--------------------------------------------------------------
    protected function validateArticle(){
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }


}
