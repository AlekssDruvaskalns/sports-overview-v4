<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Organization: {{ $organization->name }}</h1>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Events</h2>
            @if ($organization->events->isNotEmpty())
                <ul class="space-y-4">
                    @foreach ($organization->events as $event)
                        <li class="bg-white p-4 rounded-lg shadow-md">
                            <p><strong>Name:</strong> {{ $event->name }}</p>
                            <p><strong>Date:</strong> {{ $event->date }}</p>
                            <p><strong>Location:</strong> {{ $event->location }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No events found for this organization.</p>
            @endif
        </div>

        <div class="bg-gray-100 p-6 rounded-lg shadow-lg mt-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Posts</h2>
            @if ($organization->posts->isNotEmpty())
                <ul class="space-y-4">
                    @foreach ($organization->posts as $post)
                        <li class="bg-white p-4 rounded-lg shadow-md">
                            <p><strong>Title:</strong> {{ $post->title }}</p>
                            <p><strong>Content:</strong> {{ $post->content }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No posts found for this organization.</p>
            @endif
        </div>
    </div>
</x-app-layout>

