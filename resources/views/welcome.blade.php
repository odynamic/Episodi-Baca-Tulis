<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPISODI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-beige text-blueSoft min-h-screen flex flex-col items-center justify-center font-sans">

    <div class="text-center px-6">
        <h1 class="text-5xl font-extrabold text-primary tracking-wide mb-3">EPISODI</h1>

        <p class="text-base text-blueSoft/80 max-w-md mx-auto leading-relaxed">
            Platform untuk menulis, membaca, dan membagikan cerita secara mudah dan menyenangkan.
        </p>

        <div class="flex justify-center gap-4 mt-8">
            <a href="{{ route('login') }}" 
            dusk="masuk-button"
            class="bg-primary text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-blueSoft transition-all duration-200 shadow-sm">
                Masuk
            </a>

            <a href="{{ route('register') }}" 
               class="bg-accent text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:opacity-90 transition-all duration-200 shadow-sm">
                Daftar
            </a>
        </div>
    </div>

    <footer class="absolute bottom-5 text-xs text-gray-500">
        © 2025 <span class="font-semibold text-primary">EPISODI</span> · Semua hak dilindungi
    </footer>

</body>
</html>
