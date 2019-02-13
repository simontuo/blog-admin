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

    public function pageSearch(Request $request)
    {
        $members = Article::with('user')
            ->paginate($request->pagesSize);

        return response()->json(['data' => $members, 'columns' => Article::transformColumn()]);
    }
}
