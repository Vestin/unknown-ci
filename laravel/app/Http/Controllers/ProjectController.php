<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\View;
use TwigBridge\Facade\Twig;

class ProjectController extends Controller
{

    public function all()
    {
        $projects = Project::all();
        return View::make('projects',['projects'=>$projects]);
    }

    public function detail($id){
        $project = Project::find($id);
        return View::make('project',['project'=>$project]);
    }

}
