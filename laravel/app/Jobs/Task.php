<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Task as TaskModel;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Task implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $task;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(TaskModel $task)
    {
        $this->task = $task;
        $this->changeTaskStatus(TaskModel::STATUS_SEND_TO_QUEUE);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->changeTaskStatus(TaskModel::STATUS_HANDING);
        try {
            $log = new Logger('task');
            $log->pushHandler(new StreamHandler(storage_path('app/project_' . $this->task->project->id . '/task_' . $this->task->id . '.log'),
                Logger::INFO));
            $log->info('start handling');

            $log->info('end handling');
            $this->changeTaskStatus(TaskModel::STATUS_DONE);
        } catch (\Exception $e) {
            $this->changeTaskStatus(TaskModel::STATUS_ERROR);
            throw $e;
        }
    }

    /**
     * set task status in queue
     */
    private function changeTaskStatus($status)
    {
        $this->task->status = $status;
        if ($status == TaskModel::STATUS_HANDING) {
            $this->task->start_time = date('Y-m-d H:i:s');
        } elseif ($status == TaskModel::STATUS_DONE) {
            $this->task->end_time = date('Y-m-d H:i:s');
        }
        $this->task->save();
    }
}
