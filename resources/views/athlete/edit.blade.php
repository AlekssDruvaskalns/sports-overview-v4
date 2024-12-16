<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Edit Athlete</h1>

        <form action="{{ route('athlete.update', $athlete->id) }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Name:</label>
                <input type="text" id="name" name="name" value="{{ $athlete->name }}" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="date_of_birth" class="block text-gray-700 font-bold">Date of Birth:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $athlete->date_of_birth->format('Y-m-d') }}" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-gray-700 font-bold">Gender:</label>
                <select id="gender" name="gender" class="w-full border-gray-300 rounded" required>
                    <option value="male" {{ $athlete->gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $athlete->gender === 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="nationality" class="block text-gray-700 font-bold">Nationality:</label>
                <input type="text" id="nationality" name="nationality" value="{{ $athlete->nationality }}" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="height" class="block text-gray-700 font-bold">Height (in meters):</label>
                <input type="number" step="0.01" id="height" name="height" value="{{ $athlete->height }}" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="sport_id" class="block text-gray-700 font-bold">Sport:</label>
                <select id="sport_id" name="sport_id" class="w-full border-gray-300 rounded" required>
                    @foreach ($sports as $sport)
                        <option value="{{ $sport->id }}" {{ $athlete->sport_id == $sport->id ? 'selected' : '' }}>
                            {{ ucfirst($sport->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">
                Update Athlete
            </button>
        </form>
    </div>
</x-app-layout>
