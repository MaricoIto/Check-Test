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
    <form method="GET" action="{{ route('admin') }}" class="admin__search-form">
        <input type="text" name="keyword" class="admin__search-form--input" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
        <select name="gender" class="admin__search-form--select">
            <option value="">性別</option>
            <option value="全部" {{ request('gender') == '全部' ? 'selected' : '' }}>全部</option>
            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
        </select>
        <select name="category_id" class="admin__search-form--select">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
            @endforeach
        </select>
        <input type="date" name="date" class="admin__search-form--date" value="{{ request('date') }}"></input>
        <button type="submit" class="admin__search-form--btn-submit">検索</button>
        <button type="button" class="admin__search-form--btn-reset" onclick="window.location.href='{{ route('admin') }}'">リセット</button>

    </form>

    <!-- 出力ボタンとページネーション -->
    <div class="admin__menu">
        <button type="button" class="admin__btn-export" onclick="window.location.href='{{ route('admin.export', request()->query()) }}'">エクスポート</button>
        {{ $contacts->links() }}
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
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>
                @if ($contact->gender == 1)
                男性
                @elseif ($contact->gender == 2)
                女性
                @else
                その他
                @endif
            </td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category ? $contact->category->content : '未設定' }}</td>
            <td>
                <button class="admin__table--btn" wire:click="$emit('showContactDetail', {{ $contact->id }})">詳細</button>
            </td>
        </tr>
        @endforeach
    </table>

    @livewire('contact-detail-modal')

</div>
@endsection