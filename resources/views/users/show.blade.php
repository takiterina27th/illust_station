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
                <a href="{{ route('request_messages.index')}}">
                  <button class="btn btn-primary">リクエストを確認する</button>
                </a>
              </div>
              <div class="mt-3">
                <a href="{{ route('users.edit', [$user->id])}}">
                  <button class="btn btn-primary">ユーザー登録内容の編集する</button>
                </a>
              </div>
                <form method="POST" action="{{ route('users.destroy', [$user->id])}}" id="delete_{{ $user->id}}">
                  @csrf
                  <br>
                  <a href="#" class="btn btn-outline-danger" data-id="{{ $user->id }}" onclick="deletePost(this); ">アカウントを削除する</a>
                </form>
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