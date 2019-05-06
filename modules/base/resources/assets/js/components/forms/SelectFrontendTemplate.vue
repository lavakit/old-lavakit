<template>
    <div class="form-group">
        <label :for="nameKey">
            {{ trans(`setting::setting.generals.${inputName}`) }}
        </label>
        <select class="form-control"
               :id="nameKey"
               :name="nameKey">
            <option v-for="name in themeName" :value="name">
                {{ name }}
            </option>
        </select>
    </div>
</template>

<script>
    import { ALL_FRONTEND_THEME } from "../../config";

    export default {
        name: "lavakit-select-frontend-template",
        props: {
            configName: {default: 'global', String},
            inputName: {
                type: String,
                required: true,
                default: null
            },
            inputInfo: {
                type: Object,
                required: true,
                default: () => null,
            }
        },

        data() {
            return {
                themeName: {default: null, Array},
            }
        },

        created() {
            this.themeName = ALL_FRONTEND_THEME;
        },

        computed: {
            nameKey() {
                return `${this.setGroupConfig(this.inputInfo.group_name)}::${this.inputName}`;
            }
        },

        methods: {
            setGroupConfig(groupName) {
                if (typeof groupName === 'undefined') {
                    return this.configName;
                }

                return groupName;
            }
        }
    }
</script>
