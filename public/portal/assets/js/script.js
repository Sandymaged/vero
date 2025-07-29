/*function revslider_showDoubleJqueryError(sliderID) {
    var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
    errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
    errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
    errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
    errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
    jQuery(sliderID).show().html(errorMessage);
}

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

                if (window.RS_MODULES.checkMinimal !== undefined) {
                    window.RS_MODULES.checkMinimal();
                }

            }
        }
    }

    jQuery(document).ready(function () {
        Prysm.init();
    });

})();*/

/*
var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider51"] = {
    once: RS_MODULES.modules["revslider51"] !== undefined ? RS_MODULES.modules["revslider51"].once : undefined,
    init: function () {
        window.revapi5 = window.revapi5 === undefined || window.revapi5 === null || window.revapi5.length === 0 ? document.getElementById("rev_slider_5_1") : window.revapi5;
        if (window.revapi5 === null || window.revapi5 === undefined || window.revapi5.length == 0) {
            window.revapi5initTry = window.revapi5initTry === undefined ? 0 : window.revapi5initTry + 1;
            if (window.revapi5initTry < 20) requestAnimationFrame(function () {
                RS_MODULES.modules["revslider51"].init()
            });
            return;
        }
        window.revapi5 = jQuery(window.revapi5);
        if (window.revapi5.revolution == undefined) {
            revslider_showDoubleJqueryError("rev_slider_5_1");
            return;
        }
        revapi5.revolutionInit({
            revapi: "revapi5",
            sliderLayout: "fullwidth",
            duration: 4500,
            visibilityLevels: "1240,1024,778,480",
            gridwidth: "1300,800,600,300",
            gridheight: "760,677,879,567",
            perspectiveType: "local",
            responsiveLevels: "1240,1024,778,480",
            progressBar: {disableProgressBar: true},
            navigation: {
                mouseScrollNavigation: false,
                onHoverStop: false,
                arrows: {
                    enable: true,
                    tmp: "<span class=\"eltdf-nav-arrow\"></span>",
                    style: "elated-style",
                    hide_onmobile: true,
                    hide_under: 1024,
                    left: {},
                    right: {}
                }
            },
            parallax: {
                levels: [1, 2, 3, 4, 5, 7, 15, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                type: "scroll"
            },
            viewPort: {
                global: false,
                globalDist: "-200px",
                enable: false,
                visible_area: "20%"
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

var htmlDivCss = unescape(".elated-style.tparrows%20%7B%0A%09background%3A%20none%3B%0A%20%20%20%20width%3A%2072px%3B%0A%20%20%20%20height%3A%2072px%3B%0A%7D%0A%0A.elated-style.tparrows%3Abefore%20%7B%0A%09display%3A%20none%3B%0A%7D%0A%0A.elated-style.tparrows.tp-leftarrow%20.eltdf-nav-arrow%2C%20%0A.elated-style.tparrows.tp-rightarrow%20.eltdf-nav-arrow%20%7B%0A%20%20%20%20position%3A%20relative%3B%0A%20%20%20%20height%3A%20100%25%3B%0A%20%20%20%20width%3A%2072px%3B%0A%20%20%20%20display%3A%20inline-block%3B%0A%20%20%20%20vertical-align%3A%20middle%3B%0A%20%20%20%20color%3A%20%23383838%3B%0A%20%20%20%20font-size%3A%2072px%3B%0A%20%20%20%20line-height%3A%201%3B%0A%20%20%20%20text-align%3A%20center%3B%0A%20%20%20%20-webkit-transition%3A%20-webkit-transform%20.2s%20ease-out%2C%20color%20.2s%20ease-out%3B%0A%20%20%20%20-moz-transition%3A%20-moz-transform%20.2s%20ease-out%2C%20color%20.2s%20ease-out%3B%0A%20%20%20%20transition%3A%20transform%20.2s%20ease-out%2C%20color%20.2s%20ease-out%3B%0A%7D%0A%0A.elated-style.tparrows.tp-leftarrow%3Ahover%20.eltdf-nav-arrow%20%7B%0Atransform%3Atranslate3d%28-10px%2C0%2C0%29%3B%0A%7D%0A%0A.elated-style.tparrows.tp-rightarrow%3Ahover%20.eltdf-nav-arrow%20%7B%0Atransform%3Atranslate3d%2810px%2C0%2C0%29%3B%0A%7D%0A%0A.eltdf-light-header%20.elated-style.tparrows.tp-leftarrow%20.eltdf-nav-arrow%2C%20%0A.eltdf-light-header%20.elated-style.tparrows.tp-rightarrow%20.eltdf-nav-arrow%2C%20%0A.eltdf-light-slider-navigation%20.elated-style.tparrows.tp-rightarrow%20.eltdf-nav-arrow%2C%20%0A.eltdf-light-header.eltdf-dark-slider-navigation%20.elated-style.tparrows.tp-rightarrow%20.eltdf-nav-arrow%2C%20%0A.eltdf-light-slider-navigation%20.elated-style.tparrows.tp-leftarrow%20.eltdf-nav-arrow%2C%20%0A.eltdf-light-header.eltdf-dark-slider-navigation%20.elated-style.tparrows.tp-leftarrow%20.eltdf-nav-arrow%7B%0A%20%20%20%20color%3A%20%23fff%3B%0A%7D%0A%0A.eltdf-dark-header%20.elated-style.tparrows.tp-leftarrow%20.eltdf-nav-arrow%2C%20%0A.eltdf-dark-header%20.elated-style.tparrows.tp-rightarrow%20.eltdf-nav-arrow%2C%20%0A.eltdf-dark-slider-navigation%20.elated-style.tparrows.tp-rightarrow%20.eltdf-nav-arrow%2C%20%0A.eltdf-dark-header.eltdf-light-slider-navigation%20.elated-style.tparrows.tp-rightarrow%20.eltdf-nav-arrow%2C%0A.eltdf-dark-slider-navigation%20.elated-style.tparrows.tp-leftarrow%20.eltdf-nav-arrow%2C%20%0A.eltdf-dark-header.eltdf-light-slider-navigation%20.elated-style.tparrows.tp-leftarrow%20.eltdf-nav-arrow%0A%7B%0A%20%20%20%20color%3A%20%23383838%3B%0A%7D%0A%0A.elated-style.tparrows.tp-leftarrow%20.eltdf-nav-arrow%3Abefore%2C%20%0A.elated-style.tparrows.tp-rightarrow%20.eltdf-nav-arrow%3Abefore%20%7B%0A%09display%3A%20inline-block%3B%0A%20%20%20%20vertical-align%3A%20top%3B%0A%09font-family%3A%20%22Ionicons%22%20%21important%3B%0A%20%20%20%20font-style%3A%20normal%20%21important%3B%0A%20%20%20%20font-weight%3A%20normal%20%21important%3B%0A%20%20%20%20font-variant%3A%20normal%20%21important%3B%0A%20%20%20%20text-transform%3A%20none%20%21important%3B%0A%20%20%20%20speak%3A%20none%3B%0A%20%20%20%20line-height%3A%20inherit%3B%0A%20%20%20%20-webkit-font-smoothing%3A%20antialiased%3B%0A%20%20%20%20-moz-osx-font-smoothing%3A%20grayscale%3B%0A%7D%0A%0A.elated-style.tparrows.tp-leftarrow%20.eltdf-nav-arrow%3Abefore%20%7B%0A%09content%3A%20%22%5Cf3d2%22%3B%0A%7D%0A%0A.elated-style.tparrows.tp-rightarrow%20.eltdf-nav-arrow%3Abefore%20%7B%0A%20%20%20%20content%3A%20%22%5Cf3d3%22%3B%0A%7D%0A");
var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
if (htmlDiv) {
    htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
} else {
    var htmlDiv = document.createElement('div');
    htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
    document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
}*/

