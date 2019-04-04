<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Setting Email</div>

                    <div class="card-body">
                       {{ msg }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'setting-email',
        data () {
            return {
                msg: 'Hello world!'
            }
        }
    }
</script>