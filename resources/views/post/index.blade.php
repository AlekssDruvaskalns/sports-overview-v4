<x-app-layout>
    <div class="bg-gray-100 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Posts</h1>

            <a href="{{ route('posts.create') }}" 
               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Create New Post
            </a>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                @foreach($posts as $post)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">Title: {{ $post->title }}</h2>
                            <p class="text-gray-600">Content: {{ $post->content }}</p>
                        </div>
                        <div class="border-t p-4 flex justify-between items-center bg-gray-50">
                            <a href="{{ route('posts.show', $post->id) }}" 
                               class="text-blue-500 hover:underline">
                                Show
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}" 
                               class="text-yellow-500 hover:underline">
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
