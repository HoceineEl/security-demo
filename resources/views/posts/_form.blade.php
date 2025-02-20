@csrf

<div class="space-y-6">
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
        <textarea id="content" name="content" rows="10"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            required>{{ old('content', $post->content ?? '') }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('content')" />
    </div>

    <div>
        <x-input-label for="featured_image" value="Featured Image (optional)" />
        <input type="file" id="featured_image" name="featured_image"
            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
            accept="image/*" />
        <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="is_published" name="is_published"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
            {{ old('is_published', $post->is_published ?? false) === true ? 'checked' : '' }}>
        <x-input-label for="is_published" value="Publish immediately" class="ml-2" />
        <x-input-error class="mt-2" :messages="$errors->get('is_published')" />
    </div>

    <div class="flex items-center justify-end">
        <x-secondary-button type="button" onclick="window.history.back()">
            Cancel
        </x-secondary-button>

        <x-primary-button class="ml-3">
            {{ $submitButtonText }}
        </x-primary-button>
    </div>
</div>
