<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Post::query()->delete();
        // Post::all()->each(fn($post) => $post->update(['content' => ""]));
        $posts = Post::query()
            ->when(!Auth::check(), function ($query) {
                $query->where('is_published', true);
            })
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $validated = $request->validate([
        //     'title' => 'required|max:255',
        //     'content' => 'required',
        //     'excerpt' => 'nullable|max:255',
        //     'featured_image' => 'nullable|image|max:2048',
        // ]);
        $request->merge(['is_published' => $request->is_published === 'on']);
        $post = new Post($request->all());
        $post->user_id = Auth::id();
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('posts', 'public');
            $post->featured_image = $path;
        }

        if ($post->is_published) {
            $post->published_at = now();
        }

        $post->save();

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (!$post->is_published && !Auth::check()) {
            abort(404);
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:255',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('posts', 'public');
            $validated['featured_image'] = $path;
        }

        // Handle publishing status
        if ($request->boolean('is_published') && !$post->published_at) {
            $validated['published_at'] = now();
        } elseif (!$request->boolean('is_published')) {
            $validated['published_at'] = null;
        }

        $post->update($validated);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
