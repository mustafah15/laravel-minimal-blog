<?php

/*Admin routing*/
Route::group(['middleware' => 'auth','prefix' => 'admin'], function () {

    Route::get('/home', ['as'=>'adminHome', 'uses'=>'Admin\HomeController@index']);

    /*mange posts*/

    Route::get('/post', ['as'=>'managePosts', 'uses'=>'Admin\PostController@index']);

    Route::get('/post/create/', ['as'=>'newPost', 'uses'=>'Admin\PostController@create']);
    Route::post('/post/create/', ['as'=>'storePost', 'uses'=>'Admin\PostController@store']);

    Route::get('/post/edit/{id}', ['as'=>'editPost', 'uses'=>'Admin\PostController@edit']);
    Route::post('/post/edit/{id}', ['as'=>'updatePost', 'uses'=>'Admin\PostController@update']);

    Route::get('/post/{id}/delete', ['as'=>'deletePost', 'uses'=>'Admin\PostController@destroy']);


    /*manage categories */

    Route::get('/category', ['as'=>'manageCategories', 'uses'=>'Admin\CategoryController@index']);

    Route::get('/category/create', ['as'=>'newCategory', 'uses'=>'Admin\CategoryController@create']);
    Route::post('/category/create/', ['as'=>'storeCategory', 'uses'=>'Admin\CategoryController@store']);

    Route::get('/category/edit/{id}', ['as'=>'editCategory', 'uses'=>'Admin\CategoryController@edit']);
    Route::post('/category/edit/{id}', ['as'=>'updateCategory', 'uses'=>'Admin\CategoryController@update']);

    Route::get('/category/{id}/delete', ['as'=>'deleteCategory', 'uses'=>'Admin\CategoryController@destroy']);

});

