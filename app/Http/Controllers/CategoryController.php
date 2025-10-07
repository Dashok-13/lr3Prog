<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('cards')->get();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $cards = $category->cards()
                         ->with(['tags', 'author'])
                         ->where('is_public', true)
                         ->latest()
                         ->paginate(12);
        
        return view('categories.show', compact('category', 'cards'));
    }
}
