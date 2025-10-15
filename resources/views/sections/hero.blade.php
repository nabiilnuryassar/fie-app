<!-- Hero Section -->
@extends('layouts.app')
@section('content')
    <style>
        .hero-section {
            background-image: url('{{ asset('images/bg-2.png') }}');
            background-size: cover;
            background-position: center -70px;
            background-repeat: no-repeat;
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .character {
            margin-top: 2rem;

        }

        .hero-sub-header {
            background-color: #761f28;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 1rem;
            /* font-weight: bold; */
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.06), inset 0 1px 0 rgba(235, 66, 66, 0.931);


        }

        .hero-header {
            background-color: rgba(86, 137, 168, 0.8);
            padding: 0.5rem 1rem;
            border-radius: 1rem;
        }
    </style>

    <div class="hero-section text-center pt-16">
        <h1 class="hero-header text-5xl md:text-7xl font-bold text-dark-text mb-4">Hi, Fierda!</h1>
        <p class="hero-sub-header text-2xl md:text-3xl text-primary-dark mb-8">How are you feeling today?</p>

        <!-- Character Display -->
        <div class="mb-8 h-64 flex justify-center items-center character">
            <img id="character-display" src="{{ asset('images/happy.png') }}" class="max-h-full pixelated">
        </div>
        @include('components.emoticon')
    </div>

    @push('scripts')
        <script>
            const characterDisplay = document.getElementById('character-display');
            const characterAssets = {
                happy: '{{ asset('images/happy.png') }}',
                sad: '{{ asset('images/sad.png') }}',
                angry: '{{ asset('images/angry.png') }}',
                shock: '{{ asset('images/shock.png') }}'
            };

            function showEmotion(emotion) {
                const imageSrc = characterAssets[emotion];
                if (imageSrc) {
                    characterDisplay.src = imageSrc;
                }
            }
        </script>
    @endpush
@endsection
