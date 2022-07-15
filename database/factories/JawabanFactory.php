<?php

namespace Database\Factories;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JawabanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Jawaban::class;
    public function definition()
    {
        // $pertanyaan = Pertanyaan::get('id');
        // $pertanyaanId =[];
        // foreach ($pertanyaan as $pertan ) {
        //     array_push($pertanyaanId,$pertan->id);
        // }
        
        // $users = User::get('id');
        // $userId =[];
        // foreach ($users as $user ) {
        //     array_push($userId,$user->id);
        // }

        return [
            'body' => $this->faker->text(500),
            'pertanyaan_id' => $this->faker->numberBetween(1,100),
            'user_id' => $this->faker->numberBetween(1,100),
            'quill_delta' => $this->faker->text(500),
            'vote' => $this->faker->numberBetween(0,1000),
        ];
    }
}
