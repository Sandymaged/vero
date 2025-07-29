(function () {

    "use strict";

    var Prysm = {
        init: function () {
            this.Basic.init();
        },

        Basic: {
            init: function () {
                this.MainSlider();
            },
            MainSlider: function () {
                var tpj = jQuery;
                if (window.RS_MODULES === undefined) window.RS_MODULES = {};
                if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
                RS_MODULES.modules["revslider151"] = {
                    init: function () {
                        window.revapi15 = window.revapi15 === undefined || window.revapi15 === null || window.revapi15.length === 0 ? document.getElementById("rev_slider_15_1") : window.revapi15;
                        if (window.revapi15 === null || window.revapi15 === undefined || window.revapi15.length == 0) return;
                        window.revapi15 = jQuery(window.revapi15);
                        if (window.revapi15.revolution == undefined) {
                            revslider_showDoubleJqueryError("rev_slider_15_1");
                            return;
                        }
                        revapi15.revolutionInit({
                            revapi: "revapi15",
                            DPR: "dpr",
                            sliderLayout: "fullwidth",
                            visibilityLevels: "1240,1024,778,480",
                            gridwidth: "1230,1024,778,480",
                            gridheight: "660,660,540,480",
                            perspective: 600,
                            perspectiveType: "global",
                            keepBPHeight: true,
                            editorheight: "660,660,540,480",
                            responsiveLevels: "1240,1024,778,480",
                            progressBar: {disableProgressBar: true},
                            navigation: {
                                wheelCallDelay: 1000,
                                onHoverStop: false,
                                arrows: {
                                    enable: true,
                                    style: "case-arrows1",
                                    left: {
                                        h_offset: 30
                                    },
                                    right: {
                                        h_offset: 30
                                    }
                                }
                            },
                            parallax: {
                                levels: [3, 6, 8, 10, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 30],
                                type: "mouse",
                                origo: "slidercenter",
                                speed: 0
                            },
                            viewPort: {
                                global: false,
                                globalDist: "-200px",
                                enable: false
                            },
                            fallbacks: {
                                allowHTML5AutoPlayOnAndroid: true
                            },
                        });

                    }
                };
                $(".or-category-main-slider").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    arrows: false,
                    fade: true,
                    dots: true,
                });
                $(".or-banner-slider").slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    arrows: false,
                    fade: true,
                    dots: false,
                });
                var tpj = jQuery;
                if (window.RS_MODULES === undefined) window.RS_MODULES = {};
                if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
                RS_MODULES.modules["revslider181"] = {
                    init: function () {
                        window.revapi18 = window.revapi18 === undefined || window.revapi18 === null || window.revapi18.length === 0 ? document.getElementById("rev_slider_18_1") : window.revapi18;
                        if (window.revapi18 === null || window.revapi18 === undefined || window.revapi18.length == 0) return;
                        window.revapi18 = jQuery(window.revapi18);
                        if (window.revapi18.revolution == undefined) {
                            revslider_showDoubleJqueryError("rev_slider_18_1");
                            return;
                        }
                        revapi18.revolutionInit({
                            revapi: "revapi18",
                            sliderLayout: "fullwidth",
                            visibilityLevels: "1240,1024,778,480",
                            gridwidth: "1240,1024,778,480",
                            gridheight: "930,930,560,560",
                            spinner: "spinner0",
                            perspective: 600,
                            perspectiveType: "global",
                            keepBPHeight: true,
                            editorheight: "930,930,680,560",
                            responsiveLevels: "1240,1024,778,480",
                            progressBar: {disableProgressBar: true},
                            navigation: {
                                onHoverStop: false
                            },
                            viewPort: {
                                global: false,
                                globalDist: "-200px",
                                enable: false
                            },
                            fallbacks: {
                                allowHTML5AutoPlayOnAndroid: true
                            },
                        });

                    }
                }
                if (window.RS_MODULES.checkMinimal !== undefined) {
                    window.RS_MODULES.checkMinimal();
                }
                ;
            }
        }
    }
    jQuery(document).ready(function () {
        Prysm.init();
    });

})();
