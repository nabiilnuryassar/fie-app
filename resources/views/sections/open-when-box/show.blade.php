{{-- Open When Box Show Section Component --}}
<section class="open-when-box-show-section section scrollable-page">
    <style>
        .open-when-box-show-section {
            background: linear-gradient(135deg, var(--color-primary-light) 0%, #f0d084 100%);
            min-height: 100vh;
            /* Reserve space for fixed bottom bar + safe area */
            padding-bottom: calc(88px + env(safe-area-inset-bottom, 0px));
        }

        /* Override global container padding for this section */
        .open-when-box-show-section .container {
            padding-left: 0;
            padding-right: 0;
        }

        .letter-container {
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-pixel-sm);
            width: 100%;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .letter-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #4ECDC4, #44A08D, #96CEB4, #FFEAA7, #FF6B6B);
            border-radius: var(--border-radius-sm) var(--border-radius-sm) 0 0;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--color-secondary);
            color: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-sm);
            padding: 0.5rem 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition-normal);
            margin-bottom: 1.5rem;
        }

        .back-button:hover {
            background: var(--color-surface);
            color: var(--color-secondary);
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px var(--color-secondary);
        }

        .letter-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .letter-main-heading {
            font-size: clamp(1.25rem, 4vw, 1.5rem);
            font-weight: 800;
            color: var(--color-secondary);
            margin-bottom: 0.5rem;
        }

        .letter-media {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 0.75rem auto;
            border-radius: 12px;
            border: 2px solid var(--color-secondary);
            box-shadow: var(--shadow-pixel-sm);
        }

        /* Ensure audio player is visible and stretches nicely */
        .letter-media-list {
            position: relative;
            z-index: 5;
            /* make sure media sits above decorative layers */
            overflow: visible;
            /* allow controls to render outside if needed */
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }

        .audio-player {
            width: 100%;
            max-width: 720px;
            display: block;
            margin: 0.75rem auto;
            background: #ffffff;
            border-radius: 12px;
            border: 2px solid var(--color-secondary);
            padding: 6px 8px;
            box-shadow: var(--shadow-pixel-sm);
            height: 48px;
            /* keeps consistent visual height for controls */
            outline: none;
        }

        /* Make sure native controls are not hidden by global rules */
        .audio-player[controls] {
            -webkit-appearance: media-play-button;
            appearance: auto;
        }

        /* Carousel styles */
        .media-carousel {
            width: 100%;
            max-width: 840px;
            margin: 1rem auto;
            position: relative;
            background: #fff;
            border-radius: 12px;
            padding: 1rem;
            border: 2px solid var(--color-secondary);
            box-shadow: var(--shadow-pixel-sm);
        }

        .carousel-slides {
            position: relative;
            overflow: visible;
        }

        .carousel-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.75rem;
            margin-top: 0.75rem;
        }

        .carousel-prev,
        .carousel-next {
            background: var(--color-secondary);
            color: var(--color-surface);
            border: none;
            padding: 0.5rem 0.75rem;
            font-size: 1.25rem;
            border-radius: 8px;
            cursor: pointer;
        }

        .carousel-indicators {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .carousel-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #e2e8f0;
            border: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0;
            cursor: pointer;
        }

        .carousel-indicator[aria-pressed='true'] {
            background: var(--color-secondary);
        }

        .letter-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            /* border-radius: 50%; */
            font-size: 2.5rem;
            /* border: 2px solid var(--color-secondary); */
            /* box-shadow: var(--shadow-pixel-sm); */
            /* background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%); */
            animation: float 3s ease-in-out infinite;
        }

        .letter-title {
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            font-weight: 800;
            color: var(--color-secondary);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .letter-subtitle {
            color: #6b4b32;
            font-size: 1rem;
            text-align: center;
            opacity: 0.8;
            margin-bottom: 1rem;
        }

        .letter-content {
            background: #fefefe;
            border: 2px solid #e0e0e0;
            border-radius: var(--border-radius-md);
            padding: 2rem;
            margin: 2rem 0;
            position: relative;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .letter-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #4ECDC4, transparent);
        }

        .letter-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #2c2c2c;
            text-align: justify;
            margin-bottom: 1.5rem;
        }

        .letter-signature {
            text-align: right;
            font-style: italic;
            color: #6b4b32;
            font-weight: 600;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px dashed #d0d0d0;
        }

        .letter-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .letter-button {
            background: var(--color-secondary);
            color: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-sm);
            padding: 0.75rem 1.5rem;
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition-normal);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .letter-button:hover {
            background: var(--color-surface);
            color: var(--color-secondary);
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px var(--color-secondary);
        }

        .letter-button.secondary {
            background: transparent;
            color: var(--color-secondary);
        }

        .letter-button.secondary:hover {
            background: var(--color-secondary);
            color: var(--color-surface);
        }

        /* Responsive */
        @media (min-width: 640px) {
            .letter-container {
                padding: 2rem;
            }

            .letter-content {
                padding: 2.5rem;
            }
        }

        @media (min-width: 768px) {
            .letter-container {
                padding: 2.5rem;
                max-width: 800px;
                margin: 0 auto;
            }

            .letter-content {
                padding: 3rem;
            }

            .letter-actions {
                justify-content: space-between;
            }
        }

        /* Animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Letter opening animation */
        .letter-container {
            animation: letterOpen 0.6s ease-out;
        }

        @keyframes letterOpen {
            0% {
                opacity: 0;
                transform: scale(0.9) rotateY(-10deg);
            }

            100% {
                opacity: 1;
                transform: scale(1) rotateY(0deg);
            }
        }
    </style>

    <div class="container container-xl">
        <div class="letter-container">
            <!-- Back Button -->
            <a href="{{ route('open-when-box.index') }}" class="back-button">
                <span>←</span> Back to Box
            </a>

            <!-- Letter Header -->
            <div class="letter-header">
                <div class="letter-icon"><img src="{{ asset('images/mail.png') }}" alt=""></div>

                {{-- Main title (kept smaller) --}}
                <div class="letter-main-heading">{{ $openWhenBox->title }}</div>

                {{-- Short content/subtitle (string) --}}
                @if (!empty($openWhenBox->content))
                    <div class="letter-subtitle">{{ $openWhenBox->content }}</div>
                @endif

                {{-- Render media content as a carousel when there are multiple files. --}}
                @if ($openWhenBox->content_file)
                    @php
                        $files = is_array($openWhenBox->content_file)
                            ? $openWhenBox->content_file
                            : (array) $openWhenBox->content_file;
                        $files = array_values($files);
                        $fileCount = count($files);
                    @endphp

                    <div class="media-carousel" data-count="{{ $fileCount }}">
                        <div class="carousel-slides">
                            @foreach ($files as $i => $file)
                                @php
                                    $ext = \Illuminate\Support\Str::lower(pathinfo($file, PATHINFO_EXTENSION));
                                    $url = \Illuminate\Support\Facades\Storage::url($file);
                                    $streamUrl = route('media.stream', [
                                        'disk' => 'public',
                                        'encodedPath' => rawurlencode($file),
                                    ]);
                                @endphp

                                <div class="carousel-slide" data-index="{{ $i }}"
                                    @if ($i !== 0) style="display:none" @endif>
                                    @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <img class="letter-media" src="{{ $url }}" alt="content image">
                                    @elseif (in_array($ext, ['mp4', 'webm', 'ogg']))
                                        <video class="letter-media" controls preload="metadata"
                                            src="{{ $url }}"></video>
                                    @elseif (in_array($ext, ['mp3', 'wav', 'm4a', 'oga', 'ogg']))
                                        <audio class="letter-media audio-player" controls preload="metadata"
                                            src="{{ $streamUrl }}"></audio>
                                    @else
                                        <a class="letter-media" href="{{ $url }}" target="_blank"
                                            rel="noopener">Open file</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        @if ($fileCount > 1)
                            <div class="carousel-controls">
                                <button class="carousel-prev" aria-label="Previous">‹</button>
                                <div class="carousel-indicators">
                                    @foreach ($files as $i => $file)
                                        <button class="carousel-indicator" data-index="{{ $i }}"
                                            aria-label="Slide {{ $i + 1 }}"
                                            @if ($i === 0) aria-pressed="true" @endif></button>
                                    @endforeach
                                </div>
                                <button class="carousel-next" aria-label="Next">›</button>
                            </div>
                        @endif
                    </div>
                @endif


            </div>

            <!-- Letter Content -->
            <div class="letter-content">
                @if (!empty($openWhenBox->description))
                    <div class="letter-text">
                        {{ $openWhenBox->description }}
                    </div>
                @else
                    <div class="letter-text">
                        I love you more than words can express. Whenever you feel down or need a reminder of how special
                        you are, open this letter and know that my heart is always with you.
                    </div>
                @endif

                <div class="letter-signature">
                    With all my love,<br>
                    Your special someone ✨
                </div>
            </div>

            <!-- Letter Actions -->
            <div class="letter-actions">
                <a href="{{ route('open-when-box.index') }}" class="letter-button secondary">
                    <span><img src="{{ asset('images/mail.png') }}" alt=""></span> More Letters
                </a>
                <button onclick="shareMessage()" class="letter-button">
                    <span><img src="{{ asset('images/love.png') }}" alt=""></span> Keep Close
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function shareMessage() {
                // Add visual feedback
                const button = event.target;
                const originalText = button.innerHTML;

                button.innerHTML = '<span><img src="{{ asset('images/love.png') }}"></span> Saved to Heart';
                button.style.background = '#FF6B6B';
                button.style.borderColor = '#FF6B6B';

                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    button.style.borderColor = '';
                }, 2000);

                // Create heart animation
                createHearts();
            }

            function createHearts() {
                for (let i = 0; i < 8; i++) {
                    setTimeout(() => {
                        const heart = document.createElement('div');
                        heart.innerHTML = '<img src="{{ asset('images/love.png') }}">';
                        heart.style.position = 'fixed';
                        heart.style.left = (Math.random() * window.innerWidth) + 'px';
                        heart.style.top = (Math.random() * window.innerHeight) + 'px';
                        heart.style.fontSize = '1.5rem';
                        heart.style.pointerEvents = 'none';
                        heart.style.zIndex = '9999';
                        heart.style.animation = 'heartFloat 3s ease-out forwards';

                        document.body.appendChild(heart);

                        setTimeout(() => {
                            heart.remove();
                        }, 3000);
                    }, i * 150);
                }
            }

            // Add heart animation CSS
            const style = document.createElement('style');
            style.textContent = `
                @keyframes heartFloat {
                    0% {
                        opacity: 1;
                        transform: translateY(0) scale(1) rotate(0deg);
                    }
                    100% {
                        opacity: 0;
                        transform: translateY(-150px) scale(0.3);
                    }
                }
            `;
            document.head.appendChild(style);
        </script>
    @endpush
    </script>

    @push('scripts')
        <script>
            // Small runtime helper to surface audio element state and ensure controls are visible.
            window.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('audio.audio-player').forEach((a) => {
                    // ensure attributes
                    a.setAttribute('preload', a.getAttribute('preload') || 'metadata');
                    a.setAttribute('controls', true);

                    // visual debugging aid (remove in production if you want)
                    a.style.visibility = 'visible';

                    console.log('[audio] src=', a.src, 'controls=', a.controls);

                    a.addEventListener('error', () => {
                        console.error('[audio] playback error', a.error);
                        // show a small download link if playback fails
                        const link = document.createElement('a');
                        link.href = a.src;
                        link.target = '_blank';
                        link.rel = 'noopener';
                        link.textContent = 'Download audio (playback failed)';
                        link.style.display = 'block';
                        link.style.marginTop = '.5rem';
                        a.parentNode && a.parentNode.appendChild(link);
                    });

                    a.addEventListener('loadedmetadata', () => {
                        console.log('[audio] loadedmetadata duration=', a.duration);
                    });

                    a.addEventListener('canplay', () => {
                        console.log('[audio] canplay');
                    });
                });

                // Carousel behaviour
                const carousels = document.querySelectorAll('.media-carousel');
                carousels.forEach((carousel) => {
                    const slides = carousel.querySelectorAll('.carousel-slide');
                    const indicators = carousel.querySelectorAll('.carousel-indicator');
                    const prev = carousel.querySelector('.carousel-prev');
                    const next = carousel.querySelector('.carousel-next');
                    let current = 0;

                    function show(index) {
                        if (index < 0) index = slides.length - 1;
                        if (index >= slides.length) index = 0;
                        slides.forEach((s, i) => {
                            s.style.display = i === index ? 'flex' : 'none';
                        });
                        indicators.forEach((btn, i) => btn.setAttribute('aria-pressed', i === index));
                        current = index;
                    }

                    if (prev) prev.addEventListener('click', () => show(current - 1));
                    if (next) next.addEventListener('click', () => show(current + 1));
                    indicators.forEach((btn) => {
                        btn.addEventListener('click', (e) => show(parseInt(btn.dataset.index)));
                    });
                });
            });
        </script>
    @endpush

    <x-walker />
</section>
