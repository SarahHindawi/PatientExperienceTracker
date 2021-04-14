<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostTest8 extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_asserting_a_json_paths_value()
    {
        $response = $this->json('POST', '/adminform/create', [
            "SurveyName"=>"Nairouz",
            "qNumber" => 4,
            "qType" => "DropDown",
            "qText" => "required"
        ]);

        $response
            ->assertStatus(200);
        // ->assertJsonPath('team.owner.name', 'Darian');
    }
}
