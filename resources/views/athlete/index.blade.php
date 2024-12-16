<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Athletes @isset($sport) for {{ ucfirst($sport->name) }} @else (All Sports) @endisset
        </h1>

        <!-- Add Athlete Button -->
        <div class="text-center mb-8">
            <a href="{{ route('athlete.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                Add Athlete
            </a>
        </div>

        <!-- Athletes Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($athletes as $athlete)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-gray-700">{{ $athlete->name }}</h2>
                    <p class="text-gray-500">Sport: {{ ucfirst($athlete->sport->name) }}</p>

                    <!-- Actions -->
                    <div class="mt-4 space-y-2">
                        <a href="{{ route('athlete.show', $athlete->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block text-center">
                            Show
                        </a>
                        <a href="{{ route('athlete.edit', $athlete->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded block text-center">
                            Edit
                        </a>
                        <form action="{{ route('athlete.destroy', $athlete->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded block w-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">No athletes found.</p>
            @endforelse
        </div>

        @isset($sport)
            <div class="text-center mt-8">
                <a href="{{ route('sports.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Go Back to Sports
                </a>
            </div>
        @endisset
    </div>
</x-app-layout>
