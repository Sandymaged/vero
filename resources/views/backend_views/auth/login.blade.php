@extends('layouts.backend.auth.default')
@section('title')
    {{trans('messages.dashboard')}} - {{trans('messages.login')}}
@stop
@section('content')
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url({{asset('assets/media/illustrations/sketchy-1/14.png')}})">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="javascript:" class="mb-12">
                    <img alt="Logo" src="{{asset('logo.svg')}}" class="h-40px"/>
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                {!! Form::open(['route' => $url.'.auth.login', 'class' => 'form w-100', 'id'=>"kt_sign_in_form", 'novalidate'=>"novalidate"]) !!}
                {!! csrf_field() !!}
                <!-- {!!  GoogleReCaptchaV3::renderField('login_id','login_action') !!} -->
                <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">{{trans('messages.sign_in_dashboard')}}</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">{{trans('messages.now_here')}}
                            <a href="javascript:"
                               class="link-primary fw-bolder">{{trans('messages.create_account')}}</a></div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                    {!! Form::label('email', trans("messages.attributes.email"), ['class' => 'form-label fs-6 fw-bolder text-dark']) !!}
                    <!--end::Label-->
                        <!--begin::Input-->
                    {!! Form::email('email', null, ['class' => 'form-control '.($errors->has('email') ? 'is-invalid':'').' form-control-lg form-control-solid', 'autocomplete'=>"off"]) !!} <!-- || $errors->has('g-recaptcha-response') -->
                    <!--end::Input-->
                        @if ($errors->has('email')) <!-- || $errors->has('g-recaptcha-response') -->
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                                <!-- {{ $errors->first('g-recaptcha-response') }} -->
                            </div>
                        @endif
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                        {!! Form::label('password', trans("messages.attributes.password"), ['class' => 'form-label fw-bolder text-dark fs-6 mb-0']) !!}
                        <!--end::Label-->
                            <!--begin::Link-->
                            <a href="javascript:"
                               class="link-primary fs-6 fw-bolder">{{trans('messages.forgot_password')}}</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Input-->
                    {!! Form::password('password', ['class' => 'form-control '.($errors->has('password') ? 'is-invalid':'').' form-control-lg form-control-solid', 'autocomplete'=>"off"]) !!}
                    <!--end::Input-->
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">{{trans('messages.continue')}}</span>
                            <span class="indicator-progress">{{trans('messages.please_wait')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Submit button-->
                        {{--                        <!--begin::Separator-->--}}
                        {{--                        <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>--}}
                        {{--                        <!--end::Separator-->--}}
                        {{--                        <!--begin::Google link-->--}}
                        {{--                        <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">--}}
                        {{--                            <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3"/>Continue--}}
                        {{--                            with Google</a>--}}
                        {{--                        <!--end::Google link-->--}}
                        {{--                        <!--begin::Google link-->--}}
                        {{--                        <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">--}}
                        {{--                            <img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3"/>Continue--}}
                        {{--                            with Facebook</a>--}}
                        {{--                        <!--end::Google link-->--}}
                        {{--                        <!--begin::Google link-->--}}
                        {{--                        <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">--}}
                        {{--                            <img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3"/>Continue--}}
                        {{--                            with Apple</a>--}}
                        {{--                        <!--end::Google link-->--}}
                    </div>
                    <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
        {{--        <div class="d-flex flex-center flex-column-auto p-10">--}}
        {{--            <!--begin::Links-->--}}
        {{--            <div class="d-flex align-items-center fw-bold fs-6">--}}
        {{--                <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>--}}
        {{--                <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>--}}
        {{--                <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>--}}
        {{--            </div>--}}
        {{--            <!--end::Links-->--}}
        {{--        </div>--}}
        <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>

@endsection

@push('scripts_lib')
    <script src="{{asset('assets/js/pages/authentication.js')}}"></script>
@endpush
