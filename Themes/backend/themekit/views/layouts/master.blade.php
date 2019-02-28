@extends('layouts.base')

@section('page')
    <div class="wrapper">
        @include('layouts.partials.header')

        <div class="page-wrap">
            <div class="app-sidebar colored">
                @include('layouts.partials.sidebar')
            </div>

            <div class="main-content">
                <div class="container-fluid">
                {{--@include('layouts.partials.content')--}}
                    @yield('content')
                </div>
            </div>

            <aside class="right-sidebar">
                @include('layouts.partials.aside')
            </aside>

            <div class="chat-panel" hidden>
                @include('layouts.partials.chat')
            </div>

            @include('layouts.partials.footer')
        </div>

        @include('layouts.partials.apps_modal')
    </div>
@endsection