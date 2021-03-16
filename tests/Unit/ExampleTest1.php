<?php
//NOTE: Please before you start testing the code make sure that the view does not have any variable. If the view has any variable,
// please comment the part which has the variables. The reason is theis testing is jusy fro review and it is seperated from the controller.
namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class ExampleTest1 extends TestCase
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

        $contents = $this->view('ProfileSummary');

        $contents->assertSee('Patient Profile Search');

    }

    public function testButton()
    {
        $contents = $this->view('ProfileSummary', [
            'name' => 'Dropdown'
        ]);

        $contents->assertSee('Dropdown');
    }

    public function testListButton()
    {
        $contents = $this->view('ProfileSummary', [
            'name' => ['Dropdown', 'Action']
        ]);

        $contents->assertSee('Dropdown', 'Action');
    }


//    public function testLink(){
//
//        $this->view('ProfileSummary')->assertSeeTitle('Patient Report Search');
////        $this->view('ProfileSummary', ['logged' => false)->assertDontSeeLink('to/path');
////        $this->view('ProfileSummary', ['link' => 'blabla')->assertSeeLink('blabla');
//    }
}
