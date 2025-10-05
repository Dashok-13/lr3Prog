@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">{{ $title }}</h1>
    <div class="bg-white rounded-lg shadow-md p-8">
        <p class="text-lg text-gray-700 leading-relaxed mb-4">
            Ласкаво просимо на наш блог! Тут ви знайдете цікаві статті про веб-розробку, 
            Laravel, Tailwind CSS та багато іншого.
        </p>
        <p class="text-gray-600">
            Використовуйте навігацію для переходу між сторінками.
        </p>
    </div>
</div>
@endsection
