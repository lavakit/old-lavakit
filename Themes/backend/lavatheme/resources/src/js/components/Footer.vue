<template>
    <footer class="footer">
        <div class="w-100 clearfix">
        <span class="text-center text-sm-left d-md-inline-block">
            Copyright © 2018 - {{ year }} {{ crafted }} {{ version }} All Rights Reserved.
        </span>
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">
            Crafted with
            <i class="fa fa-heart text-danger"></i> by
            <a href="#" class="text-dark" target="_blank">{{ crafted }}</a>
        </span>
        </div>
    </footer>
</template>

<script>
    const CRAFTED = window.Lavakit.created;
    const VERSION = window.Lavakit.version;

    export default {
        name: "vue-footer",
        data() {
            return {
                crafted: CRAFTED,
                version : VERSION,
                year: new Date().getFullYear()
            }
        }
    }
</script>