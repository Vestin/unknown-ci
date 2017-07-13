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
use Symfony\Component\Process\Process;

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
            $log->pushHandler(new StreamHandler(storage_path($this->task->getLogPath()),
                Logger::INFO));
            $log->info('start handling');

            $commands = $this->task->project->getConfig()['script'];
            $cwd = storage_path($this->task->getWorkSpace());
            $this->initWorkSpace($cwd);

            foreach ($commands as $command) {
                $log->info('Process command: ' . $command);
                $process = new Process($command, $cwd);
                $process->setTimeout(3600);
                $log->info('Process working dir: ' . $process->getWorkingDirectory());
                $process->run();
                if ($process->isSuccessful()) {
                    $log->info($process->getOutput());
                    continue;
                } else {
                    $log->info($process->getOutput());
                    $log->info($process->getErrorOutput());
                    throw new \Exception('process error [END]');
                }
            }

            $log->info('end handling');
            $this->changeTaskStatus(TaskModel::STATUS_DONE);
        } catch (\Exception $e) {
            $log->info($e->getMessage());
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

    private function initWorkSpace($cwd)
    {
        $this->removeDir($cwd);
        mkdir($cwd, '0777', true);
    }

    private function removeDir($cwd)
    {
        if(!file_exists($cwd)){
            return ;
        }
        $files = scandir($cwd);
        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $fullPath = $cwd . "/" . $file;
            if (is_dir($fullPath)) {
                $this->removeDir($fullPath);
                continue;
            }
            unlink($fullPath);
        }

        rmdir($cwd);
    }
}
