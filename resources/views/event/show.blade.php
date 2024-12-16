<x-app-layout>
    <h1>Event Details</h1>

    <h2>Name: {{ $event->name }}</h2>
    <p>Date: {{ $event->date }}</p>
    <p>Location: {{ $event->location }}</p>

    <a href="{{ route('events.edit', $event->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Edit
    </a>
    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Delete
        </button>
    </form>
</x-app-layout>