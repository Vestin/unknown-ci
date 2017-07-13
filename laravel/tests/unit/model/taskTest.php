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
}