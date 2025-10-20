{{-- About Section Component --}}
<section class="about-section section scrollable-page">
    <style>
        .about-section {
            background: linear-gradient(135deg, var(--color-primary-light) 0%, #f0d084 100%);
            min-height: 100vh;
            /* Reserve space for fixed bottom bar + safe area */
            padding-bottom: calc(88px + env(safe-area-inset-bottom, 0px));
        }

        /* Override global container padding for this section */
        .about-section .container {
            padding-left: 0;
            padding-right: 0;
        }

        .about-container {
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-pixel-sm);
            width: 100%;
            margin: 0 auto;
        }

        .about-header {
            position: relative;
            display: block;
            width: 100%;
            margin: 1rem auto .75rem;
            margin-bottom: 2rem;
            padding: 0.5rem;
            color: var(--color-secondary);
            background: var(--color-primary-light);
            border: 2px solid var(--color-secondary);
            border-radius: 9999px;
            box-shadow: var(--shadow-pixel-sm);
            font-weight: 800;
            letter-spacing: .3px;
            text-transform: uppercase;
            text-align: center;
            font-size: clamp(1.5rem, 5vw, 2rem);
        }

        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
        }

        .profile-image-container {
            position: relative;
        }

        .profile-image {
            width: 240px;
            height: 240px;
            border: 4px solid #8B4513;
            border-radius: 50%;
            object-fit: cover;
            image-rendering: -moz-crisp-edges;
            image-rendering: crisp-edges;
            box-shadow: 2px 2px 0px #654321;
        }

        .profile-badge {
            position: absolute;
            bottom: -1px;
            right: -1px;
            /* background-color: #FF6B6B; */
            color: white;
            font-size: 20px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            /* border: 2px solid #8B4513; */
        }

        .profile-badge img {
            width: 100%;
        }

        .profile-name {
            font-size: 28px;
            font-weight: bold;
            color: #8B4513;
            text-align: center;
            margin-bottom: 8px;
        }

        .profile-subtitle {
            font-size: 16px;
            color: #B8860B;
            text-align: center;
            margin-bottom: 16px;
        }

        .about-content {
            background: white;
            border: 2px solid #8B4513;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .about-text {
            font-size: 16px;
            line-height: 1.6;
            color: #8B4513;
            text-align: justify;
            margin-bottom: 16px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 20px;
        }

        .stat-card {
            background: #90EE90;
            border: 2px solid #2F4F2F;
            border-radius: 6px;
            padding: 12px;
            text-align: center;
        }

        .stat-number {
            font-size: 20px;
            font-weight: bold;
            color: #2F4F2F;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 12px;
            color: #2F4F2F;
        }

        .personality-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            margin-top: 16px;
        }

        .personality-tag {
            background-color: #FFB6C1;
            color: #8B008B;
            padding: 6px 12px;
            border-radius: 16px;
            font-size: 14px;
            border: 2px solid #8B008B;
        }

        /* Character runway */
        .character-content {
            position: relative;
            overflow: hidden;
            height: 120px;
            margin-top: 1.5rem;
            border: 2px dashed var(--color-secondary);
            border-radius: var(--border-radius-md);
            background: rgba(255, 255, 255, 0.6);
        }

        .character-track {
            position: absolute;
            left: 0;
            right: 0;
            height: 60px;
            display: flex;
            align-items: center;
        }

        .character-track.top {
            top: 12px;
        }

        .character-track.bottom {
            bottom: 12px;
        }

        .walker {
            height: 120px;
            aspect-ratio: 1 / 1;
            image-rendering: -moz-crisp-edges;
            image-rendering: crisp-edges;
            object-fit: contain;
        }

        .walk-left-to-right {
            animation: walk-ltr 8s linear infinite;
            transform: translateX(-100%);
        }

        .walk-right-to-left {
            animation: walk-rtl 8s linear infinite;
            transform: translateX(100%);
        }

        .flip-x {
            transform: scaleX(-1);
        }

        @keyframes walk-ltr {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        @keyframes walk-rtl {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Mobile-first responsive */
        @media (min-width: 480px) {
            .about-container {
                padding: 2rem;
            }

            .profile-image {
                width: 140px;
                height: 140px;
            }
        }

        @media (min-width: 640px) {
            .about-container {
                padding: 2.5rem;
            }

            .profile-section {
                flex-direction: row;
                text-align: left;
            }

            .profile-image {
                width: 160px;
                height: 160px;
            }

            .about-text {
                text-align: left;
            }
        }

        @media (min-width: 768px) {
            .about-container {
                padding: 3rem;
            }

            .profile-image {
                width: 180px;
                height: 180px;
            }

            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        /* Walker styles moved to the reusable component */
    </style>

    <div class="container container-xl">
        <div class="about-container">
            <!-- Header -->
            <div class="about-header">
                About You
            </div>

            <!-- Profile Section -->
            <div class="profile-section">
                <div class="profile-image-container">
                    <img src="{{ isset($about) && $about->image_path ? Storage::url($about->image_path) : asset('images/you.jpeg') }}"
                        alt="Foto Fierda" class="profile-image">
                    <div class="profile-badge">
                        <img src="{{ asset('images/love.png') }}" alt="Love" />
                    </div>
                </div>

                <div>
                    <div class="profile-name">The Reason Why</div>
                    <div class="profile-subtitle">{{ $about->title }}</div>
                </div>
            </div>

            <!-- About Content -->
            <div class="about-content">
                <div class="about-text text-justify">
                    {{ $about->description ?? null ?: 'Ini adalah tempat untuk cerita spesial tentang kamu, Fierda. Tentang betapa luar biasanya kamu, tentang senyummu yang bisa menerangi hari, dan tentang semua hal kecil yang membuatmu menjadi dirimu. Setiap kata di sini adalah pengingat betapa berharganya kamu.' }}
                </div>
                <div class="about-text" style="font-style: italic; margin-top: .5rem;">
                    i love u so much.
                </div>
                <div class="about-text" style="font-weight: 800;">
                    — creator
                </div>
            </div>

            {{-- <div class="character-content" aria-label="Character runway animation">
                <div class="character-track top" aria-hidden="true">
                    <!-- Left to Right walker -->
                    <img class="walker walk-left-to-right" src="{{ asset('images/character.gif') }}" alt="Walking character left to right" />
                </div>
                <div class="character-track bottom" aria-hidden="true">
                    <!-- Right to Left walker (gif flipped horizontally) -->
                    <img class="walker walk-right-to-left flip-x" src="{{ asset('images/character.gif') }}" alt="Walking character right to left" />
                </div>
            </div> --}}

        </div>

        @push('scripts')
            <script>
                // Add subtle animations
                document.addEventListener('DOMContentLoaded', function() {
                    const profileImage = document.querySelector('.profile-image');
                    const personalityTags = document.querySelectorAll('.personality-tag');
                    const statCards = document.querySelectorAll('.stat-card');

                    // Profile image hover effect
                    if (profileImage) {
                        profileImage.addEventListener('mouseenter', function() {
                            this.style.transform = 'scale(1.05) rotate(2deg)';
                        });

                        profileImage.addEventListener('mouseleave', function() {
                            this.style.transform = 'scale(1) rotate(0deg)';
                        });
                    }

                    // Personality tags hover effect
                    personalityTags.forEach(tag => {
                        tag.addEventListener('mouseenter', function() {
                            this.style.transform = 'translateY(-2px)';
                            this.style.boxShadow = '2px 2px 0px #8B008B';
                        });

                        tag.addEventListener('mouseleave', function() {
                            this.style.transform = 'translateY(0)';
                            this.style.boxShadow = 'none';
                        });
                    });

                    // Stat cards hover effect
                    statCards.forEach(card => {
                        card.addEventListener('mouseenter', function() {
                            this.style.transform = 'scale(1.05)';
                            this.style.boxShadow = '3px 3px 0px #2F4F2F';
                        });

                        card.addEventListener('mouseleave', function() {
                            this.style.transform = 'scale(1)';
                            this.style.boxShadow = 'none';
                        });
                    });
                });
            </script>
        @endpush

        <!-- Fixed runway above bottom-bar (component) -->
        <x-walker />
</section>
