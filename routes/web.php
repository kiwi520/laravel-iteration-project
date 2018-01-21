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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::prefix('Admin')->group(function () {
    Route::namespace('Admin')->group(function () {
        // Controllers Within The "App\Http\Controllers\Admin" Namespace
        Route::prefix('article')->group(function () {
            Route::get('/list','IndexController@index');  //文章列表
            Route::get('/create','IndexController@create');  //添加文章
            Route::get('/edit/{id}','IndexController@edit');  //编辑文章
            Route::post('/edit','IndexController@update');  //编辑文章
            Route::get('/del','IndexController@delete');  //删除文章
        });

    });
});



Route::prefix('front')->group(function () {
    Route::namespace('Front')->group(function () {
        // Controllers Within The "App\Http\Controllers\Admin" Namespace
        Route::prefix('index')->group(function () {
            Route::get('/list','IndexController@index');  //文章列表
            Route::get('/create','IndexController@create');  //添加文章
            Route::post('/store','IndexController@store');  //添加文章
            Route::get('/show/{article}','IndexController@show');  //文章详情
            Route::get('/edit/{article}','IndexController@edit');  //编辑文章
            Route::put('/update/{article}','IndexController@update');  //编辑文章
            Route::post('/upload','IndexController@upload');  //图片上传
            Route::get('/del/{article}','IndexController@delete');  //删除文章
        });

    });
});
