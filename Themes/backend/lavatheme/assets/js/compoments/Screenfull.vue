<template>
    <div>
        <button type="button" id="navbar-fullscreen" class="nav-link" @click="click">
            <i v-if="isScreenFull" class="ik ik-minimize"></i>
            <i v-else class="ik ik-maximize"></i>
        </button>
    </div>
</template>

<script>
    import screenfull  from 'screenfull';

    export default {
        data() {
            return {
                isScreenFull: false
            }
        },
        mounted() {
            this.init()
        },
        beforeDestroy() {
            this.destroy()
        },
        methods: {
            click() {
                if (!screenfull.enabled) {
                    this.$message({
                        message: 'you browser can not work',
                        type: 'warning'
                    });
                    return false
                }
                screenfull.toggle()
            },
            change() {
                this.isScreenFull = screenfull.isScreenFull
            },
            init() {
                if (screenfull.enabled) {
                    screenfull.on('change', this.change)
                }
            },
            destroy() {
                if (screenfull.enabled) {
                    screenfull.off('change', this.change)
                }
            }
        }
    }
</script>