<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/post/{post}', 'App\Http\Controllers\PostController@show')->name('post');
Route::get('/posts/create', 'App\Http\Controllers\PostController@create')->name('post.create');
Route::post('/posts', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/posts/index', 'App\Http\Controllers\PostController@index')->name('post.index');
Route::delete('/posts/{post}/delete', 'App\Http\Controllers\PostController@destroy')->name('post.destroy');
Route::get('/posts/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');
Route::patch('/posts/{post}/update', 'App\Http\Controllers\PostController@update')->name('post.update');
