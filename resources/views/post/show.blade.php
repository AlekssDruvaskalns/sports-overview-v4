<x-app-layout>
    <h1>Post Details</h1>

    <h2>Title: {{ $post->title }}</h2>
    <p>Content: {{ $post->content }}</p>

    <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Edit
    </a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Delete
        </button>
    </form>
</x-app-layout>
