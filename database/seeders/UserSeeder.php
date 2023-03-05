<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Nico',
            'pseudo' => 'Separa',
            'email' => 'carrenicolas18@gmail.com',
            'password' => Hash::make('test'),
            'avatar' => '/storage/images/EVxGNUzFjBnr03AoRS8Hq8cZcQCyMDFrs3VcKDQs.png',
        ]);

        \App\Models\User::factory(10)->create();
    }
}
