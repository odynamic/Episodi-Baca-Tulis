<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPISODI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-beige text-blueSoft min-h-screen flex flex-col justify-center">
    <main>
        {{ $slot }}
    </main>

    <footer class="text-center text-sm text-gray-500 mt-6">
        © 2025 EPISODI\
    </footer>
</body>
</html>
