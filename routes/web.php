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


// Route::get('/', 'App\Http\Controllers\HomeController@home')->name('home');
Route::get('/', 'App\Http\Controllers\HomeController@home')->name('home')->middleware('auth');
Route::get('/welcome', 'App\Http\Controllers\HomeController@index')->name('welcome');
Route::get('/login', 'App\Http\Controllers\AuthController@index')->name('auth.index')->middleware('guest');
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');
Route::post('logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');


Route::prefix('users')->middleware('auth')->group(function (){
    Route::get('/', 'App\Http\Controllers\UserController@index')->name('users.index');
    Route::get('/create', 'App\Http\Controllers\UserController@create')->name('users.create');
    Route::post('/store', 'App\Http\Controllers\UserController@store')->name('users.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('users.edit');
    Route::patch('/update/{id}', 'App\Http\Controllers\UserController@update')->name('users.update');
    Route::patch('/changeStatus/{id}', 'App\Http\Controllers\UserController@changeStatus')->name('users.changeStatus');
    Route::get('/show/{id}', 'App\Http\Controllers\UserController@show')->name('users.show');
});

Route::prefix('students')->middleware('auth')->group(function (){
    Route::get('/', 'App\Http\Controllers\StudentController@index')->name('students.index');
    Route::get('/create', 'App\Http\Controllers\StudentController@create')->name('students.create');
    Route::post('/store', 'App\Http\Controllers\StudentController@store')->name('students.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\StudentController@edit')->name('students.edit');
    Route::patch('/update/{id}', 'App\Http\Controllers\StudentController@update')->name('students.update');
    Route::patch('/changeStatus/{id}', 'App\Http\Controllers\StudentController@changeStatus')->name('students.changeStatus');
    Route::get('/show/{id}', 'App\Http\Controllers\StudentController@show')->name('students.show');
});

Route::prefix('skills')->middleware('auth')->group(function (){
    Route::get('/', 'App\Http\Controllers\SkillController@index')->name('skills.index');
    Route::get('/create', 'App\Http\Controllers\SkillController@create')->name('skills.create');
    Route::post('/store', 'App\Http\Controllers\SkillController@store')->name('skills.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\SkillController@edit')->name('skills.edit');
    Route::patch('/update/{id}', 'App\Http\Controllers\SkillController@update')->name('skills.update');
    Route::patch('/changeStatus/{id}', 'App\Http\Controllers\SkillController@changeStatus')->name('skills.changeStatus');
    Route::get('/show/{id}', 'App\Http\Controllers\SkillController@show')->name('skills.show');
});

Route::prefix('reinforcements')->middleware('auth')->group(function (){
    Route::get('/', 'App\Http\Controllers\ReinforcementController@index')->name('reinforcements.index');
    Route::get('/create', 'App\Http\Controllers\ReinforcementController@create')->name('reinforcements.create');
    Route::post('/store', 'App\Http\Controllers\ReinforcementController@store')->name('reinforcements.store');
    Route::get('/edit/{id}', 'App\Http\Controllers\ReinforcementController@edit')->name('reinforcements.edit');
    Route::patch('/update/{id}', 'App\Http\Controllers\ReinforcementController@update')->name('reinforcements.update');
    Route::patch('/changeStatus/{id}', 'App\Http\Controllers\ReinforcementController@changeStatus')->name('reinforcements.changeStatus');
    Route::get('/show/{id}', 'App\Http\Controllers\ReinforcementController@show')->name('reinforcements.show');
});

Route::prefix('skill_qual_stud')->middleware('auth')->group(function (){
    Route::get('/', 'App\Http\Controllers\Skill_Qual_StudController@index')->name('skill_qual_stud.index');
    Route::patch('/', 'App\Http\Controllers\Skill_Qual_StudController@update')->name('skill_qual_stud.update');
});


