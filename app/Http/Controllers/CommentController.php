<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Comment::all(); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $data = $request->validate([
            'user_id'=> 'required|exists:notes,id',
            'note_id'=> 'required|exists:users,id',
            'content'=>'required|string|max:255',
        ]);

        $comment = Comment::create($data);
        return response()-> json($comment,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Comment::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment:: findOrFail($id);

        $data = $request->validate([
            'user_id'=>'sometimes|exists:users,id',
            'note_id'=>'sometimes|exists:notes,id',
            'content'=> 'sometimes|string|max:255',
        ]);

        $comment-> update($data);
        return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $comment = Comment::findOrFail($id);
      $comment->delete();

      return response()->json(['message' => 'Comment deleted successfully']);
    }
}
