<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}" />

</head>


<body>
    <header class="header">
        <div class="header_inner">
            <a class="header_logo" href="/">FashionablyLate</a>
        </div>
    </header>

    <main>
        <div class="contact-form">
            <div class="contact-form_heading">
                <h2>Contact</h2>
            </div>
            <form class="form" action="{{ route('contact.confirm') }}" method="post">
                @csrf

                <div class="form_group">
                    <label class="form_group-title">お名前 <span class="required">※</span>
                    </label>
                    <div class="form_group-content">
                        <input type="text" name="first_name" placeholder="例: 山田 " value="{{ old('first_name') }}" required>
                        <input type="text" name="last_name" placeholder="例: 太郎" value="{{ old('last_name') }}" required>

                        @error('first_name')
                        <div class="form_error">{{$message}}</div>
                        @enderror

                        @error('last_name')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form_group">
                    <label class="form_group-title">性別 <span class="required">※</span>
                    </label>
                    <div class="form_group-content">
                        <label>
                            <input type="radio" name="gender" value="男性" {{ old('gender')=='男性' ? 'checked' : '' }} required> 男性
                        </label>
                        <label>
                            <input type="radio" name="gender" value="女性" {{ old('gender')=='女性' ? 'checked' : '' }}> 女性
                        </label>
                        <label>
                            <input type="radio" name="gender" value="その他" {{ old('gender')=='その他' ? 'checked' : '' }}> その他
                        </label>
                        @error('gender')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form_group">
                    <label class="form_group-title">メールアドレス <span class="required">※</span>
                    </label>
                    <div class="form_group-content">
                        <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form_group">
                    <label class="form_group-title">電話番号 <span class="required">※</span>
                    </label>
                    <div class="form_group-content">
                        <input type="tel" name="tel1" placeholder="080" value="{{ old('tel1') }}" required> -
                        <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}" required> -
                        <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}" required>
                        @error('tel1')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                        @error('tel2')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                        @error('tel3')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form_group">
                    <label class="form_group-title">住所 <span class="required">※</span>
                    </label>
                    <div class="form_group-content">
                        <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" required>
                        @error('address')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form_group">
                    <label class="form_group-title">建物名</label>
                    <div class="form_group-content">
                        <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
                    </div>
                </div>

                <div class="form_group">
                    <label class="form_group-title">お問い合わせの種類<span class="required">※</span>
                    </label>
                    <div class="form_group-content">
                        <select name="category" required>
                            <option value="">選択してください</option>
                            <option value="商品について" {{ old('category')=='商品について' ? 'selected' : '' }}>商品について</option>
                            <option value="商品の交換について" {{ old('category')=='商品の交換について' ? 'selected' : '' }}>商品の交換について</option>
                            <option value="その他" {{ old('category')=='その他' ? 'selected' : '' }}>その他</option>
                        </select>
                        @error('category')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form_group">
                    <label class="form_group-title">お問い合わせ内容<span class="required">※</span>
                    </label>
                    <div class="form_group-content">
                        <textarea name="message" rows="5" placeholder="お問い合わせ内容をご記入ください"  required>{{ old('message') }}</textarea>
                        @error('message')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form_button">
                    <button class="form_button-submit" type="submit">
                        確認画面
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>