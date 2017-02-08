<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;

class DatabaseTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndividualReportIsPutIntoTable()
    {
        DB::table('users')->insert([
            'name' => 'Student',
            'email' => 'student',
            'password' => bcrypt('password'),
            'role' => 'Student',
            'remember_token' => str_random(10),
            'course_id' => 1,
            'group_id' => 1
        ]);
        $course = Course::where('id', '=', 1)->first();
        $course->reports_available = 1;
        $course->save();
        $saturday_hours = '' . (rand(1, 96) * .25);
        $sunday_hours = '' . (rand(1, 96) * .25);
        $monday_hours = '' . (rand(1, 96) * .25);
        $tuesday_hours = '' . (rand(1, 96) * .25);
        $wednesday_hours = '' . (rand(1, 96) * .25);
        $thursday_hours = '' . (rand(1, 96) * .25);
        $friday_hours = '' . (rand(1, 96) * .25);
        $saturday_description = "saturday";
        $sunday_description = "sunday";
        $monday_description = "monday";
        $tuesday_description = "tuesday";
        $wednesday_description = "wednesday";
        $thursday_description = "thursday";
        $friday_description = "friday";
        $this->visit('/')
             ->click('Login')
             ->type('student', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->click('Submit Individual Report')
             ->type($saturday_hours, 'saturday_hours')
             ->type($sunday_hours, 'sunday_hours')
             ->type($monday_hours, 'monday_hours')
             ->type($tuesday_hours, 'tuesday_hours')
             ->type($wednesday_hours, 'wednesday_hours')
             ->type($thursday_hours, 'thursday_hours')
             ->type($friday_hours, 'friday_hours')
             ->type($saturday_description, 'saturday_description')
             ->type($sunday_description, 'sunday_description')
             ->type($monday_description, 'monday_description')
             ->type($tuesday_description, 'tuesday_description')
             ->type($wednesday_description, 'wednesday_description')
             ->type($thursday_description, 'thursday_description')
             ->type($friday_description, 'friday_description')
             ->type('comment', 'private_comments')
             ->press('Submit')
             ->seePageIs('/submit_individual_report')
             ->seeInDatabase('individual_reports', [
               'Private_Comments' => 'comment'
             ])
             ->seeInDatabase('time_logs', [
               'hours' => $saturday_hours,
               'description' => $saturday_description
             ])
             ->seeInDatabase('time_logs', [
               'hours' => $sunday_hours,
               'description' => $sunday_description
             ])
             ->seeInDatabase('time_logs', [
               'hours' => $monday_hours,
               'description' => $monday_description
             ])
             ->seeInDatabase('time_logs', [
               'hours' => $tuesday_hours,
               'description' => $tuesday_description
             ])
             ->seeInDatabase('time_logs', [
               'hours' => $wednesday_hours,
               'description' => $wednesday_description
             ])
             ->seeInDatabase('time_logs', [
               'hours' => $thursday_hours,
               'description' => $thursday_description
             ])
             ->seeInDatabase('time_logs', [
               'hours' => $friday_hours,
               'description' => $friday_description
             ]);
    }

    public function testTeamReportIsPutIntoTable()
    {
        DB::table('users')->insert([
            'name' => 'Student',
            'email' => 'student',
            'password' => bcrypt('password'),
            'role' => 'Student',
            'remember_token' => str_random(10),
            'course_id' => 1,
            'group_id' => 1
        ]);
        $course = Course::where('id', '=', 1)->first();
        $course->reports_available = 1;
        $course->save();
        $easiest_understand = 'easiest understand';
        $hardest_understand = 'hardest_understand';
        $easiest_approach = 'easiest_approach';
        $hardest_approach = 'hardest_approach';
        $easiest_solve = 'easiest_solve';
        $hardest_solve = 'hardest_solve';
        $easiest_evaluate = 'easiest_evaluate';
        $hardest_evaluate = 'hardest_evaluate';
        $pace = 'pace';
        $client = 'client';
        $comments = 'comments';

        $this->visit('/')
             ->click('Login')
             ->type('student', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->click('Submit Team Report')
             ->type($easiest_understand, 'easiest_understand')
             ->type($hardest_understand, 'hardest_understand')
             ->type($easiest_approach, 'easiest_approach')
             ->type($hardest_approach, 'hardest_approach')
             ->type($easiest_solve, 'easiest_solve')
             ->type($hardest_solve, 'hardest_solve')
             ->type($easiest_evaluate, 'easiest_evaluate')
             ->type($hardest_evaluate, 'hardest_evaluate')
             ->type($pace, 'pace')
             ->type($client, 'client')
             ->type($comments, 'comments')
             ->press('Submit')
             ->seeInDatabase('team_reports', [
               'group_id' => 1,
               'easiest_understand' => $easiest_understand,
               'hardest_understand' => $hardest_understand,
               'easiest_approach' => $easiest_approach,
               'hardest_approach' => $hardest_approach,
               'easiest_solve' => $easiest_solve,
               'hardest_solve' => $hardest_solve,
               'easiest_evaluate' => $easiest_evaluate,
               'hardest_evaluate' => $hardest_evaluate,
               'pace' => $pace,
               'client' => $client,
               'comments' => $comments
             ]);
    }
}
