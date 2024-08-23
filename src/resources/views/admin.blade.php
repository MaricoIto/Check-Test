@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection
@section('auth_button')
<a href="{{ route('admin') }}" class="header__btn">logout</a>
@endsection

<div class="admin">
    <div class="admin__inner">

        <!-- タイトル -->
        <p class="admin__title">Admin</p>

        <!-- 検索フォーム -->
        <div class="admin__content">
            <form class="admin__search-form">
                <div class="admin__search-form--item">
                    <input type="text" class="admin__search-form-input" placeholder="名前やメールアドレスを入力してください">
                    <select class="admin__search-form--item-select">
                        <option value="">性別</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <select class="admin__search-form--item-select">
                        <option value="">お問い合わせの種類</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <select class="admin__search-form--item-select">
                        <option value="">年/月/日</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->created_at }}</option>
                        @endforeach
                    </select>
                    <div class="admin__search-form--item-btn">
                        <button type="submit" class="btn-submit">検索</button>
                    </div>
                    <div class="admin__search-form--item-btn">
                        <button type="submit" class="btn-reset">リセット</button>
                    </div>
                </div>
            </form>

            <!-- 出力ボタンとページネーション -->
            <div class="admin__menu">
                <div class="admin__menu--btn-export">
                    <button type="submit" class="btn-export">エクスポート</button>
                </div>
                <div class="admin__menu--pagenation">
                    <p>ページネーションの表示</p>
                </div>
            </div>

            <div class="admin__table">
                <table>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>山田　太郎</td>
                        <td>男性</td>
                        <td>test@example.com</td>
                        <td>商品の交換について</td>
                        <td><button class="admin__table-btn">詳細</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection