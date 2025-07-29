@extends('layouts.web.app')

@section('title')
    About
@stop

@section('content')

    @push('css')
        <style>
            .single-large-img img {
                width: 100%;
                max-height: 600px;
            }


            .ltn__breadcrumb-area-2 {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }

            @media (max-width: 480px) {
                .bg-image {
                    background-size: contain !important;
                }

                .ltn__breadcrumb-area-2 {
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                }
            }
        </style>
    @endpush


    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-image">
        <img src="{{ asset('portal/assets') }}/images/products/roca-sauce/2-cover.webp">
        {{--        <div class="container"> --}}
        {{--            <div class="row"> --}}
        {{--                <div class="col-lg-12"> --}}
        {{--                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between"> --}}
        {{--                        <div class="section-title-area ltn__section-title-2"> --}}
        {{--                            <h6 class="section-subtitle ltn__secondary-color-2">// {{ trans('messages.welcome_to_vero') }} --}}
        {{--                            </h6> --}}
        {{--                            <h1 class="section-title white-color">{{ trans('messages.roca_sauce') }}</h1> --}}
        {{--                        </div> --}}
        {{--                        <div class="ltn__breadcrumb-list"> --}}
        {{--                            <ul> --}}
        {{--                                <li><a href="/">{{ trans('messages.home') }}</a></li> --}}
        {{--                                <li class="ltn__secondary-color-2">{{ trans('messages.roca_sauce') }}</li> --}}
        {{--                            </ul> --}}
        {{--                        </div> --}}
        {{--                    </div> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </div> --}}
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner mb-60">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <h1>{{ trans('messages.roca_sauce_tin_can_800_gm') }}</h1>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">

                                        <div class="single-large-img" style="text-align: center;">
                                            <a href="{{ asset('portal/assets') }}/images/products/roca-sauce/770×600px/800.webp"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/roca-sauce/770×600px/800.webp"
                                                    alt="{{ trans('messages.roca_sauce_tin_can_800_gm') }}"
                                                    style="width: auto !important">
                                                <span>
                                                    {{ trans('messages.roca_sauce_tin_can_800_gm') }}
                                                </span>
                                            </a>
                                        </div>

                                        <div class="single-large-img" style="text-align: center;">
                                            <a href="{{ asset('portal/assets') }}/images/products/roca-sauce/770×600px/800-s.webp"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/roca-sauce/770×600px/800-s.webp"
                                                    alt="{{ trans('messages.roca_sauce_tin_can_800_gm') }}"
                                                    style="width: auto !important">
                                                <span>
                                                    {{ trans('messages.roca_sauce_tin_can_800_gm') }}
                                                </span>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="ltn__shop-details-small-img slick-arrow-2">

                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/roca-sauce/183×183px/800.webp"
                                                alt="Image">
                                        </div>

                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/roca-sauce/183×183px/800-s.webp"
                                                alt="Image">
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Tab Start -->
                    <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                        <div class="ltn__shop-details-tab-menu">
                            <div class="nav">
                                <a class="active show" data-toggle="tab"
                                    href="#liton_tab_details_1_1">{{ trans('messages.description') }}</a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                <div class="ltn__shop-details-tab-content-inner">
                                    {{-- <h4 class="title-2">{{ trans('messages.roca_sauce_excerpt') }}</h4> --}}
                                    <p>
                                        ROCA Tomato Puree 800 gm<br>
                                        Net weight approximately: 800 gm / Tin Can<br>
                                        Packaging: Tin Can<br>
                                        Carton includes 12 Tin Cans
                                    </p>
                                    {{-- <p>
                                        {{ trans('messages.roca_sauce_description_2') }}
                                    </p>
                                    <p>
                                        {{ trans('messages.roca_sauce_description_3') }}
                                    </p> --}}
                                </div>

                                {{--                                <div class="ltn__shop-details-tab-content-inner"> --}}
                                {{--                                    --}}{{-- <h4 class="title-2">{{ trans('messages.roca_sauce_excerpt') }}</h4> --}}
                                {{--                                    <p> --}}
                                {{--                                        {{ trans('messages.available_sizes') }}: --}}
                                {{--                                    </p> --}}
                                {{--                                    <ul> --}}
                                {{--                                        <li> --}}
                                {{--                                            350 G --}}
                                {{--                                        </li> --}}
                                {{--                                        <li> --}}
                                {{--                                            1 KG --}}
                                {{--                                        </li> --}}
                                {{--                                    </ul> --}}
                                {{--                                    --}}{{-- <p> --}}
                                {{--                                        {{ trans('messages.roca_sauce_description_2') }} --}}
                                {{--                                    </p> --}}
                                {{--                                    <p> --}}
                                {{--                                        {{ trans('messages.roca_sauce_description_3') }} --}}
                                {{--                                    </p> --}}
                                {{--                                </div> --}}
                            </div>

                        </div>
                    </div>
                    <!-- Shop Tab End -->
                </div>
                @include('web.products.partials._top_related')
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    @push('scripts_lib')
    @endpush

@endsection
