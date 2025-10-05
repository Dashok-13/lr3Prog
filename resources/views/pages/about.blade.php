@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">{{ $title }}</h1>
    <div class="bg-white rounded-lg shadow-md p-8">
        <p class="text-lg text-gray-700 leading-relaxed mb-4">
            Цей проект створено для демонстрації роботи з Laravel Blade компонентами, 
            Layout системами та Tailwind CSS для стилізації.
        </p>
        <div class="grid md:grid-cols-2 gap-6 mt-6">
            <div class="bg-blue-50 p-4 rounded-lg">
                <h3 class="font-semibold text-blue-800 mb-2">Технології</h3>
                <ul class="text-blue-700 list-disc list-inside">
                    <li>Laravel 11</li>
                    <li>Blade Components</li>
                    <li>Tailwind CSS</li>
                </ul>
            </div>
            <div class="bg-green-50 p-4 rounded-lg">
                <h3 class="font-semibold text-green-800 mb-2">Функціонал</h3>
                <ul class="text-green-700 list-disc list-inside">
                    <li>Reusable компоненти</li>
                    <li>Layout система</li>
                    <li>Маршрутизація</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
