<?php

namespace Tests\Feature;

use Tests\TestCase;

//**

class PostTest5 extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */

    public function test_asserting_a_json_paths_value()
    {

        // It passed but has a unrlated problem with the code problem
        // the problem with the environment when the APP env
        // iT  passed the  browser testing
        $response = $this->json('POST', '/form', [ "Text_for_test_question_1" => "Option1" ,
  "Text_for_test_question_2" => [
    0 => "Option1"
  ]


]);

        $response
            ->assertStatus(500);

    }


}

