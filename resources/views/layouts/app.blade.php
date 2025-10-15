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

    {{-- Additional Mobile-First Styles --}}
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            overflow: hidden;
            scroll-behavior: none;
        }

        .app-container {
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
            min-height: 100vh;
            background-color: white;
            position: relative;
            overflow: hidden;
        }

        .content-wrapper {
            width: 100%;
            height: 100%;
        }

        /* Remove any margin/padding from container elements */
        .container {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            max-width: none !important;
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
