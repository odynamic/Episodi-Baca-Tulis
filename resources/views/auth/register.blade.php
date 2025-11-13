<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — EPISODI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-beige text-blueSoft min-h-screen flex items-center justify-center">
    <div class="w-full max-w-sm bg-white shadow-md rounded-xl p-6 space-y-5">
        <div class="text-center">
            <h1 class="text-2xl font-semibold text-accent">Daftar</h1>
            <p class="text-sm text-gray-500 mt-1">Buat akun baru untuk mulai menulis</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full mt-1 p-2.5 border border-gray-300 rounded-md focus:ring-1 focus:ring-accent focus:outline-none" />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full mt-1 p-2.5 border border-gray-300 rounded-md focus:ring-1 focus:ring-accent focus:outline-none" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full mt-1 p-2.5 border border-gray-300 rounded-md focus:ring-1 focus:ring-accent focus:outline-none" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full mt-1 p-2.5 border border-gray-300 rounded-md focus:ring-1 focus:ring-accent focus:outline-none" />
            </div>

            <button type="submit"
                class="w-full bg-accent text-white py-2.5 rounded-md hover:opacity-90 transition">
                Daftar
            </button>

            <p class="text-center text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-primary font-medium hover:underline">Masuk</a>
            </p>
        </form>
    </div>
</body>
</html>
