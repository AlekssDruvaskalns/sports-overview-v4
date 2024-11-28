<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Edit Event</h1>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg max-w-md mx-auto">
            <form action="{{ route('events.update', $event->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $event->name }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-gray-700 font-bold mb-2">Date:</label>
                    <input type="date" id="date" name="date" value="{{ $event->date }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700 font-bold mb-2">Location:</label>
                    <input type="text" id="location" name="location" value="{{ $event->location }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="organization_id" class="block text-gray-700 font-bold mb-2">Organization:</label>
                    <select id="organization_id" name="organization_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm">
                        <option value="" disabled>Select an organization</option>
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}" {{ $event->organization_id == $organization->id ? 'selected' : '' }}>
                                {{ $organization->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded">
                        Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
