<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Athlete Details</h1>

        <div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
            <!-- Basic Athlete Details -->
            <h2 class="text-2xl font-bold text-gray-700 mb-4">{{ $athlete->name }}</h2>
            <p><strong>Sport:</strong> {{ $athlete->sport->name }}</p>
            <p><strong>Date of Birth:</strong> {{ $athlete->date_of_birth->format('d M Y') }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($athlete->gender) }}</p>
            <p><strong>Nationality:</strong> {{ $athlete->nationality }}</p>
            <p><strong>Height:</strong> {{ $athlete->height }} meters</p>

            <!-- Sport-Specific Attributes -->
            @if (!empty($athlete->sport_attributes))
                <div class="mt-6">
                    <h3 class="text-lg font-bold text-gray-600">Sport-Specific Attributes:</h3>
                    <ul class="list-disc ml-6">
                        @foreach ($athlete->sport_attributes as $key => $value)
                            @if (!empty($value)) <!-- Display only non-empty values -->
                                <li>
                                    <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Back Button -->
            <div class="mt-6">
                <a href="{{ route('athlete.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to Athletes
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
