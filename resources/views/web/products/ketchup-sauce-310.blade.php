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
        <img src="{{ asset('portal/assets') }}/images/inner-background/roca-sauces.png">

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
                                    <h1>{{ trans('messages.roca_ketchup_sauce') }}</h1>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">

                                        <div class="single-large-img" style="text-align: center;">
                                            <a href="{{ asset('portal/assets') }}/images/products/roca-sauces/770×600px/ketchup.webp"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/roca-sauces/770×600px/ketchup.webp"
                                                    alt="{{ trans('messages.roca_ketchup_sauce_310') }}"
                                                    style="width: auto !important">
                                                <span>
                                                    {{ trans('messages.roca_ketchup_sauce_310') }}
                                                </span>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="ltn__shop-details-small-img slick-arrow-2">

                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/roca-sauces/183×183px/ketchup.webp"
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
                                    <p>
                                        Ketchup sauce<br>
                                        Net weight approximately: 310 ml<br>
                                        Packaging: PET<br>
                                        Carton includes 12 packs
                                    </p>

                                </div>


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
