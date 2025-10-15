@extends('layouts.app')
@section('content')
    <!-- Daily Checklist Section -->
    <section id="checklist" class="py-16">
        <h2 class="text-4xl font-bold text-dark-text mb-8 text-center">Jangan Lupa, ya!</h2>
        <div class="max-w-md mx-auto bg-white p-6 pixel-border pixel-shadow">
            <ul class="space-y-4">
                @foreach ($checklist_items ?? [] as $item)
                    <li class="flex items-center text-2xl">
                        <input type="checkbox" id="task{{ $loop->iteration }}" class="h-6 w-6 mr-4 accent-primary">
                        <label for="task{{ $loop->iteration }}" class="cursor-pointer">{{ $item }}</label>
                    </li>
                @endforeach

                @empty($checklist_items)
                    <li class="flex items-center text-2xl">
                        <input type="checkbox" id="task1" class="h-6 w-6 mr-4 accent-primary">
                        <label for="task1" class="cursor-pointer">Sudah makan siang?</label>
                    </li>
                    <li class="flex items-center text-2xl">
                        <input type="checkbox" id="task2" class="h-6 w-6 mr-4 accent-primary">
                        <label for="task2" class="cursor-pointer">Minum air putih yang cukup</label>
                    </li>
                    <li class="flex items-center text-2xl">
                        <input type="checkbox" id="task3" class="h-6 w-6 mr-4 accent-primary">
                        <label for="task3" class="cursor-pointer">Ambil waktu istirahat sejenak</label>
                    </li>
                    <li class="flex items-center text-2xl">
                        <input type="checkbox" id="task4" class="h-6 w-6 mr-4 accent-primary">
                        <label for="task4" class="cursor-pointer">Sudah senyum hari ini?</label>
                    </li>
                @endempty
            </ul>
        </div>
    </section>

    @push('scripts')
        <script>
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                const label = document.querySelector(`label[for="${checkbox.id}"]`);
                checkbox.addEventListener('change', () => {
                    if (checkbox.checked) {
                        label.style.textDecoration = 'line-through';
                        label.style.opacity = '0.6';
                    } else {
                        label.style.textDecoration = 'none';
                        label.style.opacity = '1';
                    }
                });
            });
        </script>
    @endpush
@endsection
