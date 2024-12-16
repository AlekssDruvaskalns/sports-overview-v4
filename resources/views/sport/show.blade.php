<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Sport: {{ ucfirst($sport->name) }}</h1>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Organizations</h2>

            @if ($sport->organizations->isNotEmpty())
                <ul class="space-y-4">
                    @foreach ($sport->organizations as $organization)
                        <li class="bg-white p-4 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold">{{ $organization->name }}</h3>
                            <a href="{{ route('sports.organizations.index', $sport->id) }}" class="text-blue-500 hover:underline">
                                View All Organizations
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No organizations found for this sport.</p>
            @endif
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('sports.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to Sports
            </a>
        </div>
    </div>
</x-app-layout>
