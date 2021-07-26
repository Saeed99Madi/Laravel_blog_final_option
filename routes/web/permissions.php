<?php
use Illuminate\Support\Facades\Route;




Route::get('/permissions','App\Http\Controllers\PermissionController@index')->name('permissions.index');
Route::post('/permissions/store','App\Http\Controllers\PermissionController@store')->name('permissions.store');
Route::delete('/permissions/{permission}/destroy','App\Http\Controllers\PermissionController@destroy')->name('permissions.delete');
Route::get('/permissions/{permission}/edit','App\Http\Controllers\PermissionController@edit')->name('permissions.edit');
Route::put('/permissions/{permission}/update','App\Http\Controllers\PermissionController@update')->name('permissions.update');


