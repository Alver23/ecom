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
    return view('welcome');
});

Route::get('profiles', 'ProfileController@index');

Route::post('profiles', 'ProfileController@store');

Route::get('profiles/create', 'ProfileController@create');

Route::delete('profiles/{id}', 'ProfileController@destroy');

Route::get('profiles/{id}/edit', 'ProfileController@edit');

Route::put('profiles/{id}', 'ProfileController@update');

Route::resource('users', 'UserController');
