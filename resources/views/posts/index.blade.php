@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">{{ $title }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">
        @foreach($posts as $post)
        <article class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition duration-300">
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-3">{{ $post['title'] }}</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">{{ $post['excerpt'] }}</p>
                <div class="flex justify-between items-center text-sm text-gray-500">
                    <span class="font-medium">{{ $post['author'] }}</span>
                    <time>{{ $post['date']->format('d.m.Y') }}</time>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</div>
@endsection
