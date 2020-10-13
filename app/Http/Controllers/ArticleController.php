<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(9);
        return view('articles.index', compact('articles'));
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store()
    {
        //  validate
        $attr = request()->validate([
            'title' => ['required', 'min:3', 'max:191'],
            'content' => ['required', 'min:10'],
        ]);

        $attr['slug'] =  \Str::slug(request('title')) . '-' . \Str::random(10);

        $article = Article::create($attr);

        return redirect()->route('articles.show', $article);
    }
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }
    public function update(Article $article)
    {
        $attr = request()->validate([
            'title' => ['required', 'min:3', 'max:191'],
            'content' => ['required', 'min:10'],
        ]);

        $attr['slug'] =  \Str::slug(request('title')) . '-' . \Str::random(10);

        $article->update($attr);

        return redirect()->route('articles.show', $article);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles');
    }
}