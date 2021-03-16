<?php
//NOTE: Please before you start testing the code make sure that the view does not have any variable. If the view has any variable,
// please comment the part which has the variables. The reason is theis testing is jusy fro review and it is seperated from the controller.
namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class admin_dashbiard_Test extends TestCase
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

        $contents = $this->view('admin_dashboard_page');

        $contents->assertSee('Admin Dashboard');

    }

    public function testButton()
    {
        $contents = $this->view('admin_dashboard_page', [
            'name' => 'Dropdown'
        ]);

        $contents->assertSee('New Patient Registeration Click here to review');
    }

    public function testListButton()
    {
        $contents = $this->view('admin_dashboard_page', [
            'name' => ['Patient Password Reset Requests. Click here to review', 'View Summary of Patient', 'Generate Report of PERMS and PROMS Survey Data', 'Modify Survey Add or Remove Questions', 'Change Your Password', 'ADMIN Help']
        ]);

        $contents->assertSee('Patient Password Reset Requests. Click here to review', 'View Summary of Patient', 'Generate Report of PERMS and PROMS Survey Data', 'Modify Survey Add or Remove Questions', 'Change Your Password','ADMIN Help' );
    }



}
