<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //　[reviewId].jsx の const handleCommentAddから受け取る
         $validatedData = $request->validate([
            "content" => 'required|string|max:200',
            "review_id" => 'required|integer|exists:reviews,id',

         ]);

         $comment = Comment::create([
            "content" => $validatedData["content"],
            "review_id" => $validatedData["review_id"],
            "user_id" => Auth::id(),
         ]);

         $comment->load('user');

         return response()->json($comment);

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
