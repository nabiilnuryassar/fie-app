{{-- Schedule/Checklist Section Component --}}
<section class="schedule-section section scrollable-page">
    <style>
        .schedule-section {
            background: linear-gradient(135deg, var(--color-primary-light) 0%, #f0d084 100%);
            min-height: 100vh;
            /* Reserve space for fixed bottom bar + safe area */
            padding-bottom: calc(88px + env(safe-area-inset-bottom, 0px));
        }

        .date-header {
            font-size: clamp(1.5rem, 5vw, 2rem);
            font-weight: bold;
            color: white;
            margin: 0 auto 2rem;
            padding: 0.5rem 1.5rem;
            background-color: #761f28;
            border-radius: 8px;
            text-align: center;
            display: inline-block;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Center only the page header that has text-center class */
        .date-header.text-center {
            display: block;
            width: max-content;
            margin-left: auto;
            margin-right: auto;
        }

        .schedule-card {
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-md);
            margin-bottom: 1rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: var(--shadow-pixel-sm);
            transition: var(--transition-normal);
        }

        /* Grouping layout */
        .groups {
            display: block;
            margin-top: .75rem;
        }

        .day-group {
            margin: 1.25rem 0 1.25rem;
        }

        .day-header {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .375rem .875rem .375rem .75rem;
            background: rgba(255, 255, 255, 0.8);
            color: #432818;
            border: 2px solid #654321;
            border-radius: 10px;
            box-shadow: 2px 2px 0 #654321;
            font-weight: 600;
            letter-spacing: .3px;
            margin-bottom: .75rem;
        }

        .day-header::before {
            content: '';
            width: 8px;
            height: 8px;
            border-radius: 2px;
            background: linear-gradient(135deg, var(--color-secondary) 0%, #f4b860 100%);
            box-shadow: 1px 1px 0 #654321;
        }

        .group-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: .75rem;
        }

        .schedule-icon {
            width: 3rem;
            height: 3rem;
            background-color: transparent;
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--color-text-light);
            flex-shrink: 0;
        }

        .schedule-content {
            flex: 1;
        }

        .schedule-activity {
            font-size: 18px;
            font-weight: bold;
            color: #8B4513;
            margin-bottom: 4px;
        }

        .schedule-time {
            font-size: 16px;
            color: #8B4513;
            margin-bottom: 8px;
        }

        .schedule-status {
            background-color: #FFA500;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
            display: inline-block;
        }

        /* Status variants */
        .status-badge {
            border: 2px solid #654321;
            box-shadow: 2px 2px 0 #654321;
        }

        .status-badge.is-done {
            background-color: #90EE90;
            color: #2F4F2F;
        }

        .status-badge.is-pending {
            background-color: #FFA500;
            color: #FFFFFF;
        }

        .schedule-actions {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 40px;
            height: 32px;
            border: 2px solid #654321;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.2s ease;
        }

        .action-btn.done {
            background-color: #90EE90;
            color: #2F4F2F;
        }

        .action-btn.cancel {
            background-color: #FF6B6B;
            color: white;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px #654321;
        }

        .action-btn:active {
            transform: translateY(0);
            box-shadow: none;
        }

        .no-reminder-card {
            background: transparent;
            border: 2px dashed #B8860B;
            border-radius: 8px;
            padding: 32px;
            text-align: center;
            margin-top: 32px;
        }

        .no-reminder-icon {
            font-size: 48px;
            color: #B8860B;
            margin-bottom: 16px;
        }

        .no-reminder-text {
            font-size: 18px;
            color: #8B4513;
            font-weight: bold;
        }

        /* Responsive adjustments */
        @media (min-width: 640px) {
            .schedule-card {
                padding: 1.5rem;
                gap: 1.5rem;
            }

            .group-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .schedule-icon {
                width: 3.5rem;
                height: 3.5rem;
                font-size: 1.75rem;
            }
        }

        @media (min-width: 768px) {
            .schedule-card {
                padding: 2rem;
            }

            .schedule-icon {
                width: 4rem;
                height: 4rem;
                font-size: 2rem;
            }

            .group-grid {
                gap: 1rem;
            }
        }

        .affirmation-modal {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 50;
        }

        .affirmation-modal.active {
            display: flex;
        }

        .affirmation-modal .modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .affirmation-modal .modal-dialog {
            position: relative;
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-pixel-sm);
            max-width: 22rem;
            width: calc(100% - 2rem);
            padding: 1rem;
            transform: translateY(10px);
            transition: var(--transition-normal);
        }

        .affirmation-modal.active .modal-dialog {
            transform: translateY(0);
        }

        .affirmation-modal .modal-title {
            font-size: clamp(1.2rem, 4vw, 1.5rem);
            color: var(--color-secondary);
            margin-bottom: .5rem;
            text-align: center;
        }

        .affirmation-modal .modal-text {
            color: #8B4513;
            font-size: 1rem;
            line-height: 1.5;
            text-align: center;
            margin-bottom: 1rem;
        }

        .affirmation-modal .modal-actions {
            display: flex;
            gap: .5rem;
            justify-content: center;
        }

        .affirmation-modal .modal-close {
            border: 2px solid #654321;
            background: var(--color-primary-light);
            color: #432818;
            padding: .5rem 1rem;
            border-radius: var(--border-radius-sm);
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .affirmation-modal .modal-close:hover {
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px #654321;
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

        /* Modal close icon */
        .affirmation-modal .modal-close-icon {
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
            line-height: 1;
            font-weight: bold;
        }

        .affirmation-modal .modal-close-icon:hover {
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px #654321;
        }
    </style>

    <div class="container container-md">
        @if (session('status'))
            @php($type = session('status_type', 'done'))
            <div class="affirmation-modal active" id="status-modal" aria-hidden="false" role="dialog" aria-modal="true">
                <div class="modal-backdrop" data-close="true"></div>
                <div class="modal-dialog" style="max-width:22rem; position: relative;">
                    <button type="button" class="modal-close modal-close-icon" data-close>&times;</button>
                    <div class="modal-title" style="{{ $type === 'done' ? '' : 'color:#b91c1c;' }}">
                        {{ $type === 'done' ? 'Success' : 'Notice' }}
                    </div>
                    <div id="status-modal-text" class="modal-text"
                        style="{{ $type === 'done' ? '' : 'color:#7f1d1d;' }}">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        @endif
        <h2 class="date-header text-center">Fierda's Schedule</h2>

        <!-- Schedule Cards -->
        @if (isset($schedulesByDate) && $schedulesByDate->count() > 0)
            <div class="groups">
                @foreach ($schedulesByDate as $date => $items)
                    <div class="day-group">
                        <div class="day-header">
                            {{ \Carbon\Carbon::parse($date)->locale('id')->translatedFormat('D, d M Y') }}
                        </div>
                        <div class="group-grid">
                            @foreach ($items as $schedule)
                                <div class="schedule-card" data-schedule-id="{{ $schedule->id }}">
                                    <div class="schedule-icon">
                                        @php($name = strtolower($schedule->activity))
                                        @if (str_contains($name, 'breakfast') || str_contains($name, 'sarapan'))
                                            <img src="{{ asset('images/food.png') }}" alt="Breakfast"
                                                style="width:100%;height:100%;object-fit:contain;" />
                                        @elseif (str_contains($name, 'lunch') || str_contains($name, 'makan siang'))
                                            <img src="{{ asset('images/pizza.png') }}" alt="Lunch"
                                                style="width:100%;height:100%;object-fit:contain;" />
                                        @elseif (str_contains($name, 'sleep') || str_contains($name, 'tidur'))
                                            <img src="{{ asset('images/sleep.png') }}" alt="Sleep"
                                                style="width:100%;height:100%;object-fit:contain;" />
                                        @else
                                            <img src="{{ asset('images/check-icon.png') }}" alt="Activity"
                                                style="width:100%;height:100%;object-fit:contain;" />
                                        @endif
                                    </div>

                                    <div class="schedule-content">
                                        <div class="schedule-activity">{{ $schedule->activity }}</div>
                                        <div class="schedule-time">{{ date('H:i', strtotime($schedule->start_time)) }}
                                        </div>
                                        <span
                                            class="schedule-status status-badge {{ $schedule->is_done ? 'is-done' : 'is-pending' }}">{{ $schedule->is_done ? 'Done' : 'Pending' }}</span>
                                    </div>
                                    <div class="schedule-actions">
                                        <form method="POST" action="{{ route('schedule.mark') }}">
                                            @csrf
                                            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                                            <button type="submit" name="is_done" value="1"
                                                class="action-btn done">✓</button>
                                            <button type="submit" name="is_done" value="0"
                                                class="action-btn cancel">✗</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Default Schedule Items -->
            <div class="schedule-card" data-schedule-id="1">
                <div class="schedule-icon"><img src="{{ asset('images/food.png') }}" alt="Eat Breakfast"
                        style="width:100%;height:100%;object-fit:contain;" /></div>
                <div class="schedule-content">
                    <div class="schedule-activity">Eat Breakfast</div>
                    <div class="schedule-time">07:30</div>
                    <span class="schedule-status">Pending</span>
                </div>
                <div class="schedule-actions">
                    <button class="action-btn done" onclick="markSchedule(1, true)">
                        ✓
                    </button>
                    <button class="action-btn cancel" onclick="markSchedule(1, false)">
                        ✗
                    </button>
                </div>
            </div>

            <div class="schedule-card" data-schedule-id="2">
                <div class="schedule-icon"><img src="{{ asset('images/pizza.png') }}" alt="Eat Lunch"
                        style="width:100%;height:100%;object-fit:contain;" /></div>
                <div class="schedule-content">
                    <div class="schedule-activity">Eat Lunch</div>
                    <div class="schedule-time">12:30</div>
                    <span class="schedule-status">Pending</span>
                </div>
                <div class="schedule-actions">
                    <button class="action-btn done" onclick="markSchedule(2, true)">
                        ✓
                    </button>
                    <button class="action-btn cancel" onclick="markSchedule(2, false)">
                        ✗
                    </button>
                </div>
            </div>

            <div class="schedule-card" data-schedule-id="3">
                <div class="schedule-icon"><img src="{{ asset('images/sleep.png') }}" alt="Sleep"
                        style="width:100%;height:100%;object-fit:contain;" /></div>
                <div class="schedule-content">
                    <div class="schedule-activity">Get Some Sleep</div>
                    <div class="schedule-time">22:30</div>
                    <span class="schedule-status">Pending</span>
                </div>
                <div class="schedule-actions">
                    <button class="action-btn done" onclick="markSchedule(3, true)">
                        ✓
                    </button>
                    <button class="action-btn cancel" onclick="markSchedule(3, false)">
                        ✗
                    </button>
                </div>
            </div>
        @endif

        <!-- No Reminder Card -->
        {{-- <div class="no-reminder-card">
            <div class="no-reminder-icon">+</div>
            <div class="no-reminder-text">
                No reminder for<br>
                Tomorrow
            </div>
        </div> --}}
    </div>

    <div id="affirmation-modal" class="affirmation-modal" aria-hidden="true" role="dialog" aria-modal="true">
        <div class="modal-backdrop" data-close="true"></div>
        <div class="modal-dialog">
            <div class="modal-title">Good Job!</div>
            <div id="affirmation-text" class="modal-text"></div>
            <div class="modal-actions">
                <button type="button" class="modal-close" data-close="true">OK</button>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Backend logic removed from JS; handled on server via POST forms

            function getAffirmation(activity) {
                const name = activity.toLowerCase();
                if (name.includes('breakfast') || name.includes('sarapan'))
                    return 'Energi pagimu sudah terisi. Semangat menjalani hari!';
                if (name.includes('lunch') || name.includes('makan siang'))
                    return 'Perut kenyang, hati senang. Lanjutkan aktivitas dengan tenang!';
                if (name.includes('sleep') || name.includes('tidur'))
                    return 'Istirahat cukup membuat badan segar. Mimpi indah!';
                return 'Kamu hebat! Teruskan langkah baikmu hari ini.';
            }

            function openAffirmation(text) {
                const modal = document.getElementById('affirmation-modal');
                const body = document.getElementById('affirmation-text');
                body.textContent = text;
                modal.classList.add('active');
                modal.setAttribute('aria-hidden', 'false');
            }

            function closeAffirmation() {
                const modal = document.getElementById('affirmation-modal');
                modal.classList.remove('active');
                modal.setAttribute('aria-hidden', 'true');
            }

            document.addEventListener('click', function(e) {
                if (e.target.matches('#affirmation-modal [data-close]')) {
                    closeAffirmation();
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeAffirmation();
            });

            // Removed opening modal on card click; it now opens after clicking action buttons

            // Status modal helpers
            function closeStatusModal() {
                const modal = document.getElementById('status-modal');
                if (!modal) return;
                modal.classList.remove('active');
                modal.setAttribute('aria-hidden', 'true');
            }

            // Close on OK button or backdrop click for status modal
            document.addEventListener('click', function(e) {
                if (e.target.matches('#status-modal [data-close]') || e.target.matches(
                        '#status-modal .modal-backdrop')) {
                    closeStatusModal();
                }
            });

            // Close status modal on Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeStatusModal();
            });
        </script>
    @endpush
    <x-walker />

</section>
