<template>
    <div>
        <lavakit-text v-if="fieldType === 'text'"></lavakit-text>
        <lavakit-checkbox v-if="fieldType === 'checkbox'"></lavakit-checkbox>
        <lavakit-select v-if="fieldType === 'select'"></lavakit-select>
    </div>
</template>

<script>
    import LavakitText from './forms/Text';
    import LavakitCheckbox from './forms/Checkbox';
    import LavakitSelect from './forms/Select';

    export default {
        name: "lavakit-form-field",
        components: {
            LavakitText,
            LavakitCheckbox,
            LavakitSelect
        },
        props: ['fieldType']
    }
</script>
