<template>
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-container">
                <template v-for="menu in Menus">
                    <div class="nav-lavel">{{ menu.name }}</div>
                    <div v-bind:class="['nav-item', {'active': parent.active, 'has-sub': parent.hasSub }]"
                         v-for="parent in menu.menuParent">
                        <a v-bind:href="parent.uri">
                            <i v-bind:class="['ik', parent.icon]"></i>
                            <span>{{ parent.name }}</span>
                            <span v-if="parent.number" class="badge badge-success">{{ parent.number }}</span>
                        </a>
                        <div v-if="parent.hasSub" class="submenu-content" v-for="menuChild in parent.menuChild">
                            <a v-bind:href="menuChild.uri" class="menu-item">{{ menuChild.name}}</a>
                        </div>
                    </div>
                </template>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                Menus: [
                    {
                        name: 'Home',
                        menuParent: [
                            {uri: '/admin', icon: 'k-bar-chart-2', name: 'Dashboard', active: true, hasSub: false}
                        ]
                    },
                    {
                        name: 'Content',
                        menuParent: [
                            {
                                uri: '#',
                                icon: 'ik-box',
                                name: 'Blog',
                                active: false,
                                hasSub: true,
                                menuChild: [
                                    {uri: '#', name: 'Pages'},
                                    {uri: '#', name: 'Posts'},
                                    {uri: '#', name: 'Products'}
                                ]
                            },
                            {
                                uri: '#',
                                icon: 'ik-gitlab',
                                name: 'Menu',
                                active: false,
                                hasSub: true,
                                menuChild: [
                                    {uri: '#', name: 'Categories'},
                                    {uri: '#', name: 'Tags'}
                                ]
                            },
                            {
                                uri: '#',
                                icon: 'ik-gitlab',
                                name: 'Media',
                                active: false,
                                hasSub: true,
                                menuChild: [
                                    {uri: '#', name: 'Library'},
                                    {uri: '#', name: 'Galleries'}
                                ]
                            },
                        ]
                    },
                    {
                        name: 'Appearance',
                        menuParent: [
                            {uri: '#', icon: 'ik-edit', name: 'Themes', active: false, hasSub: false},
                            {uri: '#', icon: 'ik-edit', name: 'Customize', active: false, hasSub: false},
                            {uri: '#', icon: 'ik-menu', name: 'Navigation', active: false, hasSub: false},
                            {uri: '#', icon: 'ik-menu', name: 'Navigation', active: false, hasSub: false, number: 3},
                            {
                                uri: '#',
                                icon: 'ik-gitlab',
                                name: 'Media',
                                active: false,
                                hasSub: true,
                                number: 5,
                                menuChild: [
                                    {uri: '#', name: 'Installed plugins'},
                                    {uri: '#', name: 'Add new'}
                                ]
                            },

                        ]
                    },
                    {
                        name: 'Systems',
                        menuParent: [
                            {
                                uri: '#',
                                icon: 'ik-settings',
                                name: 'Settings',
                                active: false,
                                hasSub: true,
                                menuChild: [
                                    {uri: '/admin/settings/general', name: 'General'},
                                    {uri: '/admin/settings/email', name: 'Email'},
                                    {uri: '/admin/settings/email', name: 'Media'}
                                ]
                            },

                            {
                                uri: '#',
                                icon: 'ik-edit',
                                name: 'Accounts',
                                active: false,
                                hasSub: true,
                                menuChild: [
                                    {uri: '#', name: 'Profile'},
                                    {uri: '#', name: 'User'},
                                    {uri: '#', name: 'Permission'},
                                    {uri: '#', name: 'Role'},
                                    {uri: '#', name: 'API keys'}
                                ]
                            },
                            {
                                uri: '#',
                                icon: 'ik-menu',
                                name: 'Navigation',
                                active: false,
                                number: 4,
                                hasSub: true,
                                menuChild: [
                                    {uri: '#', name: 'Import'},
                                    {uri: '#', name: 'Export'},
                                ]

                            },
                        ]
                    },
                    {
                        name: 'Support',
                        menuParent: [
                            {uri: '#', icon: 'ik-monitor', name: 'Documentation', active: false, hasSub: false},
                            {uri: '#', icon: 'ik-help-circle', name: 'Donate', active: false, hasSub: false},
                        ]
                    }
                ]
            }
        }
    }
</script>