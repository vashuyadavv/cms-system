<?php

use Illuminate\Support\Facades\Route;



Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');    
Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');
     
Route::middleware(['role:ADMIN', 'auth'])->group(function(){
    Route::get('/users', 'UserController@index')->name('users.index');
});

Route::middleware('auth')->group(function(){
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});