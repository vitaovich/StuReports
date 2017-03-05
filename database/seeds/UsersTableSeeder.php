<?php
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class, 20)->create();
      factory(App\User::class, 30)->states('unassigned')->create();
      DB::table('users')->insert([
          'name' => 'Stu Steiner',
          'email' => 'instructor',
          'password' => bcrypt('password'),
          'role' => 'Instructor',
          'remember_token' => str_random(10)
      ]);
      DB::table('users')->insert([
          'name' => 'Student',
          'email' => 'student',
          'password' => bcrypt('password'),
          'role' => 'Student',
          'remember_token' => str_random(10),
          'course_id' => 2
      ]);
      DB::table('users')->insert([
          'name' => 'Tom Capaul',
          'email' => 'tom',
          'password' => bcrypt('password'),
          'role' => 'Instructor',
          'remember_token' => str_random(10)
      ]);
      DB::table('users')->insert([
          'name' => 'Chris Peters',
          'email' => 'chris',
          'password' => bcrypt('password'),
          'role' => 'Instructor',
          'remember_token' => str_random(10)
      ]);
      DB::table('users')->insert([
          'name' => 'Stu Steiner',
          'email' => 'stu',
          'password' => bcrypt('password'),
          'role' => 'Instructor',
          'remember_token' => str_random(10)
      ]);
      DB::table('users')->insert([
          'name' => 'Elliot Alderson',
          'email' => 'ealderson@allsafe.com',
          'password' => bcrypt('password'),
          'role' => 'Student',
          'remember_token' => str_random(10),
          'course_id' => 2,
          'group_id' => 11
      ]);
      DB::table('users')->insert([
          'name' => 'Angela Moss',
          'email' => 'amoss@allsafe.com',
          'password' => bcrypt('password'),
          'role' => 'Student',
          'remember_token' => str_random(10),
          'course_id' => 2,
          'group_id' => 11
      ]);
      DB::table('users')->insert([
          'name' => 'Tyrell Wellick',
          'email' => 'twellick@allsafe.com',
          'password' => bcrypt('password'),
          'role' => 'Student',
          'remember_token' => str_random(10),
          'course_id' => 2,
          'group_id' => 11
      ]);
      DB::table('users')->insert([
          'name' => 'Giddeon Goddard',
          'email' => 'ggoddard@allsafe.com',
          'password' => bcrypt('password'),
          'role' => 'Student',
          'remember_token' => str_random(10),
          'course_id' => 2,
          'group_id' => 11
      ]);
      DB::table('users')->insert([
        'id' => 20001,
          'name' => 'Dr. Pepper',
          'email' => 'DrPepper@gmail.com',
          'password' => bcrypt('mr.pib'),
          'role' => 'Instructor',
          'remember_token' => str_random(10)
      ]);
    DB::table('users')->insert([
      'id' => 20002,
          'name' => 'Dr. Lee',
          'email' => 'drLee@gmail.com',
          'password' => bcrypt('BruceLee'),
          'role' => 'Instructor',
          'remember_token' => str_random(10)
      ]);
      DB::table('users')->insert([
      'id' => 30001,
          'name' => 'Joe Smith',
          'email' => 'SmithLord@excite.com',
          'password' => bcrypt('smith1234'),
          'role' => 'Student',
          'remember_token' => str_random(10)
      ]);
    DB::table('users')->insert([
        'id' => 30002,
          'name' => 'Steve Bennett',
          'email' => 'sBennett@yahoo.com',
          'password' => bcrypt('steve_1'),
          'role' => 'Student',
          'remember_token' => str_random(10)
      ]);
    DB::table('users')->insert([
      'id' => 30003,
          'name' => 'Joe Flacco',
          'email' => 'jflacco@gmail.com',
          'password' => bcrypt('pass_word1234'),
          'role' => 'Student',
          'remember_token' => str_random(10)
      ]);
    DB::table('users')->insert([
        'id' => 30004,
          'name' => 'Steve Jobs',
          'email' => 'sjobs@gmail.com',
          'password' => bcrypt('jobless'),
          'role' => 'Student',
          'remember_token' => str_random(10)
      ]);
    DB::table('users')->insert([
      'id' => 30005,
          'name' => 'Mark Harmen',
          'email' => 'mharmen@gmail.com',
          'password' => bcrypt('pass'),
          'role' => 'Student',
          'remember_token' => str_random(10)
      ]);
    DB::table('users')->insert([
        'id' => 30006,
          'name' => 'James Black',
          'email' => 'jblack@gmail.com',
          'password' => bcrypt('nfl'),
          'role' => 'Student',
          'remember_token' => str_random(10)
      ]);
    DB::table('users')->insert([
        'id' => 30007,
          'name' => 'Amanda Wood',
          'email' => 'awood@wood.com',
          'password' => bcrypt('123456789'),
          'role' => 'Student',
          'remember_token' => str_random(10)
      ]);
    }
}
