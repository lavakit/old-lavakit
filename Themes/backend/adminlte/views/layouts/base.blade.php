<!doctype html>
<html class="no-js" lang="{{ locate() }}">
    <head>
        <base src="{{ URL::asset('/') }}" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ title()->get() }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        {{-- Styles --}}
        @foreach($cssBackendFiles as $css)
            <link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset($css) }}">
        @endforeach

        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

        @stack('css-stack')
    </head>
    <body>
        @yield('page')

        {{-- Script --}}
        @foreach($jsBackendFiles as $js)
            <script src="{{ URL::asset($js) }}" type="text/javascript"></script>
        @endforeach
        @stack('js-stack')
    </body>
</html>