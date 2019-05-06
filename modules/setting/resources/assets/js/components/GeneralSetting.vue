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
                        <h3>{{ nameWidget }}</h3>
                    </div>
                    <div class="card-body">
                        <template v-for="(fields, translatable) in setting">
                            <template v-if="translatable === 'is_translatable'">
                                <el-tabs v-model="activeTranslatable">
                                    <template v-for="(locale, shortLang) in locales">
                                        <el-tab-pane :label="trans(`setting::setting.tab.locales.${locale.name}`)" :name="shortLang">
                                            <template v-for="(field, name) in fields">
                                                <lavakit-form-filed :locale="shortLang" :name-field="name" :info-field="field" />
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
                                            <lavakit-form-filed :name-field="name" :info-field="field" />
                                        </template>
                                    </el-tab-pane>
                                </el-tabs>
                            </template>
                        </template>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-md-6">
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
        </div>
    </div>
</template>

<script>
    import { CURRENT_LOCALE } from "@modules/base/resources/assets/js/config";
    import SettingApi from '@modules/setting/resources/assets/js/api/setting.js';
    import LavakitBreadcrumb from '@modules/base/resources/assets/js/components/Breadcrumb';
    import LavakitFormFiled from '@modules/base/resources/assets/js/components/FormField';

    export default {
        name: 'lavakit-setting-general',
        components: {
            LavakitBreadcrumb,
            LavakitFormFiled,
        },

        props: {
            locales: {default: null},
            pageTitle: {default: null, String}
        },

        created () {
            this.setPageTitle(this.trans(this.pageTitle));
            this.fetchData();
        },

        data () {
            return {
                loading: false,
                settings: {
                    type: Array,
                    required: true,
                    default: () => []
                },
                dbSettings: {
                    type: Array,
                    required: true,
                    default: () => []
                },
                activeTranslatable: CURRENT_LOCALE,
                activeNonTranslatable: 'first',
            }
        },

        methods: {
            fetchData () {
                this.loading = true;

                SettingApi.getSettingGeneral()
                    .then((response) => {
                        if (response.data && response.data.success) {
                            this.settings = response.data.data.settings;
                            this.dbSettings = response.data.data.dbSettings;
                        }

                        this.loading = false;
                    })
                    .catch((error) => {
                        this.loading = false;
                        this.customError(error);
                    });
            },
        },

        computed: {
            list() {
                return this.$route.matched;
            },
        },
    }
</script>