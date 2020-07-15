<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(UsersTableSeeder::class);

    	$this->call(ProjectsTableSeeder::class);

        DB::table('task_status')->insert([
            'title' => 'New'
        ]);

        DB::table('task_status')->insert([
            'title' => 'In progress'
        ]);

        DB::table('task_status')->insert([
            'title' => 'Done'
        ]);

        $this->call(TasksTableSeeder::class);
    }
}
