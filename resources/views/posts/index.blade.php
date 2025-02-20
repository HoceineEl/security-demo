<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-semibold text-gray-900 dark:text-gray-100">Blog Posts</h1>
                @auth
                    <a href="{{ route('posts.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-600 focus:bg-indigo-700 dark:focus:bg-indigo-600 active:bg-indigo-900 dark:active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Create New Post
                    </a>
                @endauth
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-300">
                        @if ($post->featured_image)
                            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}"
                                class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                <a href="{{ route('posts.show', $post) }}"
                                    class="hover:text-indigo-600 dark:hover:text-indigo-400">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                {!! $post->content !!}</p>
                            <div class="flex justify-between items-center text-sm text-gray-500 dark:text-gray-400">
                                <span>By {{ $post->user->name }}</span>
                                <span>
                                    @if ($post->published_at)
                                        {{ $post->published_at->diffForHumans() }}
                                    @else
                                        Draft
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
