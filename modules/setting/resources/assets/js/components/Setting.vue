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
            <div :class="widgetClass" v-for="(setting, nameWidget) in settings">
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
                                                        :group="nameWidget"
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

                                            <div class="form-group" v-if="field.view === 'select-locale'">
                                                <label :for="setNameField(nameWidget, name)">
                                                    {{ trans(`${field.name}`) }}
                                                </label>
                                                <el-select
                                                        v-model="formData[name]"
                                                        multiple
                                                        filterable
                                                        size="larg"
                                                        placeholder="Select">
                                                    <el-option
                                                            v-for="item in options"
                                                            :key="item.value"
                                                            :label="item.label"
                                                            :value="item.value">
                                                    </el-option>
                                                </el-select>
                                            </div>

                                            <div class="form-group" v-else-if="field.view === 'checkbox'">
                                                <div class="checkbox-fade fade-in-success">
                                                    <label :for="setNameField(name, nameWidget)">
                                                        <input type="checkbox"
                                                               :name="setNameField(name, nameWidget)"
                                                               :id="setNameField(name, nameWidget)"
                                                               value="1"
                                                               v-model="formData[name]">
                                                        <span class="cr">
                                                            <i class="cr-icon ik ik-check txt-success"></i>
                                                        </span>
                                                        <span>{{ trans(`${field.name}`) }}</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group" v-else-if="field.view === 'radio'">
                                                <label :for="setNameField(nameWidget, name)">
                                                    {{ trans(`${field.name}`) }}
                                                </label>
                                                <div class="form-radio">
                                                    <div v-for="(label, value) in field.options"
                                                         class="radio radio-outline radio-success radio-inline">
                                                        <label>
                                                            <input type="radio"
                                                                   :id="setNameField(nameWidget, name)"
                                                                   :name="setNameField(nameWidget, name)"
                                                                   :value="value"
                                                                   v-model="formData[name]">
                                                            <i class="helper"></i>
                                                            {{ trans(`${label}`) }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" v-else-if="field.view === 'select-frontend-template'">
                                                <label :for="setNameField(nameWidget, name)">
                                                    {{ trans(`${field.name}`) }}
                                                </label>
                                                <el-select
                                                        v-model="formData[name]"
                                                        filterable
                                                        size="larg"
                                                        :placeholder="trans(`${field.description}`)">
                                                    <el-option
                                                            v-for="val in frontendTheme"
                                                            :key="val"
                                                            :label="val"
                                                            :value="val">
                                                    </el-option>
                                                </el-select>
                                            </div>

                                            <lavakit-form-filed v-else v-model="formData[name]"
                                                                :group="nameWidget"
                                                                :name-field="name"
                                                                :info-field="field">
                                            </lavakit-form-filed>
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
    import { CURRENT_LOCALE, ALL_FRONTEND_THEME } from "@modules/base/resources/assets/js/config";
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
            this.frontendTheme = ALL_FRONTEND_THEME;
        },

        data () {
            return {
                loading: true,
                message: this.$t(`${'base::base'}['${'notify.message.error.form'}']`),
                widgetClass: null,
                settings: {},
                activeTranslatable: {},
                activeNonTranslatable: 'first',
                configName: {default: 'global', String},

                form: new Form(),
                formData: {},
                filterData: {},

                options: [
                    {value: 'en', label: 'English'},
                    {value: 'vi', label: 'Vietnamese'},
                    {value: 'fr', label: 'Frant'},
                ],
                optionLocale: [],

                frontendTheme: {default: null, Array},
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
                this.widgetClass = _.size(data.data.settings) > 1 ? 'col-md-6' : 'col-md-12';
            },

            setFilterData() {
                this.formData = {...this.filterData};
            },

            setNameField(group, name, locale = null) {
                if (locale === null) {
                    return `${this.setGroupConfig(group)}::${name}`;
                }

                return `${this.setGroupConfig(group)}::${name}[${locale}]`;
            },

            setGroupConfig(groupName) {
                if (typeof groupName === 'undefined') {
                    return this.configName;
                }

                return groupName;
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