@extends('layouts.backend.app')

@section('title')
    {{trans('messages.model_list', ['operator' => __('messages.attributes.Markets')])}}
@stop

@section('content')
    @push('css')
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet"
              type="text/css"/>
        <!--end::Page Vendor Stylesheets-->
    @endpush

@section('toolbar')
    @include('layouts.commons.toolbar', ['current' => trans('messages.Markets', ['operator' => __('messages.attributes.Markets')])])
@stop

<!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
             <a href="{{route($guard.'.merchants.create')}}"  class="btn btn-primary">
              
        {{trans('messages.add')}} {{trans('messages.attributes.Market')}}</a>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
    @include('backend_views.merchants.table')
    <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->


@endsection
