<?php

use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
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
    }
}
