<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Events</h1>

        <div class="text-center mb-8">
            <a href="{{ route('events.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                Create Event
            </a>
        </div>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
            <ul class="space-y-4">
                @foreach($events as $event)
                <li class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-gray-700">Name: {{ $event->name }}</h2>
                    <p class="text-gray-600">Date: {{ $event->date }}</p>
                    <p class="text-gray-600">Location: {{ $event->location }}</p>
                    <div class="mt-4 space-x-2">
                        <a href="{{ route('events.show', $event->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Show
                        </a>
                        <a href="{{ route('events.edit', $event->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
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