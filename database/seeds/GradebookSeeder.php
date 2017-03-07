<?php

use Illuminate\Database\Seeder;

class GradebookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('gradebook')->insert([
          'student_id' => 4,
          'assignment_id' => 1,
          'submitted' => 1,
          'grade' => 10,
      ]);
      DB::table('gradebook')->insert([
          'student_id' => 4,
          'assignment_id' => 3,
          'submitted' => 1,
          'grade' => 10,
      ]);
      DB::table('gradebook')->insert([
          'student_id' => 4,
          'assignment_id' => 5,
          'submitted' => 1,
          'grade' => 10,
      ]);
      DB::table('gradebook')->insert([
          'student_id' => 4,
          'assignment_id' => 2,
          'submitted' => 1,
          'grade' => 10,
      ]);
      DB::table('gradebook')->insert([
          'student_id' => 4,
          'assignment_id' => 4,
          'submitted' => 1,
          'grade' => 10,
      ]);
    }
}
