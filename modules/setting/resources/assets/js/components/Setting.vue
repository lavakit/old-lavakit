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
                                        <el-tab-pane :label="trans(`setting::setting.tab.locales.${shortLang}`)" :name="shortLang">
                                            <template v-for="(field, name) in fields">
                                                <lavakit-form-filed
                                                        v-model="formData[setNameField(nameWidget, name)][shortLang]"
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
                                                        v-model="formData[setNameField(nameWidget, name)]"
                                                        multiple
                                                        filterable
                                                        size="larg"
                                                        placeholder="Select">
                                                    <el-option
                                                            v-for="(item, locale) in availableLocales"
                                                            :key="locale"
                                                            :label="item.name"
                                                            :value="locale">
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
                                                               v-model="formData[setNameField(nameWidget, name)]">
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
                                                                   v-model="formData[setNameField(nameWidget, name)]">
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
                                                        v-model="formData[setNameField(nameWidget, name)]"
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

                                            <lavakit-form-filed v-else v-model="formData[setNameField(nameWidget, name)]"
                                                                :group="nameWidget"
                                                                :name-field="name"
                                                                :info-field="field">
                                            </lavakit-form-filed>
                                        </template>
                                    </el-tab-pane>
                                </el-tabs>
                            </template>
                        </template>

                        <button type="button" class="btn btn-danger float-right" @click="onSubmitGeneral()">
                            <i class="ik ik-check-circle"></i>
                            Save
                        </button>
                    </div>
                </div>
            </div>
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
        },

        beforeRouteEnter(to, from, next) {
            to.meta.breadcrumb = `setting::setting.page_title.${to.params.type}`;

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
            to.meta.breadcrumb = `setting::setting.page_title.${to.params.type}`;
            this.setTitle(to.params.type);

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

                frontendTheme: {default: null, Array},
                availableLocales: {default: null, Array},
                pageTitle: 'setting::setting.page_title.setting',
            };
        },

        methods: {
            onSubmitGeneral() {
                this.form = new Form(this.formData);
                this.loading = true;

                this.form.post(route('api.settings.store'))
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
                this.activeTranslatable = {...data.data.activeTranslatable};
                this.availableLocales = data.data.availableLocales;
                this.widgetClass = _.size(data.data.settings) > 1 ? 'col-md-12' : 'col-md-12';
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

            setTitle(type) {
                this.pageTitle = `setting::setting.page_title.${type}`;
                this.setPageTitle(this.trans(this.pageTitle));
            }
        },

        mounted () {
            setTimeout(() => {
                this.loading = false;
            }, 2000);
        },

        computed: {
            list() {
                return this.$route.matched;
            },
        },
    }
</script>