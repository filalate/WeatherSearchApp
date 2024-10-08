<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        // Retrieve the API key from the config/services.php
        $this->apiKey = config('services.openweathermap.key');
    }

    public function getWeather($city)
    {
        // Make a request to OpenWeatherMap API
        $response = Http::get('http://api.openweathermap.org/data/2.5/weather', [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => 'metric',
        ]);

        // Return the response if successful
        if ($response->successful()) {
            return $response->json();
        }

        // Return null if the request fails
        return null;
    }
}
