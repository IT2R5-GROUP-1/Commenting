<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    // Add comment to a post
    public function addComment($postId, Request $request)
    {
        $post = Post::findOrFail($postId);

        // Manual validation using Validator
        $validator = Validator::make($request->all(), [
            'text' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $comment = new Comment();
        $comment->username = 'User_' . substr(md5(rand()), 0, 9); // Example username
        $comment->text = $request->text;
        $comment->post_id = $post->id;
        $comments = $post->comments;

        $comment->save();

        return response()->json($comment, 201);
    }

    // Reply to a comment
    public function replyToComment($commentId, Request $request)
    {
        $comment = Comment::findOrFail($commentId);

        // Manual validation using Validator
        $validator = Validator::make($request->all(), [
            'text' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $reply = new Comment();
        $reply->username = 'User_' . substr(md5(rand()), 0, 9); // Example username
        $reply->text = $request->text;
        $reply->post_id = $comment->post_id;
        $reply->parent_id = $comment->id;

        $reply->save();

        return response()->json($reply, 201);
    }

    // Get all comments for a post
public function getComments($postId)
{
    $post = Post::findOrFail($postId);
    $comments = Comment::where('post_id', $post->id)->get();

    return response()->json($comments);
}

// Get replies for a comment
public function getReplies($commentId)
{
    $replies = \App\Comment::where('parent_id', $commentId)->get();

    return response()->json($replies);
}



}
