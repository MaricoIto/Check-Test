@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
@endsection

@section('content')
<div class="contact">

    <!-- タイトル -->
    <p class="contact__title">お問い合わせフォーム</p>

    <!-- 入力フォーム -->
    <form class="contact__form" method="POST" action="{{ route('contact.confirm') }}">
        @csrf
        <table>

            <tr>
                <th>
                    お名前
                    <span class="required-mark">※</span>
                    @if($errors->has('first_name') || $errors->has('last_name'))
                    <span class="error-message">
                        {{ $errors->first('first_name') ?: $errors->first('last_name') }}
                    </span>
                    @endif
                </th>
                <td>
                    <input type="text" name="first_name" class="contact__form" placeholder="例: 山田" value="{{ old('first_name') }}">
                    <input type="text" name="last_name" class="contact__form" placeholder="例: 太郎" value="{{ old('last_name') }}">
                </td>
            </tr>

            <tr>
                <th>
                    性別
                    <span class="required-mark">※</span>
                    @if($errors->has('gender'))
                    <span class="error-message">{{ $errors->first('gender') }}</span>
                    @endif
                </th>
                <td>
                    <label><input type="radio" name="gender" value="男性" {{ old('gender') == '男性' ? 'checked' : '' }}> 男性</label>
                    <label><input type="radio" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }}> 女性</label>
                    <label><input type="radio" name="gender" value="その他" {{ old('gender') == 'その他' ? 'checked' : '' }}> その他</label>
                </td>
            </tr>

            <tr>
                <th>
                    メールアドレス
                    <span class="required-mark">※</span>
                    @if($errors->has('email'))
                    <span class="error-message">{{ $errors->first('email') }}</span>
                    @endif
                </th>
                <td>
                    <input type="email" name="email" class="contact__form" placeholder="例: test@example.com" value="{{ old('email') }}">
                </td>
            </tr>

            <tr>
                <th>
                    電話番号
                    <span class="required-mark">※</span>
                    @if($errors->has('phone1') || $errors->has('phone2') || $errors->has('phone3'))
                    <span class="error-message">
                        {{ $errors->first('phone1') ?: $errors->first('phone2') ?: $errors->first('phone3') }}
                    </span>
                    @endif
                </th>
                <td>
                    <input type="text" name="phone1" class="contact__form" maxlength="3" pattern="\d{3}" placeholder="例: 090" value="{{ old('phone1') }}">
                    -
                    <input type="text" name="phone2" class="contact__form" maxlength="4" pattern="\d{4}" placeholder="例: 1234" value="{{ old('phone2') }}">
                    -
                    <input type="text" name="phone3" class="contact__form" maxlength="4" pattern="\d{4}" placeholder="例: 5678" value="{{ old('phone3') }}">
                </td>
            </tr>

            <tr>
                <th>
                    住所
                    <span class="required-mark">※</span>
                    @if($errors->has('address'))
                    <span class="error-message">{{ $errors->first('address') }}</span>
                    @endif
                </th>
                <td>
                    <input type="text" name="address" class="contact__form" placeholder="例: 東京都渋谷区" value="{{ old('address') }}">
                </td>
            </tr>

            <tr>
                <th>
                    建物名
                </th>
                <td>
                    <input type="text" name="building" class="contact__form" placeholder="例: 渋谷マンション303号室" value="{{ old('building') }}">
                </td>
            </tr>

            <tr>
                <th>
                    お問い合わせの種類
                    <span class="required-mark">※</span>
                    @if($errors->has('inquiry_type'))
                    <span class="error-message">{{ $errors->first('inquiry_type') }}</span>
                    @endif
                </th>
                <td>
                    <select name="inquiry_type" class="contact__form">
                        <option value="">選択してください</option>
                        <option value="製品に関する問い合わせ" {{ old('inquiry_type') == '製品に関する問い合わせ' ? 'selected' : '' }}>製品に関する問い合わせ</option>
                        <option value="サポートに関する問い合わせ" {{ old('inquiry_type') == 'サポートに関する問い合わせ' ? 'selected' : '' }}>サポートに関する問い合わせ</option>
                        <option value="その他" {{ old('inquiry_type') == 'その他' ? 'selected' : '' }}>その他</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>
                    お問い合わせの内容
                    <span class="required-mark">※</span>
                    @if($errors->has('inquiry_content'))
                    <span class="error-message">{{ $errors->first('inquiry_content') }}</span>
                    @endif
                </th>
                <td>
                    <textarea name="inquiry_content" class="contact__form" placeholder="お問い合わせ内容を入力してください">{{ old('inquiry_content') }}</textarea>
                </td>
            </tr>
        </table>

        <button type="submit" class="contact__submit-btn">確認画面</button>

    </form>
</div>
@endsection