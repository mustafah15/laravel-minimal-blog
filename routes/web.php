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
/*post routes*/
Route::get('/post/data', ['uses'=>'PostController@getData','as'=>'postsData']);
Route::get('/post/data/{id}', ['uses'=>'PostController@getDataForSinglePost','as'=>'singlePostData']);

/*categories routes*/
Route::get('category/data', ['uses'=>'CategoryController@getData','as'=>'CategoriesData']);
Route::get('category/data/{id}', ['uses'=>'CategoryController@getDataForSingleCategory','as'=>'singleCategoryData']);




Auth::routes();

Route::get('/', ['uses'=>'PostController@index','as'=>'home']);

Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');
Route::resource('category', 'CategoryController');
