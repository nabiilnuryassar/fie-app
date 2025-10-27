{{-- Playlist Section Component --}}
<section class="playlist-section section scrollable-page">
    <style>
        /* Reserve space for the fixed bottom bar */
        .playlist-container {
            padding-bottom: calc(88px + env(safe-area-inset-bottom, 0px));
        }

        .playlist-section {
            background: linear-gradient(135deg, var(--color-primary-light) 0%, #f0d084 100%);
            min-height: 100vh;
            /* Reserve space for fixed bottom bar + safe area */
            padding-bottom: calc(88px + env(safe-area-inset-bottom, 0px));
        }

        /* Override global container padding for this section */
        .playlist-section .container {
            padding-left: 0;
            padding-right: 0;
        }

        .playlist-container {
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            box-shadow: var(--shadow-pixel);
            max-width: 100%;
            margin: 0 auto;
        }

        .playlist-header {
            position: relative;
            display: block;
            width: 100%;
            margin: 1rem auto .75rem;
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

        /* Back button to return to Gift index */
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
            margin-bottom: 1rem;
        }

        .back-button:hover {
            background: var(--color-surface);
            color: var(--color-secondary);
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px var(--color-secondary);
        }



        .playlist-subtitle {
            font-size: clamp(1rem, 4vw, 1.25rem);
            color: var(--color-primary-dark);
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .playlist-frame {
            width: 100%;
            height: auto;
            /* allow content below cover to be visible */
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-md);
            overflow: visible;
            /* avoid clipping caption/info */
            box-shadow: var(--shadow-pixel-sm);
        }

        .playlist-info {
            margin-top: 20px;
            padding: 16px;
            background: white;
            /* border: 2px solid #8B4513; */
            /* border-radius: 8px; */
        }

        .playlist-info h3 {
            font-size: 32px;
            color: #8B4513;
            margin-bottom: 4px;
            margin-top: 1rem;
            font-style: italic;
            font-weight: bold;
        }

        .playlist-info p {
            font-size: 16px;
            color: #8B4513;
            line-height: 1.4;
            margin-bottom: 4px;
        }

        .playlist-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 12px;
        }

        .playlist-tag {
            background-color: #FFB6C1;
            color: #8B008B;
            padding: 6px 12px;
            border-radius: 16px;
            border: 2px solid #8B008B;
            font-size: 14px;
        }

        .playlist-actions {
            margin-top: 24px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .playlist-button {
            padding: 10px 18px;
            border: 2px solid #654321;
            border-radius: 8px;
            background-color: #90EE90;
            color: #2F4F2F;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .playlist-button.secondary {
            background-color: #FF6B6B;
            color: white;
        }

        .playlist-button:hover {
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px #654321;
        }

        .playlist-button:active {
            transform: translateY(0);
            box-shadow: none;
        }

        /* Responsive adjustments */
        @media (min-width: 640px) {
            .playlist-container {
                max-width: 600px;
                padding: 2.5rem;
            }

            .playlist-frame {
                height: 400px;
            }
        }

        @media (min-width: 768px) {
            .playlist-container {
                max-width: 700px;
                padding: 3rem;
            }

            .playlist-frame {
                height: 450px;
            }
        }

        @media (min-width: 1024px) {
            .playlist-container {
                max-width: 800px;
            }
        }

        /* Songs list */
        .songs-section-title {
            position: relative;
            display: block;
            width: max-content;
            align-items: center;
            gap: .5rem;
            margin: 1.75rem auto .75rem;
            padding: .5rem 1rem;
            color: var(--color-secondary);
            background: var(--color-primary-light);
            border: 2px solid var(--color-secondary);
            border-radius: 9999px;
            box-shadow: var(--shadow-pixel-sm);
            font-weight: 800;
            letter-spacing: .3px;
            text-transform: uppercase;
        }

        .songs-section-title::before {
            content: '\266B';
            /* music note */
            display: inline-grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--color-secondary);
            color: #fff;
            box-shadow: 1px 1px 0 var(--color-secondary);
            font-size: 14px;
        }



        .songs-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: .75rem;
        }

        @media (min-width: 640px) {
            .songs-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .song-card {
            display: flex;
            gap: .75rem;
            padding: .75rem;
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-md);
            background: var(--color-surface);
            box-shadow: var(--shadow-pixel-sm);
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .song-card:hover {
            transform: translateY(-2px);
            box-shadow: 4px 4px 0 var(--color-secondary);
        }

        .song-thumb {
            width: 64px;
            height: 64px;
            border-radius: 10px;
            object-fit: cover;
            flex-shrink: 0;
            border: 2px solid var(--color-secondary);
        }

        .song-meta {
            display: flex;
            flex-direction: column;
            gap: .25rem;
            overflow: hidden;
        }

        .song-title {
            font-weight: 700;
            color: #432818;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .song-desc {
            color: #6b4b32;
            font-size: .95rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Song detail modal */
        .song-modal {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 60;
        }

        .song-modal.active {
            display: flex;
        }

        .song-modal .modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .5);
        }

        .song-modal .modal-dialog {
            position: relative;
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-pixel-sm);
            max-width: 26rem;
            width: calc(100% - 2rem);
            padding: 1rem;
        }

        .song-modal .modal-close-icon {
            position: absolute;
            top: .5rem;
            right: .5rem;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #654321;
            background: var(--color-primary-light);
            color: #432818;
            border-radius: var(--border-radius-sm);
            cursor: pointer;
            transition: var(--transition-normal);
            font-weight: bold;
        }

        .song-modal .modal-close-icon:hover {
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px #654321;
        }

        .song-cover {
            width: 100%;
            border-radius: 12px;
            border: 2px solid var(--color-secondary);
            object-fit: cover;
            margin-bottom: .75rem;
        }

        .song-detail-title {
            font-size: 1.125rem;
            font-weight: 800;
            color: var(--color-secondary);
            margin-bottom: .25rem;
            text-align: center;
        }

        .song-detail-desc {
            color: #6b4b32;
            line-height: 1.5;
            text-align: center;
        }

        /* Playlist info inside frame */
        .playlist-frame .playlist-info {
            margin-top: 12px;
            padding: 0;
            background: transparent;
        }

        /* Pagination */
        .pager {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .pager-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 .5rem;
            border: 2px solid var(--color-secondary);
            border-radius: 9999px;
            background: var(--color-primary-light);
            color: var(--color-secondary);
            font-weight: 800;
            box-shadow: var(--shadow-pixel-sm);
            transition: transform .15s ease, box-shadow .15s ease;
            text-decoration: none;
        }

        .pager-button:hover {
            transform: translateY(-2px);
            box-shadow: 3px 3px 0 var(--color-secondary);
        }

        .pager-button[aria-disabled="true"] {
            opacity: .5;
            pointer-events: none;
        }

        .pager-button.active {
            background: var(--color-secondary);
            color: #fff;
        }
    </style>

    <div class="container container-xl">
        <div class="playlist-container">
                <a href="{{ route('gift.index') }}" class="back-button">
                    <span>←</span> Back to Gift
                </a>
            <div class="playlist-header">Fierda's Playlist</div>
            <div class="playlist-subtitle">The songs that sound like your smile.</div>

            <style>
                .playlist-frame {
                    border-radius: 16px;
                    background: linear-gradient(135deg, rgba(255, 255, 255, .7), rgba(255, 255, 255, .5));
                    padding: 8px;
                    box-shadow: 0 8px 24px rgba(0, 0, 0, .12);
                    /* let content define height, do not clip caption */
                    overflow: visible;
                    position: relative;
                }



                .playlist-link {
                    display: block;
                    width: 100%;
                    height: auto;
                    /* let link wrap the image only */
                    border-radius: 12px;
                    text-decoration: none;
                    color: inherit;
                    overflow: hidden;
                    position: relative;
                    /* make badge position relative to this container */
                }

                .playlist-cover {
                    width: 100%;
                    height: auto;
                    /* allow image to size naturally */
                    display: block;
                    border-radius: 12px;
                    object-fit: cover;
                    object-position: center;
                    box-shadow: none;
                    filter: blur(3px);
                    transition: filter .25s ease;
                }

                .playlist-frame:hover {
                    transform: translateY(-2px);
                    transition: transform .2s ease;
                }

                .spotify-badge {
                    position: absolute;
                    /* center the badge over the cover */
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    pointer-events: none;
                    z-index: 20;
                    /* ensure it sits above the image */
                }

                .spotify-icon {
                    width: 64px;
                    height: 64px;
                    background: #1DB954;
                    border-radius: 50%;
                    box-shadow: 0 6px 16px rgba(0, 0, 0, .18);
                    display: grid;
                    place-items: center;
                    transform: scale(1);
                    transition: transform .2s ease;
                }

                .playlist-frame:hover .spotify-icon {
                    transform: scale(1.06);
                }

                .playlist-frame:hover .playlist-cover {
                    filter: blur(5px);
                }
            </style>

            <div class="playlist-frame" data-open-modal="playlist-modal" role="button" tabindex="0"
                aria-label="Buka detail playlist">
                <div class="playlist-link">
                    <img class="playlist-cover" src="{{ asset('images/us.jpeg') }}" alt="Fierda Playlist Cover" />
                    <div class="spotify-badge" aria-hidden="true">
                        <div class="spotify-icon">
                            <svg width="34" height="34" viewBox="0 0 168 168" fill="none"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path fill="#fff"
                                    d="M83.996 0C37.64 0 0 37.64 0 84.004 0 130.36 37.64 168 83.996 168 130.36 168 168 130.36 168 84.004 168 37.64 130.36 0 83.996 0Zm38.52 121.36c-1.5 0-2.42-.48-3.78-1.32-22.92-13.62-51.78-16.74-85.86-9.36-1.86.42-4.08.96-5.28.96-3.72 0-6-2.94-6-6.06 0-3.78 2.34-5.52 5.28-6.12 37.92-8.16 70.98-4.5 97.5 11.4 2.28 1.32 3.42 2.76 3.42 5.82 0 3.36-2.76 6.6-5.28 6.6Zm6.84-17.76c-1.8 0-2.94-.66-4.26-1.5-25.56-15.18-64.44-20.04-94.92-11.16-1.98.54-3.06.96-5.04.96-3.36 0-6.3-2.64-6.3-6.06 0-3.78 1.98-5.7 5.52-6.78 34.5-9.72 77.7-4.86 106.62 12.18 2.76 1.62 3.9 3.18 3.9 6.18 0 3.72-3.06 6.24-5.52 6.24Zm7.32-18.3c-1.62 0-2.64-.42-3.96-1.2-28.68-17.04-72.18-18.78-98.28-10.26-1.8.6-2.94.96-4.74.96-3.78 0-6.36-3-6.36-6.84 0-3.9 2.4-6.12 5.76-7.2 30.24-9.24 80.82-7.8 113.16 11.4 2.34 1.38 3.48 3.12 3.48 6.6 0 3.84-3.24 6.9-5.52 6.9Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="playlist-info">
                    <h3>my serotonin</h3>
                    <p class="text-justify">My serotonin boost, for my everything. Each song is a piece of my heart,
                        chosen just for you, ilysm.</p>
                </div>
            </div>
            {{-- Playlist CTA Modal --}}
            <div id="playlist-modal" class="song-modal" aria-hidden="true" role="dialog" aria-modal="true">
                <div class="modal-backdrop" data-close></div>
                <div class="modal-dialog">
                    <button type="button" class="modal-close-icon" data-close>&times;</button>
                    <img class="song-cover" src="{{ asset('images/us.jpeg') }}" alt="Fierda Playlist Cover" />
                    <div class="song-detail-title">my serotonin</div>
                    <div class="song-detail-desc">The songs that sound like your smile.</div>
                    <div class="pager" style="margin-top:.75rem">
                        <a class="pager-button"
                            href="https://open.spotify.com/playlist/41V1OZSWQi1T44iBWiwVVB?si=2iPT2kI7TJKTuIqcb9ujIw&pt=d713e953d37a25ded0268bcbf549b8ff"
                            target="_blank" rel="noopener" aria-label="Play on Spotify">
                            Play on Spotify
                        </a>
                    </div>
                </div>
            </div>
            {{-- @dd($playlists) --}}

            @if (isset($playlists) && count($playlists))
                <h3 class="songs-section-title"> LIST SONGS</h3>
                <div class="songs-grid">
                    @foreach ($playlists as $p)
                        <div class="song-card" data-open-modal="song-modal-{{ $p->id }}" tabindex="0"
                            role="button" aria-label="Buka detail {{ $p->title }}">
                            <img class="song-thumb" src="{{ Storage::url($p->thumbnail) }}"
                                alt="{{ $p->title }} thumbnail" />
                            <div class="song-meta">
                                <div class="song-title">{{ $p->title }}</div>
                                <div class="song-desc">{{ $p->description }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @foreach ($playlists as $p)
                    <div id="song-modal-{{ $p->id }}" class="song-modal" aria-hidden="true" role="dialog"
                        aria-modal="true">
                        <div class="modal-backdrop" data-close></div>
                        <div class="modal-dialog">
                            <button type="button" class="modal-close-icon" data-close>&times;</button>
                            <img class="song-cover" src="{{ Storage::url($p->image) }}"
                                alt="{{ $p->title }} cover" />
                            <div class="song-detail-title">{{ $p->title }}</div>
                            <div class="song-detail-desc">{{ $p->description }}</div>
                        </div>
                    </div>
                @endforeach

                @if (method_exists($playlists, 'hasPages') && $playlists->hasPages())
                    @php
                        $current = $playlists->currentPage();
                        $last = $playlists->lastPage();
                        $window = 1; // show 1 page on each side
                        $start = max(1, $current - $window);
                        $end = min($last, $current + $window);
                    @endphp
                    <nav class="pager" role="navigation" aria-label="Pagination Navigation">
                        <a class="pager-button" href="{{ $playlists->previousPageUrl() ?? '#' }}"
                            aria-disabled="{{ $playlists->onFirstPage() ? 'true' : 'false' }}"
                            aria-label="Previous Page">&laquo;</a>

                        @if ($start > 1)
                            <a class="pager-button" href="{{ $playlists->url(1) }}" aria-label="Page 1">1</a>
                            @if ($start > 2)
                                <span class="pager-button" aria-disabled="true">…</span>
                            @endif
                        @endif

                        @for ($i = $start; $i <= $end; $i++)
                            <a class="pager-button {{ $i === $current ? 'active' : '' }}"
                                href="{{ $playlists->url($i) }}"
                                @if ($i === $current) aria-current="page" @endif>{{ $i }}</a>
                        @endfor

                        @if ($end < $last)
                            @if ($end < $last - 1)
                                <span class="pager-button" aria-disabled="true">…</span>
                            @endif
                            <a class="pager-button" href="{{ $playlists->url($last) }}"
                                aria-label="Page {{ $last }}">{{ $last }}</a>
                        @endif

                        <a class="pager-button" href="{{ $playlists->nextPageUrl() ?? '#' }}"
                            aria-disabled="{{ $playlists->hasMorePages() ? 'false' : 'true' }}"
                            aria-label="Next Page">&raquo;</a>
                    </nav>
                @endif
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            (function() {
                // Open and close song detail modals
                document.addEventListener('click', function(e) {
                    const opener = e.target.closest('[data-open-modal]');
                    if (opener) {
                        const id = opener.getAttribute('data-open-modal');
                        const modal = document.getElementById(id);
                        if (modal) {
                            modal.classList.add('active');
                            modal.setAttribute('aria-hidden', 'false');
                        }
                        return;
                    }

                    // Close on backdrop or close button
                    if (e.target.matches('.song-modal [data-close]') || e.target.matches(
                            '.song-modal .modal-backdrop')) {
                        const modal = e.target.closest('.song-modal');
                        if (modal) {
                            modal.classList.remove('active');
                            modal.setAttribute('aria-hidden', 'true');
                        }
                    }
                });

                // Close on Esc
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        document.querySelectorAll('.song-modal.active').forEach(function(m) {
                            m.classList.remove('active');
                            m.setAttribute('aria-hidden', 'true');
                        });
                    }
                });

                // Share helpers (global)
                window.sharePlaylist = function() {
                    const url = 'https://open.spotify.com/playlist/41V1OZSWQi1T44iBWiwVVB';
                    if (navigator.share) {
                        navigator.share({
                            title: 'Playlist Semangat Fierda',
                            text: 'Dengerin playlist semangat yang bikin hari makin ceria! 🎶',
                            url,
                        }).catch(function() {
                            copyToClipboard(url);
                        });
                    } else {
                        copyToClipboard(url);
                    }
                };

                window.copyToClipboard = function(text) {
                    if (navigator.clipboard && navigator.clipboard.writeText) {
                        navigator.clipboard.writeText(text).then(function() {
                            alert('Link playlist sudah disalin! 🎧');
                        });
                    } else {
                        // Fallback for older browsers
                        const ta = document.createElement('textarea');
                        ta.value = text;
                        document.body.appendChild(ta);
                        ta.select();
                        try {
                            document.execCommand('copy');
                            alert('Link playlist sudah disalin! 🎧');
                        } finally {
                            document.body.removeChild(ta);
                        }
                    }
                };
            })();
        </script>
    @endpush
    <x-walker />

</section>
