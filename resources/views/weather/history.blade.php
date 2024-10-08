<h2>Your Weather Search History</h2>
<ul>
    @foreach ($history as $search)
        <li>{{ $search->city }}: {{ $search->temperature }}°C - {{ $search->weather }}</li>
    @endforeach
</ul>
