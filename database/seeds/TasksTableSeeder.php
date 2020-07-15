<?php

use Illuminate\Database\Seeder;
use App\{Tasks, Projects};

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projectIds = Projects::pluck('id')->toArray();

        $tasks = factory(App\Tasks::class, 50)->make()->each(function($task) use($projectIds) {
            $task->project_id = rand(1, count($projectIds));
            $task->status_id = rand(1, 3);
        })->toArray();

        Tasks::insert($tasks);
    }
}
