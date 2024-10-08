<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Weather App</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Custom CSS -->
    <style>
    /* Hero Section Styling */
    .hero-section {
        background-color: #f3f4f6; /* Light gray background */
        padding: 60px 0;
        text-align: center;
    }

    .hero-section h1 {
        font-size: 4rem;
        font-weight: 700;
        line-height: 1.2;
        color: #1f2937; /* Dark gray text */
    }

    .hero-section a {
        display: inline-block;
        padding: 12px 30px;
        background-color: #0ea5e9; /* Sky blue background */
        color: white;
        font-weight: bold;
        border-radius: 30px;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .hero-section a:hover {
        background-color: #0284c7; /* Darker blue on hover */
        transform: scale(1.05);
    }

    /* Grid Layout Styling */
    .grid-section {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-top: 30px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .grid-section > div {
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .grid-section > div:hover {
        transform: translateY(-10px);
    }

    /* Fun Fact Section */
    .fun-fact {
        background: linear-gradient(to right, #34d399, #10b981); /* Green gradient */
        color: white;
        text-align: center;
    }

    .fun-fact h3 {
        font-size: 1.5rem;
        font-weight: 600;
    }

    /* Quote Section */
    .quote-section {
        background: #f9fafb; /* Light gray background */
        color: #1f2937; /* Dark gray text */
        text-align: center;
    }

    .quote-section h3 {
        font-size: 1.5rem;
        font-weight: 600;
    }

    /* Additional Spacing and Centering */
    .centered-content {
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
        padding: 20px;
    }
    </style>
</head>
<body>
<x-app-layout>
    <!-- Hero Section -->
    <section class="hero-section bg-white text-center py-16">
        <div class="container mx-auto">
            <!-- Large Heading -->
            <h1 class="text-6xl font-bold tracking-tight leading-tight mb-6">
                FIND THE BEST <br> WEATHER UPDATES
            </h1>

            <!-- Call-to-action Button -->
            <a href="{{ route('weather.index') }}">
                Search for Weather
            </a>
        </div>
    </section>

    <!-- Grid Layout for Fun Fact and Quote Section -->
    <div class="grid-section">
        <!-- Section 1: Fun Fact with border -->
        <div class="fun-fact">
            <h3 class="text-lg font-semibold">Did You Know?</h3>
            <p class="mt-2">The highest temperature ever recorded on Earth was 134°F (56.7°C) in Death Valley, California.</p>
        </div>

        <!-- Section 2: Quote of the Day -->
        <div class="fun-fact">
            <h3 class="text-lg font-semibold">Quote of the Day</h3>
            <p class="mt-2">"Sunshine is the best medicine." - Unknown</p>
        </div>
    </div>
</x-app-layout>
</body>
</html>
