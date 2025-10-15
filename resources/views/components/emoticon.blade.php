<div class="emoticon-wrap mx-auto relative">
    <style>
        /* Container that matches provided design */
        .emoticon-wrap {
            max-width: 360px;
            margin: 0 auto;
            /* background: #fbe5c9; */
            /* soft peach */
            border-radius: 10px;
            padding: 8px 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            border-radius: 25px;
            bottom: 1.5rem;
            /* outer maroon outline + existing inset subtle frame */
            /* box-shadow: 0 0 0 3px #3f0c0c, 0 0 0 4px rgba(0, 0, 0, 0.02) inset; */
        }

        /* maroon top-left and top-right corner accents like the image */


        .emoticon-wrap::before {
            left: -6px;
        }

        .emoticon-wrap::after {
            right: -6px;
        }

        .emote-list {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .emote-btn {
            width: 56px;
            height: 56px;
            border-radius: 9999px;
            background: #ffe7b8;
            /* inner circle color */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px;
            border: 2px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: transform 120ms ease, box-shadow 120ms ease;
        }

        .emote-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
        }

        .emote-btn img {
            width: 36px;
            height: 36px;
            object-fit: contain;
            display: block;
        }

        /* small rounded outer border to mimic screenshot frame */
        .emoticon-wrap {
            border: 2px solid rgba(0, 0, 0, 0.03);
        }

        @media (min-width: 768px) {
            .emoticon-wrap {
                max-width: 420px;
            }

            .emote-btn {
                width: 64px;
                height: 64px;
            }

            .emote-btn img {
                width: 40px;
                height: 40px;
            }
        }

        /* active state when an emote is selected - apply to the button */
        .emote-btn.active {
            background: #ffcc8d;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
            transform: translateY(-4px);
            outline: 3px solid rgba(255, 204, 141, 0.28);
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
                // call existing showEmotion if available
                if (typeof showEmotion === 'function') showEmotion(emote);

                // toggle active states
                const wrap = e.currentTarget.closest('.emoticon-wrap');
                const emoteList = wrap.querySelector('.emote-list');
                const allBtns = emoteList.querySelectorAll('.emote-btn');

                // if clicked button is already active, clear selection
                const isActive = e.currentTarget.classList.contains('active');
                if (isActive) {
                    e.currentTarget.classList.remove('active');
                    return;
                }

                // set active on clicked, remove from others
                allBtns.forEach(b => b.classList.remove('active'));
                e.currentTarget.classList.add('active');
            }
        </script>
    @endpush
</div>
