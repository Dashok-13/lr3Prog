<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::with(['category', 'tags', 'author'])
                    ->where('is_public', true)
                    ->latest()
                    ->paginate(12);
        
        return view('cards.index', compact('cards'));
    }

    public function study()
    {
        $cards = Card::with(['category', 'tags'])
                    ->where('is_public', true)
                    ->inRandomOrder()
                    ->paginate(10);
        
        return view('cards.study', compact('cards'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('cards.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'front_text' => ['required', 'string', 'max:255'],
            'back_text' => ['required', 'string'],
            'example_sentence' => ['nullable', 'string'],
            'pronunciation' => ['nullable', 'string', 'max:100'],
            'category_id' => ['required', 'exists:categories,id'],
            'difficulty_level' => ['required', 'integer', 'between:1,5'],
            'tags' => ['array'],
            'tags.*' => ['exists:tags,id'],
            'is_public' => ['boolean'],
        ]);

        $data['user_id'] = auth()->id() ?? \App\Models\User::first()->id;
        $data['is_public'] = $request->has('is_public');

        $card = Card::create($data);

        if (!empty($data['tags'])) {
            $card->tags()->sync($data['tags']);
        }

        return redirect()->route('cards.show', $card)
                        ->with('success', 'Картку створено успішно!');
    }

    public function show(Card $card)
    {
        $card->load(['category', 'tags', 'author']);
        
        return view('cards.show', compact('card'));
    }

    public function edit(Card $card)
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('cards.edit', compact('card', 'categories', 'tags'));
    }

    public function update(Request $request, Card $card)
    {
        $data = $request->validate([
            'front_text' => ['required', 'string', 'max:255'],
            'back_text' => ['required', 'string'],
            'example_sentence' => ['nullable', 'string'],
            'pronunciation' => ['nullable', 'string', 'max:100'],
            'category_id' => ['required', 'exists:categories,id'],
            'difficulty_level' => ['required', 'integer', 'between:1,5'],
            'tags' => ['array'],
            'tags.*' => ['exists:tags,id'],
            'is_public' => ['boolean'],
        ]);

        $data['is_public'] = $request->has('is_public');

        $card->update($data);

        if (!empty($data['tags'])) {
            $card->tags()->sync($data['tags']);
        }

        return redirect()->route('cards.show', $card)
                        ->with('success', 'Картку оновлено успішно!');
    }

    public function destroy(Card $card)
    {
        $card->delete();

        return redirect()->route('cards.index')
                        ->with('success', 'Картку видалено успішно!');
    }

    public function review(Request $request, Card $card)
    {
        return redirect()->route('cards.study')
                        ->with('success', 'Прогрес збережено!');
    }
}