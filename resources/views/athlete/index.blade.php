<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Athletes</h1>

        <!-- Add Athlete Button -->
        <div class="text-center mb-8">
            <a href="{{ route('athlete.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                Add Athlete
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($athletes as $athlete)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-gray-700">{{ $athlete->name }}</h2>
                    <p class="text-gray-500">Sport: {{ $athlete->sport->name }}</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('athlete.show', $athlete->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Show
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
