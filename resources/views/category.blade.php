@extends('layouts.app')

@section('content')


@if($categoryOrSource === 'category')
  @if(isset($category_lists[$id -1]))
    <h1 class="h4 mx-3">{{ $category_lists[$id -1]->name }}の投稿一覧です。</h1>
  @else
    <h1 class="h4 mx-3">ご指定のカテゴリーは存在しません。</h1>
  @endif
@else
  @if(isset($source_lists[$id -1]))
    <h1 class="h4 mx-3">{{ $source_lists[$id -1]->name }}の投稿一覧です。</h1>
  @else
    <h1 class="h4 mx-3">ご指定のカテゴリーは存在しません。</h1>
  @endif
@endif


<section id="category-page">

<div class="container my-5">
  <ul class="p-0">
    @foreach($posts as $post)
    <li class="card mb-4">
    <div class="card-header d-flex justify-content-between p-2">
      <h3 class="my-auto">No.{{$post->id}}</h3>
      <p class="my-auto">Posted by {{ $user[$post->user_id -1]->name }}</p>
    </div>
      <div class="card-body">
        <h5 class="card-title">{{$post->title_kor}}</h5>
        <p class="card-text">{{$post->title_ja}}</p>
        <div class="d-flex justify-content-between">
          <a href="{{ route('post', ['id'=>$post->id]) }}" class="btn btn-primary">解説を見る</a>
          <p class="text-muted my-auto">{{ $post->created_at->format('Y.m.d') }}</p>
        </div>
      </div>
    </li>
    @endforeach


  {{ $posts->links() }}



    @if(count($posts) < 1)
      <p>ご指定のカテゴリーの投稿はまだ存在しません。一番乗りで<a href="{{ route('create') }}">投稿</a>しよう！</p>
    @endif
  </ul>
</div>

<p class="text-center"><a href="{{ route('front') }}">トップページに戻る</a></p>


</section>

@endsection