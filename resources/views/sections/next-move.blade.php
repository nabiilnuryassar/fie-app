{{-- Next Move Section Component --}}
<section class="next-move-section section scrollable-page">
    <style>
        .next-move-section {
            background: linear-gradient(135deg, var(--color-primary-light) 0%, #f0d084 100%);
            min-height: 100vh;
            /* Reserve space for fixed bottom bar + safe area */
            padding-bottom: calc(88px + env(safe-area-inset-bottom, 0px));
        }

        /* Override global container padding for this section */
        .next-move-section .container {
            padding-left: 0;
            padding-right: 0;
        }

        .next-move-container {
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-pixel-sm);
            width: 100%;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .next-move-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4, #FFEAA7, #FF6B6B);
            border-radius: var(--border-radius-sm) var(--border-radius-sm) 0 0;
            animation: rainbowShift 3s linear infinite;
        }

        @keyframes rainbowShift {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
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

        .next-move-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .next-move-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            animation: heartbeat 1.5s ease-in-out infinite;
        }

        @keyframes heartbeat {

            0%,
            100% {
                transform: scale(1);
            }

            25% {
                transform: scale(1.1);
            }

            50% {
                transform: scale(1);
            }

            75% {
                transform: scale(1.05);
            }
        }

        .next-move-title {
            font-size: clamp(1.75rem, 6vw, 2.75rem);
            font-weight: 800;
            color: var(--color-secondary);
            margin-bottom: 0.75rem;
            text-align: center;
            line-height: 1.2;
        }

        .next-move-subtitle {
            color: #6b4b32;
            font-size: 1rem;
            text-align: center;
            opacity: 0.8;
            margin-bottom: 2rem;
            font-style: italic;
        }

        .next-move-content {
            background: #fefefe;
            border: 2px solid #e0e0e0;
            border-radius: var(--border-radius-md);
            padding: 2rem;
            margin: 2rem 0;
            position: relative;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .next-move-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #FF6B6B, transparent);
        }

        .message-paragraph {
            font-size: 1.1rem;
            line-height: 1.9;
            color: #2c2c2c;
            text-align: justify;
            margin-bottom: 1.5rem;
        }

        .message-paragraph:last-of-type {
            margin-bottom: 0;
        }

        .highlight-text {
            color: #FF6B6B;
            font-weight: 700;
            position: relative;
        }

        .next-move-question {
            background: linear-gradient(135deg, #FFE5E5 0%, #FFF0F0 100%);
            border: 2px dashed #FF6B6B;
            border-radius: var(--border-radius-md);
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: center;
        }

        .question-text {
            font-size: 1.3rem;
            font-weight: 800;
            color: #FF6B6B;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .question-subtext {
            font-size: 0.95rem;
            color: #6b4b32;
            opacity: 0.9;
            font-style: italic;
            margin-bottom: 1.5rem;
        }

        .question-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .question-button {
            background: var(--color-surface);
            color: var(--color-secondary);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-sm);
            padding: 0.75rem 2rem;
            font-weight: 800;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .question-button.yes-btn {
            background: #FF6B6B;
            border-color: #FF6B6B;
            color: white;
        }

        .question-button.yes-btn:hover {
            background: #ff5252;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .question-button.no-btn {
            background: var(--color-surface);
            border-color: #94a3b8;
            color: #64748b;
        }

        .question-button.no-btn:hover {
            transform: translateY(-2px);
            background: #f1f5f9;
        }

        /* Modal styles */
        .answer-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            animation: fadeIn 0.3s ease;
        }

        .answer-modal.active {
            display: flex;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .modal-content {
            background: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            max-width: 500px;
            width: 100%;
            position: relative;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            animation: modalSlideUp 0.4s ease;
        }

        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4, #FFEAA7, #FF6B6B);
            border-radius: var(--border-radius-sm) var(--border-radius-sm) 0 0;
        }

        @keyframes modalSlideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            animation: bounce 1s ease infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .modal-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--color-secondary);
            text-align: center;
            margin-bottom: 1rem;
        }

        .modal-message {
            font-size: 1.05rem;
            line-height: 1.7;
            color: #2c2c2c;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .modal-button {
            background: var(--color-secondary);
            color: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-sm);
            padding: 0.75rem 1.5rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .modal-button:hover {
            background: var(--color-surface);
            color: var(--color-secondary);
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px var(--color-secondary);
        }

        .modal-button.primary {
            background: #FF6B6B;
            border-color: #FF6B6B;
        }

        .modal-button.primary:hover {
            background: var(--color-surface);
            color: #FF6B6B;
            box-shadow: 2px 2px 0px #FF6B6B;
        }

        /* Confetti canvas */
        #confettiCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 10000;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .question-buttons {
                flex-direction: column;
            }

            .question-button {
                width: 100%;
            }

            .modal-content {
                padding: 1.5rem;
            }

            .modal-buttons {
                flex-direction: column;
            }

            .modal-button {
                width: 100%;
            }
        }

        .next-move-signature {
            text-align: right;
            font-style: italic;
            color: #6b4b32;
            font-weight: 600;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px dashed #d0d0d0;
        }

        .signature-name {
            font-size: 1.2rem;
            color: var(--color-secondary);
            font-weight: 800;
            margin-top: 0.5rem;
        }

        .next-move-actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
        }

        .action-button {
            background: var(--color-secondary);
            color: var(--color-surface);
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-sm);
            padding: 0.75rem 1.5rem;
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition-normal);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 1rem;
            cursor: pointer;
        }

        .action-button:hover {
            background: var(--color-surface);
            color: var(--color-secondary);
            transform: translateY(-2px);
            box-shadow: 2px 2px 0px var(--color-secondary);
        }

        .action-button.primary {
            background: #FF6B6B;
            border-color: #FF6B6B;
            font-size: 1.1rem;
            padding: 1rem 2rem;
        }

        .action-button.primary:hover {
            background: var(--color-surface);
            color: #FF6B6B;
            box-shadow: 3px 3px 0px #FF6B6B;
        }

        .action-button.secondary {
            background: transparent;
            color: var(--color-secondary);
        }

        .action-button.secondary:hover {
            background: var(--color-secondary);
            color: var(--color-surface);
        }

        /* Responsive */
        @media (min-width: 640px) {
            .next-move-container {
                padding: 2rem;
            }

            .next-move-content {
                padding: 2.5rem;
            }

            .next-move-actions {
                flex-direction: row;
                justify-content: center;
            }
        }

        @media (min-width: 768px) {
            .next-move-container {
                padding: 2.5rem;
                max-width: 800px;
                margin: 0 auto;
            }

            .next-move-content {
                padding: 3rem;
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

        /* Letter opening animation */
        .next-move-container {
            animation: letterOpen 0.6s ease-out;
        }

        @keyframes letterOpen {
            0% {
                opacity: 0;
                transform: scale(0.9) rotateY(-10deg);
            }

            100% {
                opacity: 1;
                transform: scale(1) rotateY(0deg);
            }
        }

        /* Floating hearts background */
        .floating-hearts {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }

        .floating-heart {
            position: absolute;
            font-size: 1.5rem;
            opacity: 0.3;
            animation: floatUp 10s linear infinite;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 0.3;
            }

            90% {
                opacity: 0.3;
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }
    </style>

    <!-- Floating hearts background -->
    <div class="floating-hearts" id="floatingHearts"></div>

    <div class="container container-xl" style="position: relative; z-index: 2;">
        <div class="next-move-container">
            <!-- Back Button -->
            <a href="{{ route('gift.index') }}" class="back-button">
                <span>←</span> Back to Gifts
            </a>

            <!-- Header -->
            <div class="next-move-header">
                <div class="next-move-icon">
                    <img src="{{ asset('images/love.png') }}" alt="Love">
                </div>
                <div class="next-move-title">The Next Move</div>
                <div class="next-move-subtitle">A question from my heart to yours</div>
            </div>

            <!-- Content -->
            <div class="next-move-content">
                <p class="message-paragraph">
                    Dear Fierda,
                </p>

                <p class="message-paragraph">
                    From the moment we started talking, my days became brighter and my heart felt fuller.
                    Every message from you brings a smile to my face, and every moment we share together feels like
                    a treasure I never want to let go.
                </p>

                <p class="message-paragraph">
                    You've shown me what it means to feel <span class="highlight-text">truly connected</span> to
                    someone.
                    Your kindness, your laughter, and the way you understand me without words—these are the things that
                    make me realize how special you are. You're not just someone I enjoy spending time with; you're
                    someone
                    I can't imagine my life without.
                </p>

                <p class="message-paragraph">
                    I've built this little space for you—this website, these playlists, these letters—because I wanted
                    to
                    show you how much you mean to me. But more than anything, I want to tell you how I feel, face to
                    face,
                    heart to heart.
                </p>

                <p class="message-paragraph">
                    Every love song reminds me of you. Every beautiful sunset makes me wish you were there to see it
                    with me.
                    And every night, I find myself thinking about how lucky I would be to call you mine.
                </p>

                <div class="next-move-question">
                    <div class="question-text">
                        Will you be my girlfriend?
                    </div>
                    <div class="question-subtext">
                        Will you take this journey with me? Let's create more beautiful memories together.
                    </div>
                    <div class="question-buttons">
                        <button onclick="handleAnswer('yes')" class="question-button yes-btn">
                            Yes!
                        </button>
                        <button onclick="handleAnswer('no')" class="question-button no-btn" id="noButton">
                            No
                        </button>
                    </div>
                </div>

                <p class="message-paragraph">
                    I promise to cherish you, to support you in everything you do, and to be there for you through the
                    ups and downs. I promise to make you laugh when you're sad, to celebrate your victories, and to hold
                    your hand through whatever life brings our way.
                </p>

                <p class="message-paragraph">
                    You deserve someone who sees how amazing you are, who appreciates every little thing about you, and
                    who never takes you for granted. I want to be that person. <span class="highlight-text">I want to be
                        yours</span>.
                </p>

                <div class="next-move-signature">
                    With all my heart and hope,<br>
                    <div class="signature-name">Forever yours</div>
                </div>
            </div>

            <!-- Actions -->
            <div class="next-move-actions">
                <button onclick="showLoveMessage()" class="action-button primary">
                    <img src="{{ asset('images/love.png') }}" alt="" style="width: 24px; height: 24px;">
                    Keep This Close to My Heart
                </button>
                <a href="{{ route('gift.index') }}" class="action-button secondary">
                    <img src="{{ asset('images/mail.png') }}" alt="" style="width: 20px; height: 20px;">
                    See Other Gifts
                </a>
            </div>
        </div>
    </div>

    <!-- Answer Modal -->
    <div class="answer-modal" id="answerModal">
        <div class="modal-content">
            <div class="modal-icon" id="modalIcon">
                <img src="{{ asset('images/love.png') }}" alt="" style="width: 80px; height: 80px;">
            </div>
            <div class="modal-title" id="modalTitle">Yay! 🎉</div>
            <div class="modal-message" id="modalMessage">
                This is the best answer ever! You just made me the happiest person alive! 💕
            </div>
            <div class="modal-buttons">
                <button onclick="closeModal()" class="modal-button primary" id="modalButton">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Confetti Canvas -->
    <canvas id="confettiCanvas"></canvas>

    @push('scripts')
        <script>
            // Create floating hearts background
            function createFloatingHearts() {
                const container = document.getElementById('floatingHearts');
                const heartEmojis = ['❤️', '💕', '💖', '💗', '💝'];

                setInterval(() => {
                    const heart = document.createElement('div');
                    heart.className = 'floating-heart';
                    heart.innerHTML = heartEmojis[Math.floor(Math.random() * heartEmojis.length)];
                    heart.style.left = Math.random() * 100 + '%';
                    heart.style.animationDuration = (Math.random() * 5 + 8) + 's';
                    heart.style.fontSize = (Math.random() * 1 + 1) + 'rem';

                    container.appendChild(heart);

                    setTimeout(() => {
                        heart.remove();
                    }, 12000);
                }, 2000);
            }

            // Show love message when button clicked
            function showLoveMessage() {
                const button = event.target.closest('.action-button');
                const originalHTML = button.innerHTML;

                button.innerHTML =
                    '<img src="{{ asset('images/love.png') }}" style="width: 24px; height: 24px;"> Saved to Heart Forever';
                button.style.background = '#FF6B6B';
                button.style.borderColor = '#FF6B6B';
                button.style.color = 'white';

                setTimeout(() => {
                    button.innerHTML = originalHTML;
                    button.style.background = '';
                    button.style.borderColor = '';
                    button.style.color = '';
                }, 3000);

                // Create burst of hearts
                createHeartBurst();
            }

            function createHeartBurst() {
                const heartEmojis = ['❤️', '💕', '💖', '💗', '💝', '💓', '💞'];

                for (let i = 0; i < 15; i++) {
                    setTimeout(() => {
                        const heart = document.createElement('div');
                        heart.innerHTML =
                            '<img src="{{ asset('images/love.png') }}" style="width: 40px; height: 40px;">';
                        heart.style.position = 'fixed';
                        heart.style.left = (Math.random() * window.innerWidth) + 'px';
                        heart.style.top = (Math.random() * window.innerHeight) + 'px';
                        heart.style.pointerEvents = 'none';
                        heart.style.zIndex = '9999';
                        heart.style.animation = 'heartFloat 3s ease-out forwards';

                        document.body.appendChild(heart);

                        setTimeout(() => {
                            heart.remove();
                        }, 3000);
                    }, i * 100);
                }
            }

            // Add heart animation CSS
            const style = document.createElement('style');
            style.textContent = `
                @keyframes heartFloat {
                    0% {
                        opacity: 1;
                        transform: translateY(0) scale(1) rotate(0deg);
                    }
                    100% {
                        opacity: 0;
                        transform: translateY(-200px) scale(0.3) rotate(360deg);
                    }
                }
            `;
            document.head.appendChild(style);

            // Handle answer (Yes/No)
            let noClickCount = 0;
            const noButton = document.getElementById('noButton');

            function handleAnswer(answer) {
                if (answer === 'yes') {
                    showYesModal();
                } else {
                    showNoModal();
                }
            }

            function showYesModal() {
                const modal = document.getElementById('answerModal');
                const modalIcon = document.getElementById('modalIcon');
                const modalTitle = document.getElementById('modalTitle');
                const modalMessage = document.getElementById('modalMessage');
                const modalButton = document.getElementById('modalButton');

                modalIcon.innerHTML = '<img src="{{ asset('images/love.png') }}" style="width: 80px; height: 80px;">';
                modalTitle.textContent = 'YES! 🎉💕✨';
                modalMessage.innerHTML = `
                    <strong style="color: #FF6B6B; font-size: 1.2rem;">You just made me the happiest person alive!</strong><br><br>
                    I promise to make every day special for you. Thank you for choosing us, for choosing this journey together.
                    I can't wait to create beautiful memories with you! 💕
                `;
                modalButton.textContent = 'I Love You So Much! ❤️';

                modal.classList.add('active');

                // Trigger confetti
                triggerConfetti();

                // Create massive heart burst
                createMassiveHeartBurst();
            }

            function showNoModal() {
                noClickCount++;
                const modal = document.getElementById('answerModal');
                const modalIcon = document.getElementById('modalIcon');
                const modalTitle = document.getElementById('modalTitle');
                const modalMessage = document.getElementById('modalMessage');
                const modalButton = document.getElementById('modalButton');

                // Make "No" button move away on hover after first click
                if (noClickCount === 1) {
                    noButton.addEventListener('mouseenter', moveNoButton);
                    noButton.addEventListener('touchstart', moveNoButton);
                }

                // Different messages based on click count
                const noMessages = [{
                        title: 'Are You Sure? 🥺',
                        message: 'Take a moment to think about it... I promise to make you smile every day, to support your dreams, and to be there through thick and thin. Won\'t you reconsider? 💕'
                    },
                    {
                        title: 'Please Think Again... 💔',
                        message: 'I know this might seem sudden, but my feelings are real. Every playlist, every letter I wrote for you came from the heart. Can you give us a chance? 🥺'
                    },
                    {
                        title: 'One More Chance? 🙏',
                        message: 'I understand if you need time to think. But know that my feelings won\'t change. You mean the world to me, and I\'ll wait for you. Just... maybe think about it? 💭💕'
                    }
                ];

                const messageIndex = Math.min(noClickCount - 1, noMessages.length - 1);
                const currentMessage = noMessages[messageIndex];

                modalIcon.innerHTML = '🥺';
                modalTitle.textContent = currentMessage.title;
                modalMessage.textContent = currentMessage.message;
                modalButton.textContent = 'Let Me Think... 💭';

                modal.classList.add('active');
            }

            function moveNoButton() {
                const button = document.getElementById('noButton');
                const maxX = window.innerWidth - button.offsetWidth - 20;
                const maxY = window.innerHeight - button.offsetHeight - 20;

                const randomX = Math.random() * maxX;
                const randomY = Math.random() * maxY;

                button.style.position = 'fixed';
                button.style.left = randomX + 'px';
                button.style.top = randomY + 'px';
                button.style.transition = 'all 0.3s ease';
            }

            function closeModal() {
                const modal = document.getElementById('answerModal');
                modal.classList.remove('active');
            }

            // Confetti animation
            function triggerConfetti() {
                const canvas = document.getElementById('confettiCanvas');
                const ctx = canvas.getContext('2d');
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;

                const confetti = [];
                const confettiCount = 150;
                const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7', '#FF8A80', '#FFB6B9'];

                class Confetto {
                    constructor() {
                        this.x = Math.random() * canvas.width;
                        this.y = Math.random() * canvas.height - canvas.height;
                        this.size = Math.random() * 8 + 5;
                        this.speedY = Math.random() * 3 + 2;
                        this.speedX = Math.random() * 2 - 1;
                        this.color = colors[Math.floor(Math.random() * colors.length)];
                        this.angle = Math.random() * 360;
                        this.rotationSpeed = Math.random() * 10 - 5;
                    }

                    update() {
                        this.y += this.speedY;
                        this.x += this.speedX;
                        this.angle += this.rotationSpeed;

                        if (this.y > canvas.height) {
                            this.y = -10;
                            this.x = Math.random() * canvas.width;
                        }
                    }

                    draw() {
                        ctx.save();
                        ctx.translate(this.x, this.y);
                        ctx.rotate((this.angle * Math.PI) / 180);
                        ctx.fillStyle = this.color;
                        ctx.fillRect(-this.size / 2, -this.size / 2, this.size, this.size);
                        ctx.restore();
                    }
                }

                for (let i = 0; i < confettiCount; i++) {
                    confetti.push(new Confetto());
                }

                function animateConfetti() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    confetti.forEach(c => {
                        c.update();
                        c.draw();
                    });

                    requestAnimationFrame(animateConfetti);
                }

                animateConfetti();

                // Stop confetti after 10 seconds
                setTimeout(() => {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                }, 10000);
            }

            function createMassiveHeartBurst() {
                for (let i = 0; i < 30; i++) {
                    setTimeout(() => {
                        const heart = document.createElement('div');
                        heart.innerHTML =
                            '<img src="{{ asset('images/love.png') }}" style="width: 50px; height: 50px;">';
                        heart.style.position = 'fixed';
                        heart.style.left = (Math.random() * window.innerWidth) + 'px';
                        heart.style.top = (Math.random() * window.innerHeight) + 'px';
                        heart.style.pointerEvents = 'none';
                        heart.style.zIndex = '10001';
                        heart.style.animation = 'heartFloat 4s ease-out forwards';

                        document.body.appendChild(heart);

                        setTimeout(() => {
                            heart.remove();
                        }, 4000);
                    }, i * 80);
                }
            }

            // Initialize floating hearts when page loads
            window.addEventListener('DOMContentLoaded', () => {
                createFloatingHearts();
            });
        </script>
    @endpush

    <x-walker />
</section>
