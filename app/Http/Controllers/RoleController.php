<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Models\Permission;
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

    /**
     * 新建角色页
     *
     * creator fjy
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('roles.create_and_update', [
            'permissions' => getTransferData($permissions),
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    public function store(RoleStoreRequest $request)
    {
        $role = new Role($request->formItem);

        $role->save();

        $role->permissions()->attach($request->formItem['targetPermissions']);

        return response()->json(['message' => '新建成功'], 200);
    }

    /**
     * 角色编辑页
     *
     * author SimonTuo
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();

        $role->load('permissions');
        $role->permissionIds = $role->permissions->pluck('id');

        return view('roles.create_and_update', [
            'breadcrumbs' => $this->breadcrumbs,
            'role'        => $role,
            'permissions' => getTransferData($permissions),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->formItem);

        $role->permissions()->sync($request->formItem['targetPermissions']);

        return response()->json(['message' => '编辑成功'], 200);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json(['message' => '删除成功'], 200);
    }
}
