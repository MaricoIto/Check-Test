@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
@endsection

@section('content')
<div class="contact">

    <!-- タイトル -->
    <p class="contact__title">Contact</p>

    <!-- 入力フォーム -->
    <form class="contact__form" method="POST" action="{{ route('contact.confirm') }}">
        @csrf
        <table class="contact__form-table">

            <tr>
                <th>
                    お名前
                    <span class="required-mark">※</span>
                </th>
                <td class="name-wrapper">
                    <div class="contact__form-item-wrapper">
                        <input type="text" name="last_name" class="contact__form-item name" placeholder="例: 山田" value="{{ old('last_name', $data['last_name'] ?? '') }}">
                        @if($errors->has('first_name'))
                        <div class="contact__form-group--alert">
                            <ul>
                                @foreach ($errors->get('first_name') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="contact__form-item-wrapper">
                        <input type="text" name="first_name" class="contact__form-item name" placeholder="例: 太郎" value="{{ old('first_name', $data['first_name'] ?? '') }}">
                        @if($errors->has('last_name'))
                        <div class="contact__form-group--alert">
                            <ul>
                                @foreach ($errors->get('last_name') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </td>
            </tr>

            <tr>
                <th>
                    性別
                    <span class="required-mark">※</span>
                </th>
                <td>
                    <label class="custom-radio">
                        <input type="radio" name="gender" value="1" {{ old('gender', $data['gender'] ?? '1') == '1' ? 'checked' : '' }}>
                        <span>男性</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="gender" value="2" {{ old('gender', $data['gender'] ?? '') == '2' ? 'checked' : '' }}>
                        <span>女性</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="gender" value="3" {{ old('gender', $data['gender'] ?? '') == '3' ? 'checked' : '' }}>
                        <span>その他</span>
                    </label>
                    @if($errors->has('gender'))
                    <div class="contact__form-group--alert">
                        <ul>
                            @foreach ($errors->get('gender') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </td>
            </tr>



            <tr>
                <th>
                    メールアドレス
                    <span class="required-mark">※</span>
                </th>
                <td>
                    <div class="contact__form-item-wrapper">
                        <input type="email" name="email" class="contact__form-item mail" placeholder="例: test@example.com" value="{{ old('email', $data['email'] ?? '') }}">
                        @if($errors->has('email'))
                        <div class="contact__form-group--alert">
                            <ul>
                                @foreach ($errors->get('email') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </td>
            </tr>

            <tr>
                <th>
                    電話番号
                    <span class="required-mark">※</span>
                </th>
                <td class="phone-wrapper">
                    <div class="contact__form-item-wrapper">
                        <input type="text" name="phone1" class="contact__form-item phone" maxlength="5" pattern="\d{1,5}" placeholder="080" value="{{ old('phone1', $data['phone1'] ?? '') }}">
                        @if($errors->has('phone1'))
                        <div class="contact__form-group--alert">
                            <ul>
                                @foreach ($errors->get('phone1') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="phone-separator-wrapper">
                        <span class="phone-separator">-</span>
                    </div>
                    <div class="contact__form-item-wrapper">
                        <input type="text" name="phone2" class="contact__form-item phone" maxlength="5" pattern="\d{1,5}" placeholder="1234" value="{{ old('phone2', $data['phone2'] ?? '') }}">
                        @if($errors->has('phone2'))
                        <div class="contact__form-group--alert">
                            <ul>
                                @foreach ($errors->get('phone2') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="phone-separator-wrapper">
                        <span class="phone-separator">-</span>
                    </div>
                    <div class="contact__form-item-wrapper">
                        <input type="text" name="phone3" class="contact__form-item phone" maxlength="5" pattern="\d{1,5}" placeholder="5678" value="{{ old('phone3', $data['phone3'] ?? '') }}">
                        @if($errors->has('phone3'))
                        <div class="contact__form-group--alert">
                            <ul>
                                @foreach ($errors->get('phone3') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </td>
            </tr>

            <tr>
                <th>
                    住所
                    <span class="required-mark">※</span>
                </th>
                <td>
                    <div class="contact__form-item-wrapper">
                        <input type="text" name="address" class="contact__form-item address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $data['address'] ?? '') }}">
                        @if($errors->has('address'))
                        <div class="contact__form-group--alert">
                            <ul>
                                @foreach ($errors->get('address') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </td>
            </tr>

            <tr>
                <th>
                    建物名
                </th>
                <td>
                    <div class="contact__form-item-wrapper">
                        <input type="text" name="building" class="contact__form-item address" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building', $data['building'] ?? '') }}">
                    </div>
                </td>
            </tr>

            <tr>
                <th>
                    お問い合わせの種類
                    <span class="required-mark">※</span>
                </th>
                <td>
                    <div class="contact__form-item-wrapper">
                        <select name="inquiry_type" class="contact__form-item category">
                            <option value="">選択してください</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->content }}" {{ old('inquiry_type', $data['inquiry_type'] ?? '') == $category->content ? 'selected' : '' }}>
                                {{ $category->content }}
                            </option>
                            @endforeach
                        </select>
                        @if($errors->has('inquiry_type'))
                        <div class="contact__form-group--alert">
                            <ul>
                                @foreach ($errors->get('inquiry_type') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                </td>
            </tr>

            <tr>
                <th>
                    お問い合わせの内容
                    <span class="required-mark">※</span>
                </th>
                <td>
                    <div class="contact__form-item-wrapper">
                        <textarea name="inquiry_content" class="contact__form-item content" placeholder="お問い合わせ内容をご記載ください">{{ old('inquiry_content', $data['inquiry_content'] ?? '') }}</textarea>
                        @if($errors->has('inquiry_content'))
                        <div class="contact__form-group--alert">
                            <ul>
                                @foreach ($errors->get('inquiry_content') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </td>
            </tr>
        </table>

        <button type="submit" class="contact__submit-btn">確認画面</button>
    </form>

</div>
@endsection