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

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json(['message' => '删除成功'], 200);
    }
}
