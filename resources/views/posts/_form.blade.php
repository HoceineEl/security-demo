@csrf

{{-- Add Quill Dependencies --}}
@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .ql-editor {
            min-height: 200px;
            background: white;
        }

        .dark .ql-editor {
            background: #1f2937;
            color: #e5e7eb;
        }

        .dark .ql-toolbar {
            background: #374151;
            border-color: #4b5563;
        }

        .dark .ql-container {
            border-color: #4b5563;
        }

        .dark .ql-picker {
            color: #e5e7eb;
        }

        .dark .ql-stroke {
            stroke: #e5e7eb;
        }

        .dark .ql-fill {
            fill: #e5e7eb;
        }
    </style>
@endpush

<div class="space-y-6" id="post-form">
    <div>
        <x-input-label for="title" value="Title" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post->title ?? '')" required
            autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>

    <div>
        <x-input-label for="excerpt" value="Excerpt (optional)" />
        <x-text-input id="excerpt" name="excerpt" type="text" class="mt-1 block w-full" :value="old('excerpt', $post->excerpt ?? '')" />
        <x-input-error class="mt-2" :messages="$errors->get('excerpt')" />
    </div>
    <div>
        <x-input-label for="content" value="Content" />
        <textarea id="content" name="content" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm" rows="10" required>{!! $post->content ?? (old('content') ?? '') !!}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('content')" />
    </div>

    <div>
        <x-input-label for="featured_image" value="Featured Image (optional)" />
        <input type="file" id="featured_image" name="featured_image"
            class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
            accept="image/*" />
        <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="is_published" name="is_published"
            class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600"
            {{ old('is_published', $post->is_published ?? false) === true ? 'checked' : '' }}>
        <x-input-label for="is_published" value="Publish immediately" class="ml-2" />
        <x-input-error class="mt-2" :messages="$errors->get('is_published')" />
    </div>

    <div class="flex items-center justify-end">
        <x-secondary-button type="button" onclick="window.history.back()">
            Cancel
        </x-secondary-button>

        <x-primary-button class="ml-3" type="submit">
            {{ $submitButtonText }}
        </x-primary-button>
    </div>
</div>

{{-- @push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill with default options
            const quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'align': []
                        }],
                        ['link', 'image'],
                        ['clean']
                    ]
                },
                placeholder: 'Write your content here...'
            });

            // Get form elements
            const form = document.getElementById('post-form').closest('form');
            const contentField = document.getElementById('content');

            // Set initial content without sanitization
            const editorContent = contentField.value;
            if (editorContent) {
                quill.root.innerHTML = editorContent;
            }

            // Handle form submission without content validation
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                contentField.value = quill.root.innerHTML;
                this.submit();
            });

            // Keep content in sync without sanitization
            quill.on('text-change', function() {
                contentField.value = quill.root.innerHTML;
            });

            // Enable the editor
            quill.enable();
        });
    </script>
@endpush --}}
