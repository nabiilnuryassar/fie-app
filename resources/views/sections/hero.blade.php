{{-- Hero Section Component --}}
<section class="hero-section section min-h-screen flex flex-col items-center justify-center text-center relative">
    <style>
        .hero-section {
            /* Reserve space for fixed bottom bar to avoid page scroll */
            --bottom-bar-height: 4rem;
            min-height: calc(100vh - var(--bottom-bar-height));
            overflow: hidden;
            background-image: url('{{ asset('images/bg-2.png') }}');
            background-size: cover;
            background-position: center -30px;
            background-repeat: no-repeat;
            background-attachment: scroll;
        }

        .header {
            position: relative;
            top: -50px;
            z-index: 1000;
            /* keep header above character/emoticon layers */
        }

        @media (min-width: 480px) {
            .hero-section {
                background-position: center -50px;
            }
        }

        @media (min-width: 640px) {
            .hero-section {
                --bottom-bar-height: 4.5rem;
                background-position: center -70px;
                background-attachment: fixed;
            }
        }

        @media (min-width: 768px) {
            .hero-section {
                --bottom-bar-height: 5rem;
                background-position: center -100px;
            }
        }

        .hero-header {
            background-color: var(--color-primary-dark, #761f28);
            color: var(--color-text-light, #ffffff);
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius-lg, 20px);
            box-shadow: 0 4px 0 rgba(0, 0, 0, 0.1), inset 0 2px 0 rgba(255, 255, 255, 0.2);
            display: inline-block;
            margin-bottom: 1rem;
            border: 2px solid var(--color-text-dark, #2c2c2c);
            text-shadow: none;
        }

        .hero-sub-header {
            background: linear-gradient(135deg, #ffe7b8 0%, #ffd89b 100%);
            color: var(--color-text-dark, #2c2c2c);
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius-lg, 20px);
            box-shadow: var(--shadow-pixel-sm, 4px 4px 0px #2c2c2c);
            display: inline-block;
            margin-bottom: 0.5rem;
            border: 2px solid var(--color-text-dark, #2c2c2c);
        }

        .character-container {
            position: relative;
            margin: 2rem 0;
            height: 220px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .character-display {
            max-height: 160%;
            max-width: 160%;
            transition: transform 0.3s ease;
            image-rendering: -moz-crisp-edges;
            image-rendering: crisp-edges;
        }

        .character-display:hover {
            transform: scale(1.05);
        }

        /* Responsive character sizing */
        @media (min-width: 640px) {
            .character-container {
                height: 280px;
                margin: 3rem 0;
            }
        }

        @media (min-width: 768px) {
            .character-container {
                height: 300px;
                margin: 4rem 0;
            }
        }

        /* Mobile-first responsive text sizing */
        .hero-header {
            font-size: 2rem;
            padding: 0.5rem 1rem;
        }

        .hero-sub-header {
            font-size: 1rem;
            padding: 0.5rem 1rem;

        }

        @media (min-width: 480px) {
            .hero-header {
                font-size: 2.5rem;
                padding: 0.625rem 1.25rem;
            }

            .hero-sub-header {
                font-size: 1.25rem;
                padding: 0.625rem 1.25rem;
            }
        }

        @media (min-width: 640px) {
            .hero-header {
                font-size: 3.5rem;
                padding: 0.75rem 1.5rem;
            }

            .hero-sub-header {
                font-size: 1.5rem;
                padding: 0.75rem 1.5rem;
            }
        }

        @media (min-width: 768px) {
            .hero-header {
                font-size: 4.5rem;
                padding: 1rem 2rem;
            }

            .hero-sub-header {
                font-size: 1.75rem;
                padding: 1rem 2rem;
            }
        }

        /* Notes Button Styling */
        .notes-button {
            background: linear-gradient(135deg, var(--color-accent, #FF6B6B) 0%, #ff8a80 100%);
            color: var(--color-text-light, #ffffff);
            border: 2px solid var(--color-text-dark, #2c2c2c);
            border-radius: var(--border-radius-md, 2px);
            padding: 0.375rem 0.5rem;
            font-size: 0.75rem;
            font-weight: bold;
            cursor: pointer;
            transition: var(--transition-normal, 0.2s ease-in-out);
            box-shadow: 3px 3px 0px #2c2c2c;
            margin-bottom: 1.5rem;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            position: relative;
            z-index: 1001;
            /* ensure button is clickable above overlapping elements */
        }

        .notes-button img {
            width: 0.875rem;
            height: 0.875rem;
            filter: brightness(0) invert(1);
            image-rendering: -moz-crisp-edges;
            image-rendering: crisp-edges;
        }

        /* Responsive Notes Button */
        @media (min-width: 480px) {
            .notes-button {
                padding: 0.5rem 0.625rem;
                font-size: 0.8rem;
            }

            .notes-button img {
                width: 1rem;
                height: 1rem;
            }
        }

        @media (min-width: 640px) {
            .notes-button {
                padding: 0.625rem 0.75rem;
                font-size: 0.875rem;
            }

            .notes-button img {
                width: 1.125rem;
                height: 1.125rem;
            }
        }

        @media (min-width: 768px) {
            .notes-button {
                padding: 0.75rem 1rem;
                font-size: 1rem;
            }

            .notes-button img {
                width: 1.25rem;
                height: 1.25rem;
            }
        }

        .notes-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .notes-button:active {
            transform: translateY(0);
        }

        /* Modal Styling */
        .notes-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000;
            animation: fadeIn 0.3s ease-out;
        }

        .notes-modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            position: relative;
            background: var(--color-surface, #ffffff);
            border: 2px solid var(--color-text-dark, #2c2c2c);
            border-radius: var(--border-radius-lg, 20px);
            box-shadow: var(--shadow-pixel, 6px 6px 0px #2c2c2c);
            width: 100%;
            max-width: 480px;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease-out;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            border-bottom: 2px solid var(--color-text-dark, #2c2c2c);
            background: linear-gradient(135deg, var(--color-primary-light, #f9dc9a) 0%, #f0d084 100%);
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: var(--color-text-dark, #2c2c2c);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .modal-title img {
            width: 1.25rem;
            height: 1.25rem;
            filter: brightness(0);
            image-rendering: -moz-crisp-edges;
            image-rendering: crisp-edges;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--color-text-dark, #2c2c2c);
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: var(--transition-fast, 0.1s ease-in-out);
        }

        .modal-close:hover {
            background: rgba(0, 0, 0, 0.1);
        }

        .notes-form {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: bold;
            color: var(--color-text-dark, #2c2c2c);
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .form-textarea {
            width: 100%;
            padding: 1rem;
            border: 2px solid var(--color-text-dark, #2c2c2c);
            border-radius: var(--border-radius-md, 12px);
            font-family: var(--font-family-pixel, 'VT323', monospace);
            font-size: 1rem;
            line-height: 1.5;
            resize: vertical;
            min-height: 120px;
            background: var(--color-surface, #ffffff);
            color: var(--color-text-dark, #2c2c2c);
            transition: var(--transition-fast, 0.1s ease-in-out);
        }

        .form-textarea:focus {
            outline: none;
            border-color: var(--color-primary, #f59e0b);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        }

        .form-textarea::placeholder {
            color: rgba(44, 44, 44, 0.6);
        }

        .char-counter {
            text-align: right;
            font-size: 0.875rem;
            color: rgba(44, 44, 44, 0.7);
            margin-top: 0.5rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-secondary {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--color-text-dark, #2c2c2c);
            border-radius: var(--border-radius-md, 12px);
            font-weight: bold;
            cursor: pointer;
            transition: var(--transition-normal, 0.2s ease-in-out);
            font-size: 1rem;
            min-width: 100px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-primary, #f59e0b) 0%, #f0d084 100%);
            color: var(--color-text-dark, #2c2c2c);
            box-shadow: var(--shadow-pixel-sm, 4px 4px 0px #2c2c2c);
        }

        .btn-secondary {
            background: var(--color-surface, #ffffff);
            color: var(--color-text-dark, #2c2c2c);
            box-shadow: var(--shadow-pixel-sm, 4px 4px 0px #2c2c2c);
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            transform: translateY(-2px);
        }

        .btn-primary:active,
        .btn-secondary:active {
            transform: translateY(0);
        }

        /* Responsive Modal */
        @media (max-width: 640px) {
            .modal-content {
                margin: 0.5rem;
                max-width: calc(100% - 1rem);
            }

            .modal-header {
                padding: 1rem;
            }

            .modal-title {
                font-size: 1.125rem;
            }

            .notes-form {
                padding: 1rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Status Alert */
        .alert {
            position: fixed;
            top: 0.75rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2000;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.625rem 1rem;
            border: 2px solid var(--color-text-dark, #2c2c2c);
            border-radius: var(--border-radius-lg, 20px);
            box-shadow: var(--shadow-pixel-sm, 4px 4px 0px #2c2c2c);
            font-weight: bold;
        }

        .alert-success {
            background: linear-gradient(135deg, #b9fbc0 0%, #98f5a8 100%);
            color: var(--color-text-dark, #2c2c2c);
        }

        .alert img {
            width: 1rem;
            height: 1rem;
        }
    </style>

    {{-- Hero Content --}}
    @if (session('status'))
        <div id="alertStatus" class="alert alert-success">
            <img src="{{ asset('images/check-icon.png') }}" alt="success">
            <span>{{ session('status') }}</span>
        </div>
    @endif
    <div class="header">
        <h1 class="hero-header heading-large-responsive font-bold animate-bounce-subtle">
            Hi, Fierda!
        </h1>
        <p class="hero-sub-header text-responsive">
            How are you feeling today?
        </p>
        <button id="openNotesModal" class="notes-button pixel-button"
            onclick="event.stopPropagation(); document.getElementById('notesModal').classList.add('show'); document.body.style.overflow='hidden';">
            <img src="{{ asset('images/pen.png') }}" alt="Take Notes">
        </button>
    </div>
    <div class="hero-content container container-md">
        {{-- Character Display --}}
        <div class="character-container">
            <img id="character-display" src="{{ asset('images/happy.png') }}" alt="Character emotion display"
                class="character-display">
        </div>

        {{-- Emotion Selection --}}
        @include('components.emoticon')
    </div>

    {{-- Notes Modal --}}
    <div id="notesModal" class="notes-modal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    <img src="{{ asset('images/pen.png') }}" alt="Take Notes"> How are you feeling today?
                </h3>
                <button id="closeNotesModal" class="modal-close">&times;</button>
            </div>

            <form id="notesForm" class="notes-form" method="POST" action="{{ route('feelings.store') }}">
                @csrf
                <div class="form-group">
                    <label for="feelingNotes" class="form-label">Describe your feelings:</label>
                    <textarea id="feelingNotes" name="feelingNotes" class="form-textarea"
                        placeholder="Tell me about your day, your thoughts, or how you're feeling right now..." rows="6"
                        maxlength="500"></textarea>
                    <div class="char-counter">
                        <span id="charCount">0</span>/500 characters
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" id="cancelNotes" class="btn-secondary">Cancel</button>
                    <button type="submit" class="btn-primary">Save Notes</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const characterDisplay = document.getElementById('character-display');
                const characterAssets = {
                    happy: '{{ asset('images/happy.png') }}',
                    sad: '{{ asset('images/sad.png') }}',
                    angry: '{{ asset('images/angry.png') }}',
                    shock: '{{ asset('images/shock.png') }}'
                };

                // Make showEmotion globally available
                window.showEmotion = function(emotion) {
                    const imageSrc = characterAssets[emotion];
                    if (imageSrc && characterDisplay) {
                        // Add a subtle animation when changing emotion
                        characterDisplay.style.transform = 'scale(0.9)';

                        // Change image source
                        characterDisplay.src = imageSrc;

                        // Reset transform after animation
                        setTimeout(() => {
                            characterDisplay.style.transform = '';
                        }, 150);
                    }
                };

                // Add loading state handling
                characterDisplay.addEventListener('load', function() {
                    this.style.opacity = '1';
                });

                characterDisplay.addEventListener('error', function() {
                    console.error('Failed to load character image');
                    this.src = '{{ asset('images/happy.png') }}'; // Fallback
                });

                // Notes Modal Functionality
                const notesModal = document.getElementById('notesModal');
                const openNotesBtn = document.getElementById('openNotesModal');
                const closeNotesBtn = document.getElementById('closeNotesModal');
                const cancelNotesBtn = document.getElementById('cancelNotes');
                const notesForm = document.getElementById('notesForm');
                const feelingNotes = document.getElementById('feelingNotes');
                const charCount = document.getElementById('charCount');
                const modalOverlay = notesModal.querySelector('.modal-overlay');

                // Open modal
                openNotesBtn.addEventListener('click', function() {
                    notesModal.classList.add('show');
                    document.body.style.overflow = 'hidden';

                    // Load saved notes
                    const savedNotes = localStorage.getItem('dailyFeelingNotes');
                    if (savedNotes) {
                        feelingNotes.value = savedNotes;
                        updateCharCount();
                    }

                    // Focus on textarea
                    setTimeout(() => feelingNotes.focus(), 300);
                });

                // Close modal functions
                function closeModal() {
                    notesModal.classList.remove('show');
                    document.body.style.overflow = '';
                }

                closeNotesBtn.addEventListener('click', closeModal);
                cancelNotesBtn.addEventListener('click', closeModal);
                modalOverlay.addEventListener('click', closeModal);

                // Close on Escape key
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && notesModal.classList.contains('show')) {
                        closeModal();
                    }
                });

                // Character counter
                function updateCharCount() {
                    const count = feelingNotes.value.length;
                    charCount.textContent = count;

                    // Change color based on character count
                    if (count > 450) {
                        charCount.style.color = '#dc2626'; // Red
                    } else if (count > 400) {
                        charCount.style.color = '#f59e0b'; // Yellow
                    } else {
                        charCount.style.color = 'rgba(44, 44, 44, 0.7)'; // Default
                    }
                }

                feelingNotes.addEventListener('input', updateCharCount);

                // Form submission -> allow normal submit to controller
                notesForm.addEventListener('submit', function() {
                    // Clear draft on successful submission start
                    try {
                        localStorage.removeItem('dailyFeelingNotesDraft');
                    } catch (err) {}
                });

                // Auto-dismiss status alert
                const statusAlert = document.getElementById('alertStatus');
                if (statusAlert) {
                    setTimeout(() => {
                        statusAlert.remove();
                    }, 2500);
                }

                // Auto-save draft while typing (debounced)
                let saveTimeout;
                feelingNotes.addEventListener('input', function() {
                    clearTimeout(saveTimeout);
                    saveTimeout = setTimeout(() => {
                        if (feelingNotes.value.trim()) {
                            localStorage.setItem('dailyFeelingNotesDraft', feelingNotes.value);
                        }
                    }, 1000);
                });

                // Load draft on page load
                const savedDraft = localStorage.getItem('dailyFeelingNotesDraft');
                const savedDate = localStorage.getItem('dailyFeelingNotesDate');
                const today = new Date().toDateString();

                // Clear old drafts
                if (savedDate !== today) {
                    localStorage.removeItem('dailyFeelingNotesDraft');
                    localStorage.removeItem('dailyFeelingNotes');
                }
            });
        </script>
    @endpush
</section>
