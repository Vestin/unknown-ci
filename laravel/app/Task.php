<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Task extends Model
{
    CONST STATUS_INIT = 0;
    CONST STATUS_SEND_TO_QUEUE = 10;
    CONST STATUS_HANDING = 20;
    CONST STATUS_ERROR = -1;
    CONST STATUS_DONE = 100;

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function getLog()
    {
        //return storage_path('app/project_' . $this->project->id . '/task_' . $this->id . '.log');
        return Storage::get('project_'.$this->project->id.'/task_'.$this->id.'.log');
    }
}
