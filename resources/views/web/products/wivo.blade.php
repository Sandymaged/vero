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
        data-bg="{{ asset('portal/assets') }}/images/products/wivo/1.cover.png">
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">--}}
{{--                        <div class="section-title-area ltn__section-title-2">--}}
{{--                            <h6 class="section-subtitle ltn__secondary-color-2">// {{ trans('messages.welcome_to_vero') }}--}}
{{--                            </h6>--}}
{{--                            <h1 class="section-title white-color">{{ trans('messages.wivo') }}</h1>--}}
{{--                        </div>--}}
{{--                        <div class="ltn__breadcrumb-list">--}}
{{--                            <ul>--}}
{{--                                <li><a href="/">{{ trans('messages.home') }}</a></li>--}}
{{--                                <li class="ltn__secondary-color-2">{{ trans('messages.wivo') }}</li>--}}
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
                    <div class="ltn__shop-details-inner mb-60">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <h1>{{ trans('messages.wivo') }}</h1>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            <a href="{{ asset('portal/assets') }}/images/products/wivo/1-l.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/wivo/1-l.png"
                                                    alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('portal/assets') }}/images/products/wivo/2-l.png"
                                               data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/wivo/2-l.png"
                                                     alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('portal/assets') }}/images/products/wivo/3-l.png"
                                               data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/wivo/3-l.png"
                                                     alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('portal/assets') }}/images/products/wivo/4-l.png"
                                               data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/wivo/4-l.png"
                                                     alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('portal/assets') }}/images/products/wivo/5-l.png"
                                               data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/wivo/5-l.png"
                                                     alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('portal/assets') }}/images/products/wivo/6-l.png"
                                               data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/wivo/6-l.png"
                                                     alt="Image">
                                            </a>
                                        </div>
                                        {{-- <div class="single-large-img">
                                            <a href="{{ asset('portal/assets') }}/images/products/wivo/4.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/wivo/4.png"
                                                    alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('portal/assets') }}/images/products/wivo/5.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/wivo/5.png"
                                                    alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('portal/assets') }}/images/products/wivo/6.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/wivo/6.png"
                                                    alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('portal/assets') }}/images/products/wivo/7.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('portal/assets') }}/images/products/wivo/7.png"
                                                    alt="Image">
                                            </a>
                                        </div> --}}
                                    </div>
                                    <div class="ltn__shop-details-small-img slick-arrow-2">
                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/wivo/1.png"
                                                alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/wivo/2.png"
                                                 alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/wivo/3.png"
                                                 alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/wivo/4.png"
                                                 alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/wivo/5.png"
                                                 alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/wivo/6.png"
                                                 alt="Image">
                                        </div>
                                        {{-- <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/wivo/4.png"
                                                alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/wivo/5.png"
                                                alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/wivo/6.png"
                                                alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('portal/assets') }}/images/products/wivo/7.png"
                                                alt="Image">
                                        </div> --}}
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
                                    {{-- <h4 class="title-2">{{ trans('messages.wivo_excerpt') }}</h4> --}}
                                    <p>
                                        {{ trans('messages.wivo_description') }}
                                    </p>
                                    {{-- <p>
                                        {{ trans('messages.wivo_description_2') }}
                                    </p>
                                    <p>
                                        {{ trans('messages.wivo_description_3') }}
                                    </p> --}}
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
