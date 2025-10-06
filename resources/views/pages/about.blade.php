@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">{{ $title }}</h1>
    <div class="bg-white rounded-lg shadow-md p-8">
        <p class="text-lg text-gray-700 leading-relaxed mb-4">
            Project for lr3
        </p>
        <div class="grid md:grid-cols-2 gap-6 mt-6">
            <div class="bg-blue-50 p-4 rounded-lg">
                <h3 class="font-semibold text-blue-800 mb-2">Teknology</h3>
                <ul class="text-blue-700 list-disc list-inside">
                    <li>Laravel 11</li>
                    <li>Blade Components</li>
                </ul>
            </div>
            <div class="bg-green-50 p-4 rounded-lg">
                <h3 class="font-semibold text-green-800 mb-2">Functions</h3>
                <ul class="text-green-700 list-disc list-inside">
                    <li>Reusable component</li>
                    <li>Layout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
