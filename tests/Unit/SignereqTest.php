<?php
// NOTE: Please before you start testing the code make sure that the view does not have any variable. If the view has any variable,
// please comment the part which has the variables. The reason is theis testing is jusy fro review and it is seperated from the controller.
namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class SignereqTest extends TestCase
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

        $header = $this->view('signreq');

        $header->assertSee('Patient Experience Tracker');

        $paragraph = $this->view('signreq');

        $paragraph->assertSee('Patient Experience Tracker');

    }


}
