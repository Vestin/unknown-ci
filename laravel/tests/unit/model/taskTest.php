<?php

namespace model;


use App\Project;
use App\Task;

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
    public function testRelationToProject()
    {
        $projects = factory(Project::class, 5)->create()->each(function ($u) {
            $u->tasks()->save(factory(Task::class)->make());
        });

        foreach ($projects as $project) {
            foreach ($project->tasks as $task) {
                $this->assertEquals($project->id, $task->project->id);
            }
        }
    }

    public function testGetLog()
    {
        $project = factory(Project::class)->create();
        $task = $project->createTask();
        $log = $task->getLog();
        //$this->tester->assertEquals('No Log',$log);
    }

    public function testTaskYaml()
    {
        $project = factory(Project::class)->create();
        $project->yml = <<<AAA
script: 
    - mkdir tmp
    - cd tmp && echo 1>file
AAA;
        $project->save();
        $task = $project->createTask();
        $config = $task->getConfig();
        $this->tester->assertCount(2, $config['script']);
    }

    public function testTaskViewModel()
    {
        $project = factory(Project::class)->create();
        $project->yml = <<<AAA
script: 
    - mkdir tmp
    - cd tmp && echo 1>file
AAA;
        $project->save();
        $task = $project->createTask();
        $this->tester->assertEquals($task->id,$task->viewModel->id);
        $this->tester->assertEquals($task->yml,$task->viewModel->yml);
    }
}