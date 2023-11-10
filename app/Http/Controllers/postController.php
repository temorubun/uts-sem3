<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:500',
            'content' => 'nullable|string|max:500',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            $imageName = 'assets/upload/img/' . uniqid() . '.' . $uploadedImage->getClientOriginalExtension();
            $uploadedImage->move(public_path('assets/upload/img/'), $imageName);
        }
        Post::create([
            'image' => $imageName,
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);
        return redirect()->route('posts.index')->with('status', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $posts = Post::find($id);
    
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'string|max:500',
            'content' => 'string|max:500',
        ]);
    
        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            $imageName = 'assets/upload/img/' . pathinfo($uploadedImage->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $uploadedImage->getClientOriginalExtension();
            $uploadedImage->move(public_path('assets/upload/img/'), $imageName);
            $posts->image = $imageName;
        }
    
    
        $posts->title = $validatedData['title'];
        $posts->content = $validatedData['content'];
        $posts->save();
    
        return redirect()->route('posts.index')->with('status', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('posts.index');

    }

}
