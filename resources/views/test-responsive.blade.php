<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Responsive Test - Fie-Care</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: VT323 for Pixel style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    
    @include('layouts.styles')
    
    <style>
        .test-section {
            padding: 2rem 1rem;
            margin: 1rem 0;
            border: 2px solid var(--color-secondary);
            border-radius: var(--border-radius-md);
            background: var(--color-surface);
        }
        
        .device-info {
            position: fixed;
            top: 10px;
            right: 10px;
            background: rgba(0,0,0,0.8);
            color: white;
            padding: 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            z-index: 1000;
        }
    </style>
</head>

<body class="antialiased">
    <div class="device-info" id="deviceInfo">
        Screen: <span id="screenSize"></span><br>
        Container: <span id="containerWidth"></span>
    </div>

    <div class="app-container">
        <main class="content-wrapper">
            <div class="scrollable-page has-bottom-nav">
                
                <div class="test-section">
                    <h2 class="heading-responsive font-bold text-center mb-4">
                        📱 Mobile Responsiveness Test
                    </h2>
                    <p class="text-responsive text-center">
                        Test halaman ini untuk memastikan layout responsive bekerja dengan baik di semua device.
                    </p>
                </div>

                <div class="test-section">
                    <h3 class="text-lg font-bold mb-2">Container Test</h3>
                    <div class="container container-md pixel-card p-4">
                        <p>Container dengan max-width yang responsive</p>
                    </div>
                </div>

                <div class="test-section">
                    <h3 class="text-lg font-bold mb-2">Grid Test</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="pixel-card p-4 text-center">Grid 1</div>
                        <div class="pixel-card p-4 text-center">Grid 2</div>
                        <div class="pixel-card p-4 text-center">Grid 3</div>
                    </div>
                </div>

                <div class="test-section">
                    <h3 class="text-lg font-bold mb-2">Button Test</h3>
                    <div class="flex flex-wrap gap-2 justify-center">
                        <button class="pixel-button">Primary Button</button>
                        <button class="pixel-button" style="background: var(--color-accent);">Accent Button</button>
                    </div>
                </div>

                <div class="test-section">
                    <h3 class="text-lg font-bold mb-2">Typography Test</h3>
                    <h1 class="heading-large-responsive">Large Heading</h1>
                    <h2 class="heading-responsive">Medium Heading</h2>
                    <p class="text-responsive">Responsive paragraph text that scales with screen size.</p>
                </div>

            </div>
        </main>
        
        @include('components.bottom-bar')
    </div>

    <script>
        function updateDeviceInfo() {
            const screenSize = `${window.innerWidth}x${window.innerHeight}`;
            const container = document.querySelector('.app-container');
            const containerWidth = container ? container.offsetWidth : 'N/A';
            
            document.getElementById('screenSize').textContent = screenSize;
            document.getElementById('containerWidth').textContent = containerWidth + 'px';
        }

        window.addEventListener('resize', updateDeviceInfo);
        window.addEventListener('load', updateDeviceInfo);
        
        // Update every second for real-time monitoring
        setInterval(updateDeviceInfo, 1000);
    </script>
</body>
</html>
