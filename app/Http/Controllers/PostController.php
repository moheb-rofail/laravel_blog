<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10)->fragment('posts');;
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users'=> $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author_id = $request->author_id;
        $post->save();
        return redirect()->route ('posts.index')->with('success','Post inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        $user = User::find($post->author_id);
        return view('posts.show', ['post'=>$post, 'author'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $users = User::all();
        return view('posts.edit', ['post'=>$post, 'users'=> $users]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author_id = $request->author_id;
        $post->save();
        return redirect()->route ('posts.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }

    public function restore_all(){
        Post::onlyTrashed()->restore();
        return redirect()->route('posts.index')->with('success','Posts restored successfully');
    }

    public function restore_post($id){
        Post::withTrashed()->find($id)->restore();
        return redirect()->route('posts.index')->with('success','Post restored successfully');
    }

    public function deleted_posts(){
        $posts = Post::onlyTrashed()->get();
        return view('posts.deleted_posts', ['posts'=>$posts]);
    }
}
