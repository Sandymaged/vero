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
        data-bg="{{ asset('portal/assets') }}/images/inner-background/aseptic.webp">
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                  <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2">
                      <h1>Aseptic Tomato Paste</h1>
                      <p>Discover the rich flavors of Egypt's finest tomatoes in every batch.</p>
                    </div>
                    <p>Experience the taste of Egypt with our premium aseptic tomato paste. Crafted from the finest tomatoes cultivated in our country's fertile soil, our company is dedicated to producing the finest tomato paste. We carefully select the ripest tomatoes from the fertile lands of Egypt, renowned for their exceptional tomato cultivation. By harnessing the natural goodness of these premium tomatoes, we create an aseptic tomato paste that embodies the rich flavors and nutritional value of our region.</p>
                    <p>We specialize in the production of high-quality aseptic tomato paste, available in a variety of Brix levels (e.g., 28-30 Brix, 36-38 Brix) to suit different processing requirements. Our aseptic tomato paste is produced using state-of-the-art technology and adheres to strict quality standards. We prioritize the use of fresh, vine-ripened tomatoes, resulting in a product with exceptional flavor, vibrant color, and high nutritional value. The aseptic packaging ensures long shelf life and maintains the freshness and quality of the paste without the need for preservatives.</p>
                  </div>
                </div>
                
                <div class="col-lg-6 align-self-center"><div class="about-us-img-wrap about-img-left"><img src="{{ asset('portal/assets') }}/images/aseptic2.webp" alt="Aseptic Tomato Paste"></div></div>
                
                

                {{-- @include('web.categories.partials._top_related') --}}
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 align-self-center"><div class="about-us-img-wrap about-img-left"><img src="{{ asset('portal/assets') }}/images/aseptic1.webp" alt="Aseptic Tomato Paste"></div></div>
                <div class="col-lg-6 align-self-center"><div class="about-us-img-wrap about-img-left"><img src="{{ asset('portal/assets') }}/images/webpeditor_aseptic3.webp" alt="Aseptic Tomato Paste"></div></div>
            </div>
            <br>
                    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Chemical Specification</th>
                    <th>Average Value (Measured at 20°C)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Brix %</td>
                    <td>36% - 38%</td>
                </tr>
                <tr>
                    <td>pH</td>
                    <td>≤ 4.5 at 12.0 Brix</td>
                </tr>
                <tr>
                    <td>Color (a/b)</td>
                    <td>≥ 1.9 at 12.0 Brix</td>
                </tr>
                <tr>
                    <td>Bostwick</td>
                    <td>≤ 11cm / 30 seconds</td>
                </tr>
                <tr>
                    <td>Howard mold count</td>
                    <td>Maximum 50% positive fields at 8.0 Brix</td>
                </tr>
                <tr>
                    <td>Black Specks</td>
                    <td>Max of 8 with diameter<br>< 1mm on 10g of product</td>
                </tr>
            </tbody>
        </table>

        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    @push('scripts_lib')
    @endpush

@endsection
