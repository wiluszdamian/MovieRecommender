<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecommendationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function recommendation_movie()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function recommendation_tv()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
