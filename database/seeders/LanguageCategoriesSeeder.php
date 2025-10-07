<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $categories = [
        ['name' => 'Англійська', 'slug' => 'english'],
        ['name' => 'Німецька', 'slug' => 'german'],
        ['name' => 'Французька', 'slug' => 'french'],
        ['name' => 'Іспанська', 'slug' => 'spanish'],
    ];

    foreach ($categories as $category) {
        Category::create($category);
    }
}
}
