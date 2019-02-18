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

    public function show(Permission $article)
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(Permission $article)
    {

    }

    public function update(Request $request, Permission $article)
    {

    }

    public function destroy(Permission $article)
    {

    }
}
