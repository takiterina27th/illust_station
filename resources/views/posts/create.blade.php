@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">描いたイラストを投稿しよう！</div>

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
               
                    {{-- enctype="multipart/form-data"はファイルをアップロードする際に必ず必要 --}}
                    <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                    @csrf
                      <label for="title">タイトル</label>
                      <br>
                      <input type="text" name="title" id="title">
                      <br>
                      <label class="mt-2" for="tags">タグ</label>
                      <br>
                      <input type="text" name="tags" id="tags" value="#">
                      <br>
                      <label class="mt-2" for="content">内容</label>
                      <br>
                      <textarea name="content" id="content" cols="50" rows="5"></textarea>
                      <br>
                      <div class="form-design">
                          <label for="form-image" class="form-design__label">ファイルを選択</label>
                          <input type="file" name="image" id="form-image">
                          <span class="select-image">選択されていません</span>
                      </div>
                      <input class="btn font-weight-bold mt-2 button-design" type="submit" value="投稿する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
