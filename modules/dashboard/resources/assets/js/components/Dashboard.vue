<template>
    <el-select v-model="value" placeholder="Select"><el-option v-for="item in options" :key="item.value" :label="item.label" :value="item.value"></el-option></el-select>
</template>

<script>

    export default {
        name: "vue-dashboard",
        data() {
            return {
                message: 'Dashboard',
                loading: true,
                options: [{
                    value: 'Option1',
                    label: 'Option1'
                }, {
                    value: 'Option2',
                    label: 'Option2'
                }, {
                    value: 'Option3',
                    label: 'Option3'
                }, {
                    value: 'Option4',
                    label: 'Option4'
                }, {
                    value: 'Option5',
                    label: 'Option5'
                }],
                value: ''
            }
        },
        methods: {
            loadingTimeout() {
                setTimeout(() => {
                    this.loading = false
                }, 300);
            },

        },
        mounted() {
            this.loadingTimeout();
        }
    }
</script>