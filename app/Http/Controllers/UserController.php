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
}
