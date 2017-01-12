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
          'Role' => 'Admin'
      ]);
      DB::table('users')->insert([
          'name' => 'This Instructor',
          'email' => 'instructor',
          'password' => bcrypt('password'),
          'Role' => 'Instructor'
      ]);
      DB::table('users')->insert([
          'name' => 'This Student',
          'email' => 'student',
          'password' => bcrypt('password'),
          'Role' => 'Student'
      ]);
    }
}
