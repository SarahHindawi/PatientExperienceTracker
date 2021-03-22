<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostTest4 extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_asserting_a_json_paths_value()
    {

        $response = $this->json('POST', '/report', [ "surveyName" => "IBDPREM_One",
  "gender" => "male",
  "age" => "all",
  "ageAbove" => "",
  "ageBelow" => "",
  "ageEquals" => "",
  "weight" => "all",
  "weightAbove" => "",
  "weightBelow" => "",
  "weightEquals" => "",
  "height" => "all",
  "heightAbove" => "",
  "heightBelow" => "",
  "heightEquals" => "",
  "medicationUsage" => "none"

]);

        $response
            ->assertStatus(500);

    }
}

