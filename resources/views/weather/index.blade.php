<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Weather Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            border: 2px solid #ccc;
            border-radius: 15px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        input[type="text"] {
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 1em;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #0072ff;
            box-shadow: 0 4px 20px rgba(0, 114, 255, 0.1);
        }

        /* Flexbox container for buttons */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        button[type="submit"] {
            padding: 15px;
            font-size: 1em;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #218838;
            box-shadow: 0 4px 15px rgba(0, 128, 55, 0.2);
        }

        .back-btn {
            display: inline-block;
            padding: 15px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .back-btn:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 15px rgba(0, 90, 179, 0.2);
        }

        /* Responsive design for smaller devices */
        @media (max-width: 600px) {
            .container {
                padding: 30px;
            }

            input[type="text"], button[type="submit"], .back-btn {
                padding: 10px;
                font-size: 0.9em;
            }

            .button-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Weather Search</h1>

        <!-- Weather search form -->
        <form action="{{ route('weather.search') }}" method="POST">
            @csrf
            <input type="text" name="city" id="city" placeholder="Enter City Name" required>
            <div class="button-container">
                <button type="submit">Get Weather</button>
                <a href="{{ route('home') }}" class="back-btn">Back</a>
            </div>
        </form>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div style="color: red; margin-top: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</body>
</html>
