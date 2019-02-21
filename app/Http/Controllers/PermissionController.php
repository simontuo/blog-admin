<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionStoreRequest;
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
        return view('permissions.create_and_update', [
            'httpMethods' => Permission::$httpMethods,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    public function store(PermissionStoreRequest $request)
    {
        $permission = new Permission($request->formItem);

        $permission->save();

        return response()->json(['message' => '新建成功'], 200);
    }

    public function edit(Permission $permission)
    {
        return view('permissions.create_and_update', [
            'permission'  => $permission,
            'httpMethods' => Permission::$httpMethods,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->formItem);

        return response()->json(['message' => '编辑成功'], 200);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response()->json(['message' => '删除成功'], 200);
    }
}
