<?php

use Illuminate\Database\Seeder;

class TaskEvaluationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('task_evaluations')->insert([
            'task_id' => 4,
            'individual_report_id' => 2,
            'concur' => 'yes',
            'comments' => 'Good work',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 5,
            'individual_report_id' => 2,
            'concur' => 'no',
            'comments' => 'they didn\'t do anything',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 4,
            'individual_report_id' => 3,
            'concur' => 'yes',
            'comments' => 'the work is really nice',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 5,
            'individual_report_id' => 3,
            'concur' => 'no',
            'comments' => 'they didn\'t do anything',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 6,
            'individual_report_id' => 2,
            'concur' => 'no',
            'comments' => 'sloppy',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 7,
            'individual_report_id' => 2,
            'concur' => 'yes',
            'comments' => 'full of bugs',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 6,
            'individual_report_id' => 3,
            'concur' => 'yes',
            'comments' => 'decent job',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 7,
            'individual_report_id' => 3,
            'concur' => 'yes',
            'comments' => 'still full of bugs',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 1,
            'individual_report_id' => 5,
            'concur' => 'yes',
            'comments' => 'their doing good',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 2,
            'individual_report_id' => 5,
            'concur' => 'no',
            'comments' => 'no sure what their doing',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 3,
            'individual_report_id' => 5,
            'concur' => 'yes',
            'comments' => 'Looks good',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 1,
            'individual_report_id' => 6,
            'concur' => 'yes',
            'comments' => 'a lot of work done on this',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 2,
            'individual_report_id' => 6,
            'concur' => 'maybe',
            'comments' => 'Looks like they did some work but cant tell',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 3,
            'individual_report_id' => 6,
            'concur' => 'yes',
            'comments' => 'didnt do anything on this',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 6,
            'individual_report_id' => 5,
            'concur' => 'no',
            'comments' => 'hasn\'t done anything on this',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 7,
            'individual_report_id' => 5,
            'concur' => 'no',
            'comments' => 'doing good work',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 6,
            'individual_report_id' => 6,
            'concur' => 'yes',
            'comments' => 'looks great',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 7,
            'individual_report_id' => 6,
            'concur' => 'yes',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 1,
            'individual_report_id' => 8,
            'concur' => 'yes',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 2,
            'individual_report_id' => 8,
            'concur' => 'yes',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 3,
            'individual_report_id' => 8,
            'concur' => 'yes',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 4,
            'individual_report_id' => 8,
            'concur' => 'yes',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 5,
            'individual_report_id' => 8,
            'concur' => 'yes',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 1,
            'individual_report_id' => 9,
            'concur' => 'yes',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 2,
            'individual_report_id' => 9,
            'concur' => 'yes',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 3,
            'individual_report_id' => 9,
            'concur' => 'yes',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 4,
            'individual_report_id' => 9,
            'concur' => 'yes',
        ]);
      DB::table('task_evaluations')->insert([
            'task_id' => 5,
            'individual_report_id' => 9,
            'concur' => 'yes',
        ]);
        factory(App\Task_evaluation::class, 5)->create();

    }
}
