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

        </style>
    @endpush


    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-image"
        data-bg="{{ asset('portal/assets') }}/images/inner-background/biscuts-banner-1920x760-catogries.png">
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">--}}
{{--                        <div class="section-title-area ltn__section-title-2">--}}
{{--                            <h6 class="section-subtitle ltn__secondary-color-2">// {{ trans('messages.welcome_to_vero') }}--}}
{{--                            </h6>--}}
{{--                            <h1 class="section-title white-color">{{ trans('messages.biscuit') }}</h1>--}}
{{--                        </div>--}}
{{--                        <div class="ltn__breadcrumb-list">--}}
{{--                            <ul>--}}
{{--                                <li><a href="/">{{ trans('messages.home') }}</a></li>--}}
{{--                                <li class="ltn__secondary-color-2">{{ trans('messages.biscuit') }}</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                        <div class="row">
                            <!-- ltn__product-item -->
                            <div class="col-xl-4 col-sm-6 col-6">
                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                        <a href="{{ localeUrl('/') }}/products/biscool" class="d-block"><img src="{{ asset('portal/assets') }}/images/products/biscool/feature.png" alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a href="{{ localeUrl('/') }}/products/biscool">{{ trans('messages.biscool') }}</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->
                            <!-- ltn__product-item -->
                            <div class="col-xl-4 col-sm-6 col-6">
                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                        <a href="{{ localeUrl('/') }}/products/bascota" class="d-block"><img src="{{ asset('portal/assets') }}/images/products/bascota/feature.png" alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a href="{{ localeUrl('/') }}/products/bascota">{{ trans('messages.bascota') }}</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->
                            <!-- ltn__product-item -->
                            <div class="col-xl-4 col-sm-6 col-6">
                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                        <a href="{{ localeUrl('/') }}/products/wivo-wafers" class="d-block"><img src="{{ asset('portal/assets') }}/images/products/wivo-wafers/feature.png" alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a href="{{ localeUrl('/') }}/products/wivo-wafers">{{ trans('messages.wivo_wafers') }}</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->
                            <!-- ltn__product-item -->
                            <div class="col-xl-4 col-sm-6 col-6">
                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                        <a href="{{ localeUrl('/') }}/products/wivo-biscuits" class="d-block"><img src="{{ asset('portal/assets') }}/images/products/wivo-biscuits/feature.png" alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a href="{{ localeUrl('/') }}/products/wivo-biscuits">{{ trans('messages.wivo_biscuits') }}</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            <ul>
                                <li><a href="javascript:"><i class="fas fa-angle-double-left"></i></a></li>
                                <li class="active"><a href="javascript:">1</a></li>
                                <li><a href="javascript:"><i class="fas fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @include('web.categories.partials._top_related')
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    @push('scripts_lib')
    @endpush

@endsection
