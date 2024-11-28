<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Edit Post</h1>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg max-w-md mx-auto">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-bold mb-2">Content:</label>
                    <textarea id="content" name="content" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">{{ $post->content }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="organization_id" class="block text-gray-700 font-bold mb-2">Organization:</label>
                    <select id="organization_id" name="organization_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm">
                        <option value="" disabled>Select an organization</option>
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}" {{ $post->organization_id == $organization->id ? 'selected' : '' }}>
                                {{ $organization->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

