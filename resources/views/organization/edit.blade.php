<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Edit Organization</h1>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg max-w-md mx-auto">
            <form action="{{ route('organizations.update', $organization->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $organization->name }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="sport_id" class="block text-gray-700 font-bold mb-2">Sport:</label>
                    <select id="sport_id" name="sport_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                        <option value="" disabled>Select a Sport</option>
                        @foreach ($sports as $sport)
                            <option value="{{ $sport->id }}" {{ $organization->sport_id == $sport->id ? 'selected' : '' }}>
                                {{ ucfirst($sport->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                        Update Organization
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
