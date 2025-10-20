{{-- Reusable Page Header Component --}}
@props([
    'title',
    'subtitle' => null,
    'icon' => null,
    'centered' => true
])

<div class="page-header {{ $centered ? 'text-center' : '' }} mb-6 md:mb-8">
    @if($icon)
        <div class="page-icon text-4xl mb-4">{{ $icon }}</div>
    @endif
    
    <h1 class="heading-responsive font-bold" style="color: var(--color-secondary);">
        {{ $title }}
    </h1>
    
    @if($subtitle)
        <p class="text-responsive mt-2" style="color: var(--color-primary-dark);">
            {{ $subtitle }}
        </p>
    @endif
</div>
