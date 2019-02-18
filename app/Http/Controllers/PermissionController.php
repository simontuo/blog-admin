<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $breadcrumbs;

    /**
     * PermissionController constructor.
     */
    public function __construct()
    {
        $this->breadcrumbs = config('breadcrumb.' . \Route::currentRouteName());
    }

    public function index()
    {
        return view('permissions.index');
    }

    public function pageSearch(Request $request)
    {
        $permissions = Permission::latest()
            ->paginate($request->pagesSize);

        return response()->json(['data' => $permissions, 'columns' => Permission::transformColumn()]);
    }

    public function show(Article $article)
    {

    }

    public function create()
    {

    }

    public function store(ArticleStoreRequest $request)
    {

    }

    public function edit(Article $article)
    {

    }

    public function update(Request $request, Article $article)
    {

    }

    public function destroy(Article $article)
    {

    }
}
