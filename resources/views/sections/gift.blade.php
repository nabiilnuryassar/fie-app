{{-- Gift Section Component --}}
<section class="gift-section section scrollable-page">
    <style>
        .gift-section {
            background: linear-gradient(135deg, var(--color-primary-light) 0%, #f0d084 100%);
            min-height: 100vh;
            /* Reserve space for fixed bottom bar + safe area */
            padding-bottom: calc(88px + env(safe-area-inset-bottom, 0px));
        }

        /* Override global container padding for this section */
        .gift-section .container {
            padding-left: 0;
            padding-right: 0;
        }

        .gift-container {
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-pixel-sm);
            width: 100%;
            margin: 0 auto;
        }

        .gift-header {
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

        .gift-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            width: 100%;
        }

        .gift-card {
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

        .gift-card:hover {
            transform: translateY(-4px);
            box-shadow: 6px 6px 0px var(--color-secondary);
        }

        .gift-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4, #FFEAA7);
            border-radius: var(--border-radius-sm) var(--border-radius-sm) 0 0;
        }

        .gift-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 2rem;
            /* border: 2px solid var(--color-secondary); */
            /* box-shadow: var(--shadow-pixel-sm); */
        }

        .gift-icon.playlist {
            background: linear-gradient(135deg, #FF6B6B 0%, #ff8a80 100%);
        }

        .gift-icon.openbox {
            /* background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%); */
        }

        .gift-icon.jar {
            background: linear-gradient(135deg, #FFEAA7 0%, #FDCB6E 100%);
        }

        .gift-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--color-secondary);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .gift-description {
            color: #6b4b32;
            line-height: 1.6;
            text-align: center;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .gift-status {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .gift-status.available {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .gift-status.coming-soon {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        .gift-actions {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .gift-button {
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

        .gift-button:hover {
            background: var(--color-surface);
            color: var(--color-secondary);
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px var(--color-secondary);
        }

        .gift-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Responsive grid */
        @media (min-width: 640px) {
            .gift-container {
                padding: 2rem;
            }

            .gift-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media (min-width: 768px) {
            .gift-container {
                padding: 2.5rem;
            }

            .gift-grid {
                grid-template-columns: repeat(2, 1fr);
                max-width: 800px;
                margin: 0 auto;
            }
        }

        @media (min-width: 1024px) {
            .gift-grid {
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

        .gift-icon {
            animation: float 3s ease-in-out infinite;
        }

        .gift-icon.playlist {
            animation-delay: 0s;
        }

        .gift-icon.openbox {
            animation-delay: 1s;
        }

        .gift-icon.jar {
            animation-delay: 2s;
        }
    </style>

    <div class="container container-xl">
        <div class="gift-container">
            <!-- Header -->
            <div class="gift-header">
                Special Gifts
            </div>

            <!-- Gift Grid -->
            <div class="gift-grid">
                <!-- Playlist Card -->
                <div class="gift-card" onclick="openGift('playlist')">
                    <div class="gift-icon playlist">
                        <img src="{{ asset('images/music.png') }}" alt="">
                    </div>
                    <div class="gift-title">My Serotonin</div>
                    <div class="gift-description">
                        This isn't just a playlist. It's my way of holding your hand across the distance. Each song is a
                        hug for the hard days and a reminder that we are in this together, always.
                    </div>
                    <div class="gift-actions">
                        <div class="gift-status available">
                            <span>✨</span> Available
                        </div>
                    </div>
                    <div class="gift-actions">
                        <a href="{{ route('playlist.index') }}" class="gift-button">
                            <span>🎧</span> Listen Now
                        </a>
                    </div>
                </div>

                <!-- Open When Box Card -->
                <div class="gift-card" onclick="openGift('openbox')">
                    <div class="gift-icon openbox"><img src="{{ asset('images/mail.png') }}" alt=""></div>
                    <div class="gift-title">Open When Box</div>
                    <div class="gift-description">
                        A collection of letters for different moments - when you're sad, happy, missing me, or just need
                        a reminder of how special you are.
                    </div>
                    <div class="gift-actions">
                        <div class="gift-status available">
                            <span>✨</span> Available
                        </div>
                    </div>
                    <div class="gift-actions">
                        <a href="{{ route('open-when-box.index') }}" class="gift-button">
                            <span>💌</span> Open Box
                        </a>
                    </div>
                </div>

                <!-- Reason Why Jar Card -->
                <div class="gift-card" onclick="openGift('jar')">
                    <div class="gift-icon jar">🏺</div>
                    <div class="gift-title">The Reason Why Jar</div>
                    <div class="gift-description">
                        A digital jar filled with all the reasons why you're amazing. Pull out a reason whenever you
                        need a reminder of how wonderful you are.
                    </div>
                    <div class="gift-actions">
                        <div class="gift-status coming-soon">
                            <span>⏳</span> Coming Soon
                        </div>
                    </div>
                    <div class="gift-actions">
                        <button class="gift-button" disabled>
                            <span>💝</span> Open Jar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function openGift(type) {
                const card = event.currentTarget;

                // Add click animation
                card.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    card.style.transform = '';
                }, 150);

                // Handle different gift types
                switch (type) {
                    case 'playlist':
                        // Already handled by the link
                        break;
                    case 'openbox':
                        // Already handled by the link
                        break;
                    case 'jar':
                        showComingSoon('Reason Why Jar');
                        break;
                }
            }

            function showComingSoon(giftName) {
                // Create a simple modal or alert
                const message = `${giftName} is coming soon! 💝\n\nI'm working on something special for you. Stay tuned! ✨`;
                alert(message);

                // Optional: Add sparkle effect
                createSparkles();
            }

            function createSparkles() {
                for (let i = 0; i < 5; i++) {
                    setTimeout(() => {
                        const sparkle = document.createElement('div');
                        sparkle.innerHTML = '✨';
                        sparkle.style.position = 'fixed';
                        sparkle.style.left = Math.random() * window.innerWidth + 'px';
                        sparkle.style.top = Math.random() * window.innerHeight + 'px';
                        sparkle.style.fontSize = '1.5rem';
                        sparkle.style.pointerEvents = 'none';
                        sparkle.style.zIndex = '9999';
                        sparkle.style.animation = 'sparkleFloat 2s ease-out forwards';

                        document.body.appendChild(sparkle);

                        setTimeout(() => {
                            sparkle.remove();
                        }, 2000);
                    }, i * 200);
                }
            }

            // Add sparkle animation CSS
            const style = document.createElement('style');
            style.textContent = `
                @keyframes sparkleFloat {
                    0% {
                        opacity: 1;
                        transform: translateY(0) scale(1);
                    }
                    100% {
                        opacity: 0;
                        transform: translateY(-100px) scale(0.5);
                    }
                }
            `;
            document.head.appendChild(style);
        </script>
    @endpush

    <x-walker />
</section>
