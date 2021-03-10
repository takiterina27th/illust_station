@extends('layouts.app')

@section('content')

<div class="container m-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザー登録内容</div>
        <div class="card-body">
            <div class="form-group">
                <span>名前：</span>
                <span>{{ $user->name }}</span>
            </div>
            <div class="form-group">
                <span>メールアドレス：</span>
                <span>{{ $user->email }}</span>
            </div>
              <div>
                <a href="{{ route('users.edit', [$user->id])}}">
                  <button class="btn btn-primary">ユーザー登録内容の編集する</button>
                </a>
              </div>
                <form method="" action="" id="">
                  @csrf
                  <br>
                  <a href="#" class="btn btn-danger" data-id="">アカウントを削除する</a>
                </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection