<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" > <!-- dir="rtl" direction="rtl" style="direction:rtl;" -->
<!--begin::Head-->
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Title -->
    <title>{{config('app.name')}} | @yield('title')</title>
    <!-- <script src="{{asset('assets/js/jquery.min.js')}}"></script> -->
    @stack('css')

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('logo.svg')}}">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->

    @stack('css_lib')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
    @include('layouts.backend.partials._side-bar')
    <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
        @include('layouts.backend.partials._header')
        <!--end::Header-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Toolbar-->
            @yield('toolbar')
            <!--end::Toolbar-->
                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <div class="clearfix"></div>
                    @include('layouts.commons.alert')
                    <!--begin::Content-->
                    @yield('content')
                    <!--end::Content-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--begin::Footer-->
        @include('layouts.backend.partials._footer')
        <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                          fill="black"/>
					<path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="black"/>
				</svg>
			</span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->
<script>var hostUrl = "{{asset('assets/')}}";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->



<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.new.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        // Initialize Metronic menu
        if (typeof KTMenu !== 'undefined') {
            KTMenu.createInstances();
        }
        
        // OR if you need to manually toggle
        $('.menu-item.menu-accordion').on('click', function(e) {
            if ($(this).find('.menu-link').attr('href') === 'javascript:') {
                e.preventDefault();
            }
            $(this).toggleClass('hover show');
            $(this).find('.menu-sub').toggleClass('show');
            $(this).find('.menu-arrow').toggleClass('rotate-180');
        });
    });
</script>
@include('layouts.commons.variables')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js" integrity="sha512-OhFAHE0MI75RpzE5EbUHuZ4Ql0b5Sqinj6yLJ7qxTqcCdxDykIvnopD2uAfXC8LeJRJhazL5r7HnqOGdZbgKQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript-->
@stack('scripts')
@stack('scripts_lib')
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
