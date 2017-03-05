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
      $this->call(CoursesSeeder::class);
      $this->call(ProjectsSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(IndividualReportsSeeder::class);
      $this->call(TasksSeeder::class);
    }
}
