<?php

namespace App;

use App\ViewModels\ViewModelTrait;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Yaml\Yaml;

class Project extends Model
{
    use ViewModelTrait;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->initViewModel();
    }

    /**
     * get the tasks for the project.
     * return Task
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    /**
     * create task
     * @return Task
     */
    public function createTask()
    {
        $task = new Task();
        $task->status = Task::STATUS_INIT;
        $task->yml = $this->yml;
        $this->tasks()->save($task);
        return $task;
    }

    /**
     * @return mixed config array
     */
    public function getConfig()
    {
        return Yaml::parse($this->yml);
    }
}
