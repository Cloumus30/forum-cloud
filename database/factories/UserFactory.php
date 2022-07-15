<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->asciify('********@*****.com'),
            'tgl_lahir' => $this->faker->date(),
            'umur' => $this->faker->numberBetween(0,80),
            'alamat' => $this->faker->asciify('alamat di *****'),
            'password' => Hash::make('12345678'), // password
        ];
    }
}
