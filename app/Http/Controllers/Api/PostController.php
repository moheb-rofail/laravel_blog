<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->latest()->paginate(10);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {//dd($request->file('image'));
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;

        if ($request->hasFile('image'))
            $post->image = $request->file('image')->store('posts', 'public');
        
        $post->save();
        return "inserted";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        
        if ($request->hasFile('image'))
            $post->image = $request->file('image')->store('posts', 'public');
        
        $post->save();
        return "updated";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return "deleted";
    }

    public function restore_all(){
        Post::onlyTrashed()->restore();
        return 'Posts restored successfully';
    }

    public function restore_post($id){
        Post::withTrashed()->find($id)->restore();
        return 'Post restored successfully';
    }

    public function deleted_posts(){
        $posts = Post::onlyTrashed()->get();
        return 'posts.deleted_posts';
    }

    public function delete_permanently($id) {
        Post::withTrashed()->find($id)->forceDelete();
        return 'Post was successfully deleted permanently';
    }
}
