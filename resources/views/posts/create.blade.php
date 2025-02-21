<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-6">Create New Post</h1>

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @include('posts._form', ['submitButtonText' => 'Create Post'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
