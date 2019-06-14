<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $breadcrumbs;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->breadcrumbs = config('breadcrumb.' . \Route::currentRouteName());
    }

    public function index()
    {
        return view('users.index');
    }

    public function pageSearch(Request $request)
    {
        $user = User::latest()
            ->paginate($request->pagesSize);

        return response()->json(['data' => $user, 'columns' => User::transformColumn()]);
    }

    public function show(User $user)
    {
        $user->load('articles.tags');

        return view('users.show', [
            'user' => $user
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(User $user)
    {

    }

    public function update(Request $request, User $user)
    {

    }

    public function destroy(User $user)
    {

    }

    public function updateAvatar(Request $request, User $user)
    {
        if (!user()->isOwn($user->id)) {
            throw new \Exception('你不拥有该资源的权限');
        }

        $user->update([
            'avatar' => $request->avatar,
        ]);

        return response(['message' => '修改成功'], 200);
    }

    /**
     * 用户列表
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $users = User::withoutGlobalScopes()->get();

        return response()->json(['data' => $users]);
    }

    /**
     * 管理员创建
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function managerCreate(Request $request)
    {
        $users = User::withoutGlobalScopes()->whereIn('id', $request->id)->get();

        $users->map(function ($user) {
            $user->is_admin = true;
            $user->save();
        });

        return response()->json(['message' => '新增成功'], 200);
    }

    /**
     * 管理员删除
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function managerDelete(User $user)
    {
        $user->is_admin = false;
        $user->save();

        return response()->json(['message' => '删除成功'], 200);
    }
}
