<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Create Event</h1>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg max-w-md mx-auto">
            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-gray-700 font-bold mb-2">Date:</label>
                    <input type="date" id="date" name="date" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-gray-700 font-bold mb-2">Location:</label>
                    <input type="text" id="location" name="location" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-4">
                    <label for="organization_id" class="block text-gray-700 font-bold mb-2">Organization:</label>
                    <select id="organization_id" name="organization_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm">
                        <option value="" disabled selected>Select an organization</option>
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                        Create Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>