@extends('layouts.app')

@section('title', $card->front_text)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $card->front_text }}</h1>
            <div class="flex items-center space-x-4 text-sm text-gray-500">
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full">
                    {{ $card->category->name }}
                </span>
                <span>Рівень: {{ $card->difficulty_level }}/5</span>
                <span>Автор: {{ $card->author->name }}</span>
            </div>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('cards.edit', $card) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm">
                Редагувати
            </a>
            <form action="{{ route('cards.destroy', $card) }}" method="POST" onsubmit="return confirm('Видалити цю картку?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm">
                    Видалити
                </button>
            </form>
        </div>
    </div>
 
    <div class="grid md:grid-cols-2 gap-8 mb-8">
        <div class="bg-blue-50 p-6 rounded-xl border-2 border-blue-200">
            <h3 class="text-lg font-semibold text-blue-800 mb-4">🇺🇦 Слово/Фраза</h3>
            <p class="text-2xl font-bold text-gray-900 mb-2">{{ $card->front_text }}</p>
            @if($card->pronunciation)
                <p class="text-gray-600 italic">🔊 Вимова: {{ $card->pronunciation }}</p>
            @endif
        </div>
 
        <div class="bg-green-50 p-6 rounded-xl border-2 border-green-200">
            <h3 class="text-lg font-semibold text-green-800 mb-4">🇬🇧 Переклад</h3>
            <p class="text-xl text-gray-900 mb-4">{{ $card->back_text }}</p>
            @if($card->example_sentence)
                <div class="mt-4 p-3 bg-white rounded-lg">
                    <h4 class="font-semibold text-gray-700 mb-2">💬 Приклад використання:</h4>
                    <p class="text-gray-600 italic">"{{ $card->example_sentence }}"</p>
                </div>
            @endif
        </div>
    </div>
 
    @if($card->tags->count())
        <div class="mb-8">
            <h3 class="text-lg font-semibold mb-3">🏷️ Теги:</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($card->tags as $tag)
                    <a href="{{ route('tags.show', $tag) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm transition-colors">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>
    @endif
 
    <div class="flex justify-between items-center pt-6 border-t border-gray-200">
        <a href="{{ route('cards.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            ← Назад до всіх карток
        </a>
        <a href="{{ route('cards.study') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-medium">
            🎓 Почати навчання з цією карткою
        </a>
    </div>
</div>
@endsection
