<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', 'UserController@login')->name('login');
Route::get('adddamian', 'UserController@show')->name('show');  //   presentation only ~!

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => [
        'create', 'edit', 'destroy'  // We don't need those
    ]]);
});
