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

Route::get('/post/data', ['uses'=>'PostController@getData','as'=>'postsData']);
Route::get('/post/data/{id}', ['uses'=>'PostController@getDataForSinglePost','as'=>'singlePostData']);


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('post','PostController');
Route::resource('comment','CommentController');
Route::resource('category','CategoryController');