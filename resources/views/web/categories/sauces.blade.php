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
                padding-top: 350px !important;
                padding-bottom: 350px !important;
            }
        </style>
    @endpush


    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-image"
        data-bg="{{ asset('portal/assets') }}/images/inner-background/roca-sauces.png">

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
                                        <a href="{{ localeUrl('/') }}/products/ketchup-sauce-310" class="d-block"><img
                                                src="{{ asset('portal/assets') }}/images/products/roca-sauces/233x233px/ketchup.webp"
                                                alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a
                                                href="{{ localeUrl('/') }}/products/ketchup-sauce-310">{{ trans('messages.roca_ketchup_sauce') }}</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->
                            <div class="col-xl-4 col-sm-6 col-6">
                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                        <a href="{{ localeUrl('/') }}/products/bbq-sauce-310" class="d-block"><img
                                                src="{{ asset('portal/assets') }}/images/products/roca-sauces/233x233px/bbq.webp"
                                                alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a
                                                href="{{ localeUrl('/') }}/products/bbq-sauce-310">{{ trans('messages.roca_bbq_sauce') }}</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->
                            <div class="col-xl-4 col-sm-6 col-6">
                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                        <a href="{{ localeUrl('/') }}/products/mayonnaise-sauce-285" class="d-block"><img
                                                src="{{ asset('portal/assets') }}/images/products/roca-sauces/233x233px/mayonnaise.webp"
                                                alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a
                                                href="{{ localeUrl('/') }}/products/mayonnaise-sauce-285">{{ trans('messages.roca_mayonnaise_sauce') }}</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->
                            <div class="col-xl-4 col-sm-6 col-6">
                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                    <div class="product-img">
                                        <a href="{{ localeUrl('/') }}/products/mustard-sauce-300" class="d-block"><img
                                                src="{{ asset('portal/assets') }}/images/products/roca-sauces/233x233px/mustard.webp"
                                                alt="#"></a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a
                                                href="{{ localeUrl('/') }}/products/mustard-sauce-300">{{ trans('messages.roca_mustard_sauce') }}</a>
                                        </h2>
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


    @push('scripts_lib')
    @endpush

@endsection
