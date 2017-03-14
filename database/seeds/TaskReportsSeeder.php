<?php

use Illuminate\Database\Seeder;

class TaskReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('task_reports')->insert([
            'individual_report_id' => 2,
            'latest_progress' => 'Got basic schema',
            'task_id' => 1,
            'sprint' => 2,
            'remaining_sprints' => 5,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 2,
            'latest_progress' => 'have outline done',
            'task_id' => 2,
            'sprint' => 2,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 2,
            'latest_progress' => 'found web host',
            'task_id' => 3,
            'sprint' => 2,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 3,
            'latest_progress' => 'No new Progress',
            'task_id' => 1,
            'sprint' => 3,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 3,
            'latest_progress' => 'No new Progress',
            'task_id' => 2,
            'sprint' => 3,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 3,
            'latest_progress' => 'No new Progress',
            'task_id' => 3,
            'sprint' => 3,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 5,
            'latest_progress' => 'All of the progress',
            'task_id' => 4,
            'sprint' => 2,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 6,
            'latest_progress' => 'No new Progress',
            'task_id' => 4,
            'sprint' => 3,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 6,
            'latest_progress' => 'Got a greater understanding of php',
            'task_id' => 5,
            'sprint' => 3,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 8,
            'latest_progress' => 'yep',
            'task_id' => 6,
            'sprint' => 2,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 8,
            'latest_progress' => 'No',
            'task_id' => 7,
            'sprint' => 2,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 9,
            'latest_progress' => 'almost done',
            'task_id' => 6,
            'sprint' => 3,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
      DB::table('task_reports')->insert([
            'individual_report_id' => 9,
            'latest_progress' => 'don\'t need this',
            'task_id' => 7,
            'sprint' => 3,
            'remaining_sprints' => 1,
            'reassigned' => 0,
        ]);
        factory(App\TaskReport::class, 5)->create();

    }
}
