<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagStoreRequest;
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

    public function store(TagStoreRequest $request)
    {
        $tag = new Tag($request->formItem);

        $tag->save();

        return response()->json(['message' => '新建成功'], 200);
    }

    public function edit(Tag $tag)
    {
        return view('tags.create_and_update', [
            'tag'         => $tag,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    public function update(TagStoreRequest $request, Tag $tag)
    {
        $tag->update($request->formItem);

        return response()->json(['message' => '编辑成功'], 200);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json(['message' => '删除成功'], 200);
    }
}
