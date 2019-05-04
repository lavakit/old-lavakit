<template>
    <div class="auth-wrapper" id="app">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                    <div class="authentication-form page-error mx-auto">
                        <h1>404</h1>
                        <p>Sorry, the page tou are looking for could not be found</p>
                        <router-link :to="{ name: 'admin.dashboards.dashboard' }" class="btn btn-outline-secondary">
                            Go Home
                        </router-link>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" :style="{ 'background-image': 'url(' + assets('images/auth/login-bg.jpg') + ')' }">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "lavakit-page-404"
    }
</script>

<style scoped>
    .page-error h1{
        font-weight: bold;
        color: #444444;
        font-size: 100px;
    }

    .page-error p{
        color: #000;
        font-size: 15px;
    }
</style>
