<?php

namespace Database\Seeders;

use App\Models\Jawaban;
use App\Models\Kategori;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Database\Seeder;

class BigLoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "seed User\n";
       User::factory()->count(5000)->create();
       echo "seed User finish \n";
       echo "seed Kategori \n";
       Kategori::factory()->count(5000)->create();
       echo "seed Kategori Finish\n";
       echo "seed Pertanyaan \n";
       Pertanyaan::factory()->count(10000)->create();
       echo "seed Kategori Finish\n";
       echo "seed Jawaban \n";
       Jawaban::factory()->count(10000)->create();
       echo "seed Jawaban Finish \n";
    }
}
