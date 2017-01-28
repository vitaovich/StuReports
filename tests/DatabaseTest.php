<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Classroom;
use App\Project_group;
use App\Student_group;

class DatabaseTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndividualReportIsPutIntoTable()
    {
        $user = new User;
        $user->name = 'Test';
        $user->email = 'test@test.com';
        $user->password = bcrypt('password');
        $user->Role = 'Student';
        $user->save();

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
             ->type('comment', 'Private_Comments')
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
        $user = new User;
        $user->name = 'Test';
        $user->email = 'test@test.com';
        $user->password = bcrypt('password');
        $user->Role = 'Student';
        $user->save();
        $user_id = $user->getAttribute('id');

        $user = new User;
        $user->name = 'Teacher';
        $user->email = 'teacher@teacher.com';
        $user->password = bcrypt('password');
        $user->Role = 'Teacher';
        $user->save();
        $teacher_id = $user->getAttribute('id');

        $class = new Classroom;
        $class->Teacher_id = $teacher_id;
        $class->Year = 2017;
        $class->Quarter = 'Fall';
        $class->Course_Number = 488;
        $class->Sprint_length = 7;
        $class->save();
        $class_id = $class->getAttribute('Class_id');

        $project_group = new Project_group;
        $project_group->Class_id = $class_id;
        $project_group->Project = "Test";
        $project_group->save();
        $project_id = $project_group->getAttribute('Group_id');

        $student_group = new Student_group;
        $student_group->Student_id = $user_id;
        $student_group->Group_id = $project_id;
        $student_group->Class_id = $class_id;
        $student_group->save();

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
             ->type($easiest_understand, 'Easiest_Understand')
             ->type($hardest_understand, 'Hardest_Understand')
             ->type($easiest_approach, 'Easiest_Approach')
             ->type($hardest_approach, 'Hardest_Approach')
             ->type($easiest_solve, 'Easiest_Solve')
             ->type($hardest_solve, 'Hardest_Solve')
             ->type($easiest_evaluate, 'Easiest_Evaluate')
             ->type($hardest_evaluate, 'Hardest_Evaluate')
             ->type($pace, 'Pace')
             ->type($client, 'Client')
             ->type($comments, 'Comments')
             ->press('Submit')
             ->seeInDatabase('team_reports', [
               'Group_id' => $project_id,
               'Easiest_Understand' => $easiest_understand,
               'Hardest_Understand' => $hardest_understand,
               'Easiest_Approach' => $easiest_approach,
               'Hardest_Approach' => $hardest_approach,
               'Easiest_Solve' => $easiest_solve,
               'Hardest_Solve' => $hardest_solve,
               'Easiest_Evaluate' => $easiest_evaluate,
               'Hardest_Evaluate' => $hardest_evaluate,
               'Pace' => $pace,
               'Client' => $client,
               'Comments' => $comments
             ]);
    }
}
