<x-app-layout>
    <div class="container mx-auto py-8">
        <!-- Dynamic Header -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
            {{ $sport ? "Organizations for " . ucfirst($sport->name) : "All Organizations" }}
        </h1>

        <!-- Create Organization Button -->
        <div class="text-center mb-8">
            <a href="{{ route('organizations.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                Create Organization
            </a>
        </div>

        <!-- Organizations List -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
            <ul class="space-y-4">
                @foreach ($organizations as $organization)
                    <li class="bg-white p-6 rounded-lg shadow-md">
                        <!-- Organization Name -->
                        <h2 class="text-xl font-semibold text-gray-700">Name: {{ $organization->name }}</h2>

                        <!-- Events -->
                        <p class="mt-4"><strong>Events:</strong></p>
                        @if ($organization->events->isNotEmpty())
                            <ul class="ml-4 list-disc">
                                @foreach ($organization->events as $event)
                                    <li>{{ $event->name }} ({{ $event->date }})</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No events found for this organization.</p>
                        @endif

                        <!-- Actions -->
                        <div class="mt-4 space-x-2">
                            <a href="{{ route('organizations.show', $organization->slug) }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Show
                            </a>
                            <a href="{{ route('organizations.edit', $organization->slug) }}"
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <form action="{{ route('organizations.destroy', $organization->slug) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Back to Sports Button -->
        @if ($sport)
            <div class="mt-6 text-center">
                <a href="{{ route('sports.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back to Sports
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
