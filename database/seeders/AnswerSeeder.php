<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Answer::factory(100)->create();
    }
}
