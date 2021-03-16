<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class RegisterAdmin_Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testView()
    {

        $contents = $this->view('AdminLogin', [
            'title'=>'Admin Login Form'
        ]);

        $contents->assertSee('Admin Login Form');

    }

    public function testListh()
    {
        $contents = $this->view('AdminLogin', [
            'p' => ['Welcome to the Patient Survey System', 'Enter your Email and Password below', 'Sign Up', 'Patient Login', 'Adminstrator Login', 'Having trouble remeber your password?']
        ]);

        $contents->assertSee('Welcome to the Patient Survey System', 'Enter your Email and Password below', 'Sign Up', 'Patient Login', 'Adminstrator Login', 'Having trouble remeber your password?');
    }



    public function testListLabels()
    {
        $contents = $this->view('AdminLogin', [
            'labels' => ['Email address', 'Password']
        ]);

        $contents->assertSee('Email address', 'Password');
    }

    public function testButtons(){
        $contents = $this->view('AdminLogin',[
            'button'=> 'Sign in'
        ]);
        $contents->assertSee('Sign in');

    }


}
