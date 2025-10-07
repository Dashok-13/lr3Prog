@extends('layouts.app')

@section('title', 'Теги для карток')

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">🏷️ Теги для карток</h1>
    <p class="text-gray-600 mb-8">Оберіть тему для вивчення</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($tags as $tag)
            <a href="{{ route('tags.show', $tag) }}" 
               class="bg-white rounded-xl shadow-md border border-gray-200 hover:shadow-lg hover:border-purple-300 transition-all duration-300 group">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-600">
                            {{ $tag->name }}
                        </h3>
                        <span class="text-2xl">🏷️</span>
                    </div>

                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <span>📚 {{ $tag->cards_count ?? $tag->cards->count() }} карток</span>
                        <span class="group-hover:text-purple-600 font-medium">
                            Перейти →
                        </span>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">🏷️</div>
                <p class="text-gray-500 text-lg mb-4">Поки що немає тегів.</p>
                <a href="{{ route('cards.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium">
                    Створити першу картку
                </a>
            </div>
        @endforelse
    </div>
 
    <div class="mt-8 flex justify-center">
        <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-medium">
            ← Назад до всіх карток
        </a>
    </div>
</div>
@endsection
