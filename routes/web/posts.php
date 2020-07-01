<?php


use Illuminate\Support\Facades\Route;
use App\Post;

Route::get('/post/{post}', 'PostController@show')->name('blog.post');

Route::middleware(['auth'])->group(function(){
    Route::get('/posts/view', 'PostController@index')->name('posts.index');
    Route::get('/posts.create', 'PostController@create')->name('posts.create');
    Route::post('/posts', 'PostController@store')->name('post.store');

    Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::delete('/posts/{post}/delete', 'PostController@delete')->name('post.delete');
    Route::put('posts/{post}/update', 'PostController@update')->name('post.update');
});
 