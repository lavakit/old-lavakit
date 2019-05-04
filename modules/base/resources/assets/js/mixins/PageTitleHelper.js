const name_app = window.Lavakit.created;

export default {
    methods: {
        setPageTitle(title) {
            document.title = title + ' - ' + name_app;
        },
    },
};
