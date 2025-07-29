@extends('layouts.web.app')

@section('title')
    {{ trans('messages.markets') }}
@stop

@section('content')

    @push('css')
        <style>
            .single-large-img img {
                width: 100%;
                max-height: 600px;
            }

            .our_business {
                position: relative;
            }

            .our_business .our_business_sections {
                background: -webkit-gradient(linear, left top, left bottom, color-stop(90%, #FFFFFF), to(#F1F1F1));
                background: -webkit-linear-gradient(top, #FFFFFF 90%, #F1F1F1 100%);
                background: -o-linear-gradient(top, #FFFFFF 90%, #F1F1F1 100%);
                background: linear-gradient(180deg, #FFFFFF 90%, #F1F1F1 100%);
                padding: 2.5rem 0;
            }

            .our_business .our_business_slider .slick-prev,
            .our_business .our_business_slider .slick-next {
                height: 100%;
            }

            .our_business .our_business_slider .slick-prev:before,
            .our_business .our_business_slider .slick-next:before {
                font-family: "Font Awesome 5 Free";
                color: #ccc;
                font-size: 2.5rem;
            }

            .our_business .our_business_slider .slick-prev:before {
                content: "\f359";
            }

            .our_business .our_business_slider .slick-next:before {
                content: "\f35a";
            }

            .our_business .our_business_slider .slide {
                background: -webkit-linear-gradient(45deg, whitesmoke 0%, white 50%, whitesmoke 100%);
                background: -o-linear-gradient(45deg, whitesmoke 0%, white 50%, whitesmoke 100%);
                background: linear-gradient(45deg, whitesmoke 0%, white 50%, whitesmoke 100%);
                min-height: 115px;
                border: 1px solid #ccc;
                position: relative;
            }

            .our_business .our_business_slider .slide .business_logo {
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }

            .our_business .our_business_slider .slick-slide {
                outline: none;
            }

            .our_business .our_business_slider .slick-dots {
                bottom: -25px;
            }

            .our_business .our_business_slider .slick-dots li button:before {
                color: #ccc;
            }

            .our_business .our_business_slider .slick-dots li.slick-active button:before {
                color: #00853F;
            }

            /* Arrows */
            .slick-prev,
            .slick-next {
                position: absolute;
                display: block;
                height: 20px;
                width: 20px;
                line-height: 0px;
                font-size: 0px;
                cursor: pointer;
                background: transparent;
                color: transparent;
                top: 50%;
                -webkit-transform: translate(0, -50%);
                -ms-transform: translate(0, -50%);
                transform: translate(0, -50%);
                padding: 0;
                border: none;
                outline: none;
            }

            .slick-prev:hover,
            .slick-prev:focus,
            .slick-next:hover,
            .slick-next:focus {
                outline: none;
                background: transparent;
                color: transparent;
            }

            .slick-prev:hover:before,
            .slick-prev:focus:before,
            .slick-next:hover:before,
            .slick-next:focus:before {
                opacity: 1;
            }

            .slick-prev.slick-disabled:before,
            .slick-next.slick-disabled:before {
                opacity: 1;
            }

            .slick-prev:before,
            .slick-next:before {
                font-family: "slick";
                font-size: 20px;
                line-height: 1;
                color: white;
                opacity: 1;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .slick-prev {
                left: -25px;
            }

            [dir="rtl"] .slick-prev {
                left: auto;
                right: -25px;
            }

            .slick-prev:before {
                content: "←";
            }

            [dir="rtl"] .slick-prev:before {
                content: "→";
            }

            .slick-next {
                right: -25px;
            }

            [dir="rtl"] .slick-next {
                left: -25px;
                right: auto;
            }

            .slick-next:before {
                content: "→";
            }

            [dir="rtl"] .slick-next:before {
                content: "←";
            }

            .bordered_text {
                position: relative;
                padding-left: 1.5rem;
                margin-left: 2rem;
                padding-top: 1rem;
                z-index: 1;
            }

            .bordered_text::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                background: #345aa4;
                height: 100%;
                width: 7px;
            }

            .section_title {
                color: #345aa4;
                font-size: 1.9rem;
            }

            .our_business .our_business_slider .slide .business_logo {
                max-height: 110px;
            }
        </style>
    @endpush


    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-image"
        data-bg="{{ asset('portal/assets') }}/images/markets/Market-Cover.webp">
        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">
                                // {{ trans('messages.welcome_to_vero') }}</h6>
                            <h1 class="section-title white-color">{{ trans('messages.markets') }}</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li class="ltn__secondary-color-2"><a href="/">{{ trans('messages.home') }}</a></li>
                                <li class="ltn__secondary-color-2">{{ trans('messages.markets') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-85">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <section class='our_business business_dir'>
                        <article class='our_business_sections' id="international-presence">
                            <div class="container-fluid">
                                <div class="row  p-md-5 p-2">
                                    <div class="col-12 col-md-5 col-lg-4 mb-3 mb-md-0">
                                        <h1 class="section_title">{{ trans('messages.markets') }}</h1>
                                        {{-- <div class='bordered_text'>
                                            <p>A major Egyptian table olives processor, exporting a diversified product
                                                range in bulk and in retail packages (with private label), supplying
                                                customers with the superior quality products of high value. Today, our
                                                premium quality products can be found on the shelves of more than 26
                                                countries over the world

                                            </p>
                                        </div> --}}
                                    </div>
                                    <div class="col-12 col-md-7 offset-lg-1">
                                        <div class='our_business_slider'>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/markets/العابد-ماركت-لوجو.jpeg"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/markets/الفرجاني-لوجو.png"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/markets/جملة-ماركت-لوجو.png"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/markets/فتح-الله-ماركت-لوجو.png"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/markets/كازيون-لوجو.png"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/markets/نجمة-هليوبلس-لوجو.jpeg"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/markets/هايبر-وان-لوجو.png"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/markets/oscar.webp"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/partners/panda.webp"
                                                        alt="..">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </article>
                    </section>
                    <section class='our_business business_dir'>
                        <article class='our_business_sections' id="horeca">
                            <div class="container-fluid">
                                <div class="row  p-md-5 p-2">
                                    <div class="col-12 col-md-5 col-lg-4 mb-3 mb-md-0">
                                        <h1 class="section_title">{{ trans('messages.horeca') }}</h1>
                                        {{-- <div class='bordered_text'>
                                            <p>The biggest supplier to 85% of the five-star Hotels &amp; resorts,
                                                Restaurants, and cafes, becoming the Egyptian Chef’s Favored Products

                                            </p>
                                        </div> --}}
                                    </div>
                                    <div class="col-12 col-md-7 offset-lg-1">
                                        <div class='our_business_slider'>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/horeca/fuddruckers.png"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/horeca/تسيباس-لوجو.png"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/horeca/دواجن-الوطنية-لوجو.png"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/horeca/tbk.jpeg"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/horeca/abou-ramy.webp"
                                                        alt="..">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                    <section class='our_business business_dir'>
                        <article class='our_business_sections' id="national-presence">
                            <div class="container-fluid">
                                <div class="row  p-md-5 p-2">
                                    <div class="col-12 col-md-5 col-lg-4 mb-3 mb-md-0">
                                        <h1 class="section_title">{{ trans('messages.charities') }}</h1>
                                        {{-- <div class='bordered_text'>
                                            <p>The favored Provider of Quality packaged food to consumers and customers
                                                serving all channels within the local market with a commitment to Excellence
                                                &amp; Uniqueness &amp; a drive to lead

                                            </p>
                                        </div> --}}
                                    </div>
                                    <div class="col-12 col-md-7 offset-lg-1">
                                        <div class='our_business_slider'>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/charites/misrelkheirconv.png"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/partners/orman.webp"
                                                        alt="..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                    <section class='our_business business_dir'>
                        <article class='our_business_sections' id="national-presence">
                            <div class="container-fluid">
                                <div class="row  p-md-5 p-2">
                                    <div class="col-12 col-md-5 col-lg-4 mb-3 mb-md-0">
                                        <h1 class="section_title">{{ trans('messages.ecommerce') }}</h1>
                                        {{-- <div class='bordered_text'>
                                            <p>The favored Provider of Quality packaged food to consumers and customers
                                                serving all channels within the local market with a commitment to Excellence
                                                &amp; Uniqueness &amp; a drive to lead

                                            </p>
                                        </div> --}}
                                    </div>
                                    
                                         <div class="col-12 col-md-7 offset-lg-1">
                                        <div class='our_business_slider'>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/ecommerce/amazon.png"
                                                        alt="..">
                                                </div>

                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/ecommerce/instashop.png"
                                                        alt="..">
                                                </div>

                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/ecommerce/noon.png"
                                                        alt="..">
                                                </div>

                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/ecommerce/cartona.jpeg"
                                                        alt="..">
                                                </div>

                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">

                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/ecommerce/appetito.png"
                                                        alt="..">
                                                </div>
                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">

                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="{{ asset('portal/assets') }}/images/markets/ecommerce/talabat.webp"
                                                        alt="..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </article>
                    </section>

                    <section class='our_business business_dir'>
                        <article class='our_business_sections' id="national-presence">
                            <div class="container-fluid">
                                <div class="row  p-md-5 p-2">
                                    <div class="col-12 col-md-5 col-lg-4 mb-3 mb-md-0">
                                        <h1 class="section_title">{{ trans('messages.export') }}</h1>
                                        {{-- <div class='bordered_text'>
                                            <p>The favored Provider of Quality packaged food to consumers and customers
                                                serving all channels within the local market with a commitment to Excellence
                                                &amp; Uniqueness &amp; a drive to lead

                                            </p>
                                        </div> --}}
                                    </div>
                                    <div class="col-12 col-md-7 offset-lg-1">
                                        <div class='our_business_slider'>
                                            <div class="p-3" style="width: 25%; display: inline-block;">
                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="https://www.worldometers.info/img/flags/jo-flag.gif"
                                                        alt="..">
                                                </div>

                                            </div>
                                            <div class="p-3" style="width: 25%; display: inline-block;">

                                                <div class='slide'>
                                                    <img class='img-fluid business_logo'
                                                        src="https://www.worldometers.info/img/flags/su-flag.gif"
                                                        alt="..">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    @push('scripts_lib')
        <script src="{{ asset('portal/assets' . (isRTL() ? '/rtl/' : '')) }}/js/custom.js"></script>
    @endpush

@endsection
