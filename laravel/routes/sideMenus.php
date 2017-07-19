<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/18/17
 * Time: 2:16 PM
 */

use App\Facades\SideMenu;

SideMenu::register('projects', function ($sideMenu) {
    $sideMenu->push('Project List', route('projects'));
    $sideMenu->push('Add Project', route('project.add'));
});

SideMenu::register('project', function ($sideMenu, \App\Project $project) {
    $sideMenu->push('Project List', route('projects'));
    $sideMenu->push('Project Info', route('project', [$project->id]));
    $sideMenu->push('Edit Project', route('project.edit', [$project->id]));
    $sideMenu->push('Manual Build', route('pre-build', [$project->id]));
});

SideMenu::register('unknown-hooks', function ($sideMenu) {
    $sideMenu->push('Unknown Hooks List', route('unknown.hooks'));
    $sideMenu->push('Flush All', route('unknown.hooks.pre-clear'));
});

SideMenu::register('hooks', function ($sideMenu) {
    $sideMenu->push('Hooks',route('hooks'));
    $sideMenu->push('Unknown Hooks', route('unknown.hooks'));
});

SideMenu::register('hook', function ($sideMenu, \App\Hook $hook) {
    $sideMenu->push('Hooks',route('hooks'));
    $sideMenu->push('Hook Info', route('hook.detail', [$hook->id]));
    $sideMenu->push('Edit Hook', route('hook.edit', [$hook->id]));
    $sideMenu->push('Delete', route('hook.delete', [$hook->id]));
});