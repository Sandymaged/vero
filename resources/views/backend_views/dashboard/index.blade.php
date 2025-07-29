@extends('layouts.backend.app')

@section('title')
    {{trans('messages.dashboard')}}
@stop

@section('content')
    @push('css')

    @endpush

@section('toolbar')
    @include('layouts.commons.toolbar', ['current' => trans('messages.dashboard')])
@stop

<!--begin::Mixed Widget 7-->
<div class="card card-xl-stretch-50 mb-5 mb-xl-8">
    <!--begin::Body-->
    <div class="card-body d-flex flex-column p-0">
        <!--begin::Stats-->
        <div class="flex-grow-1 card-p pb-0">
            <div class="d-flex flex-stack flex-wrap">
                <div class="me-2">
                    <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">{{trans('messages.generate_reports')}}</a>
                    <div class="text-muted fs-7 fw-bold">{{trans('messages.finance_and_accounting_reports')}}</div>
                </div>
                <div class="fw-bolder fs-3 text-primary">SAR 24,500</div>
            </div>
        </div>
        <!--end::Stats-->
        <!--begin::Chart-->
        <div class="mixed-widget-7-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 150px"></div>
        <!--end::Chart-->
    </div>
    <!--end::Body-->
</div>
<!--end::Mixed Widget 7-->
<!--begin::Mixed Widget 10-->
<div class="card card-xl-stretch-50 mb-5 mb-xl-8">
    <!--begin::Body-->
    <div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
        <!--begin::Hidden-->
        <div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 pt-9 pb-3">
            <div class="me-2">
                <span class="fw-bolder text-gray-800 d-block fs-3">{{trans('messages.sales')}}</span>
                <span class="text-gray-400 fw-bold">Oct 8 - Oct 26 21</span>
            </div>
            <div class="fw-bolder fs-3 text-primary">SAR 15,300</div>
        </div>
        <!--end::Hidden-->
        <!--begin::Chart-->
        <div class="mixed-widget-10-chart" data-kt-color="primary" style="height: 175px"></div>
        <!--end::Chart-->
    </div>
</div>
<!--end::Mixed Widget 10-->

@push('scripts_lib')
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
@endpush
@endsection

