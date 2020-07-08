<?php
#################### Laravel Auth  ########################################
Auth::routes();
#################### only Register user ####################################
Route::group(['middleware'=>'auth'], function () {
    Route::get('/','Admin\BlogController@index');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('blog', 'Admin\BlogController');
});
