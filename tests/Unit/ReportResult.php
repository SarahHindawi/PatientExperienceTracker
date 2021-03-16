<?php
//NOTE: Please before you start testing the code make sure that the view does not have any variable. If the view has any variable,
// please comment the part which has the variables. The reason is theis testing is jusy fro review and it is seperated from the controller.
namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class ReportResult extends TestCase
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

        $contents = $this->view('report_result_page');

        $contents->assertSee('Report_Result');

    }

    public function testTile()
    {

        $contents = $this->view('report_result_page');

        $contents->assertSee('Report Result');

    }

    public function testButtons(){
        $contents = $this->view('report_result_page',[
            'button'=> 'Save to file'
        ]);
        $contents->assertSee('Save to file');

    }




}
