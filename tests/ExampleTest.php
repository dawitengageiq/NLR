<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('auth/login')
             ->type('ariel@engageiq.com','email')
             ->type('12345','password')
             ->press('Login')
             ->seePageIs('admin/dashboard');
    }
}
