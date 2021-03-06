<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoriesController')->except(['create', 'show'])->middleware('auth');

Route::resource('tasks', 'TasksController')->except(['create'])->middleware('auth');

Route::patch('tasks\{task}\complete', 'TaskStatusController@complete')->name('tasks.done')->middleware('auth');
