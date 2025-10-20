{{-- Affirmation Section Component --}}
<section id="affirmation" class="section">
    <div class="container container-lg">
        <h2 class="heading-responsive font-bold text-center mb-6 md:mb-8" style="color: var(--color-text-dark);">
            Afirmasi Positif Untukmu
        </h2>
        
        <div class="affirmation-card pixel-card pixel-shadow max-w-4xl mx-auto">
            <style>
                .affirmation-card {
                    background: linear-gradient(135deg, var(--color-primary, #f59e0b) 0%, var(--color-primary-dark, #761f28) 100%);
                    color: var(--color-text-light, #ffffff);
                    position: relative;
                    overflow: hidden;
                }

                .affirmation-card::before {
                    content: '';
                    position: absolute;
                    top: -50%;
                    left: -50%;
                    width: 200%;
                    height: 200%;
                    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
                    animation: shimmer 3s ease-in-out infinite;
                }

                @keyframes shimmer {
                    0%, 100% { transform: rotate(0deg); }
                    50% { transform: rotate(180deg); }
                }

                .affirmation-text {
                    position: relative;
                    z-index: 1;
                    font-size: clamp(1.25rem, 5vw, 2rem);
                    line-height: 1.4;
                    text-align: center;
                    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
                }

                .affirmation-icon {
                    font-size: 2rem;
                    margin-bottom: 1rem;
                    opacity: 0.8;
                }

                /* Mobile-first responsive adjustments */
                .affirmation-card {
                    padding: 1rem;
                    margin: 0 0.5rem;
                }
                
                .affirmation-text {
                    font-size: 1rem;
                }

                @media (min-width: 480px) {
                    .affirmation-card {
                        padding: 1.5rem;
                        margin: 0 1rem;
                    }
                    
                    .affirmation-text {
                        font-size: 1.125rem;
                    }
                }

                @media (min-width: 640px) {
                    .affirmation-card {
                        padding: 2rem;
                        margin: 0;
                    }
                    
                    .affirmation-text {
                        font-size: 1.25rem;
                    }
                }

                @media (min-width: 768px) {
                    .affirmation-card {
                        padding: 3rem;
                    }
                    
                    .affirmation-text {
                        font-size: 1.5rem;
                    }
                }
            </style>

            <div class="text-center">
                <div class="affirmation-icon">✨</div>
                <p class="affirmation-text">
                    {{ $affirmation_text ?? '"Kamu mampu melakukan hal-hal yang luar biasa. Percayalah pada dirimu sendiri!"' }}
                </p>
            </div>
        </div>
    </div>
</section>
