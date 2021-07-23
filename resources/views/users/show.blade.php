@extends('layouts.app')

@section('content')

<div class="container mt-5">
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
                <div class="profile__links">
                    <div class="profile__request profile__link">
                        <a href="{{ route('request_messages.index')}}" class="profile__a-tag">リクエスト</a>
                    </div>
                    <div class="profile__request profile__link">
                        <a href="#" class="profile__a-tag">作品一覧</a>
                    </div>
                    <form method="POST" action="{{ route('users.destroy', [$user->id])}}" id="delete_{{ $user->id}}"class="profile__form">
                        @csrf
                        <div class="profile__link">
                            <a href="#" class="profile__a-tag profile__delete" data-id="{{ $user->id }}" onclick="deletePost(this); ">アカウントを削除する</a>
                        </div>
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