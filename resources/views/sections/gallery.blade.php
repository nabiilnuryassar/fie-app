{{-- Gallery Section Component --}}
<section class="gallery-section section scrollable-page">
    <style>
        .gallery-section {
            background: linear-gradient(135deg, var(--color-primary-light) 0%, #f0d084 100%);
            min-height: 100vh;
        }

        .gallery-header {
            font-size: clamp(1.5rem, 5vw, 2rem);
            font-weight: bold;
            color: #fff;
            margin-bottom: 2rem;
            text-align: center;
            background-color: #761f28;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            width: 100%;
            max-width: 100%;
        }

        .gallery-card {
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-md);
            padding: 1rem;
            box-shadow: var(--shadow-pixel-sm);
            transition: var(--transition-normal);
            overflow: hidden;
        }

        .gallery-card:hover {
            transform: translateY(-2px);
            box-shadow: 6px 6px 0px #654321;
        }

        .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-sm);
            transition: var(--transition-normal);
        }

        .gallery-image:hover {
            transform: scale(1.02);
        }

        .gallery-caption {
            margin-top: 12px;
            font-size: 16px;
            color: #8B4513;
            font-weight: bold;
            text-align: center;
        }

        .gallery-date {
            font-size: 14px;
            color: #B8860B;
            text-align: center;
            margin-top: 4px;
        }

        .add-photo-card {
            background: transparent;
            border: 2px dashed #B8860B;
            border-radius: 8px;
            padding: 32px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .add-photo-card:hover {
            background-color: rgba(184, 134, 11, 0.1);
            border-color: #8B4513;
        }

        .add-photo-icon {
            font-size: 48px;
            color: #B8860B;
            margin-bottom: 16px;
        }

        .add-photo-text {
            font-size: 18px;
            color: #8B4513;
            font-weight: bold;
        }

        .empty-gallery-card {
            background: var(--color-surface);
            border: 2px dashed #B8860B;
            border-radius: var(--border-radius-md);
            padding: 28px;
            text-align: center;
            color: #8B4513;
            box-shadow: var(--shadow-pixel-sm);
            max-width: 640px;
            margin: 1rem auto 0;
        }

        .empty-gallery-card .empty-icon {
            font-size: 42px;
            margin-bottom: 10px;
            color: #B8860B;
        }

        .empty-gallery-card .empty-title {
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 6px;
        }

        .empty-gallery-card .empty-subtext {
            font-size: 14px;
            color: #A26A1E;
        }

        .empty-illustration {
            display: flex;
            justify-content: center;
        }

        .empty-illustration img {
            width: 120px;
            height: auto;
            margin-bottom: 10px;
            border-radius: 8px;
            /* border: 2px solid var(--color-secondary); */
            /* box-shadow: var(--shadow-pixel-sm); */
            /* approximate maroon tint (#761f28) for monochrome images */
            filter: invert(13%) sepia(28%) saturate(1764%) hue-rotate(331deg) brightness(92%) contrast(93%);
        }

        .gallery-header
        /* Responsive grid */
        @media (min-width: 640px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }

            .gallery-image {
                height: 180px;
            }
        }

        @media (min-width: 768px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                max-width: 800px;
                margin: 0 auto;
            }

            .gallery-image {
                height: 220px;
            }
        }

        @media (min-width: 1024px) {
            .gallery-grid {
                grid-template-columns: repeat(3, 1fr);
                max-width: 1000px;
            }

            .gallery-image {
                height: 200px;
            }
        }
    </style>

    <div class="container container-xl">
        <h2 class="gallery-header">
            Our Gallery
        </h2>

        @if (isset($galery))
            <div class="gallery-grid">
                @if (isset($gallery_images) && count($gallery_images) > 0)
                    @foreach ($gallery_images as $image)
                        <div class="gallery-card">
                            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? 'Kenangan' }}" class="gallery-image">
                            <div class="gallery-caption">{{ $image['caption'] ?? 'Momen Indah' }}</div>
                            <div class="gallery-date">{{ $image['date'] ?? date('d M Y') }}</div>
                        </div>
                    @endforeach
                @else
                    <!-- Default Gallery Items -->
                    <div class="gallery-card">
                        <img src="https://placehold.co/400x200/F4978E/8B4513?text=Momen+Bahagia" alt="Kenangan 1"
                            class="gallery-image">
                        <div class="gallery-caption">Momen Bahagia</div>
                        <div class="gallery-date">15 Oct 2025</div>
                    </div>

                    <div class="gallery-card">
                        <img src="https://placehold.co/400x200/90EE90/2F4F2F?text=Kenangan+Indah" alt="Kenangan 2"
                            class="gallery-image">
                        <div class="gallery-caption">Kenangan Indah</div>
                        <div class="gallery-date">12 Oct 2025</div>
                    </div>

                    <div class="gallery-card">
                        <img src="https://placehold.co/400x200/FFB6C1/8B008B?text=Saat+Bersama" alt="Kenangan 3"
                            class="gallery-image">
                        <div class="gallery-caption">Saat Bersama</div>
                        <div class="gallery-date">10 Oct 2025</div>
                    </div>

                    <div class="gallery-card">
                        <img src="https://placehold.co/400x200/87CEEB/4682B4?text=Petualangan" alt="Kenangan 4"
                            class="gallery-image">
                        <div class="gallery-caption">Petualangan Kita</div>
                        <div class="gallery-date">08 Oct 2025</div>
                    </div>
                @endif

                <!-- Add Photo Card -->
                <div class="add-photo-card" onclick="addNewPhoto()">
                    <div class="add-photo-icon">📷</div>
                    <div class="add-photo-text">
                        Tambah Foto<br>
                        Kenangan Baru
                    </div>
                </div>
            </div>
        @else
            <div class="empty-gallery-card">
                <div class="empty-illustration">
                    <img src="{{ asset('images/image.png') }}" alt="Empty Gallery" />
                </div>
                <div class="empty-subtext">Picture of us will be here soon</div>
            </div>
        @endif
    </div>

    @push('scripts')
        <script>
            function addNewPhoto() {
                // Add visual feedback
                const card = document.querySelector('.add-photo-card');
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.style.transform = 'scale(1)';
                }, 150);

                // Here you can add functionality to upload new photos
                alert('Fitur upload foto akan segera hadir! 📸');

                // Optional: Open file picker
                // const input = document.createElement('input');
                // input.type = 'file';
                // input.accept = 'image/*';
                // input.onchange = handleFileUpload;
                // input.click();
            }

            // Optional: Handle file upload
            function handleFileUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    console.log('File selected:', file.name);
                    // Add upload logic here
                }
            }
        </script>
    @endpush
    <x-walker />

</section>
