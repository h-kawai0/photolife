<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') | ふぉとらいく</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

    <div id="app">

        @yield('header')

        @yield('content')
        
        @yield('footer')

    </div>
    
<script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>