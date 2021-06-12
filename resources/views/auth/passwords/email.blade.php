@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 auth-form">
            <div class="auth-form__logo-box">
                <div class="auth-form__logo">
                    <img src="https://illust-station-takiterina-bucket.s3-ap-northeast-1.amazonaws.com/logo_middle_size.png" class="img-fluid" alt="ロゴ">
                </div>
                <div class="auth-form__catchphrase">好きを描く</div>
            </div>
            <div class="auth-form__title">パスワードを再設定する</div>
            <div class="auth-form__discription">登録したメールアドレスを入力してください</div>
            
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="auth-form__form-box">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                        <div class="col-md-12 auth-form__field">
                            <input id="email" type="email" class="form-control auth-form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn font-weight-bold auth-button" style="background-color: #295d72;">
                            {{ __('再設定リンクを送信する') }}
                        </button>

                        <div class="auth-form__social">
                        </div>
                        
                        <div class="auth-form__recaptcha-terms">
                            This site is protected by Akimine
                        </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
