export default {
    methods: {
        customError: function (error) {
            if (error.response) {
                if (error.response.status === 404) {
                    this.$notify.error({
                        title: this.$t(`${'base::base'}['${'notify.title.error'}']`),
                        message: error.response.statusText
                    });

                    this.$router.push({name: 'admin.page404'});
                }

                if (error.response.status === 500) {
                    this.$notify.error({
                        title: this.$t(`${'base::base'}['${'notify.title.error'}']`),
                        message: error.response.statusText
                    });

                    this.$router.push({name: 'admin.page500'});
                }

            } else if (error.request) {
                console.log(error.request);
            } else {
                console.log(JSON.stringify(error));
            }
        },
    }
};
