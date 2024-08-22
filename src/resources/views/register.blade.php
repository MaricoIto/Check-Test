@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection
@section('auth_button')
<a href="{{ route('login') }}" class="header__btn">login</a>
@endsection


@section('content')
<div class="register">
    <div class="register__inner">

        <!-- タイトル -->
        <p class="register__title">Register</p>

        <!-- フォーム -->
        <div class="register__form-wrapper">
            <form method="POST" action="{{ route('register') }}" class="register__form">
                @csrf
                <div class="register__form-group">
                    <label for="name" class="register__form-label">お名前 </label>
                    <input id="name" type="text" class="register__form-input" name="name" placeholder="例: 山田　太郎">
                    @if ($errors->has('name'))
                    <div class="register__form-group--alert">
                        <ul>
                            @foreach ($errors->get('name') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="register__form-group">
                    <label for="email" class="register__form-label">メールアドレス</label>
                    <input id="email" type="email" class="register__form-input" name="email" placeholder="例: test@example.com">
                    @if ($errors->has('email'))
                    <div class="register__form-group--alert">
                        <ul>
                            @foreach ($errors->get('email') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="register__form-group">
                    <label for="password" class="register__form-label">パスワード</label>
                    <input id="password" type="password" class="register__form-input" name="password" placeholder="例: coachtech1106">
                    @if ($errors->has('password'))
                    <div class="register__form-group--alert">
                        <ul>
                            @foreach ($errors->get('password') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="register__form-btn">
                    <button type="submit" class="btn-submit">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection