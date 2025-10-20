<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Fie-Care | Khusus Untuk Fierda</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: VT323 for Pixel style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    @include('layouts.styles')
    @include('layouts.scripts')

    {{-- Responsive Layout Styles --}}
    <style>
        html {
            background-color: var(--color-primary-light, #f9dc9a);
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .app-container {
            width: 100%;
            max-width: 480px;
            /* Mobile-first: restrict to mobile width */
            margin: 0 auto;
            min-height: 100vh;
            background-color: var(--color-surface, white);
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1;
            width: 100%;
            min-height: calc(100vh - 4rem);
            /* padding-bottom: 4rem; */
            /* Space for bottom navigation */
            position: relative;
        }

        /* Responsive container behavior - gradually increase max-width */
        @media (min-width: 480px) {
            .app-container {
                max-width: 540px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }
        }

        @media (min-width: 640px) {
            .app-container {
                max-width: 640px;
            }
        }

        @media (min-width: 768px) {
            .app-container {
                max-width: 768px;
            }
        }

        @media (min-width: 1024px) {
            .app-container {
                max-width: 1024px;
            }
        }

        /* Page type specific styles */
        .home-page {
            overflow: hidden;
            height: 100vh;
        }

        .home-page .content-wrapper {
            /* padding-bottom: 4rem; */
            /* Keep space for bottom nav */
            min-height: calc(100vh - 4rem);
            overflow-y: auto;
        }

        .scrollable-page {
            overflow-y: auto;
        }

        .scrollable-page .content-wrapper {
            min-height: auto;
        }

        /* Section spacing - mobile-first */
        .section {
            padding: 1rem 1rem;
        }

        @media (min-width: 480px) {
            .section {
                padding: 1.5rem 1.5rem;
            }
        }

        @media (min-width: 640px) {
            .section {
                padding: 2rem 2rem;
            }
        }

        @media (min-width: 768px) {
            .section {
                padding: 2.5rem 2.5rem;
            }
        }

        /* Ensure proper spacing for bottom navigation */
        .has-bottom-nav {
            /* padding-bottom: 5rem; */
        }

        @media (min-width: 768px) {
            .has-bottom-nav {
                /* padding-bottom: 6rem; */
            }
        }
    </style>
</head>

<body class="antialiased">
    <div class="app-container">
        <main class="content-wrapper">
            @yield('content')
        </main>
        @include('components.bottom-bar')
    </div>
    @stack('scripts')
</body>

</html>
