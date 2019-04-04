export default {
    methods: {
        trans(string) {
            // Makes a string: base.base.app_name
            // to: base["base.app_name"]
            const array = string.split('.');

            if (array.length < 2) {
                return this.$t(string);
            }

            const first = array.splice(0, 1);
            const key = array.join('.');

            return this.$t(`${first}['${$key}']`);
        },
    },
};
