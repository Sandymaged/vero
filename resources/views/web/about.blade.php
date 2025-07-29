@extends('layouts.web.app')

@section('title')
    {{ trans('messages.aboutus') }}
@stop

@section('content')

    @push('css')
        <style>
            .ltn__breadcrumb-area-2 {
                padding-top: 350px !important;
                padding-bottom: 350px !important;
            }
        </style>
    @endpush

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-image"
        data-bg="{{ asset('portal/assets') }}/images/inner-background/Slider-760-About-Us.png">
        {{--        <div class="container"> --}}
        {{--            <div class="row"> --}}
        {{--                <div class="col-lg-12"> --}}
        {{--                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between"> --}}
        {{--                        <div class="section-title-area ltn__section-title-2"> --}}
        {{--                            <h6 class="section-subtitle ltn__secondary-color-2">// {{trans('messages.welcome_to_vero')}}</h6> --}}
        {{--                            <h1 class="section-title white-color">{{trans('messages.aboutus')}}</h1> --}}
        {{--                        </div> --}}
        {{--                        <div class="ltn__breadcrumb-list"> --}}
        {{--                            <ul> --}}
        {{--                                <li><a href="/">{{trans('messages.home')}}</a></li> --}}
        {{--                                <li class="ltn__secondary-color-2">{{trans('messages.aboutus')}}</li> --}}
        {{--                            </ul> --}}
        {{--                        </div> --}}
        {{--                    </div> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </div> --}}
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="{{ asset('portal/assets') }}/images/about-us/about-Us-4.jpeg"
                            alt="{{ trans('messages.vero') }}">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">{{ trans('messages.about_vero') }}</h6>
                            <h1 class="section-title">{{ trans('messages.vero_foods') }} <br class="d-none d-md-block">
                                {{ trans('messages.food_industries') }}</h1>
                            <p>{{ trans('messages.vero_has_new_taste') }}</p>
                        </div>
                        <p>{{ trans('messages.about_text') }}</p>
                        <p>{{ trans('messages.about_text_') }}</p>
                        {{--                    <div class="about-author-info d-flex"> --}}
                        {{--                        <div class="author-name-designation  align-self-center mr-30"> --}}
                        {{--                            <h4 class="mb-0">Jerry Henson</h4> --}}
                        {{--                            <small>/ Shop Director</small> --}}
                        {{--                        </div> --}}
                        {{--                        <div class="author-sign  align-self-center"> --}}
                        {{--                            <img src="{{asset('portal/assets')}}/img/icons/icon-img/author-sign.png" alt="#"> --}}
                        {{--                        </div> --}}
                        {{--                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!-- ABOUT US AREA START -->
    {{--    <div class="ltn__about-us-area"> --}}
    {{--        <div class="container"> --}}
    {{--            <div class="row"> --}}
    {{--                <div class="col-lg-12 align-self-center"> --}}
    {{--                    <div class="about-us-info-wrap"> --}}
    {{--                        <p> --}}
    {{--                            {{trans('messages.about_text_1')}} --}}
    {{--                        </p> --}}

    {{--                        <p> --}}
    {{--                            {{trans('messages.about_text_2')}} --}}
    {{--                        </p> --}}

    {{--                        <p> --}}
    {{--                            {{trans('messages.about_text_3')}} --}}
    {{--                        </p> --}}
    {{--                        <p> --}}
    {{--                            {{trans('messages.about_text_4')}} --}}
    {{--                        </p> --}}
    {{--                    </div> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    <!-- ABOUT US AREA END -->

    @push('scripts_lib')
    @endpush

@endsection
