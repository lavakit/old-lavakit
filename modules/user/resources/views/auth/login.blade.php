@extends('backend::layouts.auth')

@section('content')
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="#"><img src="{{ backendAsset('images/logo.png') }}" alt=""></a>
                    </div>
                    <h4>{{ trans('user::auth.html.sign_in') }}</h4>
                    <p>{{ trans('user::auth.html.see_you_again') }}</p>

                    @include('backend::layouts.messages.alert')

                    {{ Form::open(['route' => 'auth.login']) }}
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => trans('user::auth.html.email')]) }}
                            <i class="ik ik-user"></i>
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => trans('user::auth.html.password')]) }}
                            <i class="ik ik-lock"></i>
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="row">
                            <div class="col text-left">
                                <label class="custom-control custom-checkbox">
                                    {{ Form::checkbox('remember', 1, null, ['class' => 'custom-control-input']) }}
                                    <span class="custom-control-label">{!! Html::nbsp() !!}{{ trans('user::auth.html.remember') }}</span>
                                </label>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('forgot') }}">{{ trans('user::auth.html.forgot_password') }}</a>
                            </div>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-success">
                                <i class="ik ik-check-circle"></i>
                                {{ trans('user::auth.html.sign_in') }}
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