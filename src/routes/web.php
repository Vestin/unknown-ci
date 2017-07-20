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
Route::get('projects', 'ProjectController@all')
    ->name('projects')
    ->middleware('basicAuth');
//project detail page
Route::get('project/{id}', 'ProjectController@detail')
    ->name('project')
    ->middleware('basicAuth');

//add project page
Route::match(['get', 'post'], 'project', 'ProjectController@add')
    ->name('project.add')
    ->middleware('basicAuth');
//updatde project page
Route::match(['get', 'post'], 'project/edit/{id}', 'ProjectController@edit')
    ->name('project.edit')
    ->middleware('basicAuth');

//build
//building status ,create build task & view task
//Route::post('project/{id}/build-view','BuildController@buildAndView')->name('build-and-view');
//Route::get('project/{id}/pre-build','BuildController@preBuild')->name('pre-build');
Route::get('project/{id}/pre-build', 'BuildController@pre')
    ->name('pre-build')
    ->middleware('basicAuth');
Route::post('project/{id}/build', 'BuildController@build')
    ->name('build')
    ->middleware('basicAuth');

Route::get('task/{task_id}', function ($task_id) {
    $task = \App\Task::findOrFail($task_id);
    return response()->redirectToRoute('project-task', [$task->project_id, $task_id]);
})->name('task')->middleware('basicAuth');

Route::get('project/{project_id}/task/{task_id}', 'ProjectController@task')
    ->name('project-task')
    ->middleware('basicAuth');

//hooks
Route::get('hooks', 'HookController@all')
    ->name('hooks')
    ->middleware('basicAuth');
Route::get('hook/create/{unknown_hook_id}', 'HookController@createPage')
    ->name('hook.create-page')
    ->middleware('basicAuth');
Route::post('hook/create', 'HookController@create')
    ->name('hook.create')
    ->middleware('basicAuth');

Route::any('hook', 'HookController@detector')
    ->name('hook');
Route::get('hook/id/{hook_id}', 'HookController@detail')
    ->name('hook.detail')
    ->middleware('basicAuth');
Route::match(['get', 'post'], 'hook/{hook_id}/edit', 'HookController@edit')
    ->name('hook.edit')
    ->middleware('basicAuth');
Route::get('hook/delete-page/{hook_id}','HookController@deletePage')
    ->name('hook.delete-page')
    ->middleware('basicAuth');
Route::delete('hook/delete/{hook_id}','HookController@delete')
    ->name('hook.delete')
    ->middleware('basicAuth');
Route::put('hook/active/{hook_id}','HookController@active')
    ->name('hook.active')
    ->middleware('basicAuth');
Route::put('hook/de-active/{hook_id}','HookController@deActive')
    ->name('hook.de-active')
    ->middleware('basicAuth');
Route::get('project/{id}/hook', 'HookController@project')
    ->name('project-hook')
    ->middleware('basicAuth');


Route::get('hook/unknowns', 'UnknownHookController@all')
    ->name('unknown.hooks')
    ->middleware('basicAuth');
Route::get('hook/unknowns/pre-clear', 'UnknownHookController@preClear')
    ->name('unknown.hooks.pre-clear')
    ->middleware('basicAuth');
Route::delete('hook/unknowns', 'UnknownHookController@clear')
    ->name('unknown.hooks.clear')
    ->middleware('basicAuth');
Route::get('hook/unknown/{id}', 'UnknownHookController@detail')
    ->name('unknown.hook.detail')
    ->middleware('basicAuth');