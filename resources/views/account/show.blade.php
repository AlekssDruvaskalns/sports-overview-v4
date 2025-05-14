<x-app-layout>
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold text-black text-center mb-6">My Account</h1>

        <form action="{{ route('account.update') }}" method="POST" class="max-w-xl mx-auto bg-gray-800 text-white p-6 rounded-lg shadow">
            @csrf
            @method('PATCH')

            {{-- Confirmation message --}}
            @if (session('success'))
                <div class="bg-green-600 text-white px-4 py-2 rounded mb-4 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block font-semibold mb-1">Username</label>
                <input type="text" name="username" id="username"
                    value="{{ old('username', auth()->user()->username) }}"
                    class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring focus:ring-red-500" />
                @error('username')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email (readonly) -->
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input type="email" id="email" value="{{ auth()->user()->email }}" readonly
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded text-gray-400 cursor-not-allowed" />
            </div>

            <!-- Notifications (coming soon) -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Notifications</label>
                <p class="text-gray-400 italic">You will be notified about upcoming events. (coming soon)</p>
            </div>

            <!-- Favorites -->
            <div class="mb-6">
                <label class="block font-semibold mb-2">Saved Events</label>
                @if ($favorites->isEmpty())
                    <p class="text-gray-400 italic">You haven't saved any events yet.</p>
                @else
                    <ul class="space-y-2">
                        @foreach ($favorites as $event)
                            <li>
                                <a href="{{ route('events.show', $event->id) }}"
                                   class="text-red-400 hover:underline hover:text-red-300 transition">
                                    {{ $event->name }} — {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Submit -->
            <div class="text-center">
                <button type="submit"
                    class="bg-white text-black font-semibold py-2 px-6 rounded hover:bg-gray-200 transition border-b-2 border-transparent hover:border-red-500">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
