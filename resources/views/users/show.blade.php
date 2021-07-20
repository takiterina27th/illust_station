@extends('layouts.app')

@section('content')

<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8 profile">
            <div class="profile__header">
                <div class="profile__left">
                    <div class="profile__image">
                        <img src="https://illust-station-takiterina-bucket.s3-ap-northeast-1.amazonaws.com/3h0TDmfZqpp7d2D1nM2dhc5Lus4QSnodVCMVn3r5.png" width="100" height="100" class="img-fluid" alt="ロゴ">
                    </div>
                </div>
                <div class="profile__right">
                    <div class="profile__username">
                        {{ $user->name }}
                    </div>
                    <div class="profile__edit">
                        <a href="{{ route('users.edit', [$user->id])}}" class="profile__edit-a-tag">
                            プロフィールを編集
                        </a>
                    </div>
                </div>
            </div>
            <div class="profile__main">
                <div class="profile__request"></div>
            </div>
        </div>
    </div>
</div>

<div class="container m-5">
  <div class="row justify-content-center">
    <div class="col-md-8 profile">
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