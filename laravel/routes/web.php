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
    return redirect()->route('projects');
});

//show projects
Route::get('projects','ProjectController@all')->name('projects');
//project detail page
Route::get('project/{id}','ProjectController@detail')->name('project');
//add project page
Route::match(['get','post'],'project','ProjectController@add')->name('add-project');
//updatde project page
Route::match(['get','post'],'project/edit/{id}','ProjectController@edit')->name('edit-project');

//build
//building status ,create build task & view task
//Route::post('project/{id}/build-view','BuildController@buildAndView')->name('build-and-view');
//Route::get('project/{id}/pre-build','BuildController@preBuild')->name('pre-build');
Route::post('project/{id}/build','BuildController@build')->name('build');

Route::get('task/{task_id}',function($task_id){
     $task = \App\Task::findOrFail($task_id);
     return response()->redirectToRoute('project-task',[$task->project_id,$task_id]);
})->name('task');
Route::get('project/{project_id}/task/{task_id}','ProjectController@task')->name('project-task');

//hooks
Route::get('hooks','HookController@all')->name('hooks');
Route::get('project/{id}/hook','HookController@project')->name('project-hook');
Route::any('hook','HookController@detector')->name('hook');
Route::get('hook/unknowns','UnknownHookController@all')->name('unknown.hooks');