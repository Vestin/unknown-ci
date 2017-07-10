<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * get the tasks for the project.
     * return Task
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
