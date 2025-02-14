<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\CreatePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('website.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePost $request)
    {
        $post = $request->user()->posts()->create($request->except('tags'));
        $post->tags()->attach($request->tags);
        if ($request->hasFile('photo')) {
            $request->file('photo')->storeAs('posts', $post->id . '.' . $request->file('photo')->extension(), 'public');
            $post->photo = 'posts/' . $post->id . '.' . $request->file('photo')->extension();
            $post->save();
        }
        return redirect()->route('website.home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('user', 'category', 'tags')->findOrFail($id);
        return view('website.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
