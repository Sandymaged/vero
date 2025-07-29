@extends('layouts.backend.app')

@section('title')
    {{trans('messages.model_list', ['operator' => __('messages.attributes.merchant_branches')])}}
@stop

@section('content')
    @push('css')
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet"
              type="text/css"/>
        <!--end::Page Vendor Stylesheets-->
    @endpush

@section('toolbar')
    @include('layouts.commons.toolbar', ['current' => trans('messages.model_list', ['operator' => __('messages.attributes.merchant_branches')])])
@stop

<!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            @include('backend_views.merchant_branches.partials.search')
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            @include('backend_views.merchant_branches.partials.toolbar')
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
    @include('backend_views.merchant_branches.table')
    <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->

@push('scripts_lib')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Page Vendors Javascript-->

    <script>
        var columnDefs = [
            {orderable: false, targets: 0}, // Disable ordering on column 0 (checkbox)
            {orderable: false, targets: 1},
            {orderable: false, targets: 8}, // Disable ordering on column 6 (actions)
        ];
    </script>
    <script src="{{asset('assets/js/pages/list.js')}}"></script>
@endpush
@endsection

