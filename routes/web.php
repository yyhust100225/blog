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
        Route::get('home', 'HomeController@index')->name('home');
    });

    /**
     * Route::get('/profile', function(Request $request){
     *    dd($request->user());
     * })->middleware('auth.basic');
    */
    
});
