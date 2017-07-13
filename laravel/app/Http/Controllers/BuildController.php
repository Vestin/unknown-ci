<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\Jobs\Task as TaskJob;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BuildController extends Controller
{

    /**
     * @param int $id project id
     * make task && push task into queue
     */
    public function build($id)
    {
        $project = Project::find($id);
        if (!$project) {
            throw new NotFoundHttpException();
        }

        $task = $project->createTask();
        $job = (new TaskJob($task))->onQueue('task');
        dispatch($job);

        return response()->redirectToRoute('task', [$task->id]);
    }

}
