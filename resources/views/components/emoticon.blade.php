<div class="emoticon-wrap mx-auto relative">
    <style>
        .emoticon-wrap {
            max-width: 100%;
            margin: 0 auto;
            border-radius: var(--border-radius-lg);
            padding: 0.75rem 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            top: 1.5rem;
            /* background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); */
        }

        .emote-list {
            display: flex;
            gap: 0.75rem;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .emote-btn {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 50%;
            background: linear-gradient(135deg, #ffe7b8 0%, #ffd89b 100%);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.375rem;
            border: 2px solid var(--color-text-dark);
            box-shadow: var(--shadow-pixel-sm);
            cursor: pointer;
            transition: var(--transition-fast);
            position: relative;
            overflow: hidden;
        }

        .emote-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
            opacity: 0;
            transition: opacity var(--transition-fast);
        }

        .emote-btn:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .emote-btn:hover::before {
            opacity: 1;
        }

        .emote-btn:active {
            transform: translateY(0) scale(0.95);
        }

        .emote-btn img {
            width: 2rem;
            height: 2rem;
            object-fit: contain;
            display: block;
            position: relative;
            z-index: 1;
            filter: drop-shadow(1px 1px 2px rgba(0, 0, 0, 0.2));
            image-rendering: -moz-crisp-edges;
            image-rendering: crisp-edges;
        }

        .emote-btn.active {
            background: linear-gradient(135deg, var(--color-accent) 0%, #ff8a80 100%);
            transform: translateY(-4px) scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            border-color: var(--color-primary-dark);
        }

        .emote-btn.active img {
            filter: drop-shadow(1px 1px 2px rgba(0, 0, 0, 0.4));
        }

        /* Responsive sizing */
        @media (max-width: 640px) {
            .emoticon-wrap {
                padding: 0.5rem 0.75rem;
                margin: 0 1rem;
            }

            .emote-list {
                gap: 0.5rem;
            }

            .emote-btn {
                width: 3rem;
                height: 3rem;
            }

            .emote-btn img {
                width: 1.75rem;
                height: 1.75rem;
            }
        }

        @media (min-width: 641px) and (max-width: 768px) {
            .emoticon-wrap {
                max-width: 420px;
                padding: 0.875rem 1.125rem;
            }

            .emote-btn {
                width: 3.75rem;
                height: 3.75rem;
            }

            .emote-btn img {
                width: 2.25rem;
                height: 2.25rem;
            }
        }

        @media (min-width: 769px) {
            .emoticon-wrap {
                max-width: 480px;
                padding: 1rem 1.5rem;
            }

            .emote-btn {
                width: 4rem;
                height: 4rem;
            }

            .emote-btn img {
                width: 2.5rem;
                height: 2.5rem;
            }
        }

        /* Accessibility improvements */
        .emote-btn:focus {
            outline: 3px solid var(--color-primary);
            outline-offset: 2px;
        }

        .emote-btn[aria-pressed="true"] {
            background: linear-gradient(135deg, var(--color-accent) 0%, #ff8a80 100%);
        }

        /* Animation for selection feedback */
        @keyframes emote-select {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1.1);
            }
        }

        .emote-btn.selecting {
            animation: emote-select 0.3s ease-out;
        }
    </style>

    <div class="emote-list" role="list">
        <button type="button" role="listitem" class="emote-btn" data-emote="happy"
            onclick="handleEmoteClick(event, 'happy')" aria-label="Happy">
            <img src="{{ asset('images/happy-emote.png') }}" alt="happy emote">
        </button>

        <button type="button" role="listitem" class="emote-btn" data-emote="sad"
            onclick="handleEmoteClick(event, 'sad')" aria-label="Sad">
            <img src="{{ asset('images/sad-emote.png') }}" alt="sad emote">
        </button>

        <button type="button" role="listitem" class="emote-btn" data-emote="shock"
            onclick="handleEmoteClick(event, 'shock')" aria-label="Shock">
            <img src="{{ asset('images/shock-emote.png') }}" alt="shock emote">
        </button>

        <button type="button" role="listitem" class="emote-btn" data-emote="angry"
            onclick="handleEmoteClick(event, 'angry')" aria-label="Angry">
            <img src="{{ asset('images/angry-emote.png') }}" alt="angry emote">
        </button>
    </div>

    @push('scripts')
        <script>
            function handleEmoteClick(e, emote) {
                const button = e.currentTarget;

                // Add selection animation
                button.classList.add('selecting');
                setTimeout(() => button.classList.remove('selecting'), 300);

                // Call showEmotion if available
                if (typeof showEmotion === 'function') {
                    showEmotion(emote);
                }

                // Update active states
                const wrap = button.closest('.emoticon-wrap');
                const allBtns = wrap.querySelectorAll('.emote-btn');

                // Toggle active state
                const isActive = button.classList.contains('active');

                // Remove active from all buttons
                allBtns.forEach(btn => {
                    btn.classList.remove('active');
                    btn.setAttribute('aria-pressed', 'false');
                });

                // If wasn't active, make it active
                if (!isActive) {
                    button.classList.add('active');
                    button.setAttribute('aria-pressed', 'true');
                }

                // Store selection in localStorage for persistence
                try {
                    if (!isActive) {
                        localStorage.setItem('selectedEmotion', emote);
                    } else {
                        localStorage.removeItem('selectedEmotion');
                    }
                } catch (e) {
                    console.warn('Could not save emotion selection:', e);
                }

                // Provide haptic feedback on mobile
                if ('vibrate' in navigator) {
                    navigator.vibrate(50);
                }
            }

            // Initialize emotion selection on page load
            document.addEventListener('DOMContentLoaded', function() {
                try {
                    const savedEmotion = localStorage.getItem('selectedEmotion');
                    if (savedEmotion) {
                        const button = document.querySelector(`[data-emote="${savedEmotion}"]`);
                        if (button) {
                            button.classList.add('active');
                            button.setAttribute('aria-pressed', 'true');

                            // Trigger emotion display
                            if (typeof showEmotion === 'function') {
                                showEmotion(savedEmotion);
                            }
                        }
                    }
                } catch (e) {
                    console.warn('Could not restore emotion selection:', e);
                }

                // Add keyboard navigation support
                const emoteButtons = document.querySelectorAll('.emote-btn');
                emoteButtons.forEach((button, index) => {
                    button.addEventListener('keydown', function(e) {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            handleEmoteClick(e, button.dataset.emote);
                        } else if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                            e.preventDefault();
                            const nextIndex = (index + 1) % emoteButtons.length;
                            emoteButtons[nextIndex].focus();
                        } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                            e.preventDefault();
                            const prevIndex = (index - 1 + emoteButtons.length) % emoteButtons.length;
                            emoteButtons[prevIndex].focus();
                        }
                    });
                });
            });
        </script>
    @endpush
</div>
