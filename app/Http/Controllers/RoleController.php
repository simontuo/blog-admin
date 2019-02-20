<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
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
        return view('roles.index');
    }

    public function pageSearch(Request $request)
    {
        $roles = Role::latest()
            ->paginate($request->pagesSize);

        return response()->json(['data' => $roles, 'columns' => Role::transformColumn()]);
    }

    public function show(Role $article)
    {

    }

    public function create()
    {
        return view('roles.create_and_update', [
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    public function store(RoleStoreRequest $request)
    {
        $role = new Role($request->formItem);

        $role->save();

        return response()->json(['message' => '新建成功'], 200);
    }

    public function edit(Role $role)
    {
        return view('roles.create_and_update', [
            'breadcrumbs' => $this->breadcrumbs,
            'role'        => $role,
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->formItem);

        return response()->json(['message' => '编辑成功'], 200);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json(['message' => '删除成功'], 200);
    }
}
