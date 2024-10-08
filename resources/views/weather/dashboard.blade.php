<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h1>User Dashboard</h1>

    <h2>Your Weather Search History</h2>

    @if($history->isNotEmpty())
        <ul>
            @foreach($history as $search)
                <li>
                    <strong>City:</strong> {{ $search->city }}<br>
                    <strong>Temperature:</strong> {{ $search->temperature }}°C<br>
                    <strong>Weather:</strong> {{ $search->weather }}<br>
                    <strong>Search Date:</strong> {{ $search->created_at->format('d M Y, h:i A') }}
                </li>
                <hr>
            @endforeach
        </ul>
    @else
        <p>No search history found.</p>
    @endif

</body>
</html>
