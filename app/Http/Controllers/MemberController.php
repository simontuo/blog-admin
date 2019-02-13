<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * 会员管理
     *
     * author SimonTuo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('members.index');
    }

    public function pageSearch()
    {
        $members = Member::paginate(15);

        return response()->json(['data' => $members, 'columns' => Member::transformColumn()]);
    }
}
