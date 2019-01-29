@extends('backend::layouts.auth')

@section('content')
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('{{ backendAsset('images/auth/login-bg.jpg') }}')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="#"><img src="{{ backendAsset('images/logo.png') }}" alt=""></a>
                    </div>
                    <h4>Sign In</h4>
                    <p>Happy to see you again!</p>
                    {{ Form::open(['route' => 'auth.login']) }}
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) }}
                            <i class="ik ik-user"></i>
                            {!! $errors->first('email', '<span class="help-block"><strong>:message</strong></span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'] ) }}
                            <i class="ik ik-lock"></i>
                            {!! $errors->first('password', '<span class="help-block"><strong>:message</strong></span>') !!}
                        </div>
                        <div class="row">
                            <div class="col text-left">
                                <label class="custom-control custom-checkbox">
                                    {{ Form::checkbox('remember', 1, null, ['class' => 'custom-control-input']) }}
                                    <span class="custom-control-label">{!! Html::nbsp() !!}Remember Me</span>
                                </label>
                            </div>
                            <div class="col text-right">
                                <a href="#forgot-password.html">Forgot Password ?</a>
                            </div>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Sign In</button>
                        </div>
                    {{ Form::close() }}

                    <div class="register">
                        <p>Don't have an account? <a href="#register.html">Create an account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection