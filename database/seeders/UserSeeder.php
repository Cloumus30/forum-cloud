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
            [
                'nama' => 'dana',
                'email' => 'dana@mail.com',
                'password' => bcrypt('dana'),
            ],
            [
                'nama' => 'imani',
                'email' => 'imani@mail.com',
                'password' => bcrypt('imani'),
            ]
        ];

        foreach ($data as  $value) {
            $email = $value['email'];
            User::updateOrCreate([
                'email' => $email,
            ],$value);    
        }
        
    }
}
