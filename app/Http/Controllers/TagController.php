<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $breadcrumbs;

    /**
     * TagController constructor.
     */
    public function __construct()
    {
        $this->breadcrumbs = config('breadcrumb.' . \Route::currentRouteName());
    }

    public function index()
    {
        return view('tags.index');
    }

    public function pageSearch(Request $request)
    {
        $members = Tag::paginate($request->pagesSize);

        return response()->json(['data' => $members, 'columns' => Tag::transformColumn()]);
    }

    public function create()
    {
        return view('tags.create_and_update', [
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }
}
