@extends('layouts.error')

@section('content')
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form page-error mx-auto">
                    <h1>500</h1>
                    <p>Whoops, something went wrong on our serves</p>
                    <a href="{{ route('admin.dashboards.dashboard') }}" class="btn btn-outline-secondary">Go Home</a>
                </div>
            </div>

            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('{{ backendAsset('images/auth/login-bg.jpg') }}')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
