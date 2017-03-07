<?php

use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tasks')->insert([
  		      'description' => 'set up working devoplment enviroment',
            'task_name' => 'Devoplment enviroment',
            'student_id' => 30001,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 1
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'set up working test enviroment',
            'task_name' => 'Testing enviroment',
            'student_id' => 30002,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 1
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Begin basic SRS',
            'task_name' => 'SRS',
            'student_id' => 30003,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 1
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Design database schema',
            'task_name' => 'Database',
            'student_id' => 30004,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 1
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'set up working devoplment enviroment',
            'task_name' => 'Devoplment enviroment',
            'student_id' => 30005,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 2
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'set up working test enviroment',
            'task_name' => 'Testing enviroment',
            'student_id' => 30006,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 2
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Begin basic SRS',
            'task_name' => 'SRS',
            'student_id' => 30007,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 2
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Work on SRS',
            'task_name' => 'SRS',
            'student_id' => 30001,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 1
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Get database online',
            'task_name' => 'Database',
            'student_id' => 30002,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 1
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'help get database online and working',
            'task_name' => 'Database',
            'student_id' => 30003,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 1
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Work on getting SRS done',
            'task_name' => 'SRS',
            'student_id' => 30004,
            'sprint_started' => 1,
            'status' => 'Continuing',
            'group_id' => 1
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Implement working database schema',
            'task_name' => 'Database',
            'student_id' => 4,
            'sprint_started' => 1,
            'status' => 'new',
            'group_id' => 4
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Software requirements and specifications',
            'task_name' => 'SRS',
            'student_id' => 4,
            'sprint_started' => 1,
            'status' => 'continuing',
            'group_id' => 4
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Find a good web hosting service',
            'task_name' => 'Web Host',
            'student_id' => 4,
            'sprint_started' => 2,
            'status' => 'abandoned',
            'group_id' => 4
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Create Web API For database interactions',
            'task_name' => 'Web API',
            'student_id' => 9,
            'sprint_started' => 1,
            'status' => 'continuing',
            'group_id' => 4
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'create basic homepage for project',
            'task_name' => 'Web homepage',
            'student_id' => 9,
            'sprint_started' => 2,
            'status' => 'continuing',
            'group_id' => 4
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Write Web API for database',
            'task_name' => 'Web API',
            'student_id' => 11,
            'sprint_started' => 1,
            'status' => 'continuing',
            'group_id' => 4
        ]);
  		DB::table('tasks')->insert([
  		      'description' => 'Create the Web',
            'task_name' => 'Web',
            'student_id' => 11,
            'sprint_started' => 2,
            'status' => 'continuing',
            'group_id' => 4
        ]);
    }
}
