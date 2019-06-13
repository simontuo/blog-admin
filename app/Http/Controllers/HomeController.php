<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Comment;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * 外层页面主页
     *
     * author SimonTuo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function homePage()
    {
        return view('index');
    }

    /**
     * iframe页面 主页
     *
     * author SimonTuo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clickAmount = Article::sum('read_count');
        $userAmount = User::count();
        $articleAmount = Article::count();
        $commentAmount = Comment::count();

        return view('home', [
            'data' => [
                'clickAmount' => $clickAmount,
                'userAmount' => $userAmount,
                'articleAmount' => $articleAmount,
                'commentAmount' => $commentAmount
            ]
        ]);
    }
}
