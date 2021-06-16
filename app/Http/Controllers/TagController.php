<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show($id) {

        $tag = Tag::find($id);
        return view('tags.show', compact('tag'));
    }
}
