<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'admin',
          'password' => bcrypt('password'),
          'role' => 'Admin',
          'remember_token' => str_random(10)
      ]);
      DB::table('users')->insert([
          'name' => 'fname lname',
          'email' => 'instructor',
          'password' => bcrypt('password'),
          'role' => 'Instructor',
          'remember_token' => str_random(10)
      ]);
      $this->call(CoursesSeeder::class);
      $this->call(ProjectsSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(IndividualReportsSeeder::class);
      $this->call(TasksSeeder::class);
      $this->call(AssignmentsSeeder::class);
      $this->call(GradebookSeeder::class);
      $this->call(MemberEvaluationsSeeder::class);
      $this->call(TaskEvaluationsSeeder::class);
      $this->call(TaskReportsSeeder::class);
      $this->call(TimeLogsSeeder::class);
    }
}
