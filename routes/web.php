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
        Route::post('user/create/submit', 'UserController@createSubmit')->name('user_create_submit');
        Route::get('user/edit/{id}', 'UserController@edit')->name('user_edit');
        Route::post('user/edit/submit', 'UserController@editSubmit')->name('user_edit_submit');
        Route::get('user/password/{id}', 'UserController@password')->name('user_password');
        Route::post('user/password/reset', 'UserController@passwordReset')->name('user_password_reset');
        Route::post('user/status', 'UserController@status')->name('user_status');
        Route::post('user/delete', 'UserController@delete')->name('user_delete');

        // 角色管理
        Route::get('role/list', 'RoleController@list')->name('role.list');
        Route::get('role/data', 'RoleController@data')->name('role.data');
        Route::get('role/create', 'RoleController@create')->name('role.create');
        Route::post('role/create/submit', 'RoleController@createSubmit')->name('role.create.submit');
        Route::get('role/edit/{id?}', 'RoleController@edit')->name('role.edit');
        Route::post('role/edit/submit', 'RoleController@editSubmit')->name('role.edit.submit');
        Route::post('role/delete', 'RoleController@delete')->name('role.delete');
    });
    /**
     * Route::get('/profile', function(Request $request){
     *    dd($request->user());
     * })->middleware('auth.basic');
    */
});
