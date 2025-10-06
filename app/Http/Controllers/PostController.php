<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'title' => 'Laravel 11',
                'excerpt' => 'Reverb',
                'author' => 'Admin',
                'date' => now()
            ],
            [
                'title' => 'Blade Components',
                'excerpt' => 'Components',
                'author' => 'Editor',
                'date' => now()->subDays(2)
            ],
            [
                'title' => 'Vite',
                'excerpt' => 'Text',
                'author' => 'Admin',
                'date' => now()->subWeek()
            ],
        ];

        return view('posts.index', ['title' => 'Пости', 'posts' => $posts]);
    }
}
