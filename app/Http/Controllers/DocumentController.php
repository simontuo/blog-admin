<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentStoreRequest;
use App\Models\Document;
use App\Models\Tag;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    protected $breadcrumbs;

    /**
     * DocumentController constructor.
     */
    public function __construct()
    {
        $this->breadcrumbs = config('breadcrumb.' . \Route::currentRouteName());
    }

    public function index()
    {
        return view('documents.index');
    }

    public function pageSearch(Request $request)
    {
        $documents = Document::paginate($request->pagesSize);

        return response()->json(['data' => $documents, 'columns' => Document::transformColumn()]);
    }

    public function create()
    {
        $tags = Tag::get();

        return view('documents.create_and_update', [
            'tags'        => $tags,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    public function store(DocumentStoreRequest $request)
    {
        $document = new Document($request->formItem);
        $document->save();

        $document->tags()->attach($request->formItem['tags']);

        return response()->json(['message' => '新建成功'], 200);
    }

    public function edit(Document $document)
    {
        $document->load('tags');

        $document->tagIds = $document->tags->pluck('id')->toArray();

        $tags = Tag::get();

        return view('documents.create_and_update', [
            'document'    => $document,
            'tags'        => $tags,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    public function update(DocumentStoreRequest $request, Document $document)
    {
        $document->update($request->formItem);

        $document->tags()->sync($request->formItem['tags']);

        return response()->json(['message' => '编辑成功'], 200);
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return response()->json(['message' => '删除成功'], 200);
    }
}
