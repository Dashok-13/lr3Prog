<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Language Cards')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto p-6">
        <header class="mb-8">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-blue-600">
                    <a href="{{ route('home') }}">🗂️ Language Cards</a>
                </h1>
                <nav class="flex space-x-4">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Всі картки</a>
                    <a href="{{ route('cards.study') }}" class="text-gray-700 hover:text-blue-600 font-medium">Навчання</a>
                    <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Категорії</a>
                    <a href="{{ route('tags.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Теги</a>
                    <a href="{{ route('cards.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm">
                        Створити картку
                    </a>
                </nav>
            </div>
 
            @if(session('success'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
