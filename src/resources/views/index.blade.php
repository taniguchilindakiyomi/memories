<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Memories</title>
   <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
   <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
   <header>
       <div class="header__inner">
           <h2>Memories</h2>
       </div>
   </header>

  <main>
       <section class="memory">
           <div class="memory__inner">
               <div class="memory__heading">
                   <p class="memory__subtitle">MY MEMORIES</p>
                   <h2 class="memory__title">思い出帳</h2>
                   <p class="memory__text">〜大切な思い出をいつでも振り返ろう〜</p>
               </div>

               <div class="memory__button">
                 <form action="/" method="GET" id="search-form" class="memory_search-form {{ !empty($keyword) ? 'is-open' : '' }}">
       <input type="text" name="keyword" value="{{ $keyword ?? '' }}" placeholder="思い出を検索..." class="memory_search-input">
       <button type="submit" class="memory_search-submit">検索</button>
       @if(!empty($keyword))
           <a href="/" class="memory_search-clear">クリア</a>
       @endif
   </form>

                   <a href="/create" class='memory_create-button'>思い出を残す</a>
               </div>

               <!-- 💡 左右に分けるためのコンテナを追加 -->
               <div class="memory__container">

                   <!-- 📅 左側のカレンダーエリア -->
                   <aside class="memory__sidebar">
                    <div id="calendar" class="calendar-wrap"></div>
                   </aside>

                   <!-- 📝 右側の思い出リストエリア -->
                   <div class="memory__list">
                    @foreach ($memories as $memory)

                       <!-- カード1 -->
                       <article class="memory__card">
                           <div class="memory__card__image">
                            @if ($memory->image)
                               <img src="{{ asset('storage/' . $memory->image) }}" alt="{{ $memory->title }}">
                            @endif
                           </div>
                           <div class="memory__card__content">
                               <p class="memory__card__date">{{ $memory->date }}</p>
                               <h3 class="memory__card__title">{{ $memory->title }}</h3>
                               <p class="memory__card__text">{{ $memory->content }}</p>
                               <a href="/detail/{{ $memory->id }}" class="memory__card__link">思い出を見る</a>
                           </div>
                       </article>
                    @endforeach
                   </div>

               </div> <!-- /memory__container -->
           </div>
       </section>
   </main>
   <script src="{{ asset('js/memories.js') }}"></script>
</body>
</html>
