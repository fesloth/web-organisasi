<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name', 'title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-[#f0f0d8] text-gray-900 min-h-screen flex flex-col">

    <!-- Main Container -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Bottom Navigation -->
    <footer class="flex justify-center gap-4 bg-transparent py-4">
        <!-- Tombol Navigasi -->
        <a href="{{ route('beranda') }}"
            class="px-4 py-1 bg-white shadow rounded-full text-sm hover:bg-gray-100 transition cursor-pointer">
            Beranda
        </a>
        <a href="{{ route('anggota') }}"
            class="px-4 py-1 bg-white shadow rounded-full text-sm hover:bg-gray-100 transition cursor-pointer">
            Anggota
        </a>
        <a href="{{ route('program') }}"
            class="px-4 py-1 bg-white shadow rounded-full text-sm hover:bg-gray-100 transition cursor-pointer">
            Program
        </a>
        <a href="{{ route('event') }}"
            class="px-4 py-1 bg-white shadow rounded-full text-sm hover:bg-gray-100 transition cursor-pointer">
            Event
        </a>
        <a href="{{ route('forum') }}"
            class="px-4 py-1 bg-white shadow rounded-full text-sm hover:bg-gray-100 transition cursor-pointer">
            Forum
        </a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>
