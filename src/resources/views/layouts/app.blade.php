<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'mogitate')</title>

    <!-- 共通CSS -->
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>
    <!-- 共通ヘッダー -->
    <header class="header">
        <div class="logo">
            <h1>mogitate</h1>
        </div>
    </header>

    <!-- コンテンツ部分 -->
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
