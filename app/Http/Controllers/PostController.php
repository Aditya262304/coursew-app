<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();
        $posts = Post::orderBy('created_at','DESC')->paginate(5);


        return view('Posts.index',['posts'=>$posts]);
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
        //
        $request->validate([
            'post' =>'required',
            'image'=>'required|image|mimes:png,jpg,png,gif,svg',
        ]);

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->post = $request->post;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('uploads', $imagename);
            $post->image = $imagename;
        }
        $post->save();

        return redirect()->back();
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
        $post = Post::findOrFail($id);

        return view('Posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate([
            'post' => 'required|max:250',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg', // Adjust file types and size as needed
        ]);

        $post = Post::findOrFail($id);

        $imagePath = null;

        if($request->hasFile('image')){
                $imagePath = $request->file('image')->store('images/posts', 'public');
            }
        else{
            $imagePath = null;
        }

        $post->update([
            'post' => $request->input('post'),
            'image' => $imagePath,
        ]);

        $posts = Post::all();
        $posts = Post::orderBy('created_at','DESC')->paginate(5);
        return view('Posts.index',['posts'=>$posts]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
