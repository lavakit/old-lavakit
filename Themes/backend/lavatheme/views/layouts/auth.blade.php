@extends('layouts.base')

@section('page')
    <div id="app" class="auth-wrapper">
        {{--@yield('content')--}}
        <router-view></router-view>
    </div>
@endsection

@push('js-global')
    @include('layouts.javascript_variables')
    <script>
        window.Lavakit.isAdmin = false;
    </script>
@endpush