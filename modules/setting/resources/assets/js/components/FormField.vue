<template>
    <div class="form-group">
        <label :for="name">
            {{ trans(`setting::setting.generals.${nameField}`) }}
        </label>

        <input v-if="infoField.view === 'text'"
                type="text" class="form-control" ref="input"
               :value="dataValue"
               @input="updateData($event.target.value)"
               :id="name"
               :name="name"
               :placeholder="trans(infoField.description)" />

        <textarea v-else-if="infoField.view === 'textarea'"
                class="form-control" row="5"
                  :id="name"
                  :name="name"
                  :placeholder="trans(infoField.description)">
        </textarea>

        <select v-else-if="infoField.view === 'select-frontend-template'"
                class="form-control"
                :id="name"
                :name="name">
            <option v-for="name in frontendTheme" :value="name">
                {{ name }}
            </option>
        </select>
    </div>
</template>

<script>
    import { ALL_FRONTEND_THEME } from "@modules/base/resources/assets/js/config";

    export default {
        name: "lavakit-form-field",

        props: {
            locale: {default: null, String},
            nameField: {
                type: String,
                required: true,
                default: null
            },
            infoField: {
                type: Object,
                required: true,
            },
            dataValue: {default: null}
        },

        data() {
            return {
                configName: {default: 'global', String},
                frontendTheme: {default: null, Array},
            }
        },

        created() {
            this.frontendTheme = ALL_FRONTEND_THEME;
        },

        computed: {
            name() {
                if (this.locale === null) {
                    return `${this.setGroupConfig(this.infoField.group_name)}::${this.nameField}`;
                }

                return `${this.setGroupConfig(this.infoField.group_name)}::${this.nameField}[${this.locale}]`;
            }
        },

        methods: {
            setGroupConfig(groupName) {
                if (typeof groupName === 'undefined') {
                    return this.configName;
                }

                return groupName;
            },

            updateData (value) {
                this.$emit("input", value);
            }
        }
    }
</script>
