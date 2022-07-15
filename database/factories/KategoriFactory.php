<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Kategori::class;
    public function definition()
    {
        // $users = User::get('id');
        // $userId = [];
        // foreach ($users as $user) {
        //     array_push($userId,$user->id);
        // }
        // dd($userId);
        return [
            'nama' => $this->faker->asciify('*****'),
            'deskripsi' => $this->faker->text(50),
            'user_id' => $this->faker->numberBetween(1,100),
        ];
    }
}
