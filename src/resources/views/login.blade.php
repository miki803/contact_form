<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header_inner">
            <a class="header_logo" href="/">FashionablyLate</a>
        </div>
        <div class="header_login">
            <a class="header_register-submit" href="{{ route('register') }}" >
                register
            </a>
        </div>
    </header>

    <main>
        <div class="login-form">
            <div class="login-form_heading">
                <h2>Login</h2>
            </div>

            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form_group">
                    <div class="form_group-title">
                        <span class="form_group-title">メールアドレス</span>
                    </div>
                    <div class="form_group-content">
                        <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
                        @error('email')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form_group">
                    <div class="form_group-title">
                        <span class="form_group-title">パスワード</span>
                    </div>
                    <div class="form_group-content">
                        <input type="password" name="password" placeholder="パスワード" />
                        @error('password')
                        <div class="form_error">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form_button">
                    <button class="form_button-submit" type="submit">
                        ログイン
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>