<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
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
        // $response->dump();
        $response
        ->assertStatus(200)
        ->assertJson(function(AssertableJson $json){
            $json->where('message','Success Get')
            ->has('data',fn($json)=>
                $json->hasAll('data','path','per_page','next_page_url','prev_page_url')
                ->etc()
            );
        });

        // Check if user authenticated
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Testing list pertanyaan but no login
     */
    public function test_list_pertanyaan_forbidden()
    {
        $response = $this->get('/api/pertanyaan');
        
        $response->assertStatus(302);
        $this->assertGuest();
    }
}
