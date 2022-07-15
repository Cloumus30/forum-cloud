<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PertanyaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Pertanyaan::class;
    public function definition()
    {
        // $kategori = Kategori::get('id');
        // $kategoriId = [];
        // foreach ($kategori as $kateg ) {
        //     array_push($kategoriId,$kateg->id);
        // }

        // $users = User::get('id');
        // $userId =[];
        // foreach ($users as $user ) {
        //     array_push($userId,$user->id);
        // }

        return [
            'judul' => $this->faker->title(),
            'body' => $this->faker->text(500),
            'overview' => $this->faker->text(100),
            'quill_delta' => $this->faker->text(500),
            'waktu_tanya' => $this->faker->dateTime(),
            'kategori_id' => $this->faker->numberBetween(1,100),
            'user_id' => $this->faker->numberBetween(1,100),
        ];
    }
}
