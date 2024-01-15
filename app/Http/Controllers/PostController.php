<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\PostViewed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return view("post.index",["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'postContent' => 'required',
        ],[
            'postContent.required' => 'Please enter the content of the post'
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->content = $request->postContent;
        $post->save();

        return redirect()->route("post.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viewer = Auth::user();
        $post = Post::find($id);
        PostViewed::dispatch($viewer, $post);
        return view("post.show",["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
