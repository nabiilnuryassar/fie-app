{{-- Reusable Responsive Card Component --}}
@props([
    'variant' => 'default',
    'hover' => true,
    'shadow' => 'sm'
])

@php
$classes = [
    'pixel-card',
    'transition-all duration-200',
    $hover ? 'hover:transform hover:-translate-y-1' : '',
    $shadow === 'lg' ? 'pixel-shadow' : 'pixel-shadow-sm'
];

$variants = [
    'default' => 'bg-white',
    'primary' => 'bg-gradient-to-br from-yellow-100 to-yellow-200',
    'accent' => 'bg-gradient-to-br from-red-100 to-pink-100',
    'success' => 'bg-gradient-to-br from-green-100 to-green-200'
];
@endphp

<div {{ $attributes->merge(['class' => implode(' ', array_filter($classes)) . ' ' . ($variants[$variant] ?? $variants['default'])]) }}>
    {{ $slot }}
</div>
