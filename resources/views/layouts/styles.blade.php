<style>
    /* CSS Custom Properties for consistent theming */
    :root {
        --color-primary: #f59e0b;
        --color-primary-dark: #761f28;
        --color-primary-light: #f9dc9a;
        --color-secondary: #8B4513;
        --color-accent: #FF6B6B;
        --color-text-dark: #2c2c2c;
        --color-text-light: #ffffff;
        --color-background: #FEF9F8;
        --color-surface: #ffffff;
        --font-family-pixel: 'VT323', monospace;
        --border-radius-sm: 6px;
        --border-radius-md: 12px;
        --border-radius-lg: 20px;
        --shadow-pixel: 6px 6px 0px var(--color-text-dark);
        --shadow-pixel-sm: 4px 4px 0px var(--color-text-dark);
        --transition-fast: 0.1s ease-in-out;
        --transition-normal: 0.2s ease-in-out;
    }

    /* Base styles */
    * {
        box-sizing: border-box;
    }

    body {
        font-family: var(--font-family-pixel);
        background-color: var(--color-background);
        color: var(--color-text-dark);
        margin: 0;
        padding: 0;
        line-height: 1.5;
    }

    /* Pixel art image rendering */
    img[src*="happy.png"],
    img[src*="sad.png"],
    img[src*="angry.png"],
    img[src*="shock.png"] {
        image-rendering: -moz-crisp-edges;
        image-rendering: crisp-edges;
        image-rendering: -webkit-optimize-contrast;
    }

    /* Mobile-first responsive container system */
    .container {
        width: 100%;
        margin: 0 auto;
        padding: 0 1rem;
        max-width: 480px;
        /* Mobile-first restriction */
    }

    .container-sm {
        max-width: 480px;
    }

    .container-md {
        max-width: 480px;
    }

    .container-lg {
        max-width: 480px;
    }

    .container-xl {
        max-width: 480px;
    }

    /* Responsive container expansion */
    @media (min-width: 480px) {
        .container-sm {
            max-width: 540px;
        }

        .container-md {
            max-width: 540px;
        }

        .container-lg {
            max-width: 540px;
        }

        .container-xl {
            max-width: 540px;
        }
    }

    @media (min-width: 640px) {
        .container-md {
            max-width: 640px;
        }

        .container-lg {
            max-width: 640px;
        }

        .container-xl {
            max-width: 640px;
        }
    }

    @media (min-width: 768px) {
        .container-lg {
            max-width: 768px;
        }

        .container-xl {
            max-width: 768px;
        }
    }

    @media (min-width: 1024px) {
        .container-xl {
            max-width: 1024px;
        }
    }

    /* Responsive grid system */
    .grid {
        display: grid;
        gap: 1rem;
    }

    .grid-cols-1 {
        grid-template-columns: repeat(1, 1fr);
    }

    .grid-cols-2 {
        grid-template-columns: repeat(2, 1fr);
    }

    .grid-cols-3 {
        grid-template-columns: repeat(3, 1fr);
    }

    .grid-cols-4 {
        grid-template-columns: repeat(4, 1fr);
    }

    /* Mobile-first responsive breakpoints */
    @media (min-width: 480px) {
        .container {
            padding: 0 1.25rem;
        }
    }

    @media (min-width: 640px) {
        .sm\:grid-cols-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .sm\:grid-cols-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .sm\:grid-cols-4 {
            grid-template-columns: repeat(4, 1fr);
        }

        .container {
            padding: 0 1.5rem;
        }
    }

    @media (min-width: 768px) {
        .md\:grid-cols-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .md\:grid-cols-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .md\:grid-cols-4 {
            grid-template-columns: repeat(4, 1fr);
        }

        .container {
            padding: 0 2rem;
        }
    }

    @media (min-width: 1024px) {
        .lg\:grid-cols-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .lg\:grid-cols-4 {
            grid-template-columns: repeat(4, 1fr);
        }

        .container {
            padding: 0 2.5rem;
        }
    }

    /* Pixel theme components */
    .pixel-border {
        border: 4px solid var(--color-text-dark);
    }

    .pixel-border-thin {
        border: 2px solid var(--color-text-dark);
    }

    .pixel-shadow {
        box-shadow: var(--shadow-pixel);
        transition: var(--transition-fast);
    }

    .pixel-shadow-sm {
        box-shadow: var(--shadow-pixel-sm);
    }

    .pixel-button {
        background: var(--color-primary);
        border: 2px solid var(--color-text-dark);
        color: var(--color-text-dark);
        padding: 0.75rem 1.5rem;
        font-family: var(--font-family-pixel);
        font-size: 1.125rem;
        cursor: pointer;
        transition: var(--transition-fast);
        text-decoration: none;
        display: inline-block;
        border-radius: var(--border-radius-sm);
    }

    .pixel-button:hover {
        transform: translate(2px, 2px);
        box-shadow: var(--shadow-pixel-sm);
    }

    .pixel-button:active {
        transform: translate(6px, 6px);
        box-shadow: none;
    }

    .pixel-card {
        background: var(--color-surface);
        border: 2px solid var(--color-text-dark);
        border-radius: var(--border-radius-md);
        padding: 1.5rem;
        box-shadow: var(--shadow-pixel-sm);
    }

    /* Image rendering */
    /* .pixelated {
        image-rendering: -moz-crisp-edges;
        image-rendering: crisp-edges;
    } */

    /* Navigation styles */
    .nav-link {
        transition: var(--transition-normal);
        text-decoration: none;
        color: var(--color-text-dark);
    }

    .nav-link:hover {
        color: var(--color-primary-dark);
    }

    /* Responsive typography */
    .text-responsive {
        font-size: clamp(1rem, 4vw, 1.5rem);
    }

    .heading-responsive {
        font-size: clamp(1.5rem, 6vw, 3rem);
    }

    .heading-large-responsive {
        font-size: clamp(2rem, 8vw, 4rem);
    }

    /* Utility classes */
    .text-center {
        text-align: center;
    }

    .text-left {
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    .flex {
        display: flex;
    }

    .flex-col {
        flex-direction: column;
    }

    .flex-row {
        flex-direction: row;
    }

    .items-center {
        align-items: center;
    }

    .justify-center {
        justify-content: center;
    }

    .justify-between {
        justify-content: space-between;
    }

    .w-full {
        width: 100%;
    }

    .h-full {
        height: 100%;
    }

    .min-h-screen {
        min-height: 100vh;
    }

    .p-4 {
        padding: 1rem;
    }

    .p-6 {
        padding: 1.5rem;
    }

    .p-8 {
        padding: 2rem;
    }

    .m-4 {
        margin: 1rem;
    }

    .m-6 {
        margin: 1.5rem;
    }

    .m-8 {
        margin: 2rem;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    .mb-6 {
        margin-bottom: 1.5rem;
    }

    .mb-8 {
        margin-bottom: 2rem;
    }

    .mt-4 {
        margin-top: 1rem;
    }

    .mt-6 {
        margin-top: 1.5rem;
    }

    .mt-8 {
        margin-top: 2rem;
    }

    /* Mobile-first responsive spacing */
    @media (min-width: 480px) {
        .sm\:p-6 {
            padding: 1.25rem;
        }

        .sm\:mb-6 {
            margin-bottom: 1.25rem;
        }
    }

    @media (min-width: 640px) {
        .sm\:p-6 {
            padding: 1.5rem;
        }

        .sm\:p-8 {
            padding: 2rem;
        }

        .sm\:mb-8 {
            margin-bottom: 2rem;
        }
    }

    @media (min-width: 768px) {
        .md\:p-8 {
            padding: 2rem;
        }

        .md\:p-12 {
            padding: 2.5rem;
        }

        .md\:mb-12 {
            margin-bottom: 2.5rem;
        }
    }

    /* Animation utilities */
    .animate-bounce-subtle {
        animation: bounce-subtle 2s infinite;
    }

    @keyframes bounce-subtle {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-10px);
        }

        60% {
            transform: translateY(-5px);
        }
    }

    .animate-pulse-slow {
        animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: .8;
        }
    }
</style>
