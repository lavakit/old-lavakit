<template>
    <div class="form-group">
        <label :for="name">
            {{ trans(`setting::setting.generals.${nameField}`) }}
        </label>

        <input v-if="infoField.view === 'text'"
               type="text" class="form-control" ref="input"
               @input="handleInput"
               :id="name"
               :name="name"
               :placeholder="trans(infoField.description)"/>

        <textarea v-else-if="infoField.view === 'textarea'"
                class="form-control" row="5" ref="textarea"
                  @input="handleInput"
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
            value: [String, Number, Array],
            group: {default: '', String},
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

        watch: {
            nativeInputValue() {
                this.setNativeInputValue();
            }
        },

        computed: {
            name() {
                if (this.locale === null) {
                    return `${this.setGroupConfig(this.group)}::${this.nameField}`;
                }

                return `${this.setGroupConfig(this.group)}::${this.nameField}[${this.locale}]`;
            },

            nativeInputValue() {
                return this.value === null || this.value === undefined ? '' : String(this.value);
            },
        },

        methods: {
            setGroupConfig(groupName) {
                if (typeof groupName === 'undefined') {
                    return this.configName;
                }

                return groupName;
            },

            setNativeInputValue() {
                const input = this.getInput();
                
                if (!input) return;
                if (input.value === this.nativeInputValue) return;

                input.value = this.nativeInputValue;

            },

            handleInput (event) {
                if (event.target.value === this.nativeInputValue) return;
                this.$emit('input', event.target.value);
                this.$nextTick(this.setNativeInputValue);
            },

            getInput() {
                return this.$refs.input || this.$refs.textarea;
            }
        },

        mounted() {
            this.setNativeInputValue();
        }
    }
</script>
