@props([
    'type' => 'button',
    'color' => 'primary',
    'as' => 'button',
])

@php
    $baseClasses = 'inline-flex items-center justify-center px-4 py-2 rounded-md font-medium focus:outline-none transition';
    $colors = [
        'primary' => 'bg-[#162644] hover:bg-[#0f1a32] text-white',
        'secondary' => 'bg-gray-300 text-gray-800 hover:bg-gray-400',
        'danger' => 'bg-[#dc3545] text-white hover:bg-[#bb2d3b]',
    ];
    $colorClasses = $colors[$color] ?? $color;
@endphp

<{{ $as }} {{ $attributes->merge(['class' => "$baseClasses $colorClasses", 'type' => $type]) }}>
    {{ $slot }}
</{{ $as }}>
