<?php

namespace App;

use App\Exceptions\DomainException;
use App\ViewModels\ViewModelTrait;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Yaml\Yaml;

class Project extends Model
{
    use ViewModelTrait;

    Const ACTIVE_ON = 1;
    Const ACTIVE_OFF = 0;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->initViewModel();
    }

    public function hooks()
    {
        return $this->belongsToMany('App\Hook');
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
        if (!$this->isActive()) {
            throw new DomainException('project is not active.');
        }
        $task = new Task();
        $task->status = Task::STATUS_INIT;
        $task->yml = $this->yml;
        $this->tasks()->save($task);
        return $task;
    }

    /**
     * is project in active status
     * @return bool
     */
    public function isActive()
    {
        return $this->active == self::ACTIVE_ON;
    }

    /**
     * @return mixed config array
     */
    public function getConfig()
    {
        return Yaml::parse($this->yml);
    }
}
