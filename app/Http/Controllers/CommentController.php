<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
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
}
