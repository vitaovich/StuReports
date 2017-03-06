<?php

use Illuminate\Database\Seeder;

class MemberEvaluationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('member_evaluations')->insert([
          'student_id' => 9,
          'individual_report_id' => 1,
          'concur_hours' => 'maybe',
          'performing' => 'maybe',
          'comments' => 'nope',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 11,
          'individual_report_id' => 1,
          'concur_hours' => 'nope',
          'performing' => 'yes',
          'comments' => 'Sure',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 9,
          'individual_report_id' => 2,
          'concur_hours' => 'no',
          'performing' => 'no',
          'comments' => 'kick them off the team',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 11,
          'individual_report_id' => 2,
          'concur_hours' => 'yes',
          'performing' => 'yes',
          'comments' => 'no comments',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 9,
          'individual_report_id' => 3,
          'concur_hours' => 'no',
          'performing' => 'no',
          'comments' => 'kick them out',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 11,
          'individual_report_id' => 3,
          'concur_hours' => 'yes',
          'performing' => 'yes',
          'comments' => 'they are awesome',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 4,
          'individual_report_id' => 4,
          'concur_hours' => 'yes',
          'performing' => 'yes',
          'comments' => 'good worker',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 11,
          'individual_report_id' => 4,
          'concur_hours' => 'yes',
          'performing' => 'yes',
          'comments' => 'no comments',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 4,
          'individual_report_id' => 5,
          'concur_hours' => 'no',
          'performing' => 'yes',
          'comments' => 'Good team member',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 11,
          'individual_report_id' => 5,
          'concur_hours' => 'no',
          'performing' => 'no',
          'comments' => 'one bad week',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 4,
          'individual_report_id' => 6,
          'concur_hours' => 'yes',
          'performing' => 'maybe',
          'comments' => 'kind of a douchebag',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 11,
          'individual_report_id' => 6,
          'concur_hours' => 'yes',
          'performing' => 'yes',
          'comments' => 'ok team member',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 4,
          'individual_report_id' => 7,
          'concur_hours' => 'yes',
          'performing' => 'yes',
          'comments' => 'no comments',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 9,
          'individual_report_id' => 7,
          'concur_hours' => 'yes',
          'performing' => 'yes',
          'comments' => 'no comments',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 4,
          'individual_report_id' => 8,
          'concur_hours' => 'yes',
          'performing' => 'maybe',
          'comments' => 'lots of hours little produced',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 9,
          'individual_report_id' => 8,
          'concur_hours' => 'yes',
          'performing' => 'yes',
          'comments' => 'good teammate',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 4,
          'individual_report_id' => 9,
          'concur_hours' => 'yes',
          'performing' => 'maybe',
          'comments' => 'lots of hours little done',
      ]);
      DB::table('member_evaluations')->insert([
          'student_id' => 9,
          'individual_report_id' => 9,
          'concur_hours' => 'yes',
          'performing' => 'yes',
          'comments' => 'no comment',
      ]);
    }
}
