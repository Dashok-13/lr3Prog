@props([
    'title' => '',
    'description' => '',
    'author' => '',
    'date' => '',
    'category' => ''
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 border border-gray-200']) }}>
    <div class="p-6">
        <div class="flex justify-between items-start mb-3">
            <h3 class="text-xl font-semibold text-gray-900">{{ $title }}</h3>
            @if($category)
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                    {{ $category }}
                </span>
            @endif
        </div>
        @if($slot->isNotEmpty())
            <div class="mb-4">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>