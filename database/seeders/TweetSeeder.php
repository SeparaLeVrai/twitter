<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Tweet::factory(50)->create();
    }
}
