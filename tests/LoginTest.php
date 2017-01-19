<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGoodLoginWorks()
    {
        $this->visit('/')
             ->click('Login')
             ->seePageIs('/login')
             ->type('seth.riedel@gmail.com', 'email')
             ->type('t3ddv3rr3s', 'password')
             ->press('Login')
             ->seePageIs('/home')
             ->see('You are logged in!');
    }

    public function testBadLoginDoesntWork()
    {
        $this->visit('/')
             ->click('Login')
             ->seePageIs('/login')
             ->type('fleeb@fleeb.com', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->seePageIs('/login')
             ->see('These credentials do not match our records.');
    }
}