window.RS_MODULES = window.RS_MODULES || {};
window.RS_MODULES.modules = window.RS_MODULES.modules || {};
window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
window.RS_MODULES.defered = true;
window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
window.RS_MODULES.type = 'compiled';

function setREVStartSize(e){
    //window.requestAnimationFrame(function() {
    window.RSIW = window.RSIW===undefined ? window.innerWidth : window.RSIW;
    window.RSIH = window.RSIH===undefined ? window.innerHeight : window.RSIH;
    try {
        var pw = document.getElementById(e.c).parentNode.offsetWidth,
            newh;
        pw = pw===0 || isNaN(pw) ? window.RSIW : pw;
        e.tabw = e.tabw===undefined ? 0 : parseInt(e.tabw);
        e.thumbw = e.thumbw===undefined ? 0 : parseInt(e.thumbw);
        e.tabh = e.tabh===undefined ? 0 : parseInt(e.tabh);
        e.thumbh = e.thumbh===undefined ? 0 : parseInt(e.thumbh);
        e.tabhide = e.tabhide===undefined ? 0 : parseInt(e.tabhide);
        e.thumbhide = e.thumbhide===undefined ? 0 : parseInt(e.thumbhide);
        e.mh = e.mh===undefined || e.mh=="" || e.mh==="auto" ? 0 : parseInt(e.mh,0);
        if(e.layout==="fullscreen" || e.l==="fullscreen")
            newh = Math.max(e.mh,window.RSIH);
        else{
            e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
            for (var i in e.rl) if (e.gw[i]===undefined || e.gw[i]===0) e.gw[i] = e.gw[i-1];
            e.gh = e.el===undefined || e.el==="" || (Array.isArray(e.el) && e.el.length==0)? e.gh : e.el;
            e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
            for (var i in e.rl) if (e.gh[i]===undefined || e.gh[i]===0) e.gh[i] = e.gh[i-1];

            var nl = new Array(e.rl.length),
                ix = 0,
                sl;
            e.tabw = e.tabhide>=pw ? 0 : e.tabw;
            e.thumbw = e.thumbhide>=pw ? 0 : e.thumbw;
            e.tabh = e.tabhide>=pw ? 0 : e.tabh;
            e.thumbh = e.thumbhide>=pw ? 0 : e.thumbh;
            for (var i in e.rl) nl[i] = e.rl[i]<window.RSIW ? 0 : e.rl[i];
            sl = nl[0];
            for (var i in nl) if (sl>nl[i] && nl[i]>0) { sl = nl[i]; ix=i;}
            var m = pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1 : (pw-(e.tabw+e.thumbw)) / (e.gw[ix]);
            newh =  (e.gh[ix] * m) + (e.tabh + e.thumbh);
        }
        var el = document.getElementById(e.c);
        if (el!==null && el) el.style.height = newh+"px";
        el = document.getElementById(e.c+"_wrapper");
        if (el!==null && el) {
            el.style.height = newh+"px";
            el.style.display = "block";
        }
    } catch(e){
        console.log("Failure at Presize of Slider:" + e)
    }
    //});
};

