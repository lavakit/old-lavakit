<template>
    <h1 v-loading.fullscreen="loading">
        {{ message }}
    </h1>
</template>

<script>
    export default {
        name: "vue-dashboard",
        data() {
            return {
                message: 'Dashboard',
                loading: true
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