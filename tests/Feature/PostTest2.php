<?php

namespace Tests\Feature;

use Tests\TestCase;
//**
class PostTest2 extends TestCase
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
        $response = $this->json('POST', '/accept', ["TestPatienttwoFirst TestPatientOneLast (testpatientotwo@test.ca)" => "Accept"]);

        $response
            ->assertStatus(500);

    }
}

