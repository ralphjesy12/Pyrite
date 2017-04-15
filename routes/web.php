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


Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/',function(){
        if(Auth::user()){
            return redirect()->intended('dashboard');
        }
        return redirect()->intended('login');
    });
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->intended('login');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
