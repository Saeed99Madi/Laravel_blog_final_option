<?php
use Illuminate\Support\Facades\Route;




Route::get('/roles','App\Http\Controllers\RoleController@index')->name('roles.index');
Route::post('/roles/store','App\Http\Controllers\RoleController@store')->name('roles.store');
Route::delete('/roles/{role}/destroy','App\Http\Controllers\RoleController@destroy')->name('roles.delete');
Route::get('/roles/{role}/edit','App\Http\Controllers\RoleController@edit')->name('roles.edit');
Route::put('/roles/{role}/update','App\Http\Controllers\RoleController@update')->name('roles.update');


Route::put('/roles/{role}/attach', 'App\Http\Controllers\RoleController@attach')->name('role.permission.attach');
Route::put('/roles/{role}/detach', 'App\Http\Controllers\RoleController@detach')->name('role.permission.detach');






