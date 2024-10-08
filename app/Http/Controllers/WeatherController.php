<?php

namespace App\Http\Controllers;

use App\Models\WeatherSearch; // Import the WeatherSearch model
use App\Services\WeatherService;  // Import the WeatherService
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // For accessing the logged-in user

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    // Show the weather search form and user's search history
    public function index()
    {
        // Fetch search history for the logged-in user
        $history = WeatherSearch::where('user_id', Auth::id())->get();

        // Pass the search history to the view
        return view('weather.index', ['history' => $history]);
    }

    // Search for weather based on city name and save the search to the database
    public function search(Request $request)
    {
        // Validate the input from the request
        $request->validate(['city' => 'required|string']);

        // Fetch weather data using the WeatherService
        $weather = $this->weatherService->getWeather($request->city);

        // Check if the weather data was fetched successfully
        if ($weather) {
            // Save the search history in the database
            WeatherSearch::create([
                'user_id' => Auth::id(), // Assuming the user is logged in
                'city' => $weather['name'], // City name from API response
                'temperature' => $weather['main']['temp'], // Temperature from API
                'weather' => $weather['weather'][0]['description'], // Weather description
            ]);

            // Return the weather data to the view
            return view('weather.show', ['weather' => $weather]);
        }

        // If fetching weather data fails, return with an error
        return back()->withErrors(['city' => 'Could not fetch weather data.']);
    }

    // Method to delete a weather search entry from history
    public function destroy($id)
{
    // Find the weather search record for the authenticated user
    $search = WeatherSearch::where('user_id', Auth::id())->findOrFail($id);

    // Delete the record
    $search->delete();

    // Return a 204 No Content response to indicate success
    return response()->json(null, 204);
}

}
