<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Project::class, 5)->create()->each(function ($u) {
            $u->tasks()->save(factory(App\Task::class)->make());
            $u->tasks()->save(factory(App\Task::class)->make());
        });
    }
}
