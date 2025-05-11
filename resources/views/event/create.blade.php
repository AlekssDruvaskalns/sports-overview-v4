<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Create Event</h1>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg max-w-md mx-auto">
            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                {{-- Event Info --}}
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

    {{-- Fight Card Section --}}
    <h2 class="text-xl font-bold text-gray-800 mb-2">Fight Card</h2>
    <div id="fights" class="space-y-4 mb-4">
        <div class="fight-pair flex flex-wrap gap-2 items-center">
            <input type="text" name="fights[0][fighter_one]" placeholder="Fighter One" required class="flex-1 px-2 py-1 border rounded" />
            <span class="text-gray-500">vs</span>
            <input type="text" name="fights[0][fighter_two]" placeholder="Fighter Two" required class="flex-1 px-2 py-1 border rounded" />
            <input type="text" name="fights[0][weight_class]" placeholder="Weight Class (optional)" class="flex-1 px-2 py-1 border rounded" />
        </div>
    </div>

    <div class="mb-4">
        <button type="button" id="addFight"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
            + Add Fight
        </button>
    </div>

    <div class="text-center">
        <button type="submit"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
            Create Event
        </button>
    </div>
</form>

<script>
    let fightIndex = 1;
    document.getElementById('addFight').addEventListener('click', () => {
        const container = document.getElementById('fights');
        container.insertAdjacentHTML('beforeend', `
            <div class="fight-pair flex flex-wrap gap-2 items-center">
                <input type="text" name="fights[${fightIndex}][fighter_one]" placeholder="Fighter One" required class="flex-1 px-2 py-1 border rounded" />
                <span class="text-gray-500">vs</span>
                <input type="text" name="fights[${fightIndex}][fighter_two]" placeholder="Fighter Two" required class="flex-1 px-2 py-1 border rounded" />
                <input type="text" name="fights[${fightIndex}][weight_class]" placeholder="Weight Class (optional)" class="flex-1 px-2 py-1 border rounded" />
            </div>
        `);
        fightIndex++;
    });
</script>
</x-app-layout>