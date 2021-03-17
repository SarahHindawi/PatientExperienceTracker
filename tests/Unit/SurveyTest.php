<?php
// NOTE: Please before you start testing the code make sure that the view does not have any variable. If the view has any variable,
// please comment the part which has the variables. The reason is theis testing is jusy fro review and it is seperated from the controller.
namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class SurveyTest extends TestCase
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

        $contents = $this->view('survey');

        $contents->assertSee('Modify Survey');

    }

    public function testButton()
    {
        $contents = $this->view('survey', [
            'button' => 'Submit'
        ]);

        $contents->assertSee('Submit');
    }

    public function testParagraph1()
    {
        $contents = $this->view('survey', [
            'P' => 'Complete a
                            Survey'
        ]);

        $contents->assertSee('Complete a
                            Survey');
    }


    public function testParagraph2()
    {
        $contents = $this->view('survey', [
            'P' => 'Change Password'
        ]);

        $contents->assertSee('Change Password');
    }
}
