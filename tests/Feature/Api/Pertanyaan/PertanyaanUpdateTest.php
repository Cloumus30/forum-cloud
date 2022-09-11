<?php

namespace Tests\Feature\Api\Pertanyaan;

use App\Models\Kategori;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PertanyaanUpdateTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

     /**
      * Test Pertanyaan Update Success Case
      */
    public function test_update_pertanyaan_success()
    {
        $user = User::factory()->create();
        $kategori = Kategori::factory()->create([
            'user_id' => $user->id,
        ]);
        $pertanyaan = Pertanyaan::factory()->create([
            'kategori_id' => $kategori->id,
            'user_id' => $user->id,
        ]);
        $dummy = [
            'judul' => $this->faker()->text(255),
            'body' => $this->faker()->text(300),
            'overview' => $this->faker()->text(255),
            'quill_delta' => $this->faker()->text(300),
            'kategori_id' => $kategori->id,
        ];
        $response = $this->actingAs($user)
        ->withSession(['banned'=>false])
        ->put('/api/pertanyaan/'.$pertanyaan->id,$dummy);
        
        $response->assertStatus(200)
        ->assertJson(function(AssertableJson $json){
            $json->where('message','Success Update')
            ->has('data');
        });
        
        $this->assertDatabaseHas('pertanyaans',$dummy);
        
    }

    /**
     * Test Pertanyaan No Login Case
     * Forbidden
     */
    public function test_update_pertanyaan_unauthenticated(){
        $user = User::factory()->create();
        $kategori = Kategori::factory()->create([
            'user_id' => $user->id,
        ]);
        $pertanyaan = Pertanyaan::factory()->create([
            'kategori_id' => $kategori->id,
            'user_id' => $user->id,
        ]);
        $dummy = [
            'judul' => $this->faker()->text(255),
            'body' => $this->faker()->text(300),
            'overview' => $this->faker()->text(300),
            'quill_delta' => $this->faker()->text(300),
            'kategori_id' => $kategori->id,
        ];
        $response = $this->put('/api/pertanyaan/'.$pertanyaan->id,$dummy);
        $response->assertStatus(302);
        $this->assertDatabaseMissing('pertanyaans',$dummy);
    }

    /**
     * Test Pertanyaan with no Body
     * Validation Test
     */
    public function test_update_pertanyaan_no_body()
    {
        $user = User::factory()->create();
        $kategori = Kategori::factory()->create([
            'user_id' => $user->id,
        ]);
        $pertanyaan = Pertanyaan::factory()->create([
            'kategori_id' => $kategori->id,
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
        ->withSession(['banned' => false])
        ->put('/api/pertanyaan/'.$pertanyaan->id,[]);
        
        $response->assertStatus(400)
        ->assertJson(function(AssertableJson $json){
            $json->where('message', 'Failed Request')
            ->whereType('errors','array');
        });
    }

     /**
     * Test Pertanyaan If Data not Found
     * Error Not Found Data Test
     */
    public function test_update_pertanyaan_no_found()
    {
        $user = User::factory()->create();
        $kategori = Kategori::factory()->create([
            'user_id' => $user->id,
        ]);
        $pertanyaan = Pertanyaan::factory()->create([
            'kategori_id' => $kategori->id,
            'user_id' => $user->id,
        ]);
        $dummy = [
            'judul' => $this->faker()->text(255),
            'body' => $this->faker()->text(300),
            'overview' => $this->faker()->text(300),
            'quill_delta' => $this->faker()->text(300),
            'kategori_id' => $kategori->id,
        ];

        $response = $this->actingAs($user)
        ->withSession(['banned' => false])
        ->put('/api/pertanyaan/'.($pertanyaan->id+100),$dummy);
        
        $response->assertStatus(404)
        ->assertJson(function(AssertableJson $json){
            $json->where('message', 'Failed Request')
            ->whereType('errors','array');
            // ->assertJson(function(AssertableJson $js){
            //     $js->where
            // });
        });
        // dd($response);
    }
}
