<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weather App</title>

    <!-- Favicon or Logo -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-100 to-white min-h-screen flex flex-col items-center justify-center">

    <!-- Header with Login/Register Links -->
    <div class="absolute top-6 right-8">
        @if (Route::has('login'))
            <div class="space-x-6">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-700 font-semibold hover:text-gray-900">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 font-semibold hover:text-gray-900">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-gray-700 font-semibold hover:text-gray-900">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <!-- Main Content with Centered Logo -->
    <div class="text-center">
        <img src="{{ asset('images/logo.png') }}" alt="Custom Logo" class="w-24 h-24 mx-auto">
        <h1 class="mt-8 text-5xl font-bold text-blue-900">Welcome to the Weather Application</h1>
        <p class="mt-4 text-lg text-gray-600">Get real-time weather updates for any city in the world.</p>
    </div>

    <!-- Footer -->
    <footer class="absolute bottom-6 w-full text-center text-gray-500 text-sm">
        Weather Application v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>

</body>
</html>
