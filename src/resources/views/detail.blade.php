<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Memories</title>
   <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
   <link rel="stylesheet" href="{{ asset('css/detail.css') }}"> <!-- 💡 detail.css に変更 -->
</head>
<body>
   <div class="diary-detail">

       <!-- 🌸 アプリ風のピンクヘッダー（日付表示） -->
       <header class="diary-header">
           <!-- ✕ ボタン（一覧画面に戻るリンク） -->
           <a href="/" class="diary-header__close">✕</a>

           <!-- 中央の日付バッジ -->
           <div class="diary-header__date-badge">
               <span>{{ $memory->date }}</span> <!-- 💡 本来は $memory->date などの変数が入ります -->
           </div>

           <!-- 右側の編集ボタン（あとで編集画面に飛べるように用意） -->
           <a href="/edit/{{ $memory->id }}" class="diary-header__edit">編集</a>
       </header>

       <!-- 📝 メインの中身表示エリア -->
       <main class="diary-main">
           <!-- 📷 投稿された写真（写真がある場合だけ大きく表示） -->
        @if ($memory->image)
           <div class="diary-detail__image">
               <img src="{{ asset('storage/' . $memory->image) }}" alt="{{ $memory->title }}">
           </div>
        @endif

           <!-- 🔤 タイトル -->
           <h1 class="diary-detail__title">{{ $memory->title }}</h1>

           <!-- 📄 本文テキスト -->
           <div class="diary-detail__content">{{ $memory->content }}</div>
       </main>

       <!-- 📌 画面下部の戻るボタンエリア -->
       <footer class="diary-footer">
           <!-- 戻るボタン（一覧に戻る） -->
           <a href="/" class="diary-btn diary-btn--back">戻る</a>

            <form action="/memories/{{ $memory->id }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')

        <button type="button" id="open-delete-modal" class="diary-btn diary-btn--delete">
            削除
        </button>
    </form>
       </footer>
       <div id="delete-modal" class="delete-modal">
   <div class="delete-modal_content">
       <p class="delete-modal_title">思い出の削除</p>
       <p class="delete-modal_text">本当にこの思い出を削除しますか？<br><span>※削除すると元に戻せません</span></p>

       <div class="delete-modal_buttons">
           <button type="button" id="cancel-delete-btn" class="delete-modal_cancel">キャンセル</button>
           <button type="button" id="confirm-delete-btn" class="delete-modal_confirm">削除する</button>
       </div>
   </div>
</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
   const openBtn = document.getElementById('open-delete-modal');
   const modal = document.getElementById('delete-modal');
   const cancelBtn = document.getElementById('cancel-delete-btn');
   const confirmBtn = document.getElementById('confirm-delete-btn');
   const deleteForm = document.getElementById('delete-form');

   // 「削除」ボタンを押したらモーダルを開く
   if (openBtn && modal) {
       openBtn.addEventListener('click', function () {
           modal.classList.add('is-open');
       });
   }

   // 「キャンセル」ボタンを押したらモーダルを閉じる
   if (cancelBtn && modal) {
       cancelBtn.addEventListener('click', function () {
           modal.classList.remove('is-open');
       });
   }

   // モーダルの外側の暗い部分をクリックしても閉じる
   if (modal) {
       modal.addEventListener('click', function (e) {
           if (e.target === modal) {
               modal.classList.remove('is-open');
           }
       });
   }

   // 「削除する」ボタンを押したら本当に削除を実行する
   if (confirmBtn && deleteForm) {
       confirmBtn.addEventListener('click', function () {
           deleteForm.submit();
       });
   }
});
</script>


</body>
</html>