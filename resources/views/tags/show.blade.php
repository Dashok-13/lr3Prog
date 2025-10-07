@extends('layouts.app')

@section('title', $tag->name . ' - картки для вивчення')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl text-white p-8 mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold mb-2">🏷️ {{ $tag->name }}</h1>
                <p class="text-purple-100 mt-4">📚 Доступно {{ $cards->total() }} карток з цим тегом</p>
            </div>
            <div class="text-6xl">🏷️</div>
        </div>
    </div>
 
    <div class="mb-6 flex space-x-4">
        <a href="{{ route('cards.study') }}?tag={{ $tag->id }}" 
           class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-medium">
            🎓 Навчатися з цим тегом
        </a>
        <a href="{{ route('cards.create') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium">
            ➕ Додати картку з цим тегом
        </a>
    </div>
 
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($cards as $card)
            <div class="bg-white rounded-xl shadow-md border border-gray-200 hover:shadow-lg transition-all duration-300">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                            {{ $card->category->name }}
                        </span>
                        <span class="text-sm text-gray-500">
                            Рівень: {{ $card->difficulty_level }}/5
                        </span>
                    </div>
 
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $card->front_text }}</h3>
                        <p class="text-gray-600">{{ Str::limit($card->back_text, 80) }}</p>
                    </div>
 
                    @if($card->example_sentence)
                        <div class="mb-4 p-3 bg-yellow-50 rounded-lg">
                            <p class="text-sm text-gray-700 italic">"{{ $card->example_sentence }}"</p>
                        </div>
                    @endif
 
                    @if($card->tags->count() > 1)
                        <div class="flex flex-wrap gap-1 mb-4">
                            @foreach($card->tags->where('id', '!=', $tag->id) as $otherTag)
                                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                    {{ $otherTag->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif
 
                    <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                        <span class="text-sm text-gray-500">
                            Автор: {{ $card->author->name }}
                        </span>
                        <a href="{{ route('cards.show', $card) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                            Детальніше →
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">📚</div>
                <p class="text-gray-500 text-lg mb-4">Поки що немає карток з цим тегом.</p>
                <a href="{{ route('cards.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium">
                    Створити першу картку
                </a>
            </div>
        @endforelse
    </div>
 
    @if($cards->hasPages())
        <div class="mt-8">
            {{ $cards->links() }}
        </div>
    @endif
 
    <div class="mt-8 flex justify-between">
        <a href="{{ route('tags.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            ← Всі теги
        </a>
        <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-medium">
            На головну
        </a>
    </div>
</div>
@endsection
