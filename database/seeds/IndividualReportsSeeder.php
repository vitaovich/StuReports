<?php

use Illuminate\Database\Seeder;

class IndividualReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('individual_reports')->insert([
  		  'id' => 1,
            'private_comments' => "no comments",
            'student_id' => 30001,
            'total_hours' => 15,
            'sprint' => 1
        ]);
  		DB::table('individual_reports')->insert([
  		  'id' => 8,
            'private_comments' => "project is going well, but other members haven't done anthing yet",
            'student_id' => 30001,
            'total_hours' => 15,
            'sprint' => 2
        ]);
  		DB::table('individual_reports')->insert([
  		  'id' => 2,
            'private_comments' => "no comments",
            'student_id' => 30002,
            'total_hours' => 15,
            'sprint' => 1
        ]);
  		DB::table('individual_reports')->insert([
  		  'id' => 9,
            'private_comments' => "no comments",
            'student_id' => 30002,
            'total_hours' => 15,
            'sprint' => 2
        ]);
  		DB::table('individual_reports')->insert([
  		  'id' => 3,
            'private_comments' => "no comments",
            'student_id' => 30003,
            'total_hours' => 15,
            'sprint' => 1
        ]);
  		DB::table('individual_reports')->insert([
  		  'id' => 10,
            'private_comments' => "no comments",
            'student_id' => 30003,
            'total_hours' => 10,
            'sprint' => 2
        ]);
  		DB::table('individual_reports')->insert([
  		  'id' => 4,
            'private_comments' => "no comments",
            'student_id' => 30004,
            'total_hours' => 20,
            'sprint' => 1
        ]);
  		DB::table('individual_reports')->insert([
  		  'id' => 11,
            'private_comments' => "no comments",
            'student_id' => 30004,
            'total_hours' => 15,
            'sprint' => 2
        ]);
  		DB::table('individual_reports')->insert([
  		  'id' => 5,
            'private_comments' => "no comments",
            'student_id' => 30005,
            'total_hours' => 2,
            'sprint' => 1
        ]);
  		DB::table('individual_reports')->insert([
  		  'id' => 6,
            'private_comments' => "no comments",
            'student_id' => 30006,
            'total_hours' => 7.5,
            'sprint' => 1
        ]);
  		DB::table('individual_reports')->insert([
  		  'id' => 7,
            'private_comments' => "no comments",
            'student_id' => 30007,
            'total_hours' => 8,
            'sprint' => 1,

        ]);
        factory(App\IndividualReport::class, 5)->create();
    }
}
