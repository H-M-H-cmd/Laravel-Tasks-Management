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

use Illuminate\Support\Facades\Route;
Route::get('/', function() {
    return view('welcome');
});


Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::post('/projects/create', 'ProjectsController@store');
Route::get('/projects/{project}/delete', 'ProjectsController@destroy');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create');
Route::post('/tasks/create', 'TasksController@store');
Route::post('/tasks/filter', 'TasksController@filter');
Route::get('/tasks/{task}/edit', 'TasksController@edit');
Route::post('/tasks/{task}', 'TasksController@update');
Route::get('/tasks/{task}/delete', 'TasksController@destroy');
