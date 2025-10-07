@extends('layouts.app')

@section('title', 'Категорії мов')

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">📁 Категорії мов</h1>
    <p class="text-gray-600 mb-8">Оберіть мову для вивчення</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
            <a href="{{ route('categories.show', $category) }}" 
               class="bg-white rounded-xl shadow-md border border-gray-200 hover:shadow-lg hover:border-blue-300 transition-all duration-300 group">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600">
                            {{ $category->name }}
                        </h3>
                        <span class="text-2xl">
                            @switch($category->name)
                                @case('Англійська') 🇬🇧 @break
                                @case('Німецька') 🇩🇪 @break
                                @case('Французька') 🇫🇷 @break
                                @case('Іспанська') 🇪🇸 @break
                                @case('Польська') 🇵🇱 @break
                                @case('Італійська') 🇮🇹 @break
                                @default 🌍
                            @endswitch
                        </span>
                    </div>
                    
                    @if($category->description)
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $category->description }}</p>
                    @endif

                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <span>📚 {{ $category->cards_count ?? $category->cards->count() }} карток</span>
                        <span class="group-hover:text-blue-600 font-medium">
                            Перейти →
                        </span>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">📚</div>
                <p class="text-gray-500 text-lg mb-4">Поки що немає категорій.</p>
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
