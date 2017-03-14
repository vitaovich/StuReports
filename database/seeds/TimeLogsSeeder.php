<?php

use Illuminate\Database\Seeder;

class TimeLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('time_logs')->insert([
            'individual_report_id' => 1,
            'day' => '2017-01-29',
            'hours' => 5.00,
            'description' => 'ok',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 1,
            'day' => '2017-01-31',
            'hours' => 4.00,
            'description' => 'winning',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 2,
            'day' => '2017-01-29',
            'hours' => 5.00,
            'description' => 'SRS',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 2,
            'day' => '2017-01-30',
            'hours' => 5.00,
            'description' => 'Database',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 2,
            'day' => '2017-02-01',
            'hours' => 5.00,
            'description' => 'Web Host',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 3,
            'day' => '2017-01-30',
            'hours' => 5.00,
            'description' => 'ok',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 3,
            'day' => '2017-01-31',
            'hours' => 5.00,
            'description' => 'Good',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 3,
            'day' => '2017-02-01',
            'hours' => 5.00,
            'description' => 'Great',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 4,
            'day' => '2017-01-30',
            'hours' => 5.00,
            'description' => 'Started SRS',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 4,
            'day' => '2017-02-02',
            'hours' => 5.00,
            'description' => 'ok',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 4,
            'day' => '2017-02-03',
            'hours' => 5.00,
            'description' => 'fake',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 5,
            'day' => '2017-01-29',
            'hours' => 5.00,
            'description' => 'Homepage',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 6,
            'day' => '2017-01-31',
            'hours' => 20.00,
            'description' => 'homepage',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 7,
            'day' => '2017-01-29',
            'hours' => 5.00,
            'description' => 'Work',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 7,
            'day' => '2017-01-31',
            'hours' => 5.00,
            'description' => 'Work',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 8,
            'day' => '2017-01-30',
            'hours' => 20.00,
            'description' => 'All things',
        ]);
      DB::table('time_logs')->insert([
            'individual_report_id' => 9,
            'day' => '2017-02-01',
            'hours' => 24.00,
            'description' => 'entire day',
        ]);
        factory(App\IndividualTimeLog::class, 5)->create();
    }
}
