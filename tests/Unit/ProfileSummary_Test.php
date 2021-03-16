<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class ProfileSummary_Test extends TestCase
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

        $contents = $this->view('ProfileSummary', [
            'title'=>'Patient Report Search'
        ]);

        $contents->assertSee('Patient Report Search');

    }

    public function testDashboard()
    {
        $contents = $this->view('ProfileSummary', [
            'p' => ['Dashboard', 'Patient Registeration', 'Password
                            Reset', 'Patient
                            Summary', 'Generate
                            Report', 'Modify
                            Survey', 'Change
                            Password', 'Admin
                            Help']
        ]);

        $contents->assertSee('Dashboard', 'Registeration', 'Password
                            Reset', 'Patient
                            Summary', 'Generate
                            Report', 'Modify
                            Survey', 'Change
                            Password', 'Admin
                            Help');
    }



    public function testListLabels()
    {
        $contents = $this->view('ProfileSummary', [
            'labels' => ['Email', 'First Name', 'Last Name']
        ]);

        $contents->assertSee('Email', 'First Name', 'Last Name');
    }

    public function testButtons(){
        $contents = $this->view('ProfileSummary',[
            'button'=> 'Search'
        ]);
        $contents->assertSee('Search');

    }


}
