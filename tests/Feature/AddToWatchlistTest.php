<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddToWatchlistTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function user_can_add_to_watchlist()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function user_can_remove_from_watchlist()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
