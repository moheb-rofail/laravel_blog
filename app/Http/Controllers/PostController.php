<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        // with here to apply eager loading
        // Peter Gamal once told me he was facing some terrible heavy loading because of
        // the problem of n+1 which was resulted by not applying eager loading
        // by with if there 100 posts, it will make one query for posts and another for their authors. (which called eager loading)
        // without eager loading it makes one query for the 100 posts and 100 other QUERY to get their authors.
        
        // Apply eager loading to avoid N+1 problem
        // Without it: 1 query for posts + N queries for users
        // With it: only 2 queries (posts + users)
        $posts = Post::with('user')->orderBy('id','DESC')->paginate(10);
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
    {//dd($request->file('image'));
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->slug = $request->slug;

        if ($request->hasFile('image'))
            $post->image = $request->file('image')->store('posts', 'public');
        
        $post->save();
        return redirect()->route ('posts.index')->with('success','Post inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('posts.show', ['post'=>$post]);
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
        
        if ($request->hasFile('image'))
            $post->image = $request->file('image')->store('posts', 'public');
        
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

    public function delete_permanently($id) {
        Post::withTrashed()->find($id)->forceDelete();
        return redirect()->route('posts.index')->with('success','Post was successfully deleted permanently');
    }
}
