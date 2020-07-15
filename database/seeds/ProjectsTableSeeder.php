<?php

use Illuminate\Database\Seeder;
use App\{User, Projects};

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::pluck('id')->toArray();

    	$projects = factory(Projects::class, 20)->make()->each(function($project) use($userIds) {
            $project->user_id = rand(1, count($userIds));
        })->toArray();

        Projects::insert($projects);
    }
}
