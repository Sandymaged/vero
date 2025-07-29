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
        data-bg="{{ asset('portal/assets') }}/images/inner-background/pasta.webp">
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">--}}
{{--                        <div class="section-title-area ltn__section-title-2">--}}
{{--                            <h6 class="section-subtitle ltn__secondary-color-2">// {{ trans('messages.welcome_to_vero') }}--}}
{{--                            </h6>--}}
{{--                            <h1 class="section-title white-color">{{ trans('messages.pasta') }}</h1>--}}
{{--                        </div>--}}
{{--                        <div class="ltn__breadcrumb-list">--}}
{{--                            <ul>--}}
{{--                                <li><a href="/">{{ trans('messages.home') }}</a></li>--}}
{{--                                <li class="ltn__secondary-color-2">{{ trans('messages.pasta') }}</li>--}}
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
{{--                            <div class="col-xl-4 col-sm-6 col-6">--}}
{{--                                <div class="ltn__product-item ltn__product-item-3 text-center">--}}
{{--                                    <div class="product-img">--}}
{{--                                        <a href="{{ localeUrl('/') }}/products/roca" class="d-block"><img src="{{ asset('portal/assets') }}/images/products/roca/feature.png" alt="#"></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-info">--}}
{{--                                        <h2 class="product-title"><a href="{{ localeUrl('/') }}/products/roca">{{ trans('messages.roca') }}</a></h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- ltn__product-item -->

                            <!-- ltn__product-item -->
                            <div class="col-xl-4 col-sm-6 col-6">
                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                        <a href="{{ localeUrl('/') }}/products/alsit-azizza-350" class="d-block"><img src="{{ asset('portal/assets') }}/images/products/alsit-azizza/3- 233x 233/1.webp" alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a href="{{ localeUrl('/') }}/products/alsit-azizza-350">{{ trans('messages.alsit_azizza_350_gm') }}</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->

                             <!-- ltn__product-item -->
                             <div class="col-xl-4 col-sm-6 col-6">
                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                        <a href="{{ localeUrl('/') }}/products/alsit-azizza-1000" class="d-block"><img src="{{ asset('portal/assets') }}/images/products/alsit-azizza/3- 233x 233/1.webp" alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a href="{{ localeUrl('/') }}/products/alsit-azizza-1000">{{ trans('messages.alsit_azizza_1000_gm') }}</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->

                             <!-- ltn__product-item -->
                             <div class="col-xl-4 col-sm-6 col-6">
                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                        <a href="{{ localeUrl('/') }}/products/avena-400" class="d-block"><img src="{{ asset('portal/assets') }}/images/products/avena-pasta/233x233/1.webp" alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a href="{{ localeUrl('/') }}/products/avena-400">{{ trans('messages.avena_pasta_400_gm') }}</a></h2>
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
