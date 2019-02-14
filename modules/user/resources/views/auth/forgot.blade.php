@extends('backend::layouts.auth')

@section('content')
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="#"><img src="{{ backendAsset('images/logo.png') }}" alt=""></a>
                    </div>
                    <h4>{{ trans('user::auth.html.forgot') }}</h4>
                    <p>{{ trans('user::auth.html.forgot_logan') }}</p>

                    @include('backend::layouts.messages.alert')

                    {{ Form::open(['route' => 'auth.forgot']) }}
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => trans('user::auth.html.email')]) }}
                            <i class="ik ik-user"></i>
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">
                                <i class="ik ik-check-circle"></i>
                                {{ trans('user::auth.html.btn.forgot') }}
                            </button>
                        </div>
                    {{ Form::close() }}

                    <div class="register">
                        <p>
                            {{ trans('user::auth.html.not_account')}}
                            {!! Html::nbsp() !!}
                            <a href="{{ route('register') }}">{{ trans('user::auth.html.create_account')}}</a>
                        </p>
                    </div>
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