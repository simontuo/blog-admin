<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@homePage')->name('home.page')->middleware('verified');

Route::group(['middleware' => []], function () {
    Route::get('/home', 'HomeController@index')->name('home.index');
    // 会员管理
    Route::get('/members', 'MemberController@index')->name('members.index');
    Route::get('/members/page_search', 'MemberController@pageSearch')->name('members.page_search');
    // 标签管理
    Route::resource('tags', 'TagController')->except(['show']);
    Route::get('/tags/page_search', 'TagController@pageSearch')->name('tags.page_search');
    // 标签管理
    Route::get('/resources/page_search', 'ResourceController@pageSearch')->name('resources.page_search');
    Route::resource('resources', 'ResourceController')->except(['show']);
    // 文章管理
    Route::get('/articles/page_search', 'ArticleController@pageSearch')->name('articles.page_search');
    Route::resource('articles', 'ArticleController');
    // 评论管理
    Route::get('/comments/page_search', 'CommentController@pageSearch')->name('comments.page_search');
    Route::resource('comments', 'CommentController')->except(['create', 'store']);
    // 系统管理
    // 管理员
    Route::get('/users/page_search', 'UserController@pageSearch')->name('users.page_search');
    Route::get('/users', 'UserController@index')->name('users.index');
    // 角色管理
    Route::get('/roles/page_search', 'RoleController@pageSearch')->name('roles.page_search');
    Route::resource('roles', 'RoleController');
    // 权限管理
    Route::get('/permissions/page_search', 'PermissionController@pageSearch')->name('permissions.page_search');
    Route::resource('permissions', 'PermissionController');
});




