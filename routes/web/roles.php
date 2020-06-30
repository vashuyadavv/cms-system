<?php

use Illuminate\Support\Facades\Route;


Route::get('/roles', 'RoleController@index')->name('roles.index');

Route::post('/roles', 'RoleController@store')->name('roles.store');

Route::delete('/roles/{role}/destroy', 'RoleController@destroy')->name('roles.destroy');

Route::get('/roles/{role}/edit', 'RoleController@show')->name('roles.edit');

Route::put('/roles/{role}/update', 'RoleController@update')->name('roles.update');