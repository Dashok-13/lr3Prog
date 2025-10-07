@extends('layouts.app')

@section('title', 'Всі картки для вивчення')

@section('content')
<div class="mb-6 flex space-x-4">
    <a href="{{ route('cards.study') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-medium">
        🎓 Почати навчання
    </a>
    <a href="{{ route('cards.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium">
        ➕ Створити картку
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($cards as $card)
        <div class="bg-white rounded-xl shadow-md border border-gray-200 hover:shadow-lg transition-all duration-300">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">
                        {{ $card->category->name }}
                    </span>
                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">
                        Рівень: {{ $card->difficulty_level }}/5
                    </span>
                </div>
 
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $card->front_text }}</h3>
                    <p class="text-gray-600">{{ Str::limit($card->back_text, 100) }}</p>
                </div>
 
                @if($card->example_sentence)
                    <div class="mb-4 p-3 bg-yellow-50 rounded-lg">
                        <p class="text-sm text-gray-700 italic">"{{ $card->example_sentence }}"</p>
                    </div>
                @endif
 
                @if($card->tags->count())
                    <div class="flex flex-wrap gap-1 mb-4">
                        @foreach($card->tags as $tag)
                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                {{ $tag->name }}
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
            <p class="text-gray-500 text-lg mb-4">Поки що немає карток для вивчення.</p>
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
@endsection
