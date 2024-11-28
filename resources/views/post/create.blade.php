<x-app-layout>
    <h1>Create Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <input type="text" id="content" name="content" required>
        </div>
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            Create
        </button>
    </form>
</x-app-layout>