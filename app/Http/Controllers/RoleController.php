<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $breadcrumbs;

    /**
     * RoleController constructor.
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
        $permissions = Role::latest()
            ->paginate($request->pagesSize);

        return response()->json(['data' => $permissions, 'columns' => Role::transformColumn()]);
    }

    public function show(Role $article)
    {

    }

    public function create()
    {

    }

    public function store(Role $request)
    {

    }

    public function edit(Role $article)
    {

    }

    public function update(Request $request, Role $article)
    {

    }

    public function destroy(Role $article)
    {

    }
}
