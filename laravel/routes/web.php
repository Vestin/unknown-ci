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
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    //return view::make('hello');
    return view('welcome');
});

//show projects
Route::get('projects','ProjectController@all')->name('projects');
//project detail page
Route::get('project/{id}','ProjectController@detail')->name('project');
//add project page
Route::match(['get','post'],'project','ProjectController@add')->name('add-project');
//updatde project page
Route::match(['get','post'],'project/edit/{id}','ProjectController@edit')->name('edit-project');