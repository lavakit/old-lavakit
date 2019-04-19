<template>
    <div class="auth-wrapper" id="app">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0"  v-loading.body="loading">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="#"><img :src="assets('images/logo.png')" alt=""></a>
                        </div>
                        <h4>{{ trans('user::auth.html.sign_in') }}</h4>
                        <p>{{ trans('user::auth.html.see_you_again') }}</p>

                        <el-form ref="form"
                                 :model="auth"
                                 label-width="120px"
                                 label-position="top"
                                 @keydown="form.errors.clear($event.target.name);">
                            <div class="form-group">
                                <input type="email" name="email"
                                       v-model="auth.email"
                                       :class="['form-control', {'has-error': form.errors.first('email')}]"
                                       :placeholder="trans('user::auth.html.email')" />
                                <i class="ik ik-user"></i>
                                <span class="help-block" v-if="form.errors.has('email')">{{ form.errors.first('email') }}</span>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password"
                                       v-model="auth.password"
                                       :class="['form-control', {'has-error': form.errors.first('password')}]"
                                       :placeholder="trans('user::auth.html.password')" />
                                <i class="ik ik-lock"></i>
                                <span class="help-block" v-if="form.errors.has('password')">{{ form.errors.first('password') }}</span>
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
                                <el-button type="primary" class="btn btn-success" @click="onSubmit()" :loading="loading">
                                    <i class="ik ik-check-circle"></i>
                                    {{ trans('user::auth.html.sign_in') }}
                                </el-button>
                            </div>
                        </el-form>

                        <div class="register">
                            <p>
                                {{ trans('user::auth.html.not_account')}}
                                &nbsp;&nbsp;
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
    import Form from '@packages/form-backend-validation';

    export default {
        name: "vue-login",
        data() {
            return {
                auth: {
                    email: '',
                    password: ''
                },
                form: new Form(),
                loading: false,
            };
        },
        created () {
            if (window.localStorage.getItem('access_token')){
                this.$store.dispatch('user/getUser')
            }
        },
        methods: {
            onSubmit() {
                this.form = new Form(this.auth);
                this.loading = true;

                this.form.post(route('api.auth.login'))
                    .then((response) => {
                        this.loading = false;
                        window.localStorage.setItem('access_token', response.data.access_token);

                        this.$message({
                            type: 'success',
                            message: response.message,
                        });

                        this.$router.push({ name: 'admin.dashboards.index' });
                    })
                    .catch((error) => {
                        this.loading = false;
                        this.$notify.error({
                            title: 'Error',
                            message: 'There are some errors in the form.',
                        });
                    });
            }
        }
    }
</script>