<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'My Blog' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <header class="bg-white border-b shadow-sm">
        <div class="container mx-auto px-4 py-3">
            <h1 class="text-2xl font-bold text-gray-800">Мій Блог</h1>
        </div>
    </header>

    <nav class="bg-blue-600 text-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-center space-x-8 py-3">
                <a href="/" class="hover:bg-blue-700 px-3 py-2 rounded transition duration-200 {{ request()->is('/') ? 'bg-blue-800' : '' }}">
                    Main
                </a>
                <a href="/posts" class="hover:bg-blue-700 px-3 py-2 rounded transition duration-200 {{ request()->is('posts') ? 'bg-blue-800' : '' }}">
                    Posts
                </a>
                <a href="/about" class="hover:bg-blue-700 px-3 py-2 rounded transition duration-200 {{ request()->is('about') ? 'bg-blue-800' : '' }}">
                    About
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white border-t">
        <div class="container mx-auto px-4 py-4 text-center">
            &copy; {{ now()->year }} My blog.
        </div>
    </footer>
</body>
</html>
