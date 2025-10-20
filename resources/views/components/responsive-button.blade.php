{{-- Reusable Responsive Button Component --}}
@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'type' => 'button'
])

@php
$baseClasses = 'pixel-button inline-flex items-center justify-center font-bold transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2';

$variants = [
    'primary' => 'bg-yellow-400 hover:bg-yellow-500 text-gray-800 border-gray-800 focus:ring-yellow-400',
    'secondary' => 'bg-amber-600 hover:bg-amber-700 text-white border-gray-800 focus:ring-amber-500',
    'accent' => 'bg-red-400 hover:bg-red-500 text-white border-gray-800 focus:ring-red-400',
    'success' => 'bg-green-400 hover:bg-green-500 text-gray-800 border-gray-800 focus:ring-green-400'
];

$sizes = [
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-6 py-3 text-lg'
];

$classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
