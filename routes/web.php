<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

// 后台路由
Route::namespace('Admin')->prefix('admin')->group(function(){
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login_submit', 'LoginController@loginSubmit')->name('login_submit');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::middleware('auth')->group(function(){
        // 后台主页
        Route::get('home', 'HomeController@index')->name('home');
        // 用户管理
        Route::get('users', 'UserController@users')->name('users');
        Route::get('users/data', 'UserController@usersData')->name('users_data');
        Route::get('user/create', 'UserController@create')->name('user_create');
        Route::post('user/upload/avatar', 'UserController@uploadAvatar')->name('user_upload_avatar');
        // Route::get('user/edit', 'UserController@edit')->name('user_edit');
    });
    /**
     * Route::get('/profile', function(Request $request){
     *    dd($request->user());
     * })->middleware('auth.basic');
    */
});
