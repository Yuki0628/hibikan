@extends('layouts.app')

@section('content')
<div class="container">



    <div class="row justify-content-center">
        <h2 class="h4 mt-5 mb-3 ">私の情報</h2>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ダッシュボード') }}</div>

                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="py-3 mx-0">
                        <li>ユーザーネーム：{{ $user->name }}</li>
                        <li>ユーザーID：{{ $user->user_id }}</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <h2 class="h4 mb-3">私の投稿</h2>
        <div class="col-md-8">
            <ul class="px-0">
                @foreach($posts as $post)
                <li class="card mb-4">
                    <h5 class="card-header">No.{{$post->id}}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title_kor}}</h5>
                    <p class="card-text">{{$post->title_ja}}</p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <a href="{{ route('edit', ['id'=>$post->id]) }}" class="btn btn-primary">編集</a>
                            <form action="{{ route('delete', ['id'=>$post->id]) }}" method="POST">
                            @csrf
                                <input type="submit" class="btn btn-danger btn-dell" value="削除">
                            </form>
                        </div>
                        <p class="text-muted">{{ $post->created_at->format('Y.m.d') }}</p>
                    </div>
                </div>
                </li>
                @endforeach

                {{ $posts->links() }}


                @if(count($posts) < 1)
                <p>投稿はまだ存在しません。いますぐ<a href="{{ route('create') }}">投稿</a>しよう！</p>
                @endif
            </ul>
        </div>

    </div>

<p class="text-center"><a href="{{ route('front') }}">トップページに戻る</a></p>

</div>
@endsection
