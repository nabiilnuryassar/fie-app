{{-- Open When Box Index Section Component --}}
<section class="open-when-box-section section scrollable-page">
    <style>
        .open-when-box-section {
            background: linear-gradient(135deg, var(--color-primary-light) 0%, #f0d084 100%);
            min-height: 100vh;
            /* Reserve space for fixed bottom bar + safe area */
            padding-bottom: calc(88px + env(safe-area-inset-bottom, 0px));
        }

        /* Override global container padding for this section */
        .open-when-box-section .container {
            padding-left: 0;
            padding-right: 0;
        }

        .open-when-box-container {
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-pixel-sm);
            width: 100%;
            margin: 0 auto;
        }

        .open-when-box-header {
            position: relative;
            display: block;
            width: 100%;
            margin: 1rem auto .75rem;
            margin-bottom: 2rem;
            padding: .5rem 1rem;
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

        .boxes-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            width: 100%;
        }

        .box-card {
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-pixel-sm);
            transition: var(--transition-normal);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .box-card:hover {
            transform: translateY(-4px);
            box-shadow: 6px 6px 0px var(--color-secondary);
        }

        .box-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #4ECDC4, #44A08D, #96CEB4, #FFEAA7, #FF6B6B);
            border-radius: var(--border-radius-sm) var(--border-radius-sm) 0 0;
        }

        .box-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            animation: float 3s ease-in-out infinite;
        }

        .box-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--color-secondary);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .box-description {
            color: #6b4b32;
            line-height: 1.6;
            text-align: center;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .box-actions {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .box-button {
            background: var(--color-secondary);
            color: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-sm);
            padding: 0.5rem 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition-normal);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .box-button:hover {
            background: var(--color-surface);
            color: var(--color-secondary);
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px var(--color-secondary);
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #6b4b32;
        }

        .empty-state .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.7;
        }

        .empty-state .empty-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--color-secondary);
            margin-bottom: 0.5rem;
        }

        .empty-state .empty-description {
            font-size: 1rem;
            line-height: 1.6;
            opacity: 0.8;
        }

        /* Responsive grid */
        @media (min-width: 640px) {
            .open-when-box-container {
                padding: 2rem;
            }

            .boxes-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media (min-width: 768px) {
            .open-when-box-container {
                padding: 2.5rem;
            }

            .boxes-grid {
                grid-template-columns: repeat(2, 1fr);
                max-width: 800px;
                margin: 0 auto;
            }
        }

        @media (min-width: 1024px) {
            .boxes-grid {
                grid-template-columns: repeat(3, 1fr);
                max-width: 1000px;
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
    </style>

    <div class="container container-xl">
        <div class="open-when-box-container">
            <!-- Back Button -->
            <a href="{{ route('gift.index') }}" class="back-button">
                <span>←</span> Back to Gifts
            </a>

            <!-- Header -->
            <div class="open-when-box-header">
                Open When Box
            </div>

            @if ($openWhenBoxes->count() > 0)
                <!-- Boxes Grid -->
                <div class="boxes-grid">
                    @foreach ($openWhenBoxes as $box)
                        <div class="box-card" onclick="openBox('{{ $box->slug }}')">
                            <div class="box-icon"><img src="{{ asset('images/mail.png') }}" alt=""></div>
                            <div class="box-title">{{ $box->title }}</div>
                            <div class="box-description">{{ $box->content }}</div>
                            <div class="box-actions">
                                <a href="{{ route('open-when-box.show', $box) }}" class="box-button">
                                    Open
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="empty-state">
                    <div class="empty-icon"><img src="{{ asset('images/mail.png') }}" alt=""></div>
                    <div class="empty-title">No Letters Yet</div>
                    <div class="empty-description">
                        The letters are being prepared with love.<br>
                        Check back soon for special messages! 💝
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            function openBox(slug) {
                const card = event.currentTarget;

                // Add click animation
                card.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    card.style.transform = '';
                }, 150);

                // Navigate to the box
                window.location.href = `/gift/open-when-box/${slug}`;
            }
        </script>
    @endpush

    <x-walker />
</section>
