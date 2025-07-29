<!-- HEADER AREA START (header-5) -->
<header class="ltn__header-area ltn__header-5 ltn__header-transparent-- gradient-color-4---">
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            {{--                            <li><a href="javascript:"><i --}}
                            {{--                                        class="icon-placeholder"></i>{{ trans('messages.address_line') }}</a> --}}

                            {{--                            </li> --}}
                            <li><a href="mailto:info@verofoods.co"><i class="icon-mail"></i> info@verofoodsco.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-right">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                {{-- <li> --}}
                                {{-- <!-- ltn__language-menu --> --}}
                                {{-- <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu"> --}}
                                {{-- <ul> --}}
                                {{-- <li><a href="#" class="dropdown-toggle"><span --}}
                                {{-- class="active-currency">{{trans('messages.locale_'.app()->getLocale())}}</span></a> --}}
                                {{-- <ul> --}}
                                {{-- @foreach (config('app.allowed_languages') as $key => $lang) --}}
                                {{-- @php --}}
                                {{-- if (in_array(request()->segment(1), array_keys(config('app.allowed_languages')))) { --}}
                                {{-- $url = str_replace(app()->getLocale(), $key, url()->current()); --}}
                                {{-- }else{ --}}
                                {{-- $url = url($key .'/'.request()->path()); --}}
                                {{-- } --}}

                                {{-- @endphp --}}

                                {{-- <li> --}}
                                {{-- <a href="{{$url}}">{{trans('messages.locale_'.$key)}}</a> --}}
                                {{-- </li> --}}
                                {{-- @endforeach --}}
                                {{-- </ul> --}}
                                {{-- </li> --}}
                                {{-- </ul> --}}
                                {{-- </div> --}}
                                {{-- </li> --}}
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com/profile.php?id=100083805607274&mibextid=LQQJ4d"
                                                    target="_blank" title="Facebook"><i
                                                        class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li><a href="https://www.linkedin.com/company/vero-foods/" target="_blank"
                                                    title="Linkedin"><i class="fab fa-linkedin"></i></a>
                                            </li>
                                            <li><a href="https://instagram.com/verofoods.co?igshid=YmMyMTA2M2Y="
                                                    target="_blank" title="Instagram"><i
                                                        class="fab fa-instagram"></i></a>
                                            </li>
                                            <li><a href="#" title="Youtube"><i class="fab fa-youtube-f"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white plr--9---">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="{{ localeUrl('/') }}"><img
                                    src="{{ asset('portal/assets') }}/images/logo/logo.svg" alt="Logo"
                                    width="116px"></a>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column menu-color-white---">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">

                                <ul>
                                    <li><a href="{{ localeUrl('/') }}">{{ trans('messages.home') }}</a></li>

                                    <li><a href="{{ localeUrl('/about-us') }}">{{ trans('messages.aboutus') }}</a>
                                    </li>
                                    <li class="menu-icon"><a href="#">{{ trans('messages.products') }}</a>
                                        <ul>
                                            <!--<li><a-->
                                            <!--        href="{{ localeUrl('/') }}/categories/pasta">{{ trans('messages.pasta') }}</a>-->
                                            <!--</li>-->
                                            {{--                                            <li><a --}}
                                            {{--                                                    href="{{ localeUrl('/') }}/categories/rice">{{ trans('messages.rice') }}</a> --}}
                                    </li>
                                    <li><a
                                            href="{{ localeUrl('/') }}/categories/aseptic-tomato-paste">Aseptic Tomato Paste</a>
                                    </li>
                                    <li><a
                                            href="{{ localeUrl('/') }}/categories/tomato-puree">{{ trans('messages.tomato_paste') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ localeUrl('/') }}/categories/sauces">{{ trans('messages.sauces') }}</a>
                                    </li>
                                    {{--                                            <li><a
                                            {{--                                                    href="{{ localeUrl('/') }}/categories/biscuit">{{ trans('messages.biscuit') }}</a> --}}
                                    {{--                                            </li> --}}
                                    {{--                                            <li><a --}}
                                    {{--                                                    href="{{ localeUrl('/') }}/categories/legumes">{{ trans('messages.legumes') }}</a> --}}
                                    {{--                                            </li> --}}
                                    {{--                                            <li><a --}}
                                    {{--                                                    href="{{ localeUrl('/') }}/categories/jam">{{ trans('messages.jam') }}</a> --}}
                                    {{--                                            </li> --}}
                                    {{--                                            <li><a --}}
                                    {{--                                                    href="{{ localeUrl('/') }}/categories/canned-food">{{ trans('messages.canned_food') }}</a> --}}
                                    {{--                                            </li> --}}
                                    {{--                                            <li><a --}}
                                    {{--                                                    href="{{ localeUrl('/') }}/categories/oil">{{ trans('messages.oil') }}</a> --}}
                                    {{--                                            </li> --}}
                                    {{-- <li><a
                                                    href="{{ localeUrl('/') }}/categories/vinegar">{{ trans('messages.vinegar') }}</a>
                                            </li> --}}
                                    {{--                                            <li><a --}}
                                    {{--                                                    href="{{ localeUrl('/') }}/categories/butter">{{ trans('messages.butter') }}</a> --}}
                                    {{--                                            </li> --}}
                                    {{--                                            <li><a --}}
                                    {{--                                                    href="{{ localeUrl('/') }}/categories/juice">{{ trans('messages.juice') }}</a> --}}
                                    {{--                                            </li> --}}
                                    {{--                                            <li><a --}}
                                    {{--                                                    href="{{ localeUrl('/') }}/categories/spices">{{ trans('messages.spices') }}</a> --}}
                                    {{--                                            </li> --}}
                                    {{-- <li><a
                                                    href="{{ localeUrl('/') }}/categories/flour">{{ trans('messages.flour') }}</a>
                                            </li> --}}
                                    {{-- <li><a
                                                    href="{{ localeUrl('/') }}/categories/frozen">{{ trans('messages.frozen') }}</a>
                                            </li> --}}
                                    {{-- <li><a
                                                    href="{{ localeUrl('/') }}/categories/potatoes">{{ trans('messages.potatoes') }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ localeUrl('/') }}/categories/pickles">{{ trans('messages.pickles') }}</a>
                                            </li> --}}
                                    {{--                                            <li><a --}}
                                    {{--                                                    href="{{ localeUrl('/') }}/categories/corn-flakes">{{ trans('messages.corn_flakes') }}</a> --}}
                                    {{--                                            </li> --}}
                                    {{--                                            <li><a --}}
                                    {{--                                                    href="{{ localeUrl('/') }}/categories/halawa-and-tahina">{{ trans('messages.halawa_and_tahina') }}</a> --}}
                                    {{--                                            </li> --}}
                                </ul>
                                </li>
                                {{-- <li><a href="{{localeUrl('/verotel')}}">{{trans('messages.verotel_hotel')}}</a></li> --}}
                                {{--                                    <li> --}}
                                {{--                                        <a href="{{ localeUrl('/') }}/categories/export-products">{{ trans('messages.export_products') }}</a> --}}
                                {{--                                    </li> --}}
                                {{-- <li>
                                        <a href="{{ localeUrl('/') }}/categories/b2b-products">{{ trans('messages.b2b_products') }}</a>
                                    </li> --}}
                                <li><a href="{{ localeUrl('/markets') }}">{{ trans('messages.markets') }}</a>
                                </li>
                                <li><a href="{{ localeUrl('/contact-us') }}">{{ trans('messages.contactus') }}</a>
                                </li>

                                <li>
                                    <a
                                        href="{{ localeUrl('/our-certifications') }}">{{ trans('messages.our_certifications') }}</a>
                                </li>
                                {{-- <li>
                                        <a href="{{ localeUrl('/portfolio') }}">{{ trans('messages.download_portfolio') }}</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="ltn__header-options ltn__header-options-2">
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->


</header>
<!-- HEADER AREA END -->

<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="{{ localeUrl('/') }}">
                    <img src="{{ asset('portal/assets') }}/images/logo/logo.svg" alt="Logo"
                        width="116px"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu pb-30" style="border-bottom: 1px solid var(--border-color-1);">
            <ul>
                <li><a href="{{ localeUrl('/') }}">{{ trans('messages.home') }}</a></li>

                <li><a href="{{ localeUrl('/about-us') }}">{{ trans('messages.aboutus') }}</a></li>
                <li>
                    <span class="menu-expand"></span>
                    <a href="#">{{ trans('messages.products') }}</a>
                    <ul class="sub-menu" style="display: none;">
                        <!--<li><a href="{{ localeUrl('/') }}/categories/pasta">{{ trans('messages.pasta') }}</a></li>-->
                        {{--                        <li><a href="{{ localeUrl('/') }}/categories/rice">{{ trans('messages.rice') }}</a></li> --}}
                        <li><a href="{{ localeUrl('/') }}/categories/sauces">{{ trans('messages.sauces') }}</a></li>
                        {{--                        <li><a href="{{ localeUrl('/') }}/categories/biscuit">{{ trans('messages.biscuit') }}</a> --}}
                </li>
                {{--                        <li><a href="{{ localeUrl('/') }}/categories/legumes">{{ trans('messages.legumes') }}</a> --}}
                {{--                        </li> --}}
                <li><a href="{{ localeUrl('/') }}/categories/tomato-puree">{{ trans('messages.tomato_paste') }}</a>
                </li>
                {{--                        <li><a href="{{ localeUrl('/') }}/categories/jam">{{ trans('messages.jam') }}</a></li> --}}
                {{--                        <li><a --}}
                {{--                                href="{{ localeUrl('/') }}/categories/canned-food">{{ trans('messages.canned_food') }}</a> --}}
                {{--                        </li> --}}
                {{--                        <li><a href="{{ localeUrl('/') }}/categories/oil">{{ trans('messages.oil') }}</a></li> --}}
                {{-- <li><a href="{{ localeUrl('/') }}/categories/vinegar">{{ trans('messages.vinegar') }}</a>
                        </li> --}}
                {{--                        <li><a href="{{ localeUrl('/') }}/categories/butter">{{ trans('messages.butter') }}</a></li> --}}
                {{--                        <li><a href="{{ localeUrl('/') }}/categories/juice">{{ trans('messages.juice') }}</a></li> --}}
                {{--                        <li><a href="{{ localeUrl('/') }}/categories/spices">{{ trans('messages.spices') }}</a></li> --}}
                {{-- <li><a href="{{ localeUrl('/') }}/categories/flour">{{ trans('messages.flour') }}</a></li> --}}
                {{-- <li><a
                                href="{{ localeUrl('/') }}/categories/frozen">{{ trans('messages.frozen') }}</a>
                        </li>
                        <li><a
                                href="{{ localeUrl('/') }}/categories/potatoes">{{ trans('messages.potatoes') }}</a>
                        </li>
                        <li><a
                                href="{{ localeUrl('/') }}/categories/pickles">{{ trans('messages.pickles') }}</a>
                        </li> --}}
                {{--                        <li> --}}
                {{--                            <a href="{{ localeUrl('/') }}/categories/corn-flakes">{{ trans('messages.corn_flakes') }}</a> --}}
                {{--                        </li> --}}
                {{--                        <li> --}}
                {{--                            <a href="{{ localeUrl('/') }}/categories/halawa-and-tahina">{{ trans('messages.halawa_and_tahina') }}</a> --}}
                {{--                        </li> --}}
            </ul>
            </li>
            {{-- <li><a href="{{localeUrl('/verotel')}}">{{trans('messages.verotel_hotel')}}</a></li> --}}
            {{--                <li> --}}
            {{--                    <a href="{{ localeUrl('/') }}/categories/export-products">{{ trans('messages.export_products') }}</a> --}}
            {{--                </li> --}}
            {{-- <li>
                    <a href="{{ localeUrl('/') }}/categories/b2b-products">{{ trans('messages.b2b_products') }}</a>
                </li> --}}
            <li><a href="{{ localeUrl('/markets') }}">{{ trans('messages.markets') }}</a></li>
            <li><a href="{{ localeUrl('/contact-us') }}">{{ trans('messages.contactus') }}</a></li>

            <li><a href="{{ localeUrl('/our-certifications') }}">{{ trans('messages.our_certifications') }}</a></li>
            {{-- <li><a href="{{ localeUrl('/portfolio') }}">{{ trans('messages.download_portfolio') }}</a></li> --}}
            </ul>
        </div>
        <div class="ltn__social-media-2">
            <ul>
                <li><a href="https://www.facebook.com/profile.php?id=100083805607274&mibextid=LQQJ4d" target="_blank"
                        title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/company/vero-foods/" target="_blank" title="Linkedin"><i
                            class="fab fa-linkedin"></i></a></li>
                <li><a href="https://instagram.com/verofoods.co?igshid=YmMyMTA2M2Y=" target="_blank"
                        title="Instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->

<div class="ltn__utilize-overlay"></div>
