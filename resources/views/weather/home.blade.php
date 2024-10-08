<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to the Weather App Homepage!</h1>
    <p>This is the homepage of your weather application.</p>

    <!-- Link to login and register -->
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
</body>
</html>
