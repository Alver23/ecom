<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 19/08/17
 * Time: 09:30 AM
 */


Route::get('permisos/lista', 'PermissionController@list');

Route::resource('permisos', 'PermissionController');

/**
 * Routes for menus
 */
Route::get('menus/lista', 'MenuController@lista');

Route::resource('menus', 'MenuController');

/**
 * rutas para roles
 */
Route::get('roles/lista', 'RoleController@list');

Route::resource('roles', 'RoleController');