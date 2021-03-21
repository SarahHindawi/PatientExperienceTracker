<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostTest3 extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_asserting_a_json_paths_value()
    {

        $response = $this->json('POST', '/passwordreset', ["Nairouz Mayaleh (nmayaleh@upei.ca)" => "Accept",
            "Majd Mayaleh (mmayaleh@upei.ca)" => "Accept"]);

        $response
            ->assertStatus(200);

    }
}

