<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $breadcrumbs;

    /**
     * CommentController constructor.
     */
    public function __construct()
    {
        $this->breadcrumbs = config('breadcrumb.' . \Route::currentRouteName());
    }

    public function index()
    {
        return view('comments.index');
    }

    public function pageSearch(Request $request)
    {
        $members = Comment::with('user')
            ->paginate($request->pagesSize);

        return response()->json(['data' => $members, 'columns' => Comment::transformColumn()]);
    }

    public function show(Article $article)
    {
        $parseDownExtra = new ParsedownExtra();

        $article->content = $parseDownExtra->text($article->content);

        $article->load('user', 'tags');

        $article->increment('read_count');

        return view('articles.show', [
            'article'     => $article,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    public function edit(Comment $comment)
    {

    }

    public function update(Request $request, Comment $comment)
    {

    }

    public function destroy(Comment $comment)
    {

    }
}
