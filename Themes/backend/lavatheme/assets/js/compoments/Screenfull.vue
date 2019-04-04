<template>
    <div>
        <fullscreen ref="fullscreen" @change="fullscreenChange">
            Content
        </fullscreen>
        <!--  deprecated
          <fullscreen :fullscreen.sync="fullscreen">
            Content
          </fullscreen>
        -->
        <button type="button" @click="toggle" >Fullscreen</button>
        <vue-screenfull>

        </vue-screenfull>

        <!--<button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>-->
    </div>
</template>

<script>
    import fullscreen from 'vue-fullscreen'
    import Vue from 'vue'
    Vue.use(fullscreen)
    export default {
        methods: {
            toggle () {
                this.$refs['fullscreen'].toggle() // recommended
                // this.fullscreen = !this.fullscreen // deprecated
            },
            fullscreenChange (fullscreen) {
                this.fullscreen = fullscreen
            }
        },
        data() {
            return {
                fullscreen: false
            }
        }
    }
</script>