<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Post::query();

        if($search !== null){
            $search_split = mb_convert_kana($search,'s');
            $search_split2 = preg_split('/[\s]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);
            foreach($search_split2 as $value){
                $query->where('title','like','%'.$value.'%');
            }
        }

        $query->select('id', 'title', 'content', 'image', 'user_id', 'created_at');
        $query->orderBy('created_at', 'desc')->get();
        $posts = $query->paginate(12);

        $user = Auth::user();

        return view('posts.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $post = new Post;

        $uploadImg = $request->file('image');
        if ($uploadImg->isValid()) {
        $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
        $post->image = Storage::disk('s3')->url($path);
        } else {
            $post->image = "";
        }

       preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ一-龠]+)/u', $request->tags, $match);

       $tags = [];
       foreach($match[1] as $tag) {
           $record = Tag::firstOrCreate(['name' => $tag]);
           array_push($tags, $record);
       }

       $tags_id = [];
       foreach($tags as $tag) {
           array_push($tags_id, $tag->id);
       }
        
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::user()->id;

        $post->save();

        $post->tag()->attach($tags_id);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = $post->tag;
        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = Post::find($id);

        $uploadImg = $request->file('image');
        if ($uploadImg->isValid()) {
        $path = Storage::disk('s3')->putFile('/', $uploadImg, 'public');
        $post->image = Storage::disk('s3')->url($path);
        } else {
            $post->image = "";
        }

        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ一-龠]+)/u', $request->tags, $match);

        $before = [];
        foreach($post->tag as $tag){
            array_push($before, $tag->name);
        }
        $after = [];
        foreach($match[1] as $tag){
            // 普通に新しいのが来たら新規作成する動き
            $record = Tag::firstOrCreate(['name' => $tag]);
            array_push($after, $record);
        }

        $tags_id = [];
        foreach($after as $tag) {
            array_push($tags_id, $tag->id);
        }
        $post->tag()->sync($tags_id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/');
    }
}
