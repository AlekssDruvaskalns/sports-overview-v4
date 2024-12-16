<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Sports</h1>

        @foreach ($sports as $sport)
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4 capitalize">{{ $sport->name }}</h2>

                @if ($sport->organizations->isNotEmpty())
                    <h3 class="text-lg font-bold text-gray-600 mb-2">Organizations:</h3>
                    <ul class="list-disc ml-6 space-y-2">
                        @foreach ($sport->organizations as $organization)
                            <li>
                                <a href="{{ route('organizations.show', $organization->id) }}" class="text-blue-500 hover:underline">
                                    {{ $organization->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No organizations found for this sport.</p>
                @endif

                <!-- Buttons -->
                <div class="mt-4 flex justify-between">
                    <a href="{{ route('sports.show', $sport->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Show Organizations
                    </a>
                    <a href="{{ route('sports.organizations.index', $sport->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        All Events and Posts
                    </a>
                    <a href="{{ route('sports.athletes.index', $sport->id) }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                        Show Athletes
                    </a>
                </div>
            </div>
        @endforeach

        <div class="text-center mt-8">
            <a href="{{ route('organizations.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded">
                View All Organizations
            </a>
            
        </div>
    </div>
</x-app-layout>
