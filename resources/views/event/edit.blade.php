<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Edit Event</h1>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
            <form action="{{ route('events.update', $event->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Basic Info --}}
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

                <div class="mb-6">
                    <label for="organization_id" class="block text-gray-700 font-bold mb-2">Organization:</label>
                    <select id="organization_id" name="organization_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm">
                        <option value="" disabled>Select an organization</option>
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}"
                                {{ $event->organization_id == $organization->id ? 'selected' : '' }}>
                                {{ $organization->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Fight Card Editing --}}
                <h2 class="text-xl font-bold text-gray-800 mb-2">Fight Card</h2>
                <div id="fights" class="space-y-4 mb-4">
                    @foreach ($event->fights as $i => $fight)
                        <div class="fight-pair flex flex-wrap gap-2 items-center" data-fight-id="{{ $fight->id }}">
                            <input type="hidden" name="fights[{{ $i }}][id]" value="{{ $fight->id }}">
                            <input type="text" name="fights[{{ $i }}][fighter_one]" value="{{ $fight->fighter_one }}" required class="flex-1 px-2 py-1 border rounded" />
                            <span class="text-gray-500">vs</span>
                            <input type="text" name="fights[{{ $i }}][fighter_two]" value="{{ $fight->fighter_two }}" required class="flex-1 px-2 py-1 border rounded" />
                            <input type="text" name="fights[{{ $i }}][weight_class]" value="{{ $fight->weight_class }}" placeholder="Weight Class" class="flex-1 px-2 py-1 border rounded" />
                            <button type="button"
                                class="remove-fight bg-red-100 hover:bg-red-200 text-red-600 text-xs font-semibold px-3 py-1 rounded shadow-sm transition">
                                ❌ Remove
                            </button>
                        </div>
                    @endforeach
                </div>

                {{-- Hidden field to track deleted fights --}}
                <input type="hidden" name="deleted_fights" id="deletedFights" value="">

                <div class="mb-6">
                    <button type="button" id="addFight"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                        + Add Fight
                    </button>
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

    <script>
        let fightIndex = {{ $event->fights->count() }};
        const removedFights = [];

        // Add new fight
        document.getElementById('addFight').addEventListener('click', () => {
            const container = document.getElementById('fights');
            container.insertAdjacentHTML('beforeend', `
                <div class="fight-pair flex flex-wrap gap-2 items-center">
                    <input type="text" name="fights[${fightIndex}][fighter_one]" placeholder="Fighter One" required class="flex-1 px-2 py-1 border rounded" />
                    <span class="text-gray-500">vs</span>
                    <input type="text" name="fights[${fightIndex}][fighter_two]" placeholder="Fighter Two" required class="flex-1 px-2 py-1 border rounded" />
                    <input type="text" name="fights[${fightIndex}][weight_class]" placeholder="Weight Class" class="flex-1 px-2 py-1 border rounded" />
                </div>
            `);
            fightIndex++;
        });

        // Remove existing fight
        document.getElementById('fights').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-fight')) {
                const wrapper = e.target.closest('.fight-pair');
                const fightId = wrapper.getAttribute('data-fight-id');
                if (fightId) {
                    removedFights.push(fightId);
                    document.getElementById('deletedFights').value = removedFights.join(',');
                }
                wrapper.remove();
            }
        });
    </script>
</x-app-layout>
