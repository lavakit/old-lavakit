<template>
    <div>
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-settings"></i>
                        <div class="d-inline">
                            <h5>{{ pageTitle }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        Breadcrumb
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>General Setting</h3>
                    </div>
                    <div class="card-block">
                        <p class="m-0">
                            With these settings, session timeout plugin launches a timeout warning dialog in a fixed amount of time regardless of user activity. In this demo warning dialog appears <b>after 3 seconds</b>                                                            of page load.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            locales: {default: null},
            pageTitle: {default: null, String}
        },
        data () {
            return {
                msg: 'Hello world!'
            }
        }
    }
</script>