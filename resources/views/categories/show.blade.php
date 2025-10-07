@extends('layouts.app')

@section('title', $category->name . ' - картки для вивчення')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl text-white p-8 mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold mb-2">{{ $category->name }}</h1>
                @if($category->description)
                    <p class="text-blue-100 text-lg">{{ $category->description }}</p>
                @endif
                <p class="text-blue-100 mt-4">📚 Доступно {{ $cards->total() }} карток для вивчення</p>
            </div>
            <div class="text-6xl">
                @switch($category->name)
                    @case('Англійська') 🇬🇧 @break
                    @case('Німецька') 🇩🇪 @break
                    @case('Французька') 🇫🇷 @break
                    @case('Іспанська') 🇪🇸 @break
                    @case('Польська') 🇵🇱 @break
                    @case('Італійська') 🇮🇹 @break
                    @default 🌍
                @endswitch
            </div>
        </div>
    </div>
 
    <div class="mb-6 flex space-x-4">
        <a href="{{ route('cards.study') }}?category={{ $category->id }}" 
           class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-medium">
            🎓 Навчатися з цією категорією
        </a>
        <a href="{{ route('cards.create') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium">
            ➕ Додати картку до цієї категорії
        </a>
    </div>
 
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($cards as $card)
            <div class="bg-white rounded-xl shadow-md border border-gray-200 hover:shadow-lg transition-all duration-300">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">
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
                <p class="text-gray-500 text-lg mb-4">Поки що немає карток у цій категорії.</p>
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
        <a href="{{ route('categories.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            ← Всі категорії
        </a>
        <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-medium">
            На головну
        </a>
    </div>
</div>
@endsection
