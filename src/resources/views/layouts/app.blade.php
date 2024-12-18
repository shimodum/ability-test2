<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'mogitate')</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-KfkfwPyx5fvFTe3nO9zHp3RIxQ3K/Yk3X6/vPeFOYYRwa6Y6Z6XqagkHcT/GFL4TzBgiUM5mfnBd2Gj7UoE1MQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

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
