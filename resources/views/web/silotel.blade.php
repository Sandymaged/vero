@extends('layouts.web.app')

@section('title')
    About
@stop

@section('content')

    @push('css')

    @endpush

    <!-- BREADCRUMB AREA START -->
    <div
        class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bg="{{asset('portal/assets')}}/images/inner-background/2-Verotel-Hotel.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// {{trans('messages.welcome_to_vero')}}</h6>
                            <h1 class="section-title white-color">{{trans('messages.verotel_hotel')}}</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{localeUrl('/')}}">{{trans('messages.home')}}</a></li>
                                <li>{{trans('messages.verotel_hotel')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- PAGE DETAILS AREA START (blog-details) -->
    <div class="ltn__page-details-area ltn__blog-details-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__blog-details-wrap">
                        <div class="ltn__page-details-inner ltn__blog-details-inner">
                            <h2 class="ltn__blog-title text-center">{{trans('messages.verotel_hotel')}}</h2>
                            <h2 class="text text-danger">{{trans('messages.overview')}}:</h2>
                            <p>
                                {{trans('messages.verotel_description_1')}}
                            </p>
                            <p>
                                {{trans('messages.verotel_description_2')}}

                            </p>

                            <h2 class="text text-danger">{{trans('messages.rooms_and_suites')}}:</h2>
                            <p>
                                {{trans('messages.rooms_and_suites_text')}}
                            </p>

                            <h2 class="text text-danger">{{trans('messages.restaurant')}}:</h2>
                            <h3>{{trans('messages.restaurant_operating_hours')}}:</h3>
                            <div class="list-item-with-icon-2">
                                <ul>
                                    <li>{{trans('messages.restaurant_operating_hours_line1')}}</li>
                                    <li>{{trans('messages.restaurant_operating_hours_line2')}}</li>
                                    <li>{{trans('messages.restaurant_operating_hours_line3')}}</li>
                                </ul>
                            </div>
                            <h3>{{trans('messages.outdoor_café')}}:</h3>
                            <div class="list-item-with-icon-2">
                                <ul>
                                    <li>{{trans('messages.outdoor_café_time')}}</li>
                                </ul>
                            </div>
                            <p>
                                {{trans('messages.outdoor_café_text')}}
                            </p>


                            <h2 class="text text-danger">{{trans('messages.services_and_amenities')}}:</h2>
                            <h3>-{{trans('messages.amenities')}}:</h3>

                            <div class="list-item-with-icon-2">
                                <ul>
                                    <li>{{trans('messages.amenities_1')}}
                                    </li>
                                    <li>{{trans('messages.amenities_2')}}
                                    </li>
                                    <li>{{trans('messages.amenities_3')}}
                                    </li>
                                    <li>{{trans('messages.amenities_4')}}
                                    </li>
                                    <li>{{trans('messages.amenities_5')}}
                                    </li>
                                </ul>
                            </div>

                            <h3>-{{trans('messages.services')}}:</h3>

                            <div class="list-item-with-icon-2">
                                <ul>
                                    <li>{{trans('messages.services_1')}}</li>
                                    <li>{{trans('messages.services_2')}}</li>
                                    <li>{{trans('messages.services_3')}}</li>
                                    <li>{{trans('messages.services_4')}}</li>
                                </ul>
                            </div>

                            <h2 class="text text-danger">{{trans('messages.contactus')}}:</h2>
                        </div>
                        <!-- blog-tags-social-media -->
                        <div class="ltn__blog-tags-social-media row">
                            <div class="ltn__tagcloud-widget col-lg-8">
                                <div class="footer-address">
                                    <ul>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-placeholder"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p>{{trans('messages.hotel_address')}}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-call"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="tel:+0123-456789">+20-1228389544</a></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-mail"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="mailto:reservations@verotelegypt.com">reservations@verotelegypt.com</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
{{--                                <p>--}}
{{--                                    <b>Address:</b> Development Industrial area, 902, 904, Sadat city – Egypt, about--}}
{{--                                    just 10--}}
{{--                                    minutes away from Downtown (Sadat-City).--}}
{{--                                    <br>--}}
{{--                                    <b>Call us on:</b> 01228389544--}}
{{--                                    <br>--}}
{{--                                    <b>Reservation E-mail:</b> reservations@verotelegypt.com--}}
{{--                                </p>--}}
                            </div>
                            <div class="ltn__social-media text-right col-lg-4">
                                <h4>{{trans('messages.follow_us')}}</h4>
                                <ul>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE DETAILS AREA END -->


    @push('scripts_lib')

    @endpush

@endsection
