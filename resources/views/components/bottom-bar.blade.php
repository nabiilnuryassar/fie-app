<nav class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-md bg-primary-light pixel-border border-t-4 z-50">
    <div class="flex justify-around items-center h-16 text-dark-text">

        <a href="/home" class="bottom-item text-center hover:text-primary transition-colors px-2" data-key="home">
            <img src="{{ asset('images/home-icon.png') }}" alt="home" class="w-6 h-6 mx-auto">
        </a>

        <a href="/about" class="bottom-item text-center hover:text-primary transition-colors px-2" data-key="about">
            <img src="{{ asset('images/user-icon.png') }}" alt="about" class="w-6 h-6 mx-auto">
        </a>

        <a href="/schedule" class="bottom-item text-center hover:text-primary transition-colors px-2"
            data-key="schedule">
            <img src="{{ asset('images/check-icon.png') }}" alt="checklist" class="w-6 h-6 mx-auto">
        </a>

        <a href="#gallery" class="bottom-item text-center hover:text-primary transition-colors px-2" data-key="gallery">
            <img src="{{ asset('images/image-icon.png') }}" alt="gallery" class="w-6 h-6 mx-auto">
        </a>

        <a href="#playlist" class="bottom-item text-center hover:text-primary transition-colors px-2"
            data-key="playlist">
            <img src="{{ asset('images/music-icon.png') }}" alt="playlist" class="w-6 h-6 mx-auto">
        </a>
    </div>
</nav>

@push('scripts')
    <script>
        (function() {
            const items = document.querySelectorAll('.bottom-item');
            const storageKey = 'bottomBarActive';

            function setActive(key) {
                items.forEach(i => i.classList.toggle('active', i.dataset.key === key));
            }

            // Determine initial active: match location.pathname or saved key
            const saved = localStorage.getItem(storageKey);
            const path = location.pathname.replace(/^\//, '');
            const mapping = {
                '': 'home',
                'home': 'home',
                'about': 'about',
                'schedule': 'schedule'
            };
            const initial = saved || mapping[path] || null;
            if (initial) setActive(initial);

            items.forEach(item => {
                item.addEventListener('click', function() {
                    const key = this.dataset.key;
                    setActive(key);
                    try {
                        localStorage.setItem(storageKey, key);
                    } catch (e) {}
                });
            });
        })();
    </script>
    <style>
        .bottom-item {
            position: relative;
            padding-bottom: 6px;
        }

        .bottom-item.active img {
            filter: hue-rotate(-20deg) saturate(1.2);
            transform: scale(1.05);
        }

        .bottom-item.active {
            color: var(--primary, #f59e0b);
        }

        /* bottom indicator for active menu */
        .bottom-item.active::after {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -6px;
            width: 28px;
            height: 3px;
            background: #3f0c0c;
            /* maroon */
            border-radius: 2px;
            transition: width 140ms ease, opacity 140ms ease;
            opacity: 1;
        }
    </style>
