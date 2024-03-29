<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bosgroep Zuid-Nederland</title>

    <link href="/css/fontawesome-5.13.0-web-all.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Bebas Neue';
            src: url('/assets/fonts/bebasneue.ttf');
        }
        @font-face {
            font-family: 'Midnight Champion';
            src: url('/assets/fonts/midnight-champion.otf');
        }
    </style>
</head>

<body>
    <div id="app">
        <app></app>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>