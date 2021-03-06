<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{ url()->current() }}" />
    @if (request()->route()->getName() === 'post')
        <meta name="description" content="{{ $post->title_kor }}">
    @endif
    <meta name="google-site-verification" content="idIERn8upJTkVdm5dkBlkIcaXvh5Zypsobn1E5q2mp0" />
    <!-- OGP情報 -->

    @if (request()->route()->getName() === 'post')
        <meta property="og:title" content="{{ $post->title_kor }}"/>
        <meta property="og:description" content="この言葉の意味を今すぐチェックしよう！"/>
    @else
        <meta property="og:title" content="心に響く韓国語の名言集"/>
        <meta property="og:description" content="あなたが好きな韓国語の名言を教えてください"/>
    @endif

    <meta property="og:site_name" content="心に響く韓国語の名言集"/>
    <meta property="og:url" content="https://lang.korip.net/"/>
    <meta property="og:image" content="asset('/favicon.ico')"/>
    <!-- Twitterシェア時の表示形式指定 -->
    <meta name="twitter:card" content="summary_large_image"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('front') }}">
                                    {{ ('トップページ') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    {{ ('マイページ') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
                
            </div>
        </nav>

        <!-- フラッシュメッセージ -->
        @if (session('flash_msg'))
            <div class="flash_msg alert alert-{{ session('color') }} mt-3 mx-4">
                <p class="text-center">{{ session('flash_msg') }}</p>
            </div>
        @endif

        <main class="pt-4 main-container">
            @yield('content')
        </main>

        <footer class="footer bg-secondary py-0 mt-5">
            <div>
                <p class="my-0 p-3 text-center link-light"><a class="link-light" href="https://kankoku-trendshop.com/">©韓国トレンドSHOP</a>　All Right Reserved</p>
            </div>
        </footer>
    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
