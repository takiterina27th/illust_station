@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 login-form">
            <div class="login-form__logo-box">
                <div class="login-form__logo">
                    <img src="https://illust-station-takiterina-bucket.s3-ap-northeast-1.amazonaws.com/logo_middle_size.png" class="img-fluid" alt="ロゴ">
                </div>
                <div class="login-form__catchphrase">好きを描く</div>
            </div>
            <div class="login-form__form-box">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="col-md-12 login-form__field">
                            <input id="email" type="email" class="form-control login-form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 login-form__field">
                            <input id="password" type="password" class="form-control login-form__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="パスワード">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn font-weight-bold auth-button" style="background-color: #295d72;">
                            {{ __('ログイン') }}
                        </button>

                        @if (Route::has('password.request'))
                            <div class="login-form__reset-box">
                                <a class="btn btn-link login-form__reset-link" style="color: #295d72;" href="{{ route('password.request') }}">
                                    {{ __('パスワードがわからない') }}
                                </a>
                            </div>
                        @endif
                        <div class="login-form__social">
                            <a href="/login/twitter" class="login-form__social-link">
                                <button type="button" class="btn font-weight-bold auth-button"style="background-color: #0096fa;">Twiiterで続ける</button>
                            </a>
                        </div>
                        <div class="login-form__recaptcha-terms">
                            This site is protected by Akimine
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
