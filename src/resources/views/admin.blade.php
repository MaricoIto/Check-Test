@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection
@section('auth_button')
<a href="{{ route('admin') }}" class="header__btn">logout</a>
@endsection

@section('content')
<div class="admin">

    <!-- タイトル -->
    <p class="admin__title">Admin</p>

    <!-- 検索フォーム -->
    <form class="admin__search-form">
        <input type="text" class="admin__search-form--input" placeholder="名前やメールアドレスを入力してください">
        <select class="admin__search-form--select">
            <option value="">性別</option>
            <option value="男性">男性</option>
            <option value="女性">女性</option>
            <option value="その他">その他</option>
        </select>
        <select class="admin__search-form--select">
            <option value="">お問い合わせの種類</option>
            <option value="商品の交換について">商品の交換について</option>
        </select>
        <input type="date" class="admin__search-form--date"></input>
        <button type="submit" class="admin__search-form--btn-submit">検索</button>
        <button type="submit" class="admin__search-form--btn-reset">リセット</button>
    </form>

    <!-- 出力ボタンとページネーション -->
    <div class="admin__menu">
        <button type="submit" class="admin__btn-export">エクスポート</button>
        <p>ページネーションの表示</p>
    </div>

    <!-- テーブル -->
    <table class="admin__table">
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->gender }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->type }}</td>
            <td>
                <button class="admin__table--btn" wire:click="$emit('showContactDetail', {{ $contact->id }})">詳細</button>
            </td>
        </tr>
        @endforeach
    </table>

    @livewire('contact-detail-modal')
</div>

@endsection