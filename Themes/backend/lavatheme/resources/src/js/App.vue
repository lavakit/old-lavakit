<template>
    <div class="wrapper" id="app">
        <vue-header></vue-header>

        <div class="page-wrap">
            <vue-sidebar></vue-sidebar>

            <div class="main-content">
                <div class="container-fluid">
                    <router-view></router-view>
                </div>
            </div>

            <vue-aside></vue-aside>

            <vue-chat></vue-chat>

            <vue-footer></vue-footer>
        </div>

        <vue-app-modal></vue-app-modal>
    </div>
</template>

<script>
    import Header from './components/Header';
    import Footer from './components/Footer';
    import Sidebar from './components/Sidebar';
    import Aside from './components/Aside';
    import Chat from './components/Chat';
    import AppModal from './components/AppModal';

    export default {
        name: 'App',
        components: {
            'vue-header': Header,
            'vue-footer': Footer,
            'vue-sidebar': Sidebar,
            'vue-aside': Aside,
            'vue-chat':Chat,
            'vue-app-modal': AppModal,
        },
        data() {
            return {}
        }
    }
</script>