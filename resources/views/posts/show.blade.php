@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="flash" role="alert">
                    <div class="flash__message">
                        <i class="far fa-check-square"></i>
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="card">

                <div class="card-body">

                    <div class="alert alert-info font-weight-bold" role="alert">
                      <span>タイトル：</span>
                      {{ $post->title}}
                    </div>
                    <div class="mb-3">
                      @if($post->image == null)
                        <img src="/storage/no-image.png" class="img-responsive d-block mx-auto" style="max-width: 100%; height: auto; width /***/:auto;">
                      @else
                        <img src="{{$post->image}}" class="img-responsive d-block mx-auto" style="max-width: 100%; height: auto; width /***/:auto;">
                      @endif
                    </div>
                    
                    <div class="border-bottom pb-2">
                    <span class="ml-3" >{{ $post->user->name}}：：</span>{{ $post->content}}</div>

                    <div class="border-bottom pt-2 pb-2">
                    <span class="ml-3">投稿日：：</span>{{ $post->created_at}}
                    </div>

                    <div class="mt-2">
                        @foreach($post->tag as $post_tag)
                            <a href="{{ route('tags.show', ['id' => $post_tag->id]) }}">
                            <span class="ml-3">#{{$post_tag->name}}</span>
                            </a>
                        @endforeach
                    </div>

                    {{-- 現在ログインしているユーザーの投稿であれば表示する --}}

                    @auth
                        @if(($post->user_id) === (Auth::user()->id ))
                            <div class="d-flex mt-3">
                                <a href="{{ route('posts.edit', ['id' => $post->id])}}">
                                    <input class="btn btn-primary" type="submit" value="変更する">
                                </a>
                                <div class="ml-3">
                                    <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id])}}" id="delete_{{ $post->id}}">
                                        @csrf
                                        <a href="#" class="btn btn-outline-danger" data-id="{{ $post->id }}" onclick="deletePost(this); ">削除する</a>
                                    </form>
                                </div>
                            </div>
                        @endif
                        <div class="comment justify-content-center mt-3">
                            <div class="comment__area">
                                <div class="font-weight-bold text-center">
                                    この投稿へのコメント
                                </div>
                                @foreach ($post->comment as $comment)
                                    @include('comments.comment')
                                @endforeach
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{route('comments.store')}}">
                                @csrf
                                <input type="hidden" name="post_id"  value="{{ $post->id }}">
                                <div class="comment__submit-area mt-3">
                                    <textarea id="comment" name="comment" class="form-control comment__textarea" placeholder="コメントする" aria-label="With textarea"></textarea>
                                    <button type="input-group-prepend button submit" class="btn btn-outline-primary comment__button">コメントする</button>
                                </div>
                            </form>
                        </div>
                        @if(($post->user_id) !== (Auth::user()->id ))
                        <div class="request-button">
                            <button type="button" class="btn font-weight-bold button-design">作者にリクエストする</button>
                        </div>
                        <div class="request justify-content-center mt-3" id="request">
                            <div class="request__area">
                                <div class="font-weight-bold text-center">
                                    {{ $post->user->name}}さんへのリクエスト
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{route('request_messages.store')}}">
                                @csrf
                                <input type="hidden" name="from_user_id"  value="{{ Auth::user()->id }}">
                                <input type="hidden" name="to_user_id"  value="{{ $post->user->id}}">
                                <input type="hidden" name="post_id"  value="{{ $post->id }}">
                                <div class="request__submit-area mt-3">
                                    <input type="text" name="title" class="form-control" placeholder="タイトルを入力">
                                    <textarea name="body" class="form-control request__textarea mt-2" placeholder="描いてほしいテーマやキャラクターの特徴を伝えましょう。" aria-label="With textarea"></textarea>
                                    <button type="input-group-prepend button submit" class="btn btn-outline-primary request__button">リクエストを送る</button>
                                </div>
                            </form>
                        </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function deletePost(e) {
  'use strict';
  if (confirm('本当に削除してもいいですか？')) {
    document.getElementById('delete_' + e.dataset.id). submit();
  }
}
</script>

@endsection
