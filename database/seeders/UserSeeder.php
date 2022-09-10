<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'nama' => 'dana',
            'email' => 'dana@gmail.com',
            'password' => bcrypt('dana'),
        ];

        User::updateOrCreate($data);
    }
}
