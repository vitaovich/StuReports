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
      DB::table('courses')->insert([
          'teacher_id' => 1,
          'year' => 0,
          'quarter' => 'None',
          'course_number' => 0,
          'sprint_length'=> 0,
      ]);
      DB::table('project_groups')->insert([
          'course_id' => 1,
          'project' => 'Empty project.',
      ]);
      factory(App\Course::class, 2)->states('active')->create();
      factory(App\Course::class, 10)->create();
      factory(App\Project_group::class, 10)->create();
      factory(App\User::class, 20)->create();
      factory(App\User::class, 30)->states('unassigned')->create();
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
    }

	public function seedUsers()
	{
		DB::table('users')->insert([
		  'id' => 10001,
          'name' => 'admin',
          'email' => 'admin',
          'password' => bcrypt('admin1'),
          'role' => 'Admin',
          'remember_token' => str_random(10)
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
          'password' => bcvirypt('smith1234'),
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

	public function seedClasses()
	{
		DB::table('courses')->insert([
		  'id' => 10001,
          'teacher_id' => 20001,
          'year' => 2016,
		  'quarter' => 'fall',
          'course_number' => 147521,
          'sprint_length' => 1
      ]);
		DB::table('courses')->insert([
		  'id' => 10002,
          'teacher_id' => 20002,
          'year' => 2017,
		  'quarter' => 'winter',
          'course_number' => 147522,
          'sprint_length' => 1
      ]);
	}

	public function seedprojectGroups()
	{
		DB::table('project_groups')->insert([
		  'id' => 1,
          'class_id' => 10001,
          'project' => "exchange'a'grams"
      ]);
		DB::table('project_groups')->insert([
		  'id' => 2,
          'class_id' => 10001,
          'project' => "myFace"
      ]);
	}
	public function seedStudentGroups()
	{
		DB::table('student_groups')->insert([
		  'student_id' => 30001,
		  'group_id' => 1,
		  'class_id' => 10001
      ]);
		DB::table('student_groups')->insert([
		  'student_id' => 30002,
		  'group_id' => 1,
		  'class_id' => 10001
      ]);
		DB::table('student_groups')->insert([
		  'student_id' => 30003,
		  'group_id' => 1,
		  'class_id' => 10001
      ]);
		DB::table('student_groups')->insert([
		  'student_id' => 30004,
		  'group_id' => 1,
		  'class_id' => 10001
      ]);
		DB::table('student_groups')->insert([
		  'student_id' => 30005,
		  'group_id' => 2,
		  'class_id' => 10001
      ]);
		DB::table('student_groups')->insert([
		  'student_id' => 30006,
		  'group_id' => 2,
		  'class_id' => 10001
      ]);
		DB::table('student_groups')->insert([
		  'student_id' => 30007,
		  'group_id' => 2,
		  'class_id' => 10001
      ]);
	}

	public function seedIndivdualReports()
	{
		DB::table('individual_reports')->insert([
		  'id' => 1,
          'private_comments' => "no comments",
          'student_id' => 30001,
          'sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'id' => 8,
          'private_comments' => "project is going well, but other members haven't done anthing yet",
          'student_id' => 30001,
          'sprint' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'id' => 2,
          'private_comments' => "no comments",
          'student_id' => 30002,
          'sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'id' => 9,
          'private_comments' => "no comments",
          'student_id' => 30002,
          'sprint' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'id' => 3,
          'private_comments' => "no comments",
          'student_id' => 30003,
          'sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'id' => 10,
          'private_comments' => "no comments",
          'student_id' => 30003,
          'sprint' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'id' => 4,
          'private_comments' => "no comments",
          'student_id' => 30004,
          'sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'id' => 11,
          'private_comments' => "no comments",
          'student_id' => 30004,
          'sprint' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'id' => 5,
          'private_comments' => "no comments",
          'student_id' => 30005,
          'sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'id' => 6,
          'private_comments' => "no comments",
          'student_id' => 30006,
          'sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'id' => 7,
          'private_comments' => "no comments",
          'student_id' => 30007,
          'sprint' => 1
      ]);
	}

	public function seedTasks()
	{
		DB::table('individual_reports')->insert([
		  'task_id' => 1,
		  'description' => "set up working devoplment enviroment",
          'task_name' => "Devoplment enviroment",
          'student_id' => 30001,
          'status' => "Continuing",
          'group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'task_id' => 2,
		  'description' => "set up working test enviroment",
          'task_name' => "Testing enviroment",
          'student_id' => 30002,
          'status' => "Continuing",
          'group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'task_id' => 3,
		  'description' => "Begin basic SRS",
          'task_name' => "SRS",
          'student_id' => 30003,
          'status' => "Continuing",
          'group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'task_id' => 4,
		  'description' => "Design database schema",
          'task_name' => "Database",
          'student_id' => 30004,
          'status' => "Continuing",
          'group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'task_id' => 5,
		  'description' => "set up working devoplment enviroment",
          'task_name' => "Devoplment enviroment",
          'student_id' => 30005,
          'status' => "Continuing",
          'group_id' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'task_id' => 6,
		  'description' => "set up working test enviroment",
          'task_name' => "Testing enviroment",
          'student_id' => 30006,
          'status' => "Continuing",
          'group_id' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'task_id' => 7,
		  'description' => "Begin basic SRS",
          'task_name' => "SRS",
          'student_id' => 30007,
          'status' => "Continuing",
          'group_id' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'task_id' => 8,
		  'description' => "Work on SRS",
          'task_name' => "SRS",
          'student_id' => 30001,
          'status' => "Continuing",
          'group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'task_id' => 9,
		  'description' => "Get database online",
          'task_name' => "Database",
          'student_id' => 30002,
          'status' => "Continuing",
          'group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'task_id' => 10,
		  'description' => "help get database online and working",
          'task_name' => "Database",
          'student_id' => 30003,
          'status' => "Continuing",
          'group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'task_id' => 11,
		  'description' => "Work on getting SRS done",
          'task_name' => "SRS",
          'student_id' => 30004,
          'status' => "Continuing",
          'group_id' => 1
      ]);
	}
}
