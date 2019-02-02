<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index');
    }

    public function pageSearch()
    {
        $articles = Article::paginate(10);

        return response()->json(['articles' => $articles]);
    }
}
