<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="rtl" direction="rtl" style="direction:rtl;">
<!--begin::Head-->
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Title -->
    <title>{{config('app.name')}} | @yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('logo.svg')}}">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body">
<!--begin::Main-->
@yield('content')
<!--end::Main-->
<script>var hostUrl = "{{asset('assets/')}}";</script>

<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script>
    var email_required = '{{trans('messages.email_required')}}';
    var not_valid_email = '{{trans('messages.not_valid_email')}}';
    var password_required = '{{trans('messages.password_required')}}';
    var logged_in = '{{trans('messages.logged_in')}}';
    var got_it = '{{trans('messages.got_it')}}';
    var some_errors = '{{trans('messages.some_errors')}}';
</script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->

{!!  GoogleReCaptchaV3::init() !!}

<!--begin::Page Custom Javascript-->
@stack('scripts_lib')
<!--end::Page Custom Javascript-->

</body>
<!--end::Body-->
</html>
