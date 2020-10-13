<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $articles = DB::table('articles')->get();
        // var_dump($articles);
        // dd($articles);
        // $articles = Article::get();
        $articles = Article::latest()->limit(6)->get();

        return view('home', compact('articles'));
    }
}