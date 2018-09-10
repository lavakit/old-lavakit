<!doctype html>
<html lang="{{ locate() }}">
<head>
    <base src="{{ URL::asset('/') }}" />
    <meta charset="utf-8">
    <title>Error - {{ pageTitle()->getTitle() }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Fonts--}}
    @section('font')
    @show
    {{-- Styles --}}
    @stack('css-stack')
</head>
<body>
<div>
    <div class="content">
        @yield('content')
    </div>
</div>
{{-- Script --}}
@stack('js-stack')
</body>
</html>