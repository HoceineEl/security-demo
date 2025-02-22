<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <article class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($post->featured_image)
                    <div class="w-full h-96 relative">
                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}"
                            class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-6 sm:p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $post->title }}</h1>
                        @can('update', $post)
                            <div class="flex space-x-2">
                                <a href="{{ route('posts.edit', $post) }}"
                                    class="inline-flex items-center px-4 py-2 bg-gray-600 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Edit
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>

                    <div class="flex items-center text-gray-500 dark:text-gray-400 text-sm mb-8">
                        <span>By {{ $post->user->name }}</span>
                        <span class="mx-2">&bull;</span>
                        <span>
                            @if ($post->published_at)
                                {{ $post->published_at?->format('F j, Y') }}
                            @else
                                Draft
                            @endif
                        </span>
                    </div>

                    @if ($post->excerpt)
                        <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 font-light leading-relaxed">
                            {{ $post->excerpt }}
                        </p>
                    @endif

                    <div class="prose dark:prose-invert prose-lg max-w-none">
                        {!! htmlspecialchars($post->content, ENT_QUOTES | ENT_HTML5, 'UTF-8') !!}
                    </div>
                </div>
            </article>

            <div class="mt-8 flex justify-between items-center">
                <a href="{{ route('posts.index') }}"
                    class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">
                    &larr; Back to Posts
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
