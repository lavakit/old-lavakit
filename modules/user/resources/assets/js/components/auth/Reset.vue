<template>
    <div class="auth-wrapper" id="app">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0" v-loading.body="loading">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="#"><img :src="assets('images/logo.png')" alt=""></a>
                        </div>
                        <h4>{{ trans('user::auth.html.reset') }}</h4>
                        <p>{{ trans('user::auth.html.reset_logan') }}</p>

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
                                       autocomplete="off"
                                       :class="['form-control', {'has-error': form.errors.first('password')}]"
                                       :placeholder="trans('user::auth.html.password')" />
                                <i class="ik ik-lock"></i>
                                <span class="help-block" v-if="form.errors.has('password')">{{ form.errors.first('password') }}</span>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password_confirmation"
                                       v-model="auth.password_confirmation"
                                       autocomplete="off"
                                       :class="['form-control', {'has-error': form.errors.first('password_confirmation')}]"
                                       :placeholder="trans('user::auth.html.password_confirm')" />
                                <i class="ik ik-eye-off"></i>
                                <span class="help-block" v-if="form.errors.has('password_confirmation')">{{ form.errors.first('password_confirmation') }}</span>
                            </div>

                            <div class="sign-btn text-center">
                                <el-button type="primary" class="btn btn-success" @click="onSubmit()" :loading="loading">
                                    <i class="ik ik-check-circle"></i>
                                    {{ trans('user::auth.html.reset') }}
                                </el-button>
                            </div>
                        </el-form>

                        <div class="register" v-if="allowRegister">
                            <p>
                                {{ trans('user::auth.html.not_account')}}
                                <router-link :to="{name: 'admin.register'}">
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
    import axios from '@packages/axios';

    export default {
        name: "lavakit-reset-password",
        props: {
            pageTitle: {default: null, String},
        },
        created () {
            document.title = this.trans(this.pageTitle);
            this.params.token = this.$route.params.token;
            
            if (!this.params.token) {
                this.$notify.error({
                    title: this.$t(`${'base::base'}['${'notify.title.error'}']`),
                    message: this.$t(`${'user::auth'}['${'messages.reset.token_not_found'}']`),
                });
            }

            this.checkToken(this.params.token);
        },

        data () {
            return {
                auth: {
                    email: '',
                    password: '',
                    password_confirmation: '',
                    token: '',
                },
                params:  {
                    token: ''
                },
                allowRegister: window.Lavakit.allowRegister,
                form:  new Form(),
                loading: false,
                message: this.$t(`${'base::base'}['${'notify.message.error.form'}']`)
            }
        },
        methods: {
            checkToken(token) {
                this.loading = true;
                axios.get(route('api.auth.token', {token: token}))
                    .then((response) => {
                        this.loading = false;
                        if(response.data && response.data.success) {
                            this.auth.token = response.data.data.token;
                            this.auth.email = response.data.data.email;
                        }
                    })
                    .catch((error) => {
                        this.loading = false;
                        if (error.response.status === 400) {
                            this.$notify.error({
                                title: this.$t(`${'base::base'}['${'notify.title.error'}']`),
                                message: error.response.data.message
                            });
                        }
                    });
            },

            onSubmit() {
                this.form = new Form(this.auth);
                this.loading = true;

                this.form.post(route('api.auth.reset'))
                    .then((response) => {
                        this.loading = false;
                        if (response.success) {
                            this.$notify.success({
                                title: this.$t(`${'base::base'}['${'notify.title.success'}']`),
                                message: response.message
                            });

                            this.$router.push({name: 'admin.login'});
                        }
                    })
                    .catch((error) => {
                        this.loading = false;

                        if (error.response && error.response.data) {
                            if (error.response.status === 400) {
                                this.message = error.response.data.message;
                            }

                            this.$notify.error({
                                title: this.$t(`${'base::base'}['${'notify.title.error'}']`),
                                message: this.message,
                            });
                        } else {
                            console.log(JSON.stringify(error));
                        }
                    });
            }
        }
    }
</script>
