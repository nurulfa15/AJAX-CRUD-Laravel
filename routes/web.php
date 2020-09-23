<?php

use Illuminate\Support\Facades\Route;

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
//
Route::get('/', function () {
    return view('layouts._action');
});
Route::get('/table/user', 'UserController@dataTable')->name('table.user');
Route::get('/user', 'UserController@index')->name('user.index');
Route::post('/user', 'UserController@store')->name('user.store');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::get('/user/{user}', 'UserController@show')->name('user.show');
Route::put('/user/{user}', 'UserController@update')->name('user.update');
Route::delete('/user/{user}', 'UserController@destroy')->name('user.destroy');
Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
