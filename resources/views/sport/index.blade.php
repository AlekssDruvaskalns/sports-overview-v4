<x-app-layout>
    <div class="bg-black min-h-screen py-8">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold text-center text-white mb-8">Sports</h1>

            @foreach ($sports as $sport)
                <div class="bg-gray-900 p-6 rounded-lg shadow-lg mb-8">
                    <h2 class="text-2xl font-semibold text-white mb-4 capitalize">{{ $sport->name }}</h2>

                    @if ($sport->organizations->isNotEmpty())
                        <h3 class="text-lg font-bold text-gray-300 mb-2">Organizations:</h3>
                        <ul class="list-disc ml-6 space-y-2 text-gray-300">
                            @foreach ($sport->organizations as $organization)
                                <li>
                                    <a href="{{ route('organizations.show', $organization->slug) }}"
                                        class="text-blue-300 hover:text-white hover:underline">
                                        {{ $organization->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No organizations found for this sport.</p>
                    @endif
                </div>
            @endforeach

            <div class="text-center mt-8">
                <a href="{{ route('events.index') }}"
                    class="bg-white text-black font-bold py-2 px-6 rounded shadow transition duration-300 ease-in-out transform hover:bg-gray-200 hover:scale-105 hover:shadow-xl">
                    View All Events
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
