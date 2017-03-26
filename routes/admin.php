<?php

/*Admin routing*/
Route::group(['middleware' => 'auth','prefix' => 'admin'], function () {

    Route::get('/home',['as'=>'adminHome','uses'=>'Admin\HomeController@index']);

});

