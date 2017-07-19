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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Rutas para el modulo de permisos
 */
Route::get('permissions/list', [
    'uses' => 'PermissionController@list',
]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('permisos', 'PermissionController');
});
