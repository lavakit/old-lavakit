<template>
    <div class="auth-wrapper" id="app">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="#"><img :src="assets('images/logo.png')" alt=""></a>
                        </div>
                        <h4>{{ trans('user::auth.html.sign_in') }}</h4>
                        <p>{{ trans('user::auth.html.see_you_again') }}</p>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control"
                                   :placeholder="trans('user::auth.html.email')" />
                            <i class="ik ik-user"></i>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control"
                                   :placeholder="trans('user::auth.html.password')" />
                            <i class="ik ik-lock"></i>
                        </div>

                        <div class="row">
                            <div class="col text-left">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" value="1" class="custom-control-input" />
                                    <span class="custom-control-label">
                                        &nbsp;{{ trans('user::auth.html.remember') }}
                                    </span>
                                </label>
                            </div>

                            <div class="col text-right">
                                <router-link :to="{ name: 'admin.forgot' }">
                                    {{ trans('user::auth.html.forgot_password') }}
                                </router-link>
                            </div>
                        </div>

                        <div class="sign-btn text-center">
                            <button class="btn btn-success">
                                <i class="ik ik-check-circle"></i>
                                {{ trans('user::auth.html.sign_in') }}
                            </button>
                        </div>

                        <div class="register">
                            <p>
                                {{ trans('user::auth.html.not_account')}}
                                &nbsp;
                                <router-link :to="{ name: 'admin.register' }">
                                    {{ trans('user::auth.html.create_account')}}
                                </router-link>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" :style="{ 'background-image': 'url(' + assets('images/auth/login-bg.jpg') + ')' }">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "vue-login",
    }
</script>