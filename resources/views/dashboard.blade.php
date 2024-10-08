<x-app-layout>
    <!-- Include Font Awesome for icons -->
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Center the search history table -->
    <div class="flex justify-center items-center min-h-screen"> <!-- Flexbox to center both vertically and horizontally -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 w-full max-w-4xl"> <!-- Restrict max width of the table -->
            <div class="p-6 text-gray-900">
                <h3 class="font-semibold text-lg mb-4 text-center">Your Weather Search History</h3>

                @if($history && $history->isNotEmpty())
                    <div class="overflow-x-auto mx-auto"> <!-- Auto-scroll for small screens -->
                        <table class="min-w-full bg-white border border-gray-200 mx-auto">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-bold">City</th>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-bold">Temperature (°C)</th>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-bold">Weather</th>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-bold">Date</th>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-bold">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="search-history">
                                @foreach($history as $search)
                                    <tr id="search-{{ $search->id }}">
                                        <td class="py-2 px-4 border-b">{{ $search->city }}</td>
                                        <td class="py-2 px-4 border-b">{{ $search->temperature }}°C</td>
                                        <td class="py-2 px-4 border-b">{{ $search->weather }}</td>
                                        <td class="py-2 px-4 border-b">{{ $search->created_at->format('d M Y, h:i A') }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <!-- Replaced Delete button with Font Awesome trash icon -->
                                            <button data-id="{{ $search->id }}" class="delete-btn bg-transparent hover:bg-red-600 text-black font-semibold py-1 px-4 rounded-full shadow-md">
                                                <i class="fas fa-trash text-red-500"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center">No search history found.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- JavaScript for handling AJAX delete -->
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const searchId = this.getAttribute('data-id');

                if (confirm('Are you sure you want to delete this entry?')) {
                    fetch(`/weather/${searchId}/delete`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => {
                        if (response.ok) {
                            document.getElementById(`search-${searchId}`).remove();
                        } else {
                            alert('Failed to delete the entry.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        });
    </script>
</x-app-layout>
