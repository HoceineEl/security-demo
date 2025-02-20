<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-6">Edit Post</h1>

                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('posts._form', ['submitButtonText' => 'Update Post'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
