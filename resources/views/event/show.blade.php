<x-app-layout>
    <div class="container mx-auto py-8 text-white">
        <h1 class="text-3xl font-bold mb-4">{{ $event->name }}</h1>
        <p class="text-lg mb-2"> Date: {{ $event->date }}</p>
        <p class="text-lg mb-6"> Location: {{ $event->location }}</p>

        @if ($event->fights->isNotEmpty())
            <h2 class="text-2xl font-semibold mb-3">Fight Card</h2>
            <ul class="bg-gray-800 p-6 rounded-lg shadow space-y-4">
                @foreach ($event->fights->sortBy('order') as $fight)
                    <li class="text-lg">
                         <strong>{{ $fight->fighter_one }}</strong> vs <strong>{{ $fight->fighter_two }}</strong>
                        @if ($fight->weight_class)
                            <span class="text-sm text-gray-400">({{ $fight->weight_class }})</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-400">No fights have been added to this event.</p>
        @endif

        <div class="mt-6 space-x-2">
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
        </div>
    </div>
</x-app-layout>
