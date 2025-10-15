<!-- About Section -->
@extends('layouts.app')
@section('content')
    <section id="about" class="py-16">
        <div class="bg-primary-light p-8 pixel-border pixel-shadow">
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">
                <!-- Image Column -->
                <div class="w-full md:w-1/3 flex-shrink-0">
                    <div class="bg-white p-2 pixel-border pixel-shadow-sm">
                        <img src="https://placehold.co/400x400/D94545/FEF9F8?text=Fierda" alt="Foto Fierda"
                            class="w-full h-auto pixelated pixel-border">
                    </div>
                </div>
                <!-- Text Column -->
                <div class="w-full md:w-2/3 text-center md:text-left">
                    <h2 class="text-4xl font-bold text-primary-dark mb-6">Sedikit Cerita Tentangmu</h2>
                    <p class="text-xl md:text-2xl leading-relaxed text-dark-text">
                        {{ $about_text ?? 'Ini adalah tempat untuk cerita spesial tentang kamu, Fierda. Tentang betapa luar biasanya kamu, tentang senyummu yang bisa menerangi hari, dan tentang semua hal kecil yang membuatmu menjadi dirimu. Setiap kata di sini adalah pengingat betapa berharganya kamu.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
