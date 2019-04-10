@extends('layouts.base')

@section('page')
    <div class="auth-wrapper">
        @yield('content')
    </div>
@endsection

@push('js-global')
    @include('layouts.javascript_variables')
    <script>
        window.Lavakit.isAdmin = false;
    </script>
@endpush