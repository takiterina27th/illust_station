<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Request_message;

class Request_messageController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all()->pluck('name', 'id');
        $requestsFromUser = User::find(auth()->id())->requestsFromUser;
        $requestsToUser = User::find(auth()->id())->requestsToUser;
        return view('request_messages.index', compact('users', 'requestsFromUser', 'requestsToUser'));
    }

    public function store(Request $request)
    {
        $post_id = $request->post_id;

        $message = new Request_message();
        $message->title = $request->title;
        $message->body = $request->body;
        $message->to_user_id = $request->to_user_id;
        $message->from_user_id = auth()->id();
        $message->save();
        
        return redirect()->route('posts.show', ['id' => $post_id ]);
    }
}
