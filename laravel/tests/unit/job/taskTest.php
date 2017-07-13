<?php

namespace job;


use App\Jobs\Task;
use App\Project;

class taskTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testHandleTask()
    {
        $project = new Project();
        $project->name = 'test_1';
        $project->yml = <<<AAA
script:
    - mkdir tmp
    - cd tmp && echo "hello world" > myfile
AAA;
        $project->owner = '1';
        $project->saveOrFail();

        $taskModel = $project->createTask();
        $jobTask = new Task($taskModel);
        $this->assertEquals(\App\Task::STATUS_SEND_TO_QUEUE, \App\Task::find($taskModel->id)->status);
        $jobTask->handle();

        $this->assertEquals(\App\Task::STATUS_DONE, \App\Task::find($taskModel->id)->status);
    }

    /**
     * @expectedException \Exception
     */
    public function testHandleTaskError()
    {
        $project = new Project();
        $project->name = 'test_1';
        $project->yml = <<<AAA
mkdir tmp
cd tmp && echoTypeError "hello world" > myfile
AAA;
        $project->owner = '1';
        $project->saveOrFail();

        $taskModel = $project->createTask();
        $jobTask = new Task($taskModel);
        $this->assertEquals(\App\Task::STATUS_SEND_TO_QUEUE, \App\Task::find($taskModel->id)->status);
        $jobTask->handle();
    }
}