<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header_inner">
            <a class="header_logo" href="/">FashionablyLate</a>
        </div>
        <div class="header_logout">
            <form action="{{ route('logout') }}" method="POST">
            @csrf
                <button class="header_logout-submit" type="submit">
                    logout
                </button>
            </form>
        </div>
    </header>

    <main>
        <div class="admin-form">
            <div class="admin-form_heading">
                <h2>Admin</h2>
            </div>

            <form method="GET" action="{{ route('admin.') }}" class="search-bar">
                <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">

                <select name="gender">
                    <option value="">性別</option>
                    <option value="男性" @if(request('gender')=='男性') selected @endif>男性</option>
                    <option value="女性" @if(request('gender')=='女性') selected @endif>女性</option>
                    <option value="その他" @if(request('gender')=='その他') selected @endif>その他</option>
                </select>

                <select name="category">
                    <option value="">お問い合わせの種類</option>
                    <option value="商品について" @if(request('category')=='商品について') selected @endif>商品について</option>
                    <option value="商品の交換について" @if(request('category')=='商品の交換について') selected @endif>商品の交換について</option>
                    <option value="その他" @if(request('category')=='その他') selected @endif>その他</option>
                </select>
                <div id="pagination" class="pagination"></div>

                <div class="create-form__item">
                    <label for="start"></label>
                    <input  type="date"
                                id="start"
                                name="trip-start"
                                value="年/月/日"
                                min="2000-01-01"
                                max="2040-12-31" />
                </div>

                <div class="date__button">
                    <button class="button_search" type="submit">検索</button>
                    <a href="{{ route('admin.index') }}" class="button_reset">リセット</a>
                </div>
                <div id="pagination" class="pagination"></div>
            </form>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->gender }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->category }}</td>
                        <td>
                            <button class="button_detail"
                                data-name="{{ $contact->name }}"
                                data-gender="{{ $contact->gender }}"
                                data-email="{{ $contact->email }}"
                                data-category="{{ $contact->category }}">
                                詳細
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- ページネーション -->
            <div class="pagination">
                {{ $contacts->links() }}
            </div>
        </div>
    </main>

    <!-- モーダル -->
    <div id="modal" class="modal" style="display:none;">
        <div class="modal_content">
            <span class="modal_close">&times;</span>
            <h3>お問い合わせ詳細</h3>
            <table class="modal_table">
                <tr>
                    <th>お名前</th>
                    <td id="modal_name"></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td id="modal_gender"></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td id="modal_email"></td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td id="modal_category"></td>
                </tr>
            </table>
            <button class="btn delete">削除</button>
        </div>
    </div>

    <script src="admin.js">
        document.addEventListener("DOMContentLoaded", () => {
            const modal = document.getElementById("modal");
            const closeBtn = document.querySelector(".modal_close");

            document.querySelectorAll(".button_detail").forEach(button => {
                button.addEventListener("click", () => {
                    document.getElementById("modal_name").textContent = button.dataset.name;
                    document.getElementById("modal_gender").textContent = button.dataset.gender;
                    document.getElementById("modal_email").textContent = button.dataset.email;
                    document.getElementById("modal_category").textContent = button.dataset.category;

                    modal.style.display = "block";
                });
            });

            closeBtn.addEventListener("click", () => {
                modal.style.display = "none";
            });

            window.addEventListener("click", (e) => {
                if (e.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>