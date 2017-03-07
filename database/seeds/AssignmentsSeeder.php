<?php

use Illuminate\Database\Seeder;

class AssignmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Sprint 1-Individual Report',
          'code' => 'I.1',
          'sprint' => 1,
          'open_assignment' => '2017-02-02',
          'close_assignment'=> '2017-02-03',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Sprint 1-Team Report',
          'code' => 'T.1',
          'sprint' => 1,
          'open_assignment' => '2017-02-02',
          'close_assignment'=> '2017-02-03',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Sprint 2-Individual Report',
          'code' => 'I.2',
          'sprint' => 2,
          'open_assignment' => '2017-02-09',
          'close_assignment'=> '2017-02-010',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Sprint 2-Team Report',
          'code' => 'T.2',
          'sprint' => 2,
          'open_assignment' => '2017-02-09',
          'close_assignment'=> '2017-02-010',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Sprint 3-Individual Report',
          'code' => 'I.3',
          'sprint' => 3,
          'open_assignment' => '2017-02-02',
          'close_assignment'=> '2017-02-03',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Sprint 3-Team Report',
          'code' => 'T.3',
          'sprint' => 3,
          'open_assignment' => '2017-02-16',
          'close_assignment'=> '2017-02-17',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Briefing 1',
          'code' => 'B.1',
          'sprint' => 0,
          'open_assignment' => '2017-02-07',
          'close_assignment'=> '2017-02-08',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Briefing 2',
          'code' => 'B.2',
          'sprint' => 0,
          'open_assignment' => '2017-02-14',
          'close_assignment'=> '2017-02-15',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Briefing 3',
          'code' => 'B.3',
          'sprint' => 0,
          'open_assignment' => '2017-02-21',
          'close_assignment'=> '2017-02-22',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Briefing 4',
          'code' => 'B.4',
          'sprint' => 0,
          'open_assignment' => '2017-02-28',
          'close_assignment'=> '2017-03-01',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'SRS Draft',
          'code' => 'SRS.1',
          'sprint' => 0,
          'open_assignment' => '2017-02-08',
          'close_assignment'=> '2017-02-09',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'SRS Final',
          'code' => 'SRS.2',
          'sprint' => 1,
          'open_assignment' => '2017-02-22',
          'close_assignment'=> '2017-02-23',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Sprint 4-Individual Report',
          'code' => 'I.4',
          'sprint' => 4,
          'open_assignment' => '2017-02-23',
          'close_assignment'=> '2017-02-24',
      ]);
      DB::table('assignments')->insert([
          'course_id' => 2,
          'assignment_name' => 'Sprint 4-Team Report',
          'code' => 'T.1',
          'sprint' => 4,
          'open_assignment' => '2017-02-23',
          'close_assignment'=> '2017-02-24',
      ]);
    }
}
