<!-- FOOTER AREA START -->
<footer class="ltn__footer-area  ">
    <div class="footer-top-area  section-bg-2 plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-about-widget">
                        <div class="footer-logo">
                            <div class="site-logo">

                                <a href="{{ localeUrl('/') }}">
                                    <img src="{{ asset('portal/assets') }}/images/logo/logo.svg" alt="Logo"
                                         width="116px"></a>
                            </div>
                        </div>
                        <p>{{trans('messages.about_text')}}</p>

                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-6 col-12">
                    <h5 class="footer-title">{{trans('messages.address')}}</h5>
                    <div class="footer-address">
                        <ul>
                            <li>
                                <div class="footer-address-icon">
                                    <i class="icon-placeholder"></i>
                                </div>
                                <div class="footer-address-info">
                                    <p><a
                                            href="https://www.google.com/maps/dir//100+El-Thawra+St+Cairo+Governorate/@30.0820389,31.3442915,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x14583e0485ab4411:0x52c74f0ca844a4a!2m2!1d31.3442915!2d30.0820389"
                                            target="_blank">Office: {{ trans('messages.address_line') }}</a></p>

                                </div>
                                                                <div class="footer-address-icon">
                                    <i class="icon-placeholder"></i>
                                </div>

                                <div class="footer-address-info">
                                    <p><a
                                            href="#"
                                            target="_blank">Factory: Plots No. 5-6 in the industrial zone west of A6, south of the mills, 10th of Ramadan City</a></p>

                                </div>

                            </li>
                            <li>
                                <div class="footer-address-icon">
                                    <i class="icon-call"></i>
                                </div>
                                <div class="footer-address-info">
                                    <p><a href="tel:+201111220841">+20-1111220841</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="footer-address-icon">
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="footer-address-info">
                                    <p><a href="mailto:info@verofoods.co">info@verofoods.co</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="ltn__social-media mt-20">
                        <ul>
                            <li><a href="https://www.facebook.com/profile.php?id=100083805607274&mibextid=LQQJ4d"
                                   target="_blank"
                                   title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/vero-foods/" target="_blank" title="Linkedin"><i
                                        class="fab fa-linkedin"></i></a></li>
                            <li><a href="https://instagram.com/verofoods.co?igshid=YmMyMTA2M2Y=" target="_blank"
                                   title="Instagram"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>

                {{-- <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h5 class="footer-title">{{trans('messages.products')}}</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{localeUrl('/products')}}/roca">{{trans('messages.roca')}}</a></li>
                                <li><a href="{{localeUrl('/products')}}/alsit-azizz">{{trans('messages.alsit_azizza')}}</a></li>
                                <li><a href="{{localeUrl('/products')}}/alsit-azizz-ric">{{trans('messages.alsit_azizza_rice')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h5 class="footer-title">{{trans('messages.products')}}</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{localeUrl('/products')}}/qatfa">{{trans('messages.qatfa')}}</a></li>
                                <li><a href="{{localeUrl('/products')}}/biscool">{{trans('messages.biscool')}}</a></li>

                            </ul>
                        </div>
                    </div>
                </div> --}}

                <div class="col-xl-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h5 class="footer-title">{{trans('messages.company')}}</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{localeUrl('/')}}">{{trans('messages.home')}}</a></li>
                                <li><a href="{{localeUrl('/about-us')}}">{{trans('messages.aboutus')}}</a></li>
                                {{--                                <li><a href="{{localeUrl('/verotel')}}">{{trans('messages.verotel_hotel')}}</a></li>--}}
                                <li><a href="{{localeUrl('/contact-us')}}">{{trans('messages.contactus')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="ltn__copyright-area ltn__copyright-2 section-bg-2 ltn__border-top-2 plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="ltn__copyright-design clearfix text-center">
                        <p>{{trans('messages.copyrights')}} <span class="current-year"></span></p>
                    </div>
                </div>
                {{--                <div class="col-md-6 col-12 align-self-center">--}}
                {{--                    <div class="ltn__copyright-menu text-right">--}}
                {{--                        <ul>--}}
                {{--                            <li><a href="#">Terms & Conditions</a></li>--}}
                {{--                            <li><a href="#">Privacy & Policy</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER AREA END -->



