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
        Route::get('user/list', 'UserController@list')->name('user.list');
        Route::get('user/data', 'UserController@data')->name('user.data');
        Route::get('user/create', 'UserController@create')->name('user.create');
        Route::post('user/upload/avatar', 'UserController@uploadAvatar')->name('user.upload.avatar');
        Route::post('user/create/submit', 'UserController@createSubmit')->name('user.create.submit');
        Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('user/edit/submit', 'UserController@editSubmit')->name('user.edit.submit');
        Route::get('user/password/{id}', 'UserController@password')->name('user.password');
        Route::post('user/password/reset', 'UserController@passwordReset')->name('user.password.reset');
        Route::post('user/status', 'UserController@status')->name('user.status');
        Route::post('user/delete', 'UserController@delete')->name('user.delete');

        // 角色管理
        Route::get('role/list', 'RoleController@list')->name('role.list');
        Route::get('role/data', 'RoleController@data')->name('role.data');
        Route::get('role/create', 'RoleController@create')->name('role.create');
        Route::post('role/create/submit', 'RoleController@createSubmit')->name('role.create.submit');
        Route::get('role/edit/{id?}', 'RoleController@edit')->name('role.edit');
        Route::post('role/edit/submit', 'RoleController@editSubmit')->name('role.edit.submit');
        Route::post('role/delete', 'RoleController@delete')->name('role.delete');

        // 权限管理
        Route::get('privilege/list', 'PrivilegeController@list')->name('privilege.list');
        Route::get('privilege/data', 'PrivilegeController@data')->name('privilege.data');
        Route::get('privilege/create', 'PrivilegeController@create')->name('privilege.create');
        Route::post('privilege/create/submit', 'PrivilegeController@createSubmit')->name('privilege.create.submit');
        Route::get('privilege/edit/{id?}', 'PrivilegeController@edit')->name('privilege.edit');
        Route::post('privilege/edit/submit', 'PrivilegeController@editSubmit')->name('privilege.edit.submit');
        Route::post('privilege/delete', 'PrivilegeController@delete')->name('privilege.delete');
    });
    /**
     * Route::get('/profile', function(Request $request){
     *    dd($request->user());
     * })->middleware('auth.basic');
    */
});
