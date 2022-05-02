@extends('layouts.app')

@section('content')

<div class="container">


  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <h2 class="my-3 h4">投稿編集フォーム</h2>
  <form method="POST" action="{{ route('update', ['id'=>$post->id]) }}">
    @csrf
    
    <div class="form-group mb-2">
      <label>韓国語タイトル</label>
      <input type="text" name="title_kor" class="form-control" value="{{ old(('title_kor'), $post->title_kor) }}">
    </div>
    <div class="form-group mb-2">
      <label>和訳</label>
      <input type="text" name="title_ja" class="form-control" value="{{ old(('title_ja'), $post->title_ja) }}">
    </div>
    <div class="form-group mb-2">
      <label>解説</label>
      <textarea rows="10" cols="50" class="explanation form-control" name="explanation">{{ old(('explanation'), $post->explanation) }}</textarea>
    </div>
    <div class="form-group mb-2">
      <label>ジャンル</label>
      <select name="category_id" class="form-control">
        <option value="" selected>ジャンルを選択</option>
        <option value="1" @if(old('category_id')=="1") selected @endif >元気づける名言</option>
        <option value="2" @if(old('category_id')=="2") selected @endif >愛情表現</option>
        <option value="3" @if(old('category_id')=="3") selected @endif >人生の教訓</option>
        <option value="4" @if(old('category_id')=="4") selected @endif >おもしろい言葉</option>
      </select>
    </div>
    <div class="form-group mb-2">
      <label>出典</label>
      <select name="source_id" class="form-control">
        <option value="" selected>出典を選択</option>
        <option value="1" @if(old('source_id')=="1") selected @endif >アイドルの言葉</option>
        <option value="2" @if(old('source_id')=="2") selected @endif >オリジナル</option>
        <option value="3" @if(old('source_id')=="3") selected @endif >ことわざ</option>
        <option value="4" @if(old('source_id')=="4") selected @endif >歌詞</option>
        <option value="5" @if(old('source_id')=="5") selected @endif >書籍</option>
        <option value="6" @if(old('source_id')=="6") selected @endif >その他</option>
      </select>
    </div>
    
    

    <input type="submit" value="更新" class="btn btn-primary">
    
  </form>

  <p class="text-center"><a href="{{ route('front') }}">トップページに戻る</a></p>

</div>

@endsection