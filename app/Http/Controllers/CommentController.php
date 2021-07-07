<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentStore;

class CommentController extends Controller
{
    public function store(CommentStore $request)
    {
        $user = Auth::user();
        $post_id = $request->input('post_id');
        $comment = $request->input('comment');
        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post_id,
            'comment' => $comment
        ]);
        session()->flash('status', 'コメントしました');
        return redirect()->route('posts.show', ['id' => $post_id ]);
    }
}
