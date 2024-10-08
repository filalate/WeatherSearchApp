<!-- resources/views/weather/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .weather-container {
            background-color: white;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        .buttons {
            margin-top: 20px;
        }
        a {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
        .back-btn {
            background-color: #28a745;
        }
        .back-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="weather-container">
        <h1>Weather for {{ $weather['name'] }}</h1>
        <p>Temperature: {{ $weather['main']['temp'] }}°C</p>
        <p>Condition: {{ $weather['weather'][0]['description'] }}</p>

        <!-- Buttons for navigation -->
        <div class="buttons">
            <a href="{{ route('weather.index') }}">Search Again</a>
            <a href="{{ route('home') }}" class="back-btn">Home</a>
        </div>
    </div>
</body>
</html>
