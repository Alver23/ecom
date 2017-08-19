<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 19/08/17
 * Time: 09:30 AM
 */


Route::get('permisos/lista', 'PermissionController@list');

Route::resource('permisos', 'PermissionController');