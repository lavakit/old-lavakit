<template>
    <div v-loading.fullscreen="loading">
        {{ message }}
    </div>
</template>

<script>

    export default {
        name: "lavakit-dashboard",
        props: {
            pageTitle: {default: null, String},
        },
        created () {
            this.setPageTitle(this.trans(this.pageTitle));
        },
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
                }, 1000);
            },

        },
        mounted() {
            this.loadingTimeout();
        }
    }
</script>