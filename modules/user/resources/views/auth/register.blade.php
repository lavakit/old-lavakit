@extends('backend::layouts.auth')

@section('content')
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('{{ backendAsset('images/auth/register-bg.jpg') }}')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="#"><img src="{{ backendAsset('images/logo.png') }}" alt=""></a>
                    </div>
                    <h4>{{ trans('user::auth.html.register') }}</h4>
                    <p>{{ trans('user::auth.html.join_step') }}</p>
                    {{ Form::open(['route' => 'auth.register']) }}

                        <div class="row">
                            <div class="col text-left">
                                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                    {{ Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => trans('user::auth.html.first_name')]) }}
                                    <i class="ik ik-user"></i>
                                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col text-left">
                                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                    {{ Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => trans('user::auth.html.last_name')]) }}
                                    <i class="ik ik-user"></i>
                                    {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => trans('user::auth.html.email')]) }}
                            <i class="ik ik-mail"></i>
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => trans('user::auth.html.password')]) }}
                            <i class="ik ik-lock"></i>
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('user::auth.html.password_confirm')]) }}
                            <i class="ik ik-eye-off"></i>
                            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="row">
                            <div class="col-12 text-left">
                                <label class="custom-control custom-checkbox">
                                    {{ Form::checkbox('accept', 1, null, ['class' => 'custom-control-input']) }}
                                    <span class="custom-control-label">&nbsp;{{ trans('user::auth.html.accept') }}
                                        &nbsp;<a href="#">{{ trans('user::auth.html.term_condition') }}</a>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">{{ trans('user::auth.html.create_account') }}</button>
                        </div>
                    {{ Form::close() }}

                    <div class="register">
                        <p>
                            {{ trans('user::auth.html.has_account') }}
                            &nbsp;<a href="{{ route('login') }}">{{ trans('user::auth.html.sign_in') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection