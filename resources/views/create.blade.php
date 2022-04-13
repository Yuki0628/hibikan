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


  <h2 class="my-3">投稿作成フォーム</h2>
  <form method="POST" action="{{ route('store') }}">
    @csrf


      <div class="form-group mb-2">
        <label>共有したいことば（韓国語）</label>
        <input type="text" name="title_kor" class="form-control" value="{{ old('title_kor') }}">
      </div>
      <div class="form-group mb-2">
        <label>和訳</label>
        <input type="text" name="title_ja" class="form-control" value="{{ old('title_ja') }}">
      </div>
      <div class="form-group mb-2">
        <label>解説</label>
        <textarea rows="7" class="explanation form-control" name="explanation">{{ old('explanation') }}</textarea>
      </div>
      <div class="form-group mb-2">
        <label>ジャンル</label>
        <select name="category_id" class="form-control">
          <option value="" selected>ジャンルを選択</option>
          <option value="1">元気づける名言</option>
          <option value="2">愛情表現</option>
          <option value="3">人生の教訓</option>
          <option value="4">おもしろい言葉</option>
        </select>
      </div>
      <div class="form-group mb-2">
        <label>出典</label>
        <select name="source_id" class="form-control">
          <option value="" selected>出典を選択</option>
          <option value="1">アイドルの言葉</option>
          <option value="2">オリジナル</option>
          <option value="3">ことわざ</option>
          <option value="4">歌詞</option>
          <option value="5">書籍</option>
          <option value="6">その他</option>
        </select>
      </div>
      
      

      <input type="submit" value="投稿" class="btn btn-primary">

  </form>
  <p class="text-center"><a href="{{ route('front') }}">トップページに戻る</a></p>


</div>
  
  
@endsection