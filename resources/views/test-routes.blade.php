@extends('layouts.app')

@section('content')
<div class="scrollable-page has-bottom-nav">
    <section class="section">
        <div class="container container-md">
            <div class="pixel-card p-6">
                <h1 class="heading-responsive font-bold text-center mb-6">
                    🧪 Route Testing Page
                </h1>
                
                <p class="text-responsive text-center mb-8">
                    Test semua routes untuk memastikan bottom bar dan responsive layout bekerja dengan baik.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="/home" class="pixel-button text-center block">
                        🏠 Home Page
                    </a>
                    
                    <a href="/about" class="pixel-button text-center block">
                        👤 About Page
                    </a>
                    
                    <a href="/schedule" class="pixel-button text-center block">
                        📅 Schedule Page
                    </a>
                    
                    <a href="/galery" class="pixel-button text-center block">
                        🖼️ Gallery Page
                    </a>
                    
                    <a href="/playlist" class="pixel-button text-center block">
                        🎵 Playlist Page
                    </a>
                </div>

                <div class="mt-8 p-4 bg-yellow-100 border-2 border-yellow-400 rounded">
                    <h3 class="font-bold mb-2">✅ Checklist Testing:</h3>
                    <ul class="text-sm space-y-1">
                        <li>• Bottom bar muncul di semua halaman</li>
                        <li>• Layout mobile-first (max-width 480px)</li>
                        <li>• Active state bottom bar sesuai halaman</li>
                        <li>• Responsive design di semua breakpoints</li>
                        <li>• Scroll behavior yang benar</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
