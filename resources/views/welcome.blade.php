@extends('layouts.app')

@section('content')
    @include('sections.hero')
    {{-- @include('sections.about')
    @include('sections.checklist')
    @include('sections.gallery')
    @include('sections.playlist')
    @include('sections.affirmation') --}}
@endsection

@push('scripts')
    <script>
        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
@endpush
