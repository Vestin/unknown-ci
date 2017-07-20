<?php

namespace App;

use App\Events\TaskCreatedEvent;
use App\ViewModels\ViewModelTrait;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;

class Task extends Model
{
    use ViewModelTrait;

    CONST STATUS_INIT = 0;
    CONST STATUS_SEND_TO_QUEUE = 10;
    CONST STATUS_HANDING = 20;
    CONST STATUS_ERROR = -1;
    CONST STATUS_DONE = 100;

    /**
     * @var array status => status description
     */
    public $statusDes = [
        self::STATUS_INIT => 'waiting',
        self::STATUS_SEND_TO_QUEUE => 'queuing',
        self::STATUS_HANDING => 'handing',
        self::STATUS_ERROR => 'error',
        self::STATUS_DONE => 'finish'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->initViewModel();
    }

    protected $events = [
        'created' => TaskCreatedEvent::class
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function getLog()
    {
        try {
            return Storage::disk('task')->get($this->getLogPath());
        } catch (FileNotFoundException $exception) {
            return 'No Log';
        }

    }

    public function getLogPath()
    {
        return env('LOCAL_ROOT_PATH') . '/build/project_' . $this->project->id . '/task_' . $this->id . '.log';
    }

    public function getWorkSpace()
    {
        return env('LOCAL_ROOT_PATH') . '/build/project_' . $this->project->id . '/task_' . $this->id . '_workspace/';
    }

    /**
     * @return mixed config array
     */
    public function getConfig()
    {
        return Yaml::parse($this->yml);
    }
}
