<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        // Attach post to logged-in user
        $request->user()->posts()->create([

            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->route('posts.create')->with('success', 'Post created successfully!');
        // the ->with('success', puts the success message in the session, then the session from form displays its
    }
}
