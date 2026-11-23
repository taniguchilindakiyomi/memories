<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Memories</title>
   <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
   <link rel="stylesheet" href="{{ asset('css/edit.css') }}"> <!-- 💡 edit.css を読み込みます -->
</head>
<body>
   <!-- フォーム全体の開始（更新用データ送信のため method="POST" にしています） -->

   <form action="/memories/{{ $memory->id }}" method="POST" enctype="multipart/form-data" class="diary-form">
    @csrf
    @method('PUT')


       <!-- 🌸 アプリ風のピンクヘッダー -->
       <header class="diary-header">
           <!-- ✕ ボタン（詳細画面や一覧に戻るリンク） -->
           <a href="/" class="diary-header__close">✕</a>

           <!-- 中央の日付バッジ（編集不可の読み取り専用） -->
           <div class="diary-header__date-badge">

           <button
        type="button"
        id="date-button"
        class="diary-header__date-button">
        {{ $memory->date }}
    </button>

               <input type="date" name="date" id="date-input" value="{{ $memory->date }}" class="diary-header__date-input">

                <div class="validation-error">
                @error('date')
                {{ $message }}
                @enderror
                </div>
           </div>

           <!-- 右側のスペース（バランス用） -->
           <div class="diary-header__spacer"></div>
       </header>

       <!-- 📝 メインのテキスト入力エリア（最初から値を入れておきます） -->
       <main class="diary-main">

@if ($memory->image)
    <div class="diary-edit__image">
        <img
            id="image-preview"
            src="{{ asset('storage/' . $memory->image) }}"
            alt=""
        >
    </div>
@else
    <div class="diary-edit__image">
        <img
            id="image-preview"
            src=""
            alt=""
            style="display: none;"
        >
    </div>
@endif

    <div class="validation-error">
       @error('image')
                {{ $message }}
                @enderror
    </div>
           <!-- タイトル入力（valueの中に元のタイトルを入れます） -->
           <div class="diary-input__title-wrap">
               <input type="text" name="title" value="{{ $memory->title }}" placeholder="タイトルを入力..." class="diary-input__title">
               <div class="validation-error">
               @error('title')
                {{ $message }}
                @enderror
               </div>
           </div>

           <!-- 本文入力（textareaの間に元の本文を入れます） -->
           <div class="diary-input__text-wrap">
            <div class="validation-error">
            @error('content')
                {{ $message }}
                @enderror
            </div>
               <textarea name="content" placeholder="ここにお仕事の記録や、今日の出来事を自由に書いてね!!" class="diary-input__text">{{ $memory->content }}</textarea>
           </div>
       </main>

       <!-- 📌 画面下部の固定ボタンエリア -->
       <footer class="diary-footer">
           <!-- 更新ボタン（フォーム送信） -->
           <button type="submit" class="diary-btn diary-btn--submit">更新</button>

           <!-- 画像変更ボタン -->
           <label class="diary-btn diary-btn--image">
               画像変更
               <input type="file" name="image"
               id="image-input" accept="image/*" style="display: none;">
           </label>
       </footer>
   </form>

    <script src="{{ asset('js/edit.js') }}"></script>
</body>
</html>