@extends('layouts.backend.app')

@section('title')
    {{trans('messages.create').' '.trans('messages.attributes.City')}}
@stop

@include('backend_views.cities.css')

@section('content')

@section('toolbar')
    @include('layouts.commons.toolbar', ['current' => trans('messages.create').' '.trans('messages.attributes.City'),
'parent' => ['url' => route($guard.'.cities.index'), 'name' =>  trans('messages.attributes.cities'),]])
@stop

<!--begin::Card-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" >
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{trans('messages.create').' '.trans('messages.attributes.City')}}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Form-->
{!! Form::open(['route' => $guard.'.cities.store', 'files' => true, 'class' => 'form fv-plugins-bootstrap5 fv-plugins-framework', 'id' => 'kt_form']) !!}
@include('backend_views.cities.fields')
{!! Form::close() !!}
<!--end::Form-->
</div>
<!--end::Card-->

@endsection

@include('backend_views.cities.js')
