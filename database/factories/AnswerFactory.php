<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::get()->random()->id,
            'tweet_id' => \App\Models\Tweet::get()->random()->id,
            'body' => fake()->realTextBetween($minNbChars = 20, $maxNbChars = 400),
            'created_at' => fake()->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
