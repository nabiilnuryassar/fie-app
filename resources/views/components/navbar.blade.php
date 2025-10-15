<!-- Navbar -->
<nav id="navbar" class="bg-primary-light pixel-border border-b-4 sticky top-0 z-50">
    <div class="container mx-auto px-6 py-3">
        <div class="flex justify-between items-center">
            <a href="#" class="text-3xl font-bold text-primary-dark">Fie-Care</a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8 text-xl">
                <a href="#about" class="nav-link text-dark-text">About</a>
                <a href="#checklist" class="nav-link text-dark-text">Checklist</a>
                <a href="#gallery" class="nav-link text-dark-text">Gallery</a>
                <a href="#playlist" class="nav-link text-dark-text">Playlist</a>
                <a href="#affirmation" class="nav-link text-dark-text">Affirmation</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-dark-text focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 text-center">
            <a href="#about" class="block py-2 text-lg text-dark-text hover:bg-primary/20">About</a>
            <a href="#checklist" class="block py-2 text-lg text-dark-text hover:bg-primary/20">Checklist</a>
            <a href="#gallery" class="block py-2 text-lg text-dark-text hover:bg-primary/20">Gallery</a>
            <a href="#playlist" class="block py-2 text-lg text-dark-text hover:bg-primary/20">Playlist</a>
            <a href="#affirmation" class="block py-2 text-lg text-dark-text hover:bg-primary/20">Affirmation</a>
        </div>
    </div>
</nav>
