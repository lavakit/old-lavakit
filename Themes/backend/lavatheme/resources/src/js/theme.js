! function(e, s, i) {
    "use strict";
    i(s).ready(function () {
        function a(e, s) {
            e.children(".submenu-content").show().slideUp(200, function() {
                i(this).css("display", ""), i(this).find(".menu-item").removeClass("is-shown"), e.removeClass("open"), s && s()
            })
        }
        const n = i(".app-sidebar"),
            t = i(".sidebar-content"),
            l = i(".wrapper"),
            o = s.querySelector(".sidebar-content");

        // const ps = new PerfectScrollbar(o, {
        //     wheelSpeed: 10,
        //     wheelPropagation: !0,
        //     minScrollbarLength: 5
        // });
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
        }), i(".search-btn").on('click', function () {
            i(".header-search").addClass('open');
            i('.header-search .form-control').animate({
                'width': '180px',
            });
        }), i('.search-close').on('click', function () {
            i('.header-search .form-control').animate({
                'width': '0',
            });
            setTimeout(function() {
                i(".header-search").removeClass('open');
            }, 300);
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
        })
    });
}(window, document, jQuery);