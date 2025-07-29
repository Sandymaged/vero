@extends('layouts.web.app')

@section('title')
    {{trans('messages.contactus')}}
@stop

@section('content')

    @push('css')
    @endpush

    <!-- BREADCRUMB AREA START -->
    <div
        class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-image"
        data-bg="{{asset('portal/assets')}}/images/inner-background/cover-Contact-Us.png">
        {{--        <div class="container">--}}
        {{--            <div class="row">--}}
        {{--                <div class="col-lg-12">--}}
        {{--                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">--}}
        {{--                        <div class="section-title-area ltn__section-title-2">--}}
        {{--                            <h6 class="section-subtitle ltn__secondary-color-2">--}}
        {{--                                // {{trans('messages.welcome_to_vero')}}</h6>--}}
        {{--                            <h1 class="section-title white-color">{{trans('messages.contactus')}}</h1>--}}
        {{--                        </div>--}}
        {{--                        <div class="ltn__breadcrumb-list">--}}
        {{--                            <ul>--}}
        {{--                                <li><a href="{{localeUrl('/')}}">{{trans('messages.home')}}</a></li>--}}
        {{--                                <li class="ltn__secondary-color-2">{{trans('messages.contactus')}}</li>--}}
        {{--                            </ul>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- CONTACT ADDRESS AREA START -->
    <div class="ltn__contact-address-area mb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{asset('portal/assets')}}/img/icons/10.png"
                                 alt="{{trans('messages.email_address')}}">
                        </div>
                        <h3>{{trans('messages.email_address')}}</h3>
                        <p>
                            <a href="mailto:info@verofoods.co">info@verofoods.co</a><br>
                            <a href="mailto:job@verofoods.co">job@verofoods.co</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{asset('portal/assets')}}/img/icons/11.png"
                                 alt="{{trans('messages.phone_number')}}">
                        </div>
                        <h3>{{trans('messages.phone_number')}}</h3>
                        <p><a href="tel:+201111220841">+20-1111220841</a></p>
                        <br>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{asset('portal/assets')}}/img/icons/12.png"
                                 alt="{{trans('messages.office_address')}}">
                        </div>
                        <h3>{{trans('messages.office_address')}}</h3>
                        <p><a
                                href="https://www.google.com/maps/dir//100+El-Thawra+St+Cairo+Governorate/@30.0820389,31.3442915,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x14583e0485ab4411:0x52c74f0ca844a4a!2m2!1d31.3442915!2d30.0820389"
                                target="_blank">{{ trans('messages.address_line') }}</a></p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{asset('portal/assets')}}/img/icons/12.png"
                                 alt="{{trans('messages.office_address')}}">
                        </div>
                        <h3>Factory Address</h3>
                        <p><a
                                href="#"
                                target="_blank">Plots No. 5-6 in the industrial zone west of A6, south of the mills, 10th of Ramadan City</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- CONTACT ADDRESS AREA END -->

    <!-- CONTACT MESSAGE AREA START -->
    <div class="ltn__contact-message-area mb-120">
        <div class="container">
            <div class="alert alert-success contact" style="display: none" role="alert">
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">{{trans('messages.get_quote')}}</h4>
                        <form id="contact-form" method="post">
                            <input type="hidden" name="message_type" value="contact">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" required
                                               placeholder="{{trans('messages.enter_name')}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" required
                                               placeholder="{{trans('messages.enter_email')}}">
                                    </div>
                                </div>
                                {{--                                <div class="col-md-6">--}}
                                {{--                                    <div class="input-item">--}}
                                {{--                                        <select class="nice-select">--}}
                                {{--                                            <option>Select Service Type</option>--}}
                                {{--                                            <option>Gardening </option>--}}
                                {{--                                            <option>Landscaping </option>--}}
                                {{--                                            <option>Vegetables Growing</option>--}}
                                {{--                                            <option>Land Preparation</option>--}}
                                {{--                                        </select>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="col-md-4">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="text" name="phone"
                                               placeholder="{{trans('messages.enter_phone_number')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="user_message" required
                                          placeholder="{{trans('messages.enter_message')}}"></textarea>
                            </div>
                            {{--                            <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> {{trans('messages.save_info')}}</label></p>--}}
                            <div class="btn-wrapper mt-0">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" id="send-message"
                                        type="submit">{{trans('messages.get_service')}}
                                </button>
                            </div>
                            <p class="form-message mb-0 mt-20"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->

    <!-- CONTACT MESSAGE AREA START -->
    <div class="ltn__contact-message-area mb-120 mb--100">
        <div class="container">
            <div class="alert alert-success export" style="display: none" role="alert">
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">{{trans('messages.export')}}</h4>
                        <form id="export-contact-form" method="post">
                            <input type="hidden" name="message_type" value="export">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" required
                                               placeholder="{{trans('messages.enter_company_name')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" required
                                               placeholder="{{trans('messages.enter_email')}}">
                                    </div>
                                </div>
                                {{--                                <div class="col-md-6">--}}
                                {{--                                    <div class="input-item">--}}
                                {{--                                        <select class="nice-select">--}}
                                {{--                                            <option>Select Service Type</option>--}}
                                {{--                                            <option>Gardening </option>--}}
                                {{--                                            <option>Landscaping </option>--}}
                                {{--                                            <option>Vegetables Growing</option>--}}
                                {{--                                            <option>Land Preparation</option>--}}
                                {{--                                        </select>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="col-md-4">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="text" name="phone"
                                               placeholder="{{trans('messages.enter_contacts')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 pl-0">
                                <div>{{trans('messages.products')}}:</div>
                                <label class="checkbox-inline mr-3">
                                    <input type="checkbox" value="{{trans('messages.pasta')}}" name="product[]">
                                    {{trans('messages.pasta')}}
                                </label>
                                <label class="checkbox-inline mr-3">
                                    <input type="checkbox" value="{{trans('messages.flour')}}" name="product[]">
                                    {{trans('messages.flour')}}
                                </label>
                                <label class="checkbox-inline mr-3">
                                    <input type="checkbox" value="{{trans('messages.vinegar')}}" name="product[]">
                                    {{trans('messages.vinegar')}}
                                </label>
                                <label class="checkbox-inline mr-3">
                                    <input type="checkbox" value="{{trans('messages.tomato_paste')}}" name="product[]">
                                    {{trans('messages.tomato_paste')}}
                                </label>
                                <label class="checkbox-inline mr-3">
                                    <input type="checkbox" value="{{trans('messages.frozen')}}" name="product[]">
                                    {{trans('messages.frozen')}}
                                </label>
                                <label class="checkbox-inline mr-3">
                                    <input type="checkbox" value="{{trans('messages.potatoes')}}" name="product[]">
                                    {{trans('messages.potatoes')}}
                                </label>
                                <label class="checkbox-inline mr-3">
                                    <input type="checkbox" value="{{trans('messages.pickles')}}" name="product[]">
                                    {{trans('messages.pickles')}}
                                </label>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="user_message" required
                                          placeholder="{{trans('messages.enter_message')}}"></textarea>
                            </div>
                            {{--                            <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> {{trans('messages.save_info')}}</label></p>--}}
                            <div class="btn-wrapper mt-0">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" id="export-send-message"
                                        type="submit">{{trans('messages.export')}}
                                </button>
                            </div>
                            <p class="form-message mb-0 mt-20"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->

    <!-- GOOGLE MAP AREA START -->
    <div class="google-map mb-120">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.3936292791927!2d31.3398414156487!3d30.08291108186834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e1b59624ae1%3A0xf5df4c7eb4699571!2s104%20El-Thawra%20St%2C%20Masaken%20Al%20Mohandesin%2C%20Nasr%20City%2C%20Cairo%20Governorate%204451725!5e0!3m2!1sen!2seg!4v1655983808647!5m2!1sen!2seg"
            width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- GOOGLE MAP AREA END -->
@endsection
