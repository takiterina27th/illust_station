<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $post_id = $request->input('post_id');
        $comment = $request->input('comment');
        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post_id,
            'comment' => $comment
        ]);
        return redirect()->route('posts.show', ['id' => $post_id ]);
    }
}
