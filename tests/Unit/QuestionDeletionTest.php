<?php
// NOTE: Please before you start testing the code make sure that the view does not have any variable. If the view has any variable,
// please comment the part which has the variables. The reason is theis testing is jusy fro review and it is seperated from the controller.
namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class QuestionDeletionTest extends TestCase
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

        $title = $this->view('question_deletion_confirmation_page');

        $title->assertSee('Question Deletion Confirmation');

    }

    public function testButton()
    {
        $contents = $this->view('question_deletion_confirmation_page', [
            'button' => 'Save to file'
        ]);

        $contents->assertSee('Save to file');
    }

    public function testParagraph1()
    {
        $contents = $this->view('question_deletion_confirmation_page', [
            'P' => ' After saving local copy of the report, click'
        ]);

        $contents->assertSee(' After saving local copy of the report, click'
            );
    }


    public function testParagraph2()
    {
        $contents = $this->view('question_deletion_confirmation_page', [
            'P' => 'submit below'
        ]);

        $contents->assertSee('submit below');
    }
}
