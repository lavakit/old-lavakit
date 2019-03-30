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
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="user-api-token" content="Todo next task">
        <meta name="current-locale" content="{{ locate() }}">
        
        <link rel="apple-touch-icon" sizes="180x180" href="{{ backendAsset('images/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ backendAsset('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ backendAsset('images/favicon/favicon-16x16.png') }}">


        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        {{-- Styles --}}
        @foreach($cssBackendFiles as $css)
            <link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset($css) }}">
        @endforeach

        @stack('css-stack')
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @yield('page')

        {{-- Script --}}
        <script>
            window.Lavakit = {
                locales: {!! json_encode(LaravelLocalization::getSupportedLocales()) !!},
                currentLocale: '{{ locate() }}',
                adminPrefix: '{{ config('base.base.admin-prefix') }}',
                hideDefaultLocale: '{{ config('laravellocalization.hideDefaultLocaleInURL') }}',
                textTranslations: '',
            }
        </script>
        @foreach($jsBackendFiles as $js)
            <script src="{{ URL::asset($js) }}" type="text/javascript"></script>
        @endforeach
        @stack('js-stack')
    </body>
</html>