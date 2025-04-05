@props([
    'title' => '',
    'description' => '',
    'image' => null,
])

<div {{ $attributes->merge(['class' => 'relative flex flex-col rounded-2xl shadow-xl border-r border-zinc-200 bg-zinc-50 dark:bg-gray-800 p-4']) }}>

    <div class="flex items-start justify-between mb-2">
        <div>
            <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $title }}</h3>
            @if ($description)
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $description }}</p>
            @endif
        </div>

        @if ($image)
            <div class="w-12 h-12 ml-2 flex-shrink-0 rounded-xl overflow-hidden bg-blue-100 dark:bg-blue-800 shadow-sm flex items-center justify-center">
                @if (Str::startsWith($image, '<svg'))
                    {!! $image !!}
                @else
                    <img src="{{ $image }}" alt="Icono" class="w-full h-full bg-white object-cover rounded-xl">
                @endif
            </div>
        @endif
    </div>

    <div class="mt-2">
        {{ $slot }}
    </div>
</div>
