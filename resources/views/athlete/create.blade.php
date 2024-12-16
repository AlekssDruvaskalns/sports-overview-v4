<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Add Athlete</h1>

        <form action="{{ route('athlete.store') }}" method="POST" class="max-w-lg mx-auto">
            @csrf

            <!-- Basic Athlete Information -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Name:</label>
                <input type="text" id="name" name="name" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="date_of_birth" class="block text-gray-700 font-bold">Date of Birth:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-gray-700 font-bold">Gender:</label>
                <select id="gender" name="gender" class="w-full border-gray-300 rounded" required>
                    <option value="" selected>-- Select Gender --</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="nationality" class="block text-gray-700 font-bold">Nationality:</label>
                <input type="text" id="nationality" name="nationality" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="height" class="block text-gray-700 font-bold">Height (in meters):</label>
                <input type="number" step="0.01" id="height" name="height" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="sport_id" class="block text-gray-700 font-bold">Sport:</label>
                <select id="sport_id" name="sport_id" class="w-full border-gray-300 rounded" required>
                    <option value="" selected>-- Select Sport --</option>
                    @foreach ($sports as $sport)
                        <option value="{{ $sport->id }}">{{ ucfirst($sport->name) }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Static Sport-Specific Attributes -->

            <!-- Basketball Attributes -->
            <div class="mt-6">
                <h3 class="text-lg font-bold text-gray-600">Basketball Attributes:</h3>
                <div class="mb-4">
                    <label for="basketball_position" class="block text-gray-700 font-bold">Position:</label>
                    <select id="basketball_position" name="sport_attributes[basketball_position]" class="w-full border-gray-300 rounded">
                        <option value="" selected>-- Select Position --</option> <!-- Empty Default Option -->
                        <option value="Point Guard (PG)">Point Guard (PG)</option>
                        <option value="Shooting Guard (SG)">Shooting Guard (SG)</option>
                        <option value="Small Forward (SF)">Small Forward (SF)</option>
                        <option value="Power Forward (PF)">Power Forward (PF)</option>
                        <option value="Center (C)">Center (C)</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="basketball_team" class="block text-gray-700 font-bold">Team/Club:</label>
                    <input type="text" id="basketball_team" name="sport_attributes[basketball_team]" class="w-full border-gray-300 rounded">
                </div>
            </div>

            <!-- Boxing/MMA Attributes -->
            <div class="mt-6">
                <h3 class="text-lg font-bold text-gray-600">Boxing/MMA Attributes:</h3>
                <div class="mb-4">
                    <label for="boxing_stance" class="block text-gray-700 font-bold">Stance:</label>
                    <select id="boxing_stance" name="sport_attributes[boxing_stance]" class="w-full border-gray-300 rounded">
                        <option value="" selected>-- Select Stance --</option> <!-- Empty Default Option -->
                        <option value="Orthodox">Orthodox</option>
                        <option value="Southpaw">Southpaw</option>
                        <option value="Switch-hitter">Switch-hitter</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="boxing_weight_class" class="block text-gray-700 font-bold">Weight Class:</label>
                    <input type="text" id="boxing_weight_class" name="sport_attributes[boxing_weight_class]" class="w-full border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="boxing_record" class="block text-gray-700 font-bold">Professional Record:</label>
                    <input type="text" id="boxing_record" name="sport_attributes[boxing_record]" placeholder="e.g., W:10 L:2 D:1" class="w-full border-gray-300 rounded">
                </div>
            </div>

            <!-- Football Attributes -->
            <div class="mt-6">
                <h3 class="text-lg font-bold text-gray-600">Football Attributes:</h3>
                <div class="mb-4">
                    <label for="football_position" class="block text-gray-700 font-bold">Playing Position:</label>
                    <input type="text" id="football_position" name="sport_attributes[football_position]" class="w-full border-gray-300 rounded" placeholder="e.g., Forward">
                </div>
                <div class="mb-4">
                    <label for="football_club" class="block text-gray-700 font-bold">Club:</label>
                    <input type="text" id="football_club" name="sport_attributes[football_club]" class="w-full border-gray-300 rounded">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded mt-6">
                Save Athlete
            </button>
        </form>
    </div>
</x-app-layout>
