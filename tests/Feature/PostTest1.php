<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostTest1 extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_asserting_a_json_paths_value()
    {
        $response = $this->json('POST', '/profilereport', ["inputEmail" => "testpatientone@test.ca",
  "inputFirstName" => "TestPatientOneFirst",
  "inputLastName" => "TestPatientOneLast"]);

        $response
            ->assertStatus(200);
       // ->assertJsonPath('team.owner.name', 'Darian');
    }
}

