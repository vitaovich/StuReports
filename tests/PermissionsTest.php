<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class PermissionsTest extends TestCase
{
    use DatabaseTransactions;

    //TODO: add tests for user edit page once access to it is role-specific

    public function testStudentPermissions()
    {
        $this->visit('/')
             ->click('Login')
             ->type('student', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->seePageIs('/home')
             ->visit('/student_team')
             ->dontSee('You must be logged in as a student to submit a report')
             ->visit('/student_individual')
             ->dontSee('You must be logged in as a student to submit a report');
    }

    public function testInstructorPermissions()
    {
        $this->visit('/')
             ->click('Login')
             ->type('instructor', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->seePageIs('/home/instructor')
             ->visit('/student_team')
             ->see('You must be logged in as a student to submit a report')
             ->visit('/student_individual')
             ->see('You must be logged in as a student to submit a report');
    }

    public function testAdminPermissions()
    {
        $this->visit('/')
             ->click('Login')
             ->type('admin', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->seePageIs('/home/admin')
             ->visit('/student_team')
             ->see('You must be logged in as a student to submit a report')
             ->visit('/student_individual')
             ->see('You must be logged in as a student to submit a report');
    }
}
