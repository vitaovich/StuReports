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
          'Role' => 'Admin',
          'remember_token' => str_random(10)
      ]);
      DB::table('users')->insert([
          'name' => 'Stu Steiner',
          'email' => 'instructor',
          'password' => bcrypt('password'),
          'Role' => 'Instructor',
          'remember_token' => str_random(10)
      ]);
      DB::table('users')->insert([
          'name' => 'Student',
          'email' => 'student',
          'password' => bcrypt('password'),
          'Role' => 'Student',
          'remember_token' => str_random(10)
      ]);
      factory(App\User::class, 20)->create();
      factory(App\Classroom::class, 10)->create();
      factory(App\Project_group::class, 10)->create();
      factory(App\Student_group::class, 20)->create();
    }
}