if (typeof revslider_showDoubleJqueryError === "undefined") {
    function revslider_showDoubleJqueryError(sliderID) {
        console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion.");
        console.log("To fix this, you can:");
        console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on");
        console.log("2. Find the double jQuery.js inclusion and remove it");
        return "Double Included jQuery Library";
    }
}

var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider101"] = {
    once: RS_MODULES.modules["revslider101"] !== undefined ? RS_MODULES.modules["revslider101"].once : undefined,
    init: function () {
        window.revapi10 = window.revapi10 === undefined || window.revapi10 === null || window.revapi10.length === 0 ? document.getElementById("rev_slider_10_1") : window.revapi10;
        if (window.revapi10 === null || window.revapi10 === undefined || window.revapi10.length == 0) {
            window.revapi10initTry = window.revapi10initTry === undefined ? 0 : window.revapi10initTry + 1;
            if (window.revapi10initTry < 20) requestAnimationFrame(function () {
                RS_MODULES.modules["revslider101"].init()
            });
            return;
        }
        window.revapi10 = jQuery(window.revapi10);
        if (window.revapi10.revolution == undefined) {
            revslider_showDoubleJqueryError("rev_slider_10_1");
            return;
        }
        revapi10.revolutionInit({
            revapi: "revapi10",
            DPR: "dpr",
            sliderLayout: "fullwidth",
            visibilityLevels: "1240,1024,778,480",
            gridwidth: 1920,
            gridheight: 760,
            perspective: 600,
            perspectiveType: "global",
            editorheight: "760,768,960,720",
            responsiveLevels: "1240,1024,778,480",
            progressBar: {disableProgressBar: true},
            navigation: {
                wheelCallDelay:1000,
                onHoverStop:false,
                arrows: {
                    enable:true,
                    tmp:"<div class=\"tp-title-wrap\">  	<div class=\"tp-arr-imgholder\"></div>    <div class=\"tp-arr-img-over\"></div>	<span class=\"tp-arr-titleholder\">{{title}}</span> </div>",
                    style:"erinyen",
                    left: {
                        h_offset:30
                    },
                    right: {
                        h_offset:30
                    }
                }
            },
            parallax: {
                levels: [3, 6, 8, 10, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 30],
                type: "mouse",
                origo: "slidercenter",
                speed: 0
            },
            sbtimeline: {
                set: true
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
} // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) {
    window.RS_MODULES.checkMinimal();
}
