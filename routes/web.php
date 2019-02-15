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


Auth::routes();
Route::get('/', 'HomeController@homePage')->name('home.page');
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/members', 'MemberController@index')->name('members.index');
Route::get('/members/page_search', 'MemberController@pageSearch')->name('members.page_search');
Route::get('/articles', 'ArticleController@index')->name('articles.index');
Route::get('/articles/page_search', 'ArticleController@pageSearch')->name('articles.page_search');
Route::get('/articles/create', 'ArticleController@create')->name('articles.create');
Route::post('/articles/store', 'ArticleController@store')->name('articles.store');
Route::get('/comments', 'CommentController@index')->name('comments.index');
Route::get('/comments/page_search', 'CommentController@pageSearch')->name('comments.page_search');
Route::get('/tags', 'TagController@index')->name('comments.tags');
Route::get('/tags/page_search', 'TagController@pageSearch')->name('tags.page_search');


