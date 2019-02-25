<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResourceStoreRequest;
use App\Models\Resource;
use App\Models\Tag;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    protected $breadcrumbs;

    /**
     * ResourceController constructor.
     */
    public function __construct()
    {
        $this->breadcrumbs = config('breadcrumb.' . \Route::currentRouteName());
    }

    public function index()
    {
        return view('resources.index');
    }

    public function pageSearch(Request $request)
    {
        $resources = Resource::paginate($request->pagesSize);

        return response()->json(['data' => $resources, 'columns' => Resource::transformColumn()]);
    }

    public function create()
    {
        $tags = Tag::get();

        return view('resources.create_and_update', [
            'tags'        => $tags,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    public function store(ResourceStoreRequest $request)
    {
        $resource = new Resource($request->formItem);
        $resource->save();

        $resource->tags()->attach($request->formItem['tags']);

        return response()->json(['message' => '新建成功'], 200);
    }

    public function edit(Resource $resource)
    {
        $resource->load('tags');

        $resource->tagIds = $resource->tags->pluck('id')->toArray();

        $tags = Tag::get();

        return view('resources.create_and_update', [
            'resource'    => $resource,
            'tags'        => $tags,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    public function update(ResourceStoreRequest $request, Resource $resource)
    {
        $resource->update($request->formItem);

        $resource->tags()->sync($request->formItem['tags']);

        return response()->json(['message' => '编辑成功'], 200);
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();

        return response()->json(['message' => '删除成功'], 200);
    }
}
