<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Course;
use App\Project_group;

class DatabaseTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndividualReportIsPutIntoTable()
    {
        $student = new User;
        $student->name = 'Test';
        $student->email = 'test@test.com';
        $student->password = bcrypt('password');
        $student->role = 'Student';
        $student->save();

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
             ->type('test@test.com', 'email')
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
        $student = new User;
        $student->name = 'Test';
        $student->email = 'test@test.com';
        $student->password = bcrypt('password');
        $student->role = 'Student';
        $student->save();
        $student_id = $student->getAttribute('id');

        //uncomment once functionality is added in ReportsController
        //$instructor = new User;
        //$instructor->name = 'Instructor';
        //$instructor->email = 'instructor@instructor.com';
        //$instructor->password = bcrypt('password');
        //$instructor->role = 'Instructor';
        //$instructor->save();
        //$instructor_id = $instructor->getAttribute('id');

        //uncomment once functionality is added in ReportsController
        //$course = new Course;
        //$course->teacher_id = $instructor_id;
        //$course->year = 2017;
        //$course->quarter = 'Fall';
        //$course->course_number = 488;
        //$course->sprint_length = 7;
        //$course->save();
        //$course_id = $course->getAttribute('id');
        //$student->course_id = $course_id;
        $student->course_id = 1; //comment once functionality is added in ReportsController
        $student->save();

        //uncomment once functionality is added in ReportsController
        //$project_group = new Project_group;
        //$project_group->course_id = $course_id;
        //$project_group->project = "Test";
        //$project_group->save();
        //$project_id = $project_group->getAttribute('id');
        //$student->group_id = $project_id;
        $student->group_id = 1; //comment once functionality is added in ReportsController
        $student->save();

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
             ->type('test@test.com', 'email')
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
               //'group_id' => $project_id, //uncomment once functionality is added in ReportsController
               'group_id' => 1, //comment once functionality is added in ReportsController
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
