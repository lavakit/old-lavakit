@extends('backend::layouts.base')

@section('page')
    <div class="wrapper">
        @include('backend::layouts.partials.header')

        <div class="page-wrap">
            <div class="app-sidebar colored">
                @include('backend::layouts.partials.sidebar')
            </div>

            <div class="main-content">
                {{--@include('backend::layouts.partials.content')--}}
                @yield('content')
            </div>

            <aside class="right-sidebar">
                @include('backend::layouts.partials.aside')
            </aside>

            <div class="chat-panel" hidden>
                @include('backend::layouts.partials.chat')
            </div>

            @include('backend::layouts.partials.footer')
        </div>

        @include('backend::layouts.partials.apps_modal')
    </div>
@endsection