<x-app-layout>
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <input type="text" id="content" name="content" value="{{ $post->content }}" required>
        </div>
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            Update
        </button>
    </form>
</x-app-layout>
