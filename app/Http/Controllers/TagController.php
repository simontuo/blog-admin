<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index');
    }

    public function pageSearch(Request $request)
    {
        $members = Tag::paginate($request->pagesSize);

        return response()->json(['data' => $members, 'columns' => Tag::transformColumn()]);
    }
}
