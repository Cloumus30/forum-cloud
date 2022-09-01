<?php

namespace Tests\Feature\Api\Pertanyaan;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PertanyaanInsertTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_insert_pertanyaan_success()
    {
        $user = User::factory()->create();
        $kategori = Kategori::create([
            'nama' => 'kategori Coba',
            'deskripsi' => 'Deskripsi Kategori Coba',
            'user_id' => $user->id,
        ]);
        $response = $this->actingAs($user)
        ->withSession(['banned' => false,])
        ->post('/api/pertanyaan/',[
            'judul' => 'Pertanyaan Coba',
            'body' => 'Pertanyaan Uji Coba Body',
            'overview' => 'Pertanyaan Uji oba Overview',
            'quill_delta' => 'Quill Delta Percobaan',
            'kategori_id' => $kategori->id ?? 1,
        ]);

        $response->assertStatus(200)
        ->assertJson(function(AssertableJson $json){
            $json->where('message','Success Insert')
            ->has('data');
        });
        $this->assertDatabaseHas('pertanyaans',[
            'judul' => 'Pertanyaan Coba',
            'body' => 'Pertanyaan Uji Coba Body',
            'overview' => 'Pertanyaan Uji oba Overview',
            'quill_delta' => 'Quill Delta Percobaan',
            'kategori_id' => $kategori->id ?? 1,
        ]);

    }

    /**
     * public function Insert Pertanyaan Not Login
     */
    public function test_insert_pertanyaan_unauthenticated()
    {
        $response = $this->post('/api/pertanyaan/');

        $response->assertStatus(302);
        $this->assertGuest();
    }

    /**
     * Insert Pertanyaan with no Body
     * Validation Test
     */
    public function test_insert_pertanyaan_no_body()
    {
        $user = User::factory()->create();
        $kategori = Kategori::create([
            'nama' => 'kategori Coba',
            'deskripsi' => 'Deskripsi Kategori Coba',
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
        ->withSession(['banned' => false,])
        ->post('/api/pertanyaan/');

        $response->assertStatus(400)
        ->assertJson(function(AssertableJson $json){
            $json->where('message','Failed Request')
            ->whereType('error','array');
        });
    }
}
