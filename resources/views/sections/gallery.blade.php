<!-- Gallery Section -->
<section id="gallery" class="py-16">
    <h2 class="text-4xl font-bold text-dark-text mb-8 text-center">Galeri Kenangan Kita</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach ($gallery_images ?? [] as $image)
            <div class="bg-white p-4 pixel-border pixel-shadow-sm">
                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? 'Kenangan' }}"
                    class="w-full h-auto pixelated pixel-border">
            </div>
        @endforeach

        @empty($gallery_images)
            <div class="bg-white p-4 pixel-border pixel-shadow-sm">
                <img src="https://placehold.co/600x400/F4978E/A32121?text=Momen+1" alt="Kenangan 1"
                    class="w-full h-auto pixelated pixel-border">
            </div>
            <div class="bg-white p-4 pixel-border pixel-shadow-sm">
                <img src="https://placehold.co/600x400/F4978E/A32121?text=Momen+2" alt="Kenangan 2"
                    class="w-full h-auto pixelated pixel-border">
            </div>
            <div class="bg-white p-4 pixel-border pixel-shadow-sm">
                <img src="https://placehold.co/600x400/F4978E/A32121?text=Momen+3" alt="Kenangan 3"
                    class="w-full h-auto pixelated pixel-border">
            </div>
        @endempty
    </div>
</section>
