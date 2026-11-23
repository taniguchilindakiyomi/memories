<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Memories</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>

<body>

    <!-- フォーム全体 -->
    <form action="/memories" method="POST" enctype="multipart/form-data" class="diary-form">

        @csrf

        <!-- ヘッダー -->
        <header class="diary-header">

            <!-- 一覧画面に戻る -->
            <a href="/" class="diary-header__close">✕</a>

            <!-- 日付 -->
            <div class="diary-header__date-badge">
                <input
                    type="text"
                    name="date"
                    id="memory-date"
                    value="{{ $date }}"
                    readonly
                >
            </div>

            <!-- バランス調整用 -->
            <div class="diary-header__spacer"></div>

        </header>


        <!-- メイン入力エリア -->
        <main class="diary-main">

<div class="diary-create__image">

    <img id="image-preview"
        src=""
        alt=""
        style="display: none;">
        <div class="validation-error">
                @error('image')
                {{ $message }}
                @enderror
        </div>
</div>
            <!-- タイトル -->
            <div class="diary-input__title-wrap">
                <input
                    type="text"
                    name="title"
                    placeholder="タイトルを入力..."
                    
                    class="diary-input__title"
                >
            <div class="validation-error">
                @error('title')
                {{ $message }}
                @enderror
            </div>

            </div>



            <!-- 本文 -->
            <div class="diary-input__text-wrap">

            <div class="validation-error">
                @error('content')
                {{ $message }}
                @enderror
            </div>
                <textarea name="content" placeholder="ここにお仕事の記録や、今日の出来事を自由に書いてね!!" class="diary-input__text"></textarea>
            </div>


        </main>


        <!-- フッター -->
        <footer class="diary-footer">

            <!-- 完了ボタン -->
            <button
                type="submit"
                class="diary-btn diary-btn--submit"
            >
                完了
            </button>


            <!-- 画像追加ボタン -->
            <label class="diary-btn diary-btn--image">

                画像追加

                <input
                    type="file"
                    name="image"
                    id="image-input"
                    accept="image/*"
                    style="display: none;"
                >

            </label>

        </footer>

    </form>

    <script src="{{ asset('js/create.js') }}"></script>

</body>
</html>
