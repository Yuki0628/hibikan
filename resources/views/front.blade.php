@extends('layouts.app')

@section('content')
<section id="main-section">
  <h2 class="h4 mx-3 mt-4">今日の言葉</h2>
  <div class="mainWordContainer mx-auto my-5">
      <h3 class="text-center my-3 fw-bold">{{ $post->title_kor }}</h3>
      <p class="text-center">訳：{{ $post->title_ja }}</p>
      <p class="text-center"><a href="{{ route('post', ['id'=>$post->id]) }}">解説を見る</a></p>
      <div class="info_list">
        <p class="">ジャンル: <a href="{{ route('category', ['id'=>$post->category_id]) }}">{{ $category_lists[$post->category_id-1]->name }}</a></p>
        <p class="">出典: <a href="{{ route('source', ['id'=>$post->source_id]) }}">{{ $source_lists[$post->source_id-1]->name }}</a></p>
      </div>
  </div>
  <div class="post_container text-center">
  <a class="btn btn-border" href="{{ route('create') }}"><span>投稿する!</span></a>
  </div>

</section>

<section id="categories">
  <div class="genres">
    <h2 class="my-5 mx-3 h4">ジャンルから探す</h2>
    <div class="container">
      <div class="row justify-content-center text-center">
        <a class="col col-6 genre genre1 py-3" href="{{ route('category', ['id'=>'1']) }}">元気づける名言</a>
        <a class="col col-6 genre genre2 py-3" href="{{ route('category', ['id'=>'2']) }}">愛情表現</a>
      </div>
      <div class="row justify-content-center text-center">
        <a class="col col-6 genre genre3 py-3" href="{{ route('category', ['id'=>'3']) }}">人生の教訓</a>
        <a class="col col-6 genre genre4 py-3" href="{{ route('category', ['id'=>'4']) }}">面白い言葉</a>
      </div>
    </div>
  </div>

  <div class="source">
    <h2 class="my-5 mx-3 h4">出典別で探す</h2>
    <div class="container">
      <ul class="list-group">
        <li><a href="{{ route('source', ['id'=>'1']) }}" class="list-group-item list-group-item-action">アイドルの言葉</a></li>
        <li><a href="{{ route('source', ['id'=>'2']) }}" class="list-group-item list-group-item-action">オリジナル</a></li>
        <li><a href="{{ route('source', ['id'=>'3']) }}" class="list-group-item list-group-item-action">ことわざ</a></li>
        <li><a href="{{ route('source', ['id'=>'4']) }}" class="list-group-item list-group-item-action">歌詞</a></li>
        <li><a href="{{ route('source', ['id'=>'5']) }}" class="list-group-item list-group-item-action">書籍</a></li>
        <li><a href="{{ route('source', ['id'=>'6']) }}" class="list-group-item list-group-item-action">その他</a></li>
      </ul>
    </div>
  </div>
</section>

<section id="about_site">
  <h2 class="my-5 mx-3 h4">心に響く韓国語の名言とは？</h2>
  <div class="container">
    <p>韓国と言えばKPOP、韓国料理などが有名です。<br>しかし、韓国にはそれだけではなく、<br>素晴らしい名言が数多くあります。<br>書籍の一節・歌のフレーズ・著名人の名言...<br>名言を通じて学習にも繋がります。<br>あなたも好きな韓国語の名言を共有してみませんか？</p>
  </div>
</section>
@endsection