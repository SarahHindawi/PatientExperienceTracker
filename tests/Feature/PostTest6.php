<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostTest6 extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_asserting_a_json_paths_value()
    {
        $response = $this->json('POST', '/addsurvey', ["SurveyName" => "Nairouz",
            "ConditionServed" => "IBD",
            "SurveyType" => "PROM"]);

        $response
            ->assertStatus(200);
       // ->assertJsonPath('team.owner.name', 'Darian');
    }
}

