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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::resource('home','HomeController' );

Route::resource('Logs','LogsController' );
Route::resource('user','UserController' );
Route::resource('report','ReportController' );

// //middleware
 Route::get('/user','UserController@index' )->middleware('role:admin');

// Route::get('/user/{id}/edit', 'UserController@edit')->middleware('role:admin');

// Route::post('/user/{id}', 'UserController@update')->middleware('role:admin');