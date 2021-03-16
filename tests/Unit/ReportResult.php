<?php

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
