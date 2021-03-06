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

Route::middleware(['active-user','verified'])->group(function () {

    Route::get('/', function () {
        return redirect()->route('tasks');
    });

    Route::get('oauth-login', 'OAuthController@login')->name('OAuth.login');

//show projects
    Route::get('projects', 'ProjectController@all')
        ->name('projects');
//project detail page
    Route::get('project/{id}', 'ProjectController@detail')
        ->name('project');

//add project page
    Route::match(['get', 'post'], 'project', 'ProjectController@add')
        ->name('project.add');
//updatde project page
    Route::match(['get', 'post'], 'project/edit/{id}', 'ProjectController@edit')
        ->name('project.edit');

//build
//building status ,create build task & view task
//Route::post('project/{id}/build-view','BuildController@buildAndView')->name('build-and-view');
//Route::get('project/{id}/pre-build','BuildController@preBuild')->name('pre-build');
    Route::get('project/{id}/pre-build', 'BuildController@pre')
        ->name('pre-build');
    Route::post('project/{id}/build', 'BuildController@build')
        ->name('build');

    Route::get('task/{task_id}', function ($task_id) {
        $task = \App\Task::findOrFail($task_id);
        return response()->redirectToRoute('project-task', [$task->project_id, $task_id]);
    })->name('task');
    Route::get('tasks', 'TaskController@all')->name('tasks');

    Route::get('project/{project_id}/task/{task_id}', 'ProjectController@task')
        ->name('project-task');

//hooks
    Route::get('hooks', 'HookController@all')
        ->name('hooks');
    Route::get('hook/create/{unknown_hook_id}', 'HookController@createPage')
        ->name('hook.create-page');
    Route::post('hook/create', 'HookController@create')
        ->name('hook.create');

    Route::any('hook', 'HookController@detector')
        ->name('hook');
    Route::get('hook/id/{hook_id}', 'HookController@detail')
        ->name('hook.detail');
    Route::match(['get', 'post'], 'hook/{hook_id}/edit', 'HookController@edit')
        ->name('hook.edit');
    Route::get('hook/delete-page/{hook_id}', 'HookController@deletePage')
        ->name('hook.delete-page');
    Route::delete('hook/delete/{hook_id}', 'HookController@delete')
        ->name('hook.delete');
    Route::put('hook/active/{hook_id}', 'HookController@active')
        ->name('hook.active');
    Route::put('hook/de-active/{hook_id}', 'HookController@deActive')
        ->name('hook.de-active');
    Route::get('project/{id}/hook', 'HookController@project')
        ->name('project-hook');

    Route::get('hook/unknowns', 'UnknownHookController@all')
        ->name('unknown.hooks');
    Route::get('hook/unknowns/pre-clear', 'UnknownHookController@preClear')
        ->name('unknown.hooks.pre-clear');
    Route::delete('hook/unknowns', 'UnknownHookController@clear')
        ->name('unknown.hooks.clear');
    Route::get('hook/unknown/{id}', 'UnknownHookController@detail')
        ->name('unknown.hook.detail');

    Route::get('users', 'UserController@all')->name('users');
    Route::put('user/active/{user_id}', 'UserController@active')->name('user.active');
    Route::put('user/de-active/{user_id}', 'UserController@deActive')->name('user.de-active');
    Route::put('user/active-super-admin/{user_id}', 'UserController@activeSuperAdmin')->name('user.active-super-admin');
    Route::put('user/de-active-super-admin/{user_id}', 'UserController@deActiveSuperAdmin')->name('user.de-active-super-admin');

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');
});
if (config('auth.login_enable')) {
    Auth::routes();
} else {
    Route::get('login', function () {
        return response()->redirectTo(config('auth.login_url'));
    })->name('login');

    Route::redirect('email/verify',config('auth.login_url'))->name('verification.notice');
    Route::redirect('email/verify/{id}', config('auth.login_url'))->name('verification.verify');
    Route::redirect('email/resend', config('auth.login_url'))->name('verification.resend');
}

