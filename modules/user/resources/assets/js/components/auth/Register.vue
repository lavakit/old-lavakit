<template>
    <div class="auth-wrapper" id="app">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0" v-loading.body="loading">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="#"><img :src="assets('images/logo.png')" alt=""></a>
                        </div>
                        <h4>{{ trans('user::auth.html.register') }}</h4>
                        <p>{{ trans('user::auth.html.join_step') }}</p>

                        <el-form ref="form"
                                 :model="auth"
                                 label-width="120px"
                                 label-position="top"
                                 @keydown="form.errors.clear($event.target.name);">

                            <div class="row">
                                <div class="col text-left">
                                    <div class="form-group">
                                        <input type="text" name="first_name"
                                               v-model="auth.first_name"
                                               :class="['form-control', {'has-error': form.errors.first('first_name')}]"
                                               :placeholder="trans('user::auth.html.first_name')" />
                                        <i class="ik ik-user"></i>
                                        <span class="help-block" v-if="form.errors.has('first_name')">{{ form.errors.first('first_name') }}</span>
                                    </div>
                                </div>

                                <div class="col text-left">
                                    <div class="form-group">
                                        <input type="text" name="last_name"
                                               v-model="auth.last_name"
                                               :class="['form-control', {'has-error': form.errors.first('last_name')}]"
                                               :placeholder="trans('user::auth.html.last_name')" />
                                        <i class="ik ik-user"></i>
                                        <span class="help-block" v-if="form.errors.has('last_name')">{{ form.errors.first('last_name') }}</span>
                                    </div>
                                </div>
                            </div>

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

                            <div class="form-group">
                                <input type="password" name="password_confirmation"
                                       v-model="auth.password_confirmation"
                                       :class="['form-control', {'has-error': form.errors.first('password_confirmation')}]"
                                       :placeholder="trans('user::auth.html.password_confirm')" />
                                <i class="ik ik-eye-off"></i>
                                <span class="help-block" v-if="form.errors.has('password_confirmation')">{{ form.errors.first('password_confirmation') }}</span>
                            </div>

                            <div class="row">
                                <div class="col-12 text-left">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="accept" value="1" class="custom-control-input" />
                                        <span class="custom-control-label">
                                            &nbsp;{{ trans('user::auth.html.term_condition') }}
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="sign-btn text-center">
                                <el-button type="primary" class="btn btn-success" @click="onSubmit()" :loading="loading">
                                    <i class="ik ik-check-circle"></i>
                                    {{ trans('user::auth.html.create_account') }}
                                </el-button>
                            </div>

                            <div class="register">
                                <p>
                                    {{ trans('user::auth.html.has_account') }}
                                    <router-link :to="{ name: 'admin.login'}">
                                        {{ trans('user::auth.html.sign_in') }}
                                    </router-link>
                                </p>
                            </div>
                        </el-form>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" :style="{ 'background-image': 'url(' + assets('images/auth/register-bg.jpg') + ')' }">
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
        name: "lavakit-register",
        props: {
            pageTitle: {default: null, String},
        },
        created () {
            this.setPageTitle(this.trans(this.pageTitle));
        },
        data () {
            return {
                auth: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                form: new Form(),
                loading: false,
                message: this.$t(`${'base::base'}['${'notify.message.error.form'}']`)
            }
        },
        methods: {
            onSubmit() {
                this.form = new Form(this.auth);
                this.loading = true;

                this.form.post(route('api.auth.register'))
                    .then((response) => {
                        this.loading = false;

                        if (response.success) {
                            this.$notify.success({
                                title: this.$t(`${'base::base'}['${'notify.title.success'}']`),
                                message: response.message
                            });
                        }

                        this.$router.push({name: 'admin.login'});
                    })
                    .catch((error) => {
                        this.loading = false;

                        if (error.response && error.response.data) {
                            this.$notify.error({
                                title: this.$t(`${'base::base'}['${'notify.title.error'}']`),
                                message: this.message,
                            });
                        } else {
                            console.log(JSON.stringify(error));
                        }
                    });
            },
        },
    }
</script>