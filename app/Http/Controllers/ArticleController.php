<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\Tag;
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

    public function create()
    {
        $tags = Tag::get();

        return view('articles.create_and_update', ['tags' => $tags]);
    }

    public function store(ArticleStoreRequest $request)
    {
        dd($request->all());
    }
}
