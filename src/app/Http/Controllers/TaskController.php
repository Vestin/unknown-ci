<?php

namespace App\Http\Controllers;

use App\Facades\SideMenu;
use App\Task;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TaskController extends Controller
{

    public function all()
    {
        $tasks = Task::all();

        SideMenu::build('projects');

        return View::make('task.list', ['tasks' => $tasks]);
    }

}
