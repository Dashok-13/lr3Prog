<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserCardProgress>
 */
class UserCardProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'card_id' => \App\Models\Card::factory(),
            'correct_answers' => $this->faker->numberBetween(0, 10),
            'incorrect_answers' => $this->faker->numberBetween(0, 5),
            'confidence_level' => $this->faker->randomFloat(2, 0, 1),
            'last_reviewed_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'next_review_at' => $this->faker->dateTimeBetween('now', '+2 weeks'),
            'is_learned' => $this->faker->boolean(30), 
        ];
    }
}