<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/fontawesome-all.css">
        <link rel="stylesheet" href="/css/animsition.min.css">
        <title>{{$title}}</title>
    </head>
    <body class="animsition">
        @include('include.nav')
            @yield('content')
        @include('include.footer')
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <!-- Bootstrap Scripts -->
        <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="/js/vendor/bootstrap.min.js"></script>

        <!-- Web Site Scripts -->
        <script src="/js/vendor/animsition.min.js"></script>
        <script src="/js/vendor/animsition-config.js"></script>
        <script src="/js/vendor/jquery.smoothwheel.js"></script>
        <script src="/js/vendor/img-parallax.js"></script>
        <script src="/js/scripts.js"></script>
    </body>
</html>
