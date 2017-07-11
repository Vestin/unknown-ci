<?php

namespace App\Http\Controllers;

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
        return View::make('projects', ['projects' => $projects]);
    }

    public function detail($id)
    {
        $project = Project::find($id);
        dd(Session::get('status'));
        return View::make('project', ['project' => $project]);
    }

    public function add(Request $request)
    {
        if($request->isMethod('get')){
            return View::make('add-project');
        }

        $this->validate($request,[
            'name' => 'required|unique:projects|max:255',
            'owner' => 'required|min:1',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->owner = $request->owner;
        $project->yml = $request->yml;
        $project->save();
        $request->session()->flash('status','Task was successful!');

        return response()->redirectToRoute('project',[$project->id]);
    }

    public function edit(Request $request,$id)
    {
        $project = Project::find($id);
        if(!$project){
            throw new NotFoundHttpException();
        }

        if($request->isMethod('get')){
            return View::make('edit-project',['project'=>$project]);
        }

        $this->validate($request,[
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
        $request->session()->flash('status','Task was successful!');

        return response()->redirectToRoute('project',[$project->id]);
    }

}
