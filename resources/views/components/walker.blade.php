@props([
    'src' => asset('images/character.gif'),
    'alt' => '',
])

@include('components.walker-styles')

<div class="about-runway" aria-hidden="true">
    <div class="lane top">
        <img class="walker walk-ltr" src="{{ $src }}" alt="{{ $alt }}" />
    </div>
</div>
