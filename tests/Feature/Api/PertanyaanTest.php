<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PertanyaanTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_pertanyaan_paginate_success()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/api/pertanyaan');

        $response->assertStatus(200);
    }

    /**
     * Testing list pertanyaan but no login
     */
    public function test_list_pertanyaan_forbidden()
    {
        $response = $this->get('/api/pertanyaan');
        
        $response->assertStatus(302);
    }
}
