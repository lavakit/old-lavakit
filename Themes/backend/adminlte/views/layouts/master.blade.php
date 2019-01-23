<!doctype html>
<html lang="{{ locate() }}">
<head>
    <base src="{{ URL::asset('/') }}" />
    <meta charset="utf-8">
    <title>{{ title()->get() }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Fonts--}}
    @section('font')
    @show
    {{-- Styles --}}
    @foreach($cssBackendFiles as $css)
        <link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset($css) }}">
    @endforeach
    @stack('css-stack')
</head>
<body>
<div>
    <div class="content">
        @yield('content')
    </div>
</div>
{{-- Script --}}
@foreach($jsBackendFiles as $js)
    <script src="{{ URL::asset($js) }}" type="text/javascript"></script>
@endforeach
@stack('js-stack')
</body>
</html>