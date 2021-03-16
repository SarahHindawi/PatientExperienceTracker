<?php
//NOTE: Please before you start testing the code make sure that the view does not have any variable. If the view has any variable,
// please comment the part which has the variables. The reason is theis testing is jusy fro review and it is seperated from the controller.
namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class admin_registeration_Test extends TestCase
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

        $contents = $this->view('Registration', [
            'title'=>'Sign Up Page'
        ]);

        $contents->assertSee('Sign Up Page');

    }

    public function testListh()
    {
        $contents = $this->view('Registration', [
            'name' => ['Welcome To Patient Experience Tracker', 'Sign Up as New User', 'All fields are required']
        ]);

        $contents->assertSee('Welcome To Patient Experience Tracker', 'Sign Up as New User', 'All fields are required');
    }



    public function testListButton()
    {
        $contents = $this->view('Registration', [
            'button' => ['Sign Up', 'Patient Login', 'Submit']
        ]);

        $contents->assertSee('Sign Up', 'Patient Login', 'Submit' );
    }



}
