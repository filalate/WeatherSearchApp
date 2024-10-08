<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherSearch;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the search history for the logged-in user
        $history = WeatherSearch::where('user_id', Auth::id())->get();

        // Pass the history to the dashboard view
        return view('dashboard', ['history' => $history]);
    }
}
