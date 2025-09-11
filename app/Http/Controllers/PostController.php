<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public $posts = [
        [
            "id" => 1,
            "title" => "Getting Started with Laravel",
            "category" => "Programming",
            "description" => "An introduction to Laravel framework basics."
        ],
        [
            "id" => 2,
            "title" => "Healthy Eating Habits",
            "category" => "Health",
            "description" => "Tips for maintaining a balanced diet."
        ],
        [
            "id" => 3,
            "title" => "Top 10 Travel Destinations",
            "category" => "Travel",
            "description" => "A list of must-visit destinations for 2025."
        ],
        [
            "id" => 4,
            "title" => "Mastering Git",
            "category" => "Programming",
            "description" => "Learn version control with Git and GitHub."
        ],
        [
            "id" => 5,
            "title" => "Home Workout Routines",
            "category" => "Fitness",
            "description" => "Simple exercises you can do at home."
        ],
        [
            "id" => 6,
            "title" => "Investing for Beginners",
            "category" => "Finance",
            "description" => "A beginner’s guide to personal investing."
        ],
        [
            "id" => 7,
            "title" => "Photography Tips",
            "category" => "Art",
            "description" => "How to take better photos with any camera."
        ],
        [
            "id" => 8,
            "title" => "React vs Vue",
            "category" => "Programming",
            "description" => "Comparison between two popular JavaScript frameworks."
        ],
        [
            "id" => 9,
            "title" => "Time Management Hacks",
            "category" => "Productivity",
            "description" => "Techniques to boost your daily productivity."
        ],
        [
            "id" => 10,
            "title" => "Climate Change Facts",
            "category" => "Science",
            "description" => "Important facts everyone should know about climate change."
        ]
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', ['posts' => $this->posts]);
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
        return view('posts.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('posts.show', ['id'=>$id, 'post'=>$this->posts[$id-1] ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('posts.edit', ['id'=>$id, 'post'=>$this->posts[$id-1]]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('posts.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('posts.destroy'); 
    }
}
