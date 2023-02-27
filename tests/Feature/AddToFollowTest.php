<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddToFollowTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function user_can_add_to_follow()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function user_can_remove_from_follow()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
