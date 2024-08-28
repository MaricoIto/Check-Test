@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/common.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('auth_button')
<a href="{{ route('logout') }}"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
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
        <nav class="admin__pagination">
            {{ $contacts->links('vendor.pagination.bootstrap-4') }}
        </nav>
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
                <button type="button" class="admin__table--detail" data-bs-toggle="modal" data-bs-target="#contactModal{{ $contact->id }}">詳細</button>

                <!-- モーダルのHTML -->
                <div class="modal fade" id="contactModal{{ $contact->id }}" tabindex="-1" aria-labelledby="contactModalLabel{{ $contact->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-table">
                                <table>
                                    <tr>
                                        <th>お名前</th>
                                        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>性別</th>
                                        <td>
                                            @if ($contact->gender == 1)
                                            男性
                                            @elseif ($contact->gender == 2)
                                            女性
                                            @else
                                            その他
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>メールアドレス</th>
                                        <td>{{ $contact->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>電話番号</th>
                                        <td>{{ $contact->tell }}</td>
                                    </tr>
                                    <tr>
                                        <th>住所</th>
                                        <td>{{ $contact->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>建物名</th>
                                        <td>{{ $contact->building_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>お問い合わせの種類</th>
                                        <td>{{ $contact->category ? $contact->category->content : '未設定' }}</td>
                                    </tr>
                                    <tr>
                                        <th>お問合せ内容</th>
                                        <td>{{ $contact->detail }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-delete-container">
                                <form action=" {{ route('admin.destroy', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">削除</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- モーダルのHTMLここまで -->

            </td>
        </tr>
        @endforeach

    </table>

</div>
@endsection