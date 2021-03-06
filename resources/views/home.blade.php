<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="天気 現在の天気">
    <meta name="description" content="日本の都市の現在の天気を確認できるWebアプリです。">
    <title>Current Weather</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon"  href="{{ asset('/favicon.ico') }}">
</head>
<body>
    <div class="l-wrap" id="app">
        <div class="l-header">
            <div class="p-header">
                <div class="p-header__inner">
                    <div class="p-header__logo">
                        Current Weather
                    </div>
                </div>
            </div>
        </div>
        <div class="l-content">
            <div class="l-content__inner">
                <home-component loading-img-src="{{ asset('img/loading.gif') }}"></home-component>
            </div>
        </div>
        <div class="l-footer">
            <div class="p-footer">
                <div class="p-footer__inner">
                    <span class="p-footer__copyright">&copy;</span> 2022 nt1121
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.es5.js') }}"></script>
</body>
</html>
