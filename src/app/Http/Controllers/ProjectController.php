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

class ProjectController extends Controller
{

    public function all()
    {
        $projects = Project::all();

        SideMenu::build('projects');

        return View::make('project.list', ['projects' => $projects]);
    }

    public function detail($id)
    {
        $project = Project::find($id);

        SideMenu::build('project', $project);

        return View::make('project.detail', ['project' => $project]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            SideMenu::build('projects');
            return View::make('project.add');
        }

        $this->validate($request, [
            'name' => 'required|unique:projects|max:255',
            'owner' => 'required|min:1',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->owner = $request->owner;
        $project->yml = $request->yml;
        $project->active = Project::ACTIVE_ON;
        $project->save();
        $request->session()->flash('statusMessage', 'Task was successful!');

        return response()->redirectToRoute('project', [$project->id]);
    }

    public function edit(Request $request, $id)
    {
        $project = Project::find($id);
        if (!$project) {
            throw new NotFoundHttpException();
        }

        if ($request->isMethod('get')) {
            SideMenu::build('project', $project);
            return View::make('project.edit', ['project' => $project]);
        }

        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('projects')->ignore($project->id)
            ],
            'owner' => 'required|min:1',
        ]);

        $project->name = $request->name;
        $project->owner = $request->owner;
        $project->yml = $request->yml;
        $project->save();
        $request->session()->flash('statusMessage', 'Task was successful!');

        return response()->redirectToRoute('project', [$project->id]);
    }

    public function task($project_id, $task_id)
    {
        $task = Task::where(['project_id' => $project_id, 'id' => $task_id])->firstOrFail();
        return View::make('task', ['task' => $task]);
    }

}
