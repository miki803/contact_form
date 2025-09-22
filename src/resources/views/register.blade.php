<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />

</head>

<body>
    <header class="header">
        <div class="header_inner">
            <a class="header_logo" href="/">
                FashionablyLate
            </a>
        </div>
        <div class="header_login">
            <a class="header_login-submit" href="{{ route('login') }}" >
                login
            </a>
        </div>
    </header>

    <main>
        <section class="Register-form">
            <div class="Register-form_heading">
                <h2>Register</h2>
            </div>

            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form_group">
                    <label class="group-title">お名前</label>
                    <div class="form_group-content">
                        <input type="text" name="name" placeholder="テスト太郎" />
                        @error('name')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form_group">
                    <div class="form_group-title">
                        <span class="group-title">メールアドレス</span>
                    </div>
                    <div class="form_group-content">
                        <div class="form_input-text">
                            <input type="email" name="email" placeholder="test@example.com" />
                        </div>
                        @error('email')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form_group">
                    <div class="form_group-title">
                        <span class="group-title">パスワード</span>
                    </div>
                    <div class="form_group-content">
                        <div class="form_input-text">
                            <input type="password" name="password" placeholder="パスワード" />
                        </div>
                        @error('password')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form_button">
                    <button class="form_button-submit" type="submit">
                        登録
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>