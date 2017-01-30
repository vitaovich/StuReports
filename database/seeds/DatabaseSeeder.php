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
	
	public function seedUsers()
	{
		DB::table('users')->insert([
		  'id' => 10001,
          'name' => 'admin',
          'email' => 'admin',
          'password' => bcrypt('admin1'),
          'Role' => 'Admin',
          'remember_token' => str_random(10)
      ]);
      DB::table('users')->insert([
	      'id' => 20001,
          'name' => 'Dr. Pepper',
          'email' => 'DrPepper@gmail.com',
          'password' => bcrypt('mr.pib'),
          'Role' => 'Instructor',
          'remember_token' => str_random(10)
      ]);
	  DB::table('users')->insert([
		  'id' => 20002,
          'name' => 'Dr. Lee',
          'email' => 'drLee@gmail.com',
          'password' => bcrypt('BruceLee'),
          'Role' => 'Instructor',
          'remember_token' => str_random(10)
      ]);
      DB::table('users')->insert([
		  'id' => 30001,
          'name' => 'Joe Smith',
          'email' => 'SmithLord@excite.com',
          'password' => bcrypt('smith1234'),
          'Role' => 'Student',
          'remember_token' => str_random(10)
      ]);
	  DB::table('users')->insert([
	  	  'id' => 30002,
          'name' => 'Steve Bennett',
          'email' => 'sBennett@yahoo.com',
          'password' => bcrypt('steve_1'),
          'Role' => 'Student',
          'remember_token' => str_random(10)
      ]);
	  DB::table('users')->insert([
		  'id' => 30003,
          'name' => 'Joe Flacco',
          'email' => 'jflacco@gmail.com',
          'password' => bcrypt('pass_word1234'),
          'Role' => 'Student',
          'remember_token' => str_random(10)
      ]);
	  DB::table('users')->insert([
	      'id' => 30004,
          'name' => 'Steve Jobs',
          'email' => 'sjobs@gmail.com',
          'password' => bcrypt('jobless'),
          'Role' => 'Student',
          'remember_token' => str_random(10)
      ]);
	  DB::table('users')->insert([
		  'id' => 30005,
          'name' => 'Mark Harmen',
          'email' => 'mharmen@gmail.com',
          'password' => bcrypt('pass'),
          'Role' => 'Student',
          'remember_token' => str_random(10)
      ]);
	  DB::table('users')->insert([
	      'id' => 30006,
          'name' => 'James Black',
          'email' => 'jblack@gmail.com',
          'password' => bcrypt('nfl'),
          'Role' => 'Student',
          'remember_token' => str_random(10)
      ]);
	  DB::table('users')->insert([
	      'id' => 30007,
          'name' => 'Amanda Wood',
          'email' => 'awood@wood.com',
          'password' => bcrypt('123456789'),
          'Role' => 'Student',
          'remember_token' => str_random(10)
      ]);
	}
	
	public function seedClasses()
	{
		DB::table('classrooms')->insert([
		  'Class_id' => 10001,
          'Teacher_id' => 20001,
          'Year' => 2016,
		  'Quarter' => 'fall'
          'Course_Number' => 147521,
          'Sprint_length' => 1
      ]);
		DB::table('classrooms')->insert([
		  'Class_id' => 10002,
          'Teacher_id' => 20002,
          'Year' => 2017,
		  'Quarter' => 'winter'
          'Course_Number' => 147522,
          'Sprint_length' => 1
      ]);
	}
	
	public function seedProjectGroups()
	{
		DB::table('project_groups')->insert([
		  'Group_id' => 1,
          'Class_id' => 10001,
          'Project' => "exchange'a'grams"
      ]);
		DB::table('project_groups')->insert([
		  'Group_id' => 2,
          'Class_id' => 10001,
          'Project' => "myFace"
      ]);
	}
	public function seedStudentGroups()
	{
		DB::table('student_groups')->insert([
		  'Student_id' => 30001,
		  'Group_id' => 1, 
		  'Class_id' = > 10001
      ]);
		DB::table('student_groups')->insert([
		  'Student_id' => 30002,
		  'Group_id' => 1, 
		  'Class_id' = > 10001
      ]);
		DB::table('student_groups')->insert([
		  'Student_id' => 30003,
		  'Group_id' => 1, 
		  'Class_id' = > 10001
      ]);
		DB::table('student_groups')->insert([
		  'Student_id' => 30004,
		  'Group_id' => 1, 
		  'Class_id' = > 10001
      ]);
		DB::table('student_groups')->insert([
		  'Student_id' => 30005,
		  'Group_id' => 2, 
		  'Class_id' = > 10001
      ]);
		DB::table('student_groups')->insert([
		  'Student_id' => 30006,
		  'Group_id' => 2, 
		  'Class_id' = > 10001
      ]);
		DB::table('student_groups')->insert([
		  'Student_id' => 30007,
		  'Group_id' => 2, 
		  'Class_id' = > 10001
      ]);
	}
	
	public function seedIndivdualReports()
	{
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 1,
          'Private_Comments' => "no comments",
          'Student_id' => 30001,
          'Sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 8,
          'Private_Comments' => "project is going well, but other members haven't done anthing yet",
          'Student_id' => 30001,
          'Sprint' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 2,
          'Private_Comments' => "no comments",
          'Student_id' => 30002,
          'Sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 9,
          'Private_Comments' => "no comments",
          'Student_id' => 30002,
          'Sprint' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 3,
          'Private_Comments' => "no comments",
          'Student_id' => 30003,
          'Sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 10,
          'Private_Comments' => "no comments",
          'Student_id' => 30003,
          'Sprint' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 4,
          'Private_Comments' => "no comments",
          'Student_id' => 30004,
          'Sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 11,
          'Private_Comments' => "no comments",
          'Student_id' => 30004,
          'Sprint' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 5,
          'Private_Comments' => "no comments",
          'Student_id' => 30005,
          'Sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 6,
          'Private_Comments' => "no comments",
          'Student_id' => 30006,
          'Sprint' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Individual_Report_id' => 7,
          'Private_Comments' => "no comments",
          'Student_id' => 30007,
          'Sprint' => 1
      ]);
	}
	
	public function seedTasks()
	{
		DB::table('individual_reports')->insert([
		  'Task_id' => 1,
		  'Description' => "set up working devoplment enviroment",
          'Task_name' => "Devoplment enviroment",
          'Student_id' => 30001,
          'Status' => "Continuing",
          'Group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Task_id' => 2,
		  'Description' => "set up working test enviroment",
          'Task_name' => "Testing enviroment",
          'Student_id' => 30002,
          'Status' => "Continuing",
          'Group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Task_id' => 3,
		  'Description' => "Begin basic SRS",
          'Task_name' => "SRS",
          'Student_id' => 30003,
          'Status' => "Continuing",
          'Group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Task_id' => 4,
		  'Description' => "Design database schema",
          'Task_name' => "Database",
          'Student_id' => 30004,
          'Status' => "Continuing",
          'Group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Task_id' => 5,
		  'Description' => "set up working devoplment enviroment",
          'Task_name' => "Devoplment enviroment",
          'Student_id' => 30005,
          'Status' => "Continuing",
          'Group_id' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'Task_id' => 6,
		  'Description' => "set up working test enviroment",
          'Task_name' => "Testing enviroment",
          'Student_id' => 30006,
          'Status' => "Continuing",
          'Group_id' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'Task_id' => 7,
		  'Description' => "Begin basic SRS",
          'Task_name' => "SRS",
          'Student_id' => 30007,
          'Status' => "Continuing",
          'Group_id' => 2
      ]);
		DB::table('individual_reports')->insert([
		  'Task_id' => 8,
		  'Description' => "Work on SRS",
          'Task_name' => "SRS",
          'Student_id' => 30001,
          'Status' => "Continuing",
          'Group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Task_id' => 9,
		  'Description' => "Get database online",
          'Task_name' => "Database",
          'Student_id' => 30002,
          'Status' => "Continuing",
          'Group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Task_id' => 10,
		  'Description' => "help get database online and working",
          'Task_name' => "Database",
          'Student_id' => 30003,
          'Status' => "Continuing",
          'Group_id' => 1
      ]);
		DB::table('individual_reports')->insert([
		  'Task_id' => 11,
		  'Description' => "Work on getting SRS done",
          'Task_name' => "SRS",
          'Student_id' => 30004,
          'Status' => "Continuing",
          'Group_id' => 1
      ]);
	}
}
