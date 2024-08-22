@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection
@section('auth_button')
<a href="{{ route('register') }}" class="header__btn">register</a>
@endsection


@section('content')
<div class="login">
    <div class="login__inner">

        <!-- タイトル -->
        <p class="login__title">login</p>

        <!-- フォーム -->
        <div class="login__form-wrapper">
            <form method="POST" action="{{ route('login') }}" class="login__form">
                @csrf
                <div class="login__form-group">
                    <label for="email" class="login__form-label">メールアドレス</label>
                    <input id="email" type="email" class="login__form-input" name="email" placeholder="例: test@example.com">
                    @if ($errors->has('email'))
                    <div class="login__form-group--alert">
                        <ul>
                            @foreach ($errors->get('email') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="login__form-group">
                    <label for="password" class="login__form-label">パスワード</label>
                    <input id="password" type="password" class="login__form-input" name="password" placeholder="例: coachtech1106">
                    @if ($errors->has('password'))
                    <div class="login__form-group--alert">
                        <ul>
                            @foreach ($errors->get('password') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="login__form-btn">
                    <button type="submit" class="btn-submit">ログイン</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection