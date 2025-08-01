<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
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
        $request->validate([
            'title'=>'required|max:30',
            'description'=>'required',
            'category'=>'max:20',
            'image'=>'image|mimes:jpg,png,jpeg,gif,svg',
        ]); 
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category = $request->category;
        $post->user_id =auth()->id();
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image->move(public_path('images/posts'),$imageName);
            $post->image = $imageName;
        }
        
        $tags = array_map('trim', explode(',', $request->tags));

        $tagIds = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['content' => $tagName]);
            $tagIds[] = $tag->id;
        }
        $post->save();  
        $post->tags()->sync($tagIds);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $user = $post->user;
        $tags = $post->tags;
        $comments = $post->comments;
        return view('posts.show',compact('post','user','tags','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
        'title' => 'required|max:30',
        'description' => 'required',
        'category' => 'max:20',
        'image' => 'nullable|image',
    ]);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->category = $request->category;   
    if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image->move(public_path('images/posts'),$imageName);
            $post->image = $imageName;
        }
        $post->save(); 
        if ($request->tags) {
        $tags = array_map('trim', explode(',', $request->tags));

        $tagIds = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['content' => $tagName]);
            $tagIds[] = $tag->id;
        }
        
        $post->tags()->sync($tagIds);
    } else {
        $post->tags()->detach();
    }
    return redirect()->route('posts.show',compact('post'));
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
