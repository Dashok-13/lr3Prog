<header class="bg-white shadow-sm border-b border-gray-200">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <h1 class="text-2xl font-bold text-gray-900">My Blog</h1>
            </div>
            <div class="flex space-x-6">
                <a href="{{ url('/') }}" 
                   class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">
                    Main
                </a>
                <a href="{{ url('/posts') }}" 
                   class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">
                    Posts
                </a>
                <a href="{{ url('/about') }}" 
                   class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">
                    About
                </a>
            </div>
            <div class="md:hidden">
                <button class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>