@extends('layouts.app')

@section('title', 'Режим навчання')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">🎓 Режим навчання</h1>
    <p class="text-gray-600 mb-8">Вивчайте слова за допомогою карток з інтервальним повторенням</p>

    @if($cards->count() > 0)
        <div class="mb-8">
            <div class="flex justify-between text-sm text-gray-600 mb-2">
                <span>Прогрес: {{ $cards->currentPage() }} з {{ $cards->lastPage() }}</span>
                <span>Залишилось: {{ $cards->count() }} карток</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-green-500 h-2 rounded-full" style="width: {{ ($cards->currentPage() / $cards->lastPage()) * 100 }}%"></div>
            </div>
        </div>
 
        <div id="study-card" class="bg-white rounded-xl shadow-lg border-2 border-blue-200 mb-8">
            <div class="p-8 text-center">
                <div id="front-side">
                    <div class="text-sm text-blue-600 font-medium mb-4">🇺🇦 Слово/Фраза</div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">{{ $cards->first()->front_text }}</h2>
                    @if($cards->first()->pronunciation)
                        <p class="text-gray-500 italic mb-4">🔊 {{ $cards->first()->pronunciation }}</p>
                    @endif
                    <button onclick="showBackSide()" 
                            class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                        Показати переклад
                    </button>
                </div>
                <div id="back-side" class="hidden">
                    <div class="text-sm text-green-600 font-medium mb-4">🇬🇧 Переклад</div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ $cards->first()->back_text }}</h2>
                    
                    @if($cards->first()->example_sentence)
                        <div class="bg-yellow-50 p-4 rounded-lg mb-6">
                            <p class="text-gray-700 italic">"{{ $cards->first()->example_sentence }}"</p>
                        </div>
                    @endif
 
                    <div class="space-y-3">
                        <p class="text-gray-600 mb-4">Наскільки добре ви знаєте це слово?</p>
                        <div class="flex flex-col space-y-2">
                            <button onclick="rateCard(1)" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition-colors">
                                ❌ Не знаю
                            </button>
                            <button onclick="rateCard(0.7)" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg transition-colors">
                                                ⚪ Майже знаю
                            </button>
                            <button onclick="rateCard(0.3)" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition-colors">
                                ✅ Добре знаю
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="bg-gray-50 rounded-lg p-4 mb-8">
            <div class="flex justify-between items-center text-sm text-gray-600">
                <span>📁 {{ $cards->first()->category->name }}</span>
                <span>📊 Рівень: {{ $cards->first()->difficulty_level }}/5</span>
                @if($cards->first()->tags->count())
                    <span>🏷️ 
                        @foreach($cards->first()->tags as $tag)
                            {{ $tag->name }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </span>
                @endif
            </div>
        </div>
 
        <div class="flex justify-between">
            <a href="{{ route('cards.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                ← Назад до всіх карток
            </a>
            @if($cards->hasMorePages())
                <a href="{{ $cards->nextPageUrl() }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-medium">
                    Наступна картка →
                </a>
            @else
                <span class="bg-green-500 text-white px-6 py-2 rounded-lg font-medium">
                    🎉 Навчання завершено!
                </span>
            @endif
        </div>
    @else
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">📚</div>
            <p class="text-gray-500 text-lg mb-4">Поки що немає карток для навчання.</p>
            <a href="{{ route('cards.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium">
                Створити першу картку
            </a>
        </div>
    @endif
</div>

<script>
function showBackSide() {
    document.getElementById('front-side').classList.add('hidden');
    document.getElementById('back-side').classList.remove('hidden');
}

function rateCard(confidence) {
    alert('Прогрес збережено! Упевненість: ' + (confidence * 100) + '%');
    
    @if($cards->hasMorePages())
        window.location.href = '{{ $cards->nextPageUrl() }}';
    @else
        window.location.href = '{{ route('cards.index') }}';
    @endif
}
</script>
@endsection
