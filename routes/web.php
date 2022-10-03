<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::prefix('users')->group(function (){
    Route::get('/', 'App\Http\Controllers\UserController@index')->name('users.index');
    Route::get('/create', 'App\Http\Controllers\UsuariosController@create')->name('users.crreate');
    Route::post('/store', 'App\Http\Controllers\UsuariosController@store')->name('users.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\UsuariosController@edit')->name('users.edit');
    Route::patch('/update/{id}', 'App\Http\Controllers\UsuariosController@update')->name('users.update');
    Route::get('/show/{id}', 'App\Http\Controllers\UsuariosController@show')->name('users.dhow');
    Route::delete('/delete/{id}', 'App\Http\Controllers\UsuariosController@destroy')->name('users.delete');
});
