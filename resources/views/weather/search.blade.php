<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Weather Results</title>
     <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-100 to-white min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg text-center border-4 border-blue-200">
        <h1 class="text-3xl font-bold mb-4 text-blue-900">Weather for {{ $weather['name'] }}</h1>
        
        <p class="text-xl text-gray-700 mb-4">Temperature: <span class="font-semibold">{{ $weather['main']['temp'] }}°C</span></p>
        <p class="text-xl text-gray-700 mb-6">Condition: <span class="font-semibold">{{ $weather['weather'][0]['description'] }}</span></p>

        <!-- Centered buttons (Search Again and Back) -->
        <div class="flex justify-center space-x-4 mt-6">
            <!-- Search Again Button -->
            <a href="{{ route('weather.index') }}" class="text-white bg-blue-500 hover:bg-blue-600 py-2 px-6 rounded-full shadow-md transition duration-300">
                Search Again
            </a>
            <!-- Back to Dashboard Button -->
            <a href="{{ route('dashboard') }}" class="text-white bg-gray-500 hover:bg-gray-600 py-2 px-6 rounded-full shadow-md transition duration-300">
                Back
            </a>
        </div>
    </div>

</body>
</html>
