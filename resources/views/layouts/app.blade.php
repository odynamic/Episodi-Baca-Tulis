<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'EPISODI') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-beige text-primary antialiased min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-primary text-beige shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold tracking-wide hover:text-accent transition">
                EPISODI
            </a>
            <div class="flex items-center gap-5 text-sm">
                <a href="{{ route('home') }}" class="hover:text-accent transition">Beranda</a>
                <a href="{{ route('stories.index') }}" class="hover:text-accent transition">Cerita Saya</a>
                <a href="{{ route('profile.edit') }}" class="hover:text-accent transition">Profil</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="ml-3 px-4 py-1.5 bg-accent text-white rounded-md hover:opacity-90 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="flex-1 max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8 pt-20">
        {{-- Tambahin padding-top (pt-20) biar konten gak ketimpa navbar --}}
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-6 text-center text-xs text-blueSoft/70">
        © {{ date('Y') }} EPISODI. Semua hak cipta dilindungi.
    </footer>
</body>
</html>
