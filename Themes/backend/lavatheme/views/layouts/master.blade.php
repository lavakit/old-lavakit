@extends('layouts.base')

@section('page')
    <div class="wrapper" id="app"></div>
@endsection

@push('js-global')
    @include('layouts.javascript_variables')
@endpush