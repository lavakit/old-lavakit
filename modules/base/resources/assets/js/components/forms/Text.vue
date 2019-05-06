<template>
    <div class="form-group" v-if="inputInfo.translatable">
        <label :for="nameKey">
            {{ trans(`setting::setting.generals.${inputName}`) }}
        </label>
        <input type="text"
               class="form-control"
               :id="nameKey"
               :name="nameKey"
               :placeholder="trans(inputInfo.description)">
    </div>

    <div class="form-group" v-else>
        <label :for="nameKey">
            {{ trans(`setting::setting.generals.${inputName}`) }}
        </label>
        <input type="text" class="form-control" :id="nameKey" :name="nameKey" placeholder="Text position">
    </div>
</template>

<script>
    export default {
        name: "lavakit-text",
        props: {
            locale: {default: null, String},
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

        computed: {
            nameKey() {
                if (this.locale === null) {
                    return `${this.setGroupConfig(this.inputInfo.group_name)}::${this.inputName}`;
                }

                return `${this.setGroupConfig(this.inputInfo.group_name)}::${this.inputName}[${this.locale}]`;
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
