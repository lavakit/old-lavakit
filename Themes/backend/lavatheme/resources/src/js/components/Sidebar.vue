<template>
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <router-link class="header-brand" :to="{ name: 'admin.dashboards.index'}">
                <div class="logo-img">
                    <img :src="assets('images/brand-white.png')" class="header-brand-img" :alt="crafted">
                </div>
                <span class="text">{{ crafted }}</span>
            </router-link>
            <button type="button" class="nav-toggle">
                <i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i>
            </button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-container">
                        <template v-for="menu in Menus">
                            <div class="nav-lavel">{{ menu.name }}</div>
                            <div v-bind:class="['nav-item', {'active': parent.active, 'has-sub': parent.hasSub }]"
                                 v-for="parent in menu.menuParent">
                                <router-link :to="{ name: parent.uri}">
                                    <i v-bind:class="['ik', parent.icon]"></i>
                                    <span>{{ parent.name }}</span>
                                    <span v-if="parent.number" class="badge badge-success">{{ parent.number }}</span>
                                </router-link>
                                <div v-if="parent.hasSub" class="submenu-content" v-for="menuChild in parent.menuChild">
                                    <router-link v-if="menuChild.params" class="menu-item"
                                                 :to="{ name: menuChild.uri, params: {...menuChild.params}}">
                                        {{ menuChild.name}}
                                    </router-link>
                                    <router-link v-else class="menu-item" :to="{ name: menuChild.uri}">
                                        {{ menuChild.name}}
                                    </router-link>
                                </div>
                            </div>
                        </template>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    const CRAFTED = window.Lavakit.created;

    export default {
        data() {
            return {
                crafted: CRAFTED,
                Menus: [
                    {
                        name: 'Home',
                        menuParent: [
                            {uri: 'admin.dashboards.index', icon: 'ik-bar-chart-2', name: 'Dashboard', active: true, hasSub: false}
                        ]
                    },

                    // {
                    //     name: 'Content',
                    //     menuParent: [
                    //         {
                    //             uri: '#',
                    //             icon: 'ik-box',
                    //             name: 'Blog',
                    //             active: false,
                    //             hasSub: true,
                    //             menuChild: [
                    //                 {uri: '#', name: 'Pages'},
                    //                 {uri: '#', name: 'Posts'},
                    //                 {uri: '#', name: 'Products'}
                    //             ]
                    //         },
                    //         {
                    //             uri: '#',
                    //             icon: 'ik-gitlab',
                    //             name: 'Menu',
                    //             active: false,
                    //             hasSub: true,
                    //             menuChild: [
                    //                 {uri: '#', name: 'Categories'},
                    //                 {uri: '#', name: 'Tags'}
                    //             ]
                    //         },
                    //         {
                    //             uri: '#',
                    //             icon: 'ik-gitlab',
                    //             name: 'Media',
                    //             active: false,
                    //             hasSub: true,
                    //             menuChild: [
                    //                 {uri: '#', name: 'Library'},
                    //                 {uri: '#', name: 'Galleries'}
                    //             ]
                    //         },
                    //     ]
                    // },

                    // {
                    //     name: 'Appearance',
                    //     menuParent: [
                    //         {uri: '#', icon: 'ik-edit', name: 'Themes', active: false, hasSub: false},
                    //         {uri: '#', icon: 'ik-edit', name: 'Customize', active: false, hasSub: false},
                    //         {uri: '#', icon: 'ik-menu', name: 'Navigation', active: false, hasSub: false},
                    //         {uri: '#', icon: 'ik-menu', name: 'Navigation', active: false, hasSub: false, number: 3},
                    //         {
                    //             uri: '#',
                    //             icon: 'ik-gitlab',
                    //             name: 'Media',
                    //             active: false,
                    //             hasSub: true,
                    //             number: 5,
                    //             menuChild: [
                    //                 {uri: '#', name: 'Installed plugins'},
                    //                 {uri: '#', name: 'Add new'}
                    //             ]
                    //         },
                    //
                    //     ]
                    // },

                    {
                        name: 'Systems',
                        menuParent: [
                            {
                                uri: false,
                                icon: 'ik-settings',
                                name: 'Settings',
                                active: false,
                                hasSub: true,
                                menuChild: [
                                    {uri: 'admin.settings.setting', name: 'Setting', params: {type: 'setting'}},
                                    {uri: 'admin.settings.setting', name: 'User', params: {type: 'user'}},
                                ]
                            },

                            // {
                            //     uri: '#',
                            //     icon: 'ik-edit',
                            //     name: 'Accounts',
                            //     active: false,
                            //     hasSub: true,
                            //     menuChild: [
                            //         {uri: '#', name: 'Profile'},
                            //         {uri: '#', name: 'User'},
                            //         {uri: '#', name: 'Permission'},
                            //         {uri: '#', name: 'Role'},
                            //         {uri: '#', name: 'API keys'}
                            //     ]
                            // },
                            // {
                            //     uri: '#',
                            //     icon: 'ik-menu',
                            //     name: 'Navigation',
                            //     active: false,
                            //     number: 4,
                            //     hasSub: true,
                            //     menuChild: [
                            //         {uri: '#', name: 'Import'},
                            //         {uri: '#', name: 'Export'},
                            //     ]
                            //
                            // },
                        ]
                    },

                    // {
                    //     name: 'Support',
                    //     menuParent: [
                    //         {uri: '#', icon: 'ik-monitor', name: 'Documentation', active: false, hasSub: false},
                    //         {uri: '#', icon: 'ik-help-circle', name: 'Donate', active: false, hasSub: false},
                    //     ]
                    // }
                ]
            }
        },
        mounted: function() {
            ! function(e, s, i) {
                function a(e, s) {
                    e.children(".submenu-content").show().slideUp(200, function() {
                        i(this).css("display", ""), i(this).find(".menu-item").removeClass("is-shown"), e.removeClass("open"), s && s()
                    })
                }

                const n = i(".app-sidebar"),
                    t = i(".sidebar-content"),
                    l = i(".wrapper"),
                    o = s.querySelector(".sidebar-content");

                const ps = new PerfectScrollbar(o, {
                    wheelSpeed: 10,
                    wheelPropagation: !0,
                    minScrollbarLength: 5
                });

                t.on("click", ".navigation-main .nav-item a", function() {
                    var e = i(this).parent(".nav-item");
                    if (e.hasClass("has-sub") && e.hasClass("open")) a(e);
                    else {
                        if (e.hasClass("has-sub") && function(e, s) {
                                var a = e.children(".submenu-content"),
                                    n = a.children(".menu-item").addClass("is-hidden");
                                e.addClass("open"), a.hide().slideDown(200, function() {
                                    i(this).css("display", ""), s && s()
                                }), setTimeout(function() {
                                    n.addClass("is-shown"), n.removeClass("is-hidden")
                                }, 0)
                            }(e), t.data("collapsible")) return !1;
                        a(e.siblings(".open")), e.siblings(".open").find(".nav-item.open").removeClass("open")
                    }
                }), i(".nav-toggle").on('click', function () {
                    const e = i(this).find(".toggle-icon");
                    "expanded" === e.attr("data-toggle") ? (l.addClass("nav-collapsed"), i(".nav-toggle").find(".toggle-icon").removeClass("ik-toggle-right").addClass("ik-toggle-left"), e.attr("data-toggle", "collapsed")) : (l.removeClass("nav-collapsed menu-collapsed"), i(".nav-toggle").find(".toggle-icon").removeClass("ik-toggle-left").addClass("ik-toggle-right"), e.attr("data-toggle", "expanded"))
                }), n.on("mouseenter", function() {
                    if (l.hasClass("nav-collapsed")) {
                        l.removeClass("menu-collapsed");
                        var e = i(".navigation-main .nav-item.nav-collapsed-open");
                        e.children(".submenu-content").hide().slideDown(300, function() {
                            i(this).css("display", "")
                        }), t.find(".nav-item.active").parents(".nav-item").addClass("open"), e.addClass("open").removeClass("nav-collapsed-open")
                    }
                }).on("mouseleave", function(e) {
                    if (l.hasClass("nav-collapsed")) {
                        l.addClass("menu-collapsed");
                        var s = i(".navigation-main .nav-item.open"),
                            a = s.children(".submenu-content");
                        s.addClass("nav-collapsed-open"), a.show().slideUp(300, function() {
                            i(this).css("display", "")
                        }), s.removeClass("open")
                    }
                }), i(e).width() < 992 && (n.addClass("hide-sidebar"), l.removeClass("nav-collapsed menu-collapsed")), i(e).resize(function() {
                    i(e).width() < 992 && (n.addClass("hide-sidebar"), l.removeClass("nav-collapsed menu-collapsed")), i(e).width() > 992 && (n.removeClass("hide-sidebar"), "collapsed" === i(".toggle-icon").attr("data-toggle") && l.not(".nav-collapsed menu-collapsed") && l.addClass("nav-collapsed menu-collapsed"))
                }), i(s).on("click", ".navigation li:not(.has-sub)", function() {
                    i(e).width() < 992 && n.addClass("hide-sidebar")
                }), i(s).on("click", ".logo-text", function() {
                    i(e).width() < 992 && n.addClass("hide-sidebar")
                }), i(".mobile-nav-toggle").on("click", function(e) {
                    e.stopPropagation(), n.toggleClass("hide-sidebar")
                }), i("html").on("click", function(s) {
                    i(e).width() < 992 && (n.hasClass("hide-sidebar") || 0 !== n.has(s.target).length || n.addClass("hide-sidebar"))
                }), i("#sidebarClose").on("click", function() {
                    n.addClass("hide-sidebar")
                });
            }(window, document, jQuery);
        },
    }
</script>