<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($postId)
    {
        //
        $post = Post::findOrFail($postId);
        $comments = $post->comments;

        return view('Comments.index', compact('comments', 'post'));
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
        $validateData = $request->validate([
            'comment' => 'required|string',
            'user_id' => 'required|max:191',
            'post_id' => 'required|max:191',
        ]);

        if (!$validateData) {
            return response()->json([
                'status' => 400,
                'errors' => "Something went wrong",
            ]);
        } else {

                // Create a new comment
                $comment = new Comment;

                $comment->comment = $request->input('comment');
                $comment->user_id = $request->input('user_id');
                $comment->post_id = $request->input('post_id');
                // Save the comment
                $comment->save();

                // return response()->json([
                //     'status'=> 200,
                //     'errors'=>"Comment added successfully",
                // ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Comment added successfully",
                    'comment' => $comment->comment, // Comment text
                    'user_id' => $validateData['user_id'], // Using user_id from validated data
                    'post_id' => $validateData['post_id'],
                ]);
        }
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
        $comment = Comment::findOrFail($id);
        return view('Comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate([
            'comment' => 'required|max:250',
        ]);
        $comment = Comment::findOrFail($id);

        $comment->update([
            'comment'=> request()->input('comment')
        ]);

        $comments = Comment::all();
        return view('Comments.index',['comments' => $comments]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
