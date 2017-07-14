<?php

namespace model;


use App\Project;
use App\Task;
use Symfony\Component\Yaml\Yaml;

class projectTest extends \Codeception\Test\Unit
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
    public function testRelationToTask()
    {
        $projects = factory(Project::class, 5)->create()->each(function ($u) {
            $u->tasks()->save(factory(Task::class)->make());
            $u->tasks()->save(factory(Task::class)->make());
        });

        foreach ($projects as $project) {
            $this->tester->assertCount(2, $project->tasks);
        }
    }

    public function testCreateTask()
    {
        $project = factory(Project::class)->create();
        $task = $project->createTask();
        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals($task->project_id, $project->id);
    }

    public function testYmlFileRead()
    {
        $project = factory(Project::class)->create();
        $project->yml = <<<AAA
script: 
    - mkdir tmp
    - cd tmp && echo 1>file
AAA;
        $project->save();
        $config = $project->getConfig();
        $this->tester->assertCount(2, $config['script']);
    }

    public function testProjectViewModel()
    {
        $project = factory(Project::class)->create();
        $project->yml = <<<AAA
script: 
    - mkdir tmp
    - cd tmp && echo 1>file
AAA;
        $project->save();
        $this->tester->assertEquals($project->id, $project->viewModel->id);
        $this->tester->assertEquals($project->name,$project->viewModel->name);
    }
}