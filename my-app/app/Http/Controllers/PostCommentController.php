<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post){
        request()->validate([
            'body'=>'required'
        ]);

        $post->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
        return back()->with('success','Comment Added');
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return back()->with('success','Comment Deleted');
    }
}
