<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Edit Athlete</h1>

        <form action="{{ route('athlete.update', $athlete->id) }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            @method('PUT')

            <!-- Basic Athlete Information -->
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

            <!-- Static Sport-Specific Attributes -->
            @php
                $attributes = $athlete->sport_attributes ?? [];
            @endphp

            <!-- Basketball Attributes -->
            <div class="mt-6">
                <h3 class="text-lg font-bold text-gray-600">Basketball Attributes:</h3>
                <div class="mb-4">
                    <label for="basketball_position" class="block text-gray-700 font-bold">Position:</label>
                    <select id="basketball_position" name="sport_attributes[basketball_position]" class="w-full border-gray-300 rounded">
                        <option value="Point Guard (PG)" {{ ($attributes['basketball_position'] ?? '') == 'Point Guard (PG)' ? 'selected' : '' }}>Point Guard (PG)</option>
                        <option value="Shooting Guard (SG)" {{ ($attributes['basketball_position'] ?? '') == 'Shooting Guard (SG)' ? 'selected' : '' }}>Shooting Guard (SG)</option>
                        <option value="Small Forward (SF)" {{ ($attributes['basketball_position'] ?? '') == 'Small Forward (SF)' ? 'selected' : '' }}>Small Forward (SF)</option>
                        <option value="Power Forward (PF)" {{ ($attributes['basketball_position'] ?? '') == 'Power Forward (PF)' ? 'selected' : '' }}>Power Forward (PF)</option>
                        <option value="Center (C)" {{ ($attributes['basketball_position'] ?? '') == 'Center (C)' ? 'selected' : '' }}>Center (C)</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="basketball_team" class="block text-gray-700 font-bold">Team/Club:</label>
                    <input type="text" id="basketball_team" name="sport_attributes[basketball_team]" value="{{ $attributes['basketball_team'] ?? '' }}" class="w-full border-gray-300 rounded">
                </div>
            </div>

            <!-- Boxing/MMA Attributes -->
            <div class="mt-6">
                <h3 class="text-lg font-bold text-gray-600">Boxing/MMA Attributes:</h3>
                <div class="mb-4">
                    <label for="boxing_stance" class="block text-gray-700 font-bold">Stance:</label>
                    <select id="boxing_stance" name="sport_attributes[boxing_stance]" class="w-full border-gray-300 rounded">
                        <option value="Orthodox" {{ ($attributes['boxing_stance'] ?? '') == 'Orthodox' ? 'selected' : '' }}>Orthodox</option>
                        <option value="Southpaw" {{ ($attributes['boxing_stance'] ?? '') == 'Southpaw' ? 'selected' : '' }}>Southpaw</option>
                        <option value="Switch-hitter" {{ ($attributes['boxing_stance'] ?? '') == 'Switch-hitter' ? 'selected' : '' }}>Switch-hitter</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="boxing_weight_class" class="block text-gray-700 font-bold">Weight Class:</label>
                    <input type="text" id="boxing_weight_class" name="sport_attributes[boxing_weight_class]" value="{{ $attributes['boxing_weight_class'] ?? '' }}" class="w-full border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="boxing_record" class="block text-gray-700 font-bold">Professional Record:</label>
                    <input type="text" id="boxing_record" name="sport_attributes[boxing_record]" value="{{ $attributes['boxing_record'] ?? '' }}" placeholder="e.g., W:10 L:2 D:1" class="w-full border-gray-300 rounded">
                </div>
            </div>

            <!-- Football Attributes -->
            <div class="mt-6">
                <h3 class="text-lg font-bold text-gray-600">Football Attributes:</h3>
                <div class="mb-4">
                    <label for="football_position" class="block text-gray-700 font-bold">Playing Position:</label>
                    <input type="text" id="football_position" name="sport_attributes[football_position]" value="{{ $attributes['football_position'] ?? '' }}" class="w-full border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="football_club" class="block text-gray-700 font-bold">Club:</label>
                    <input type="text" id="football_club" name="sport_attributes[football_club]" value="{{ $attributes['football_club'] ?? '' }}" class="w-full border-gray-300 rounded">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded mt-6">
                Update Athlete
            </button>
        </form>
    </div>
</x-app-layout>
