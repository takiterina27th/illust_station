@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">情報を編集しよう！</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('posts.update', ['id' => $post->id ])}}">
                    @csrf

                    <label for="title">タイトル</label>
                    <br>
                    <input type="text" name="title" id="title" value="{{$post->title}}">
                    <br>
                    <label for="content">内容</label>
                    <br>
                    <textarea name="content" id="content" cols="50" rows="5">{{$post->content}}</textarea>
                    <br>
                    <input class="btn btn-info" type="submit" value="登録する">
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
