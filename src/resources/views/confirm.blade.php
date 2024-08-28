@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm">

    <p class="confirm__title">Confirm</p>

    <!-- 確認内容表示 -->
    <table class="confirm__table">
        <tr>
            <th>お名前</th>
            <td><span class="last-name">{{ $data['last_name'] }}</span><span class="first-name">{{ $data['first_name'] }}</span></td>

        </tr>
        <tr>
            <th>性別</th>
            <td>{{ $data['gender'] == 1 ? '男性' : ($data['gender'] == 2 ? '女性' : 'その他') }}</td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $data['email'] }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $data['phone1'] }}{{ $data['phone2'] }}{{ $data['phone3'] }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $data['address'] }}</td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>{!! $data['building'] !!}</td>
        </tr>

        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $data['inquiry_type'] }}</td>
        </tr>
        <tr>
            <th>お問い合わせの内容</th>
            <td>{{ $data['inquiry_content'] }}</td>
        </tr>
    </table>

    <!-- 修正と送信ボタン -->
    <div class="confirm__btn">
        <form method="POST" action="{{ route('contact.submit') }}">
            @csrf
            <button type="submit" class="confirm__btn--submit">送信</button>
        </form>
        <a href="{{ route('index') }}" class="confirm__btn--back">修正</a>
    </div>
</div>
@endsection