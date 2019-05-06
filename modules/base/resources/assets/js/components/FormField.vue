<template>
    <div>
        <lavakit-text v-if="infoField.view === 'text'"
                      :locale="locale"
                      :input-name="nameField"
                      :input-info="pushInfo"></lavakit-text>

        <lavakit-checkbox v-if="infoField.view === 'checkbox'"></lavakit-checkbox>

        <lavakit-select v-if="infoField.view === 'select'"></lavakit-select>

        <lavakit-textarea v-if="infoField.view === 'textarea'"
                          :locale="locale"
                          :input-name="nameField"
                          :input-info="pushInfo"></lavakit-textarea>

        <lavakit-select-frontend-template v-if="infoField.view === 'select-frontend-template'"
                                          :input-name="nameField"
                                          :input-info="pushInfo"></lavakit-select-frontend-template>
    </div>
</template>

<script>
    import LavakitText from './forms/Text';
    import LavakitCheckbox from './forms/Checkbox';
    import LavakitSelect from './forms/Select';
    import LavakitTextarea from './forms/Textarea';
    import LavakitSelectFrontendTemplate from './forms/SelectFrontendTemplate';

    export default {
        name: "lavakit-form-field",
        components: {
            LavakitText,
            LavakitCheckbox,
            LavakitSelect,
            LavakitTextarea,
            LavakitSelectFrontendTemplate
        },
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
        },
        computed: {
            pushInfo() {
                return this.infoField;
            }
        }
    }
</script>
