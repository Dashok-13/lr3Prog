<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $englishWords = [
            'apple' => 'яблуко',
            'book' => 'книга',
            'computer' => 'компьютер',
            'water' => 'вода',
            'friend' => 'друг',
            'house' => 'будинок',
            'school' => 'школа',
            'work' => 'робота',
            'time' => 'час',
            'love' => 'любов'
        ];

        $germanWords = [
            'Haus' => 'будинок',
            'Buch' => 'книга',
            'Freund' => 'друг',
            'Arbeit' => 'робота',
            'Zeit' => 'час'
        ];

        $wordPairs = array_merge($englishWords, $germanWords);
        $frontText = array_rand($wordPairs);
        $backText = $wordPairs[$frontText];

        return [
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'front_text' => $frontText,
            'back_text' => $backText,
            'example_sentence' => $this->faker->sentence(),
            'pronunciation' => $this->faker->word(),
            'difficulty_level' => $this->faker->numberBetween(1, 5),
            'next_review_at' => $this->faker->dateTimeBetween('now', '+1 week'),
            'is_public' => $this->faker->boolean(70),
        ];
    }
}