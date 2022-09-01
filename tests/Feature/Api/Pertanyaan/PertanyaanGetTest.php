<?php

namespace Tests\Feature\Api\Pertanyaan;

use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PertanyaanGetTest extends TestCase
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

    /**
     * Testing Pertanyaan Detail authenticated
     */
    public function test_view_detail_pertanyaan()
    {
        $user = User::factory()->make();
        $pertanyaan = Pertanyaan::factory()->make();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/api/pertanyaan/'.$pertanyaan->id);

        $response->assertStatus(200)
            ->assertJson(function(AssertableJson $json){
                $json->where('message','Success Get')
                ->has('data');
            });
        
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Testing Pertanyaan Detail not Login
     */
    public function test_view_detail_pertanyaan_forbidden()
    {
        $pertanyaan = Pertanyaan::factory()->make();
        $response = $this->get('/api/pertanyaan'.$pertanyaan->id);
        $this->assertGuest();
    }
}
