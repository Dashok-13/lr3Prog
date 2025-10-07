@extends('layouts.app')

@section('title', 'Створити нову картку')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Створити нову картку</h1>

    <form action="{{ route('cards.store') }}" method="POST" class="space-y-6 bg-white p-8 rounded-xl shadow-md">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    🇺🇦 Слово/Фраза (українською) *
                </label>
                <input type="text" name="front_text" value="{{ old('front_text') }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Наприклад: Яблуко" required>
                @error('front_text')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    🇬🇧 Переклад (англійською) *
                </label>
                <input type="text" name="back_text" value="{{ old('back_text') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Наприклад: Apple" required>
                @error('back_text')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
 
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    🔊 Вимова (необов'язково)
                </label>
                <input type="text" name="pronunciation" value="{{ old('pronunciation') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Наприклад: ˈæp.əl">
            </div>
 
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    📊 Рівень складності *
                </label>
                <select name="difficulty_level" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Оберіть рівень</option>
                    <option value="1" {{ old('difficulty_level') == 1 ? 'selected' : '' }}>🟢 1 - Дуже легко</option>
                    <option value="2" {{ old('difficulty_level') == 2 ? 'selected' : '' }}>🟡 2 - Легко</option>
                    <option value="3" {{ old('difficulty_level') == 3 ? 'selected' : '' }}>🟠 3 - Середньо</option>
                    <option value="4" {{ old('difficulty_level') == 4 ? 'selected' : '' }}>🔴 4 - Складно</option>
                    <option value="5" {{ old('difficulty_level') == 5 ? 'selected' : '' }}>⚫ 5 - Дуже складно</option>
                </select>
                @error('difficulty_level')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
 
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                💬 Приклад використання (необов'язково)
            </label>
            <textarea name="example_sentence" rows="2"
                      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                      placeholder="Наприклад: I eat an apple every day.">{{ old('example_sentence') }}</textarea>
        </div>
 
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    📁 Категорія *
                </label>
                <select name="category_id" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Оберіть категорію</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
 
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    🏷️ Теги (оберіть до 3)
                </label>
                <select name="tags[]" multiple class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" size="4">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-1">Утримуйте Ctrl для вибору кількох тегів</p>
            </div>
        </div>
 
        <div class="flex items-center">
            <input type="checkbox" name="is_public" id="is_public" value="1" {{ old('is_public') ? 'checked' : '' }}
                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
            <label for="is_public" class="ml-2 text-sm text-gray-700">
                Зробити картку публічною (інші користувачі зможуть її бачити)
            </label>
        </div>
 
        <div class="flex space-x-4 pt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                💾 Зберегти картку
            </button>
            <a href="{{ route('cards.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                ↩ Скасувати
            </a>
        </div>
    </form>
</div>
@endsection
