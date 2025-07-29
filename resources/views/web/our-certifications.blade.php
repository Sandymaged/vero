@extends('layouts.web.app')

@section('title')
    {{trans('messages.our_certifications')}}
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
    <div
        class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-image"
        data-bg="{{asset('portal/assets')}}/images/certifications/our-certified.webp">
        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">
                                // {{trans('messages.welcome_to_vero')}}</h6>
                            <h1 class="section-title white-color">{{trans('messages.our_certifications')}}</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li class="ltn__secondary-color-2"><a href="/">{{trans('messages.home')}}</a></li>
                                <li class="ltn__secondary-color-2">{{trans('messages.our_certifications')}}</li>
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('portal/assets') }}/images/certifications/DOC201022-20102022145237-1.jpg"
                         alt="Image">
                </div>
                <div class="col-12">
                    <img src="{{ asset('portal/assets') }}/images/certifications/DOC201022-20102022145301-1.jpg"
                         alt="Image">
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    @push('scripts_lib')
    @endpush

@endsection
