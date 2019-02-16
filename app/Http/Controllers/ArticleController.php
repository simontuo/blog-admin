<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\Tag;
use App\Services\ParsedownExtra;
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
            ->latest()
            ->paginate($request->pagesSize);

        return response()->json(['data' => $members, 'columns' => Article::transformColumn()]);
    }

    public function show(Article $article)
    {
        $parseDownExtra = new ParsedownExtra();

        $article->content = $parseDownExtra->text($article->content);

        $article->load('user', 'tags');

        $article->increment('read_count');

        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        $tags = Tag::get();

        return view('articles.create_and_update', ['tags' => $tags]);
    }

    public function store(ArticleStoreRequest $request)
    {
        $article = new Article($request->formItem);

        $article->user()->associate(user());
        $article->save();

        $article->tags()->attach($request->formItem['tags']);

        return response()->json(['message' => '新建成功'], 200);
    }

    public function edit(Article $article)
    {
        $article->load('user', 'tags');

        $article->tagIds = $article->tags->pluck('id')->toArray();

        $tags = Tag::get();

        return view('articles.create_and_update', [
            'article' => $article,
            'tags'    => $tags
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->formItem);

        $article->tags()->sync($request->formItem['tags']);

        return response()->json(['message' => '编辑成功'], 200);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(['message' => '删除成功'], 200);
    }
}
