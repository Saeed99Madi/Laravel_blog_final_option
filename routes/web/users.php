<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/users/{user}/profile', 'App\Http\Controllers\UserController@show')->name('user.profile.show');
Route::put('/users/{user}/update', 'App\Http\Controllers\UserController@update')->name('user.profile.update');
Route::delete('/users/{user}/delete', 'App\Http\Controllers\UserController@destroy')->name('users.destroy');
Route::middleware('role:Admin')->group(function () {
    Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users.index');
});
Route::put('/users/{user}/attach', 'App\Http\Controllers\UserController@attach')->name('user.role.attach');
Route::put('/users/{user}/detach', 'App\Http\Controllers\UserController@detach')->name('user.role.detach');
