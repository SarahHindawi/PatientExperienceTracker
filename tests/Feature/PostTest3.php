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
//"nairouz Mam (neyrouze.mah@gmail.com)" => "Accept",
        $response = $this->json('POST', '/passwordreset', [
            ]);

        $response
            ->assertStatus(200);

    }
}

