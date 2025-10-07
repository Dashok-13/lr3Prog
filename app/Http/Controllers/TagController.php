<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('cards')->get();
        return view('tags.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $cards = $tag->cards()
                     ->with(['category', 'author'])
                     ->where('is_public', true)
                     ->latest()
                     ->paginate(12);
        
        return view('tags.show', compact('tag', 'cards'));
    }
}
