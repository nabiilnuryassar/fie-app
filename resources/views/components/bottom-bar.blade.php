<nav
    class="bottom-navigation fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-md bg-primary-light pixel-border border-t-4 z-50">
    <style>
        .bottom-navigation {
            max-width: 480px;
            /* Match mobile container width */
            background: #f4978e;
            border-top: 4px solid var(--color-text-dark, #2c2c2c);
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
        }

        .nav-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 4rem;
            /* padding: 0 1rem; */
            position: relative;
        }

        .bottom-item {
            position: relative;
            padding: 0.5rem;
            /* border-radius: var(--border-radius-sm, 6px); */
            transition: var(--transition-normal, 0.2s ease-in-out);
            text-decoration: none;
            /* color: var(--color-text-light, #ffffff); */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-width: 3rem;
            min-height: 3rem;
        }

        .bottom-item::after {
            content: '';
            position: absolute;
            left: 25%;
            bottom: 0;
            width: 50%;
            height: 3px;
            background: #f6d6d4;
            opacity: 0;
            transition: opacity var(--transition-normal, 0.2s ease-in-out);
            border-radius: 2px;
        }

        .bottom-item:hover {
            /* transform: none; */
        }

        .bottom-item:hover::after {
            opacity: 1;
        }

        .bottom-item:active {
            /* transform: translateY(0); */
        }

        .bottom-item img {
            width: 1.5rem;
            height: 1.5rem;
            transition: var(--transition-normal);
            filter: drop-shadow(1px 1px 2px rgba(0, 0, 0, 0.2));
        }

        .bottom-item.active {
            transform: none;
        }

        .bottom-item.active::after {
            opacity: 1;
        }

        .bottom-item.active img {
            filter: brightness(0.8) drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.3));
            transform: none;
        }


        /* Responsive adjustments - match container max-widths */
        @media (min-width: 480px) {
            .bottom-navigation {
                max-width: 540px;
                border-radius: var(--border-radius-md) var(--border-radius-md) 0 0;
            }
        }

        @media (min-width: 640px) {
            .bottom-navigation {
                max-width: 640px;
            }

            .nav-container {
                height: 4.5rem;
                /* padding: 0 2rem; */
            }

            .bottom-item {
                min-width: 3.5rem;
                min-height: 3.5rem;
                padding: 0.75rem;
            }

            .bottom-item img {
                width: 1.75rem;
                height: 1.75rem;
            }
        }

        @media (min-width: 768px) {
            .bottom-navigation {
                max-width: 768px;
            }

            .nav-container {
                height: 5rem;
                /* padding: 0 3rem; */
            }

            .bottom-item {
                min-width: 4rem;
                min-height: 4rem;
                padding: 1rem;
            }

            .bottom-item img {
                width: 2rem;
                height: 2rem;
            }
        }

        @media (min-width: 1024px) {
            .bottom-navigation {
                max-width: 1024px;
            }
        }

        /* Focus states for accessibility */
        .bottom-item:focus {
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
        }

        /* Animation for active state changes */
        @keyframes nav-activate {
            0% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-4px) scale(1.1);
            }

            100% {
                transform: translateY(-2px) scale(1.1);
            }
        }

        .bottom-item.activating {
            animation: nav-activate 0.3s ease-out;
        }
    </style>

    <div class="nav-container">

        <a href="/home" class="bottom-item text-center hover:text-primary transition-colors px-2" data-key="home">
            <img src="{{ asset('images/home-icon.png') }}" alt="home" class="w-6 h-6 mx-auto">
        </a>

        <a href="/schedule" class="bottom-item text-center hover:text-primary transition-colors px-2" data-key="schedule">
            <img src="{{ asset('images/check-icon.png') }}" alt="checklist" class="w-6 h-6 mx-auto">
        </a>

        <a href="/galery" class="bottom-item text-center hover:text-primary transition-colors px-2" data-key="gallery">
            <img src="{{ asset('images/image-icon.png') }}" alt="gallery" class="w-6 h-6 mx-auto">
        </a>

        <a href="{{ route('gift.index') }}" class="bottom-item text-center hover:text-primary transition-colors px-2"
            data-key="gift">
            <img src="{{ asset('images/gift.png') }}" alt="playlist" class="w-6 h-6 mx-auto">
        </a>

        <a href="/about" class="bottom-item text-center hover:text-primary transition-colors px-2" data-key="about">
            <img src="{{ asset('images/user-icon.png') }}" alt="about" class="w-6 h-6 mx-auto">
        </a>
    </div>
</nav>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const items = document.querySelectorAll('.bottom-item');
            const storageKey = 'bottomBarActive';

            function setActive(key, animate = false) {
                items.forEach(item => {
                    const isActive = item.dataset.key === key;

                    if (isActive && animate) {
                        item.classList.add('activating');
                        setTimeout(() => item.classList.remove('activating'), 300);
                    }

                    item.classList.toggle('active', isActive);
                    item.setAttribute('aria-current', isActive ? 'page' : 'false');
                });
            }

            function getCurrentPageKey() {
                const path = location.pathname.replace(/^\//, '').toLowerCase();
                // If the path starts with 'gift' (e.g. gift/playlist or gift/open-when-box), treat as gift
                if (path === '' || path === 'home') return 'home';
                if (path.startsWith('gift')) return 'gift';

                const mapping = {
                    'about': 'about',
                    'schedule': 'schedule',
                    'galery': 'gallery',
                    'gallery': 'gallery'
                };

                return mapping[path] || 'home';
            }

            // Initialize active state
            const currentKey = getCurrentPageKey();
            const savedKey = localStorage.getItem(storageKey);
            const initialKey = currentKey || savedKey || 'home';

            setActive(initialKey);

            // Handle navigation clicks
            items.forEach(item => {
                // Add keyboard support
                item.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        this.click();
                    }
                });

                item.addEventListener('click', function(e) {
                    const key = this.dataset.key;

                    // Add visual feedback
                    setActive(key, true);

                    // Save to localStorage
                    try {
                        localStorage.setItem(storageKey, key);
                    } catch (error) {
                        console.warn('Could not save navigation state:', error);
                    }

                    // Provide haptic feedback on mobile
                    if ('vibrate' in navigator) {
                        navigator.vibrate(30);
                    }

                    // Add loading state (optional)
                    this.style.opacity = '0.7';
                    setTimeout(() => {
                        this.style.opacity = '1';
                    }, 150);
                });

                // Hover visuals are handled purely via CSS (::after underline)
            });

            // Update active state when navigating back/forward
            window.addEventListener('popstate', function() {
                const newKey = getCurrentPageKey();
                setActive(newKey);
                localStorage.setItem(storageKey, newKey);
            });

            // Handle page visibility changes
            document.addEventListener('visibilitychange', function() {
                if (!document.hidden) {
                    const currentKey = getCurrentPageKey();
                    setActive(currentKey);
                }
            });
        });
    </script>
