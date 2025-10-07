<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserCardProgress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LanguageCardsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = collect(['Англійська', 'Німецька', 'Французька', 'Іспанська'])->map(function ($name) {
            return Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => fake()->sentence()
            ]);
        });

        $tags = collect(['Дієслова', 'Іменники', 'Прикметники', 'Фрази', 'Ділова лексика'])->map(function ($name) {
            return Tag::create([
                'name' => $name,
                'slug' => Str::slug($name)
            ]);
        });

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@language-cards.com'
        ]);

        Card::factory(20)->create([
            'user_id' => $user->id,
            'category_id' => $categories->random()->id,
        ])->each(function (Card $card) use ($tags) {
            $card->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
        });


        UserCardProgress::factory(15)->create([
            'user_id' => $user->id,
        ]);
    }
}