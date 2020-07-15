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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('projects', 'ProjectController'); 

Route::get('projects/{id}/new', 'ProjectController@new');
Route::get('projects/{id}/in_progress', 'ProjectController@in_progress');
Route::get('projects/{id}/done', 'ProjectController@done');

Route::resource('tasks', 'TaskController'); 

Route::get('taskcreate/{id}', 'TaskController@create');

Route::get('download/{id}', 'TaskController@download');