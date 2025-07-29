<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-js">
<!--begin::Head-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{config('app.name')}} | @yield('title')</title>
    {{--    <meta name="robots" content="noindex, follow"/>--}}
    <meta name="description"
          content="Vero foods offers you the most high quality products as all stages of the products’ manufacturer are carried out through the latest professional technologies that are being used without any direct contact with the human element.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{asset('portal/assets')}}/img/favicon.png" type="image/x-icon"/>

    @stack('css')

    <link rel="stylesheet" href="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/css/app.min.css">
    {{--    <link rel="stylesheet" href="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/css/font-icons.css">--}}
    {{--    <link rel="stylesheet" href="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/css/plugins.css">--}}
    {{--    <link rel="stylesheet" href="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/css/style.css">--}}
    {{--    <link rel="stylesheet" href="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/css/responsive.css">--}}
    {{--    <link rel="stylesheet" href="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/css/rs6.css">--}}
    {{--    <link rel="stylesheet" href="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/css/custom.css">--}}
    {{--    <link rel="stylesheet" href="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/css/ionicons.min.css">--}}

    <style>

        .ltn__category-item-3 {
            min-height: 289px;
        }

        @media (max-width: 480px) {
            .ltn__breadcrumb-area-2 {
                padding-top: 60px;
            }

            .ltn__breadcrumb-area {
                margin-bottom: 80px;
            }
        }

        .site-logo-wrap .site-logo img {
            max-width: 90% !important;
        }

        .ltn__header-4 .ltn__header-middle-area, .ltn__header-5 .ltn__header-middle-area {
            padding-bottom: 10px !important;
        }

        .ltn__main-menu > ul > li {
            margin-right: 0 !important;
        }
    </style>
@stack('css_lib')

<!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TF2F289');</script>
    <!-- End Google Tag Manager -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TF2F289"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">

    @include('layouts.web.partials._header')

    @yield('content')

    @include('layouts.web.partials._footer')

</div>
<!-- Body main wrapper end -->

<!-- preloader area start -->
<div class="preloader d-none" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->


<script src="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/js/app.min.js"></script>

@stack('scripts_lib')

{{--<script src="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/js/plugins.js"></script>--}}
{{--<script src="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/js/main.js"></script>--}}
{{--<script src="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/js/rbtools.min.js"></script>--}}
{{--<script src="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/js/rs6.min.js"></script>--}}
{{--<script src="{{asset('portal/assets' .(isRTL() ? '/rtl/' : ''))}}/js/script.js"></script>--}}

</body>
<!--end::Body-->
</html>
