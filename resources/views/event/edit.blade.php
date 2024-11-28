<x-app-layout>
    <h1>Edit Event</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $event->name }}" required>
        </div>
        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ $event->date }}" required>
        </div>
        <div>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="{{ $event->location }}" required>
        </div>
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            Update
        </button>
    </form>
</x-app-layout>
