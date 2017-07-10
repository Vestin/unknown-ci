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

use Illuminate\Support\Facades\View;

Route::get('/', function () {
    //return view::make('hello');
    return view('welcome');
});

Route::get('projects','ProjectController@all')->name('projects');
Route::get('project/{id}','ProjectController@detail')->name('project');
