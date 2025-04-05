@props([
    'title' => 'Formulario',
    'show' => false,
])

<div
    x-data="{ open: @entangle($attributes->wire('model')) }"
    x-cloak
>
    <!-- Overlay -->
    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 z-40 bg-gray-100/20 backdrop-blur-sm"
        @click="open = false"
    ></div>

    <!-- Drawer Panel -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 z-50 h-full w-full max-w-2xl bg-white dark:bg-gray-900 shadow-lg p-6 overflow-y-auto"
        style="display: none;"
    >
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">{{ $title }}</h2>
            <button @click="open = false" class="text-gray-500 hover:text-gray-700 text-2xl leading-none">&times;</button>
        </div>

        {{ $slot }}
    </div>
</div>
