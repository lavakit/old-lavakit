<template>
    <vue-topprogress ref="topProgress"></vue-topprogress>
</template>

<script>
    import { vueTopprogress } from 'vue-top-progress'

    export default {
        mounted () {
            this.$refs.topProgress.start()
            setTimeout(() => {
                this.$refs.topProgress.done()
            }, 300)
        },
        components: {
            vueTopprogress
        }
    }
</script>

<style scoped>
    .top-progress{
        background-color: rgb(45, 206, 137) !important;
        height: 2px !important;
    }
</style>