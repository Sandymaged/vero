@extends('layouts.backend.app')

@section('title')
    {{trans('messages.create').' '.trans('messages.attributes.Subcategory')}}
@stop

@include('backend_views.subcategories.css')

@section('content')

@section('toolbar')
    @include('layouts.commons.toolbar', ['current' => trans('messages.create').' '.trans('messages.attributes.Subcategory'),
'parent' => ['url' => route($guard.'.subcategories.index'), 'name' =>  trans('messages.attributes.subcategories'),]])
@stop

<!--begin::Card-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" >
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{trans('messages.create').' '.trans('messages.attributes.Subcategory')}}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Form-->
{!! Form::open(['route' => $guard.'.subcategories.store', 'files' => true, 'class' => 'form fv-plugins-bootstrap5 fv-plugins-framework', 'id' => 'kt_form']) !!}
@include('backend_views.subcategories.fields')
{!! Form::close() !!}
<!--end::Form-->
</div>
<!--end::Card-->

@endsection

@include('backend_views.subcategories.js')
