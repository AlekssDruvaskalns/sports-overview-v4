<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Organizations</h1>

        <div class="text-center mb-8">
            <a href="{{ route('organizations.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                Create Organization
            </a>
        </div>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
            <ul class="space-y-4">
                @foreach ($organizations as $organization)
                <li class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-gray-700">Name: {{ $organization->name }}</h2>
                    <p class="text-gray-600">Events: {{ $organization->events->count() }}</p>
                    <p class="text-gray-600">Posts: {{ $organization->posts->count() }}</p>
                    <div class="mt-4 space-x-2">
                        <a href="{{ route('organizations.show', $organization->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Show
                        </a>
                        <a href="{{ route('organizations.edit', $organization->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST" class="inline-block">
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
    </div>
</x-app-layout>
