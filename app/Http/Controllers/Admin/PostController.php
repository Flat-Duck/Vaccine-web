<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
class PostController extends Controller
{
    /**
     * Display a list of Providers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::getList();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new Post
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.add');
    }

    /**
     * Save new Post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {

        $validatedData = request()->validate(Post::validationRules());
        $post = Post::create($validatedData);
        return redirect()->route('admin.posts.index')->with([
            'type' => 'success',
            'message' => 'Post added'
        ]);
    }

    /**
     * Show the form for editing the specified Post
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the Post
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post)
    {

        $validatedData = request()->validate(
            Post::validationRules($post->id)
        );
         $post->update($validatedData);

        return redirect()->route('admin.posts.index')->with([
            'type' => 'success',
            'message' => 'Post Updated'
        ]);
    }

    /**
     * Delete the Post
     *
     * @param \App\Post $post
     * @return void
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->route('admin.posts.index')->with([
            'type' => 'success',
            'message' => 'Post deleted successfully'
        ]);
    }
}
