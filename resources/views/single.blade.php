@extends('layouts.app')

@section('content')


<h1 class="h4 mx-3 mt-4">解説ページ</h1>
<section id="single-section">

@if(isset($post))
<div class="container my-5">
  <div class="textContainer p-4">
    <h2 class="fw-bold mb-5 mt-2 lh-base">{{ $post->title_kor }}</h2>
    <p>【和訳】 {{ $post->title_ja }}</p>
    <p>【解説】 {{ $post->explanation }}</p>
    <p>【ジャンル】 <a href="{{ route('category', ['id'=>$post->category_id]) }}">{{ $category_lists[$post->category_id-1]->name }}</a></p>
    <p>【出典】 <a href="{{ route('source', ['id'=>$post->source_id]) }}">{{ $source_lists[$post->source_id-1]->name }}</a></p>
  </div>
</div>
@else
  <p>指定された投稿は見つかりませんでした。</p>
@endif

<p class="text-center"><a href="{{ route('front') }}">トップページに戻る</a></p>


</section>

@endsection