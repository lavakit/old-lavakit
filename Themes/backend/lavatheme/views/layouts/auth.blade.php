@extends('layouts.base')

@section('page')
    <div id="app" class="auth-wrapper">
        {{--@yield('content')--}}
    </div>
@endsection

@push('js-global')
    @include('layouts.javascript_variables')
@endpush