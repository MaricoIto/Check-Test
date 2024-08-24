@extends('layouts.app')

@section('content')
<div class="contact-confirm">
    <h1>確認画面</h1>

    <!-- 確認内容表示 -->
    <table>
        <tr>
            <th>お名前</th>
            <td>{{ $data['first_name'] }} {{ $data['last_name'] }}</td>
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
            <td>{{ $data['phone1'] }}-{{ $data['phone2'] }}-{{ $data['phone3'] }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $data['address'] }}</td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>{{ $data['building'] }}</td>
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
    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <button type="submit">送信</button>
    </form>

    <form method="GET" action="{{ route('contact') }}">
        <button type="submit">修正</button>
    </form>
</div>
@endsection