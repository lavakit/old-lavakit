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
        @stack('css-stack')
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="wrapper">

            @include('backend::layouts.partials.header')

            <div class="page-wrap">
                <div class="app-sidebar colored">

                </div>

                <div class="main-content">
                    {{--<div class="content">--}}
                    {{--@yield('content')--}}
                    {{--</div>--}}
                </div>

                <aside class="right-sidebar">

                </aside>

                <div class="chat-panel" hidden>

                </div>

                @include('backend::layouts.partials.footer')
            </div>
        </div>
    {{-- Script --}}
    @foreach($jsBackendFiles as $js)
        <script src="{{ URL::asset($js) }}" type="text/javascript"></script>
    @endforeach
    @stack('js-stack')
    </body>
</html>