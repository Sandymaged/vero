@extends('layouts.backend.app')

@section('title')
    {{trans('messages.model_list', ['operator' => __('messages.attributes.admins')])}}
@stop

@section('content')
    @push('css')
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet"
              type="text/css"/>
        <!--end::Page Vendor Stylesheets-->
    @endpush

@section('toolbar')
    @include('layouts.commons.toolbar', ['current' => trans('messages.model_list', ['operator' => __('messages.attributes.admins')])])
@stop

<!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            @include('backend_views.admins.partials.search')
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            @include('backend_views.admins.partials.toolbar')
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
    @include('backend_views.admins.table')
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
        var ajaxUrl = "{{route($guard.'.admins.getData')}}";
        var dataColumns = [
            {data: 'checkbox', name: 'checkbox', 'searchable': false, 'orderable': false, "sClass": "hidden-print"},
            {data: 'image', name: 'image', 'searchable': false, 'orderable': false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'roles', name: 'roles.name'},
            {data: 'is_active', name: 'is_active'},
            {data: 'created_at', name: 'created_at', 'searchable': false},
            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, "sClass": "hidden-print"}
        ];
        var dataFilters = function (d) {
            d.is_active = $('input[name="is_active"]:checked').val();
            d.role_id = $('#role_id').val();
        }
    </script>
    <script src="{{asset('assets/js/pages/list.js')}}"></script>
@endpush
@endsection

