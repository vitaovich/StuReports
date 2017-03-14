<?php

use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('courses')->insert([
          'teacher_id' => 2,
          'year' => 0,
          'quarter' => 1,
          'course_title' => 'CSCD 488',
          'sprint_length'=> 7,
      ]);
      DB::table('courses')->insert([
          'teacher_id' => 2,
          'year' => 2017,
          'quarter' => 1,
          'active' => 1,
          'course_title' => 'CSCD 488',
          'sprint_length'=> 7,
      ]);
      factory(App\Course::class, 2)->states('active')->create();
      factory(App\Course::class, 10)->create();
      DB::table('courses')->insert([
      		  'id' => 10001,
            'teacher_id' => 2,
            'year' => 2016,
      		  'quarter' => 0,
            'course_title' => 'CSCD 488',
            'sprint_length' => 7
            ]);
      		DB::table('courses')->insert([
      		  'id' => 10002,
            'teacher_id' => 2,
            'year' => 2017,
      		  'quarter' => 1,
            'course_title' => 'CSCD 488',
            'sprint_length' => 7
            ]);
    }
}
