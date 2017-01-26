<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    public function testGoodLoginWorks()
    {
      $user = new User;
      $user->name = 'Test';
      $user->email = 'test@test.com';
      $user->password = bcrypt('password');
      $user->Role = 'Student';
      $user->save();
        $this->visit('/')
             ->click('Login')
             ->seePageIs('/login')
             ->type('test@test.com', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->seePageIs('/home')
             ->see('Status Reports');
    }

    public function testBadLoginDoesntWork()
    {
        $this->visit('/')
             ->click('Login')
             ->seePageIs('/login')
             ->type('test@test.com', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->seePageIs('/login')
             ->see('These credentials do not match our records.');
    }
}
