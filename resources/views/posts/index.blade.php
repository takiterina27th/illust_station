@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('status'))
        <div class="flash" role="alert">
            <div class="flash__message">
                <i class="far fa-check-square"></i>
                {{ session('status') }}
            </div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="tags">
                <div class="tags__overflow">
                    <div class="tags__padding">
                        <div class="tags__display">
                            @foreach($tags as $tag)
                                <div class="tags__flex">
                                    <a class="tags__link" href="{{ route('tags.show', ['id' => $tag->id]) }}">#{{ $tag->name }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">

                <div class="card-body">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                    @auth
                    <a href="{{ route('posts.create') }}">
                        <button type="button" class="btn font-weight-bold button-design">投稿する</button>
                    </a>
                    @endauth

                    <form method="GET" action="{{ route('posts.index') }}" class="d-flex">
                      <input class="form-control me-2" name="search" type="search" placeholder="検索する" aria-label="Search" value="{{request('search')}}">
                      <button class="btn btn-outline-info" type="submit" style="margin-left: 12px;">Search</button>
                    </form>
                    </div>
                    </nav>
                      
                    <table class="table">
                      
                    </table>
                    
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                      @foreach($posts as $post)
                      <div class="col mb-4">
                        <div class="card h-100">
                          <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                          @if($post->image == null)
                            <img class="card-img-top" src="/storage/no-image.png" >
                          @else
                            <img class="card-img-top" src="{{$post->image}}" >
                          @endif
                          </a>
                          <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($post->title, 20, '(…)' )}}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 60, '(…)' )}}</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">{{ $post->user->name}}</small>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  {{ $posts->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
