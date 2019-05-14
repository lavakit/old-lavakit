<template>
    <div v-loading.fullscreen="loading">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-settings"></i>
                        <div class="d-inline">
                            <h5>{{ trans(pageTitle) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <lavakit-breadcrumb :list="list"></lavakit-breadcrumb>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-6" v-for="(setting, nameWidget) in settings">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ trans(`setting::setting.tab.${nameWidget}`) }}</h3>
                    </div>
                    <div class="card-body">
                        <template v-for="(fields, translatable) in setting">
                            <template v-if="translatable === 'is_translatable'">
                                <el-tabs v-model="activeTranslatable[nameWidget]">
                                    <template v-for="(locale, shortLang) in locales">
                                        <el-tab-pane :label="trans(`setting::setting.tab.locales.${locale.name}`)" :name="shortLang">
                                            <template v-for="(field, name) in fields">
                                                <lavakit-form-filed
                                                        v-model="formData[shortLang][name]"
                                                        :locale="shortLang" :name-field="name" :info-field="field">
                                                </lavakit-form-filed>
                                            </template>
                                        </el-tab-pane>
                                    </template>
                                </el-tabs>
                            </template>

                            <template v-else>
                                <el-tabs v-model="activeNonTranslatable">
                                    <el-tab-pane :label="trans('setting::setting.tab.locales.' + translatable)"
                                                 name="first">
                                        <template v-for="(field, name) in fields">

                                            <el-select v-if="field.view === 'select-locale'"
                                                       v-model="optionLocale"
                                                       multiple
                                                       size="larg"
                                                       placeholder="Select">
                                                <el-option
                                                        v-for="item in options"
                                                        :key="item.value"
                                                        :label="item.label"
                                                        :value="item.value">
                                                </el-option>
                                            </el-select>

                                            <lavakit-form-filed v-else :name-field="name" :info-field="field" />
                                        </template>
                                    </el-tab-pane>
                                </el-tabs>
                            </template>
                        </template>

                        <button type="button" class="btn btn-danger mr-2 float-right" @click="onSubmitGeneral()">
                            <i class="ik ik-check-circle"></i>
                            Save
                        </button>
                    </div>
                </div>
            </div>

            <!--<div class="col-xl-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Language</h3>
                    </div>
                    <div class="card-block">
                        <div class="form-group">
                            <label> Site locales</label>
                            <input type="text" class="form-control" id="locale" name="locale" placeholder="Locale">
                        </div>
                        <div class="form-group">
                            <div class="checkbox-fade fade-in-success">
                                <label>
                                    <input type="checkbox" name="hide_locale" value="1">
                                    <span class="cr">
                                        <i class="cr-icon ik ik-check txt-success"></i>
                                    </span>
                                    <span>Hide default locale in Uri</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-fade fade-in-success">
                                <label>
                                    <input type="checkbox" name="use_icon" value="1">
                                    <span class="cr">
                                        <i class="cr-icon ik ik-check txt-success"></i>
                                    </span>
                                    <span>Show icon</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Text Position</label>
                            <input type="text" class="form-control" id="position" name="position" placeholder="Text position">
                        </div>
                        <button type="submit" class="btn btn-danger mr-2 float-right">
                            <i class="ik ik-check-circle"></i>
                            Save
                        </button>
                    </div>
                </div>
            </div>
            -->

        </div>
    </div>
</template>

<script>
    import { CURRENT_LOCALE } from "@modules/base/resources/assets/js/config";
    import SettingApi from '@modules/setting/resources/assets/js/api/setting.js';
    import LavakitBreadcrumb from '@modules/base/resources/assets/js/components/Breadcrumb';
    import LavakitFormFiled from './FormField';
    import Form from '@packages/form-backend-validation';

    export default {
        name: 'lavakit-setting',
        components: {
            LavakitBreadcrumb,
            LavakitFormFiled,
        },

        props: {
            locales: {default: null},
            pageTitle: {default: null, String}
        },

        beforeRouteEnter(to, from, next) {
            SettingApi.getSetting(to.params.type)
                .then((response) => {
                    next(app => {
                        app.setSettings(response.data);
                        app.setFilterData();
                    });
                })
                .catch((error) => {
                    next(app => {
                        app.customError(error);
                    });
                });
        },

        beforeRouteUpdate(to, from, next) {
            this.loading = true;
            SettingApi.getSetting(to.params.type)
                .then((response) => {
                    this.loading = false;
                    this.setSettings(response.data);
                    this.setFilterData();
                })
                .catch((error) => {
                    this.loading = false;
                    this.customError(error);
                });
            next();
        },

        created () {
            this.setPageTitle(this.trans(this.pageTitle));
        },

        data () {
            return {
                loading: true,
                message: this.$t(`${'base::base'}['${'notify.message.error.form'}']`),
                settings: {},
                activeTranslatable: {},
                activeNonTranslatable: 'first',

                form: new Form(),
                formData: {},
                filterData: {},

                options: [
                    {value: 'Option1', label: 'Option1'},
                    {value: 'Option2', label: 'Option2'},
                    {value: 'Option3', label: 'Option3'},
                ],
                optionLocale: [],
            };
        },

        methods: {
            onSubmitGeneral() {
                this.form = new Form(this.formData);
                this.loading = true;

                this.form.post(route('api.settings.post_setting'))
                    .then((response) => {
                        this.loading = false;

                        if (response.success) {
                            this.$notify.success({
                                title: this.$t(`${'base::base'}['${'notify.title.success'}']`),
                                message: response.message
                            });
                        }

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
            setSettings(data) {
                this.settings = data.data.settings;
                this.filterData = data.data.filterData;
                this.activeTranslatable = {...data.data.activeTranslatable}
            },

            setFilterData() {
                this.formData = {...this.filterData};
            },
        },

        mounted () {
            setTimeout(() => {
                this.loading = false;
            }, 2000)
        },

        computed: {
            list() {
                return this.$route.matched;
            },
        },
    }
</script>