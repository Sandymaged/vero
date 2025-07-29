@extends('layouts.backend.app')

@section('title')
    {{trans('messages.edit').' '.trans('messages.attributes.Admin')}}
@stop

@include('backend_views.admins.css')

@section('content')

@section('toolbar')
    @include('layouts.commons.toolbar', ['current' => trans('messages.edit').' '.trans('messages.attributes.Admin'),
'parent' => ['url' => route($guard.'.admins.index'), 'name' =>  trans('messages.attributes.admins'),]])
@stop

<!--begin::Card-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{trans('messages.edit').' '.trans('messages.attributes.Admin')}}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Form-->
{!! Form::model($admin, ['route' => [$guard.'.admins.update', $admin->id], 'files' => true, 'class' => 'form fv-plugins-bootstrap5 fv-plugins-framework', 'id' => 'kt_form', 'method' => 'patch']) !!}
@include('backend_views.admins.fields')
{!! Form::close() !!}
<!--end::Form-->
</div>
<!--end::Card-->

@endsection

@push('scripts_lib')
    <script>var isUpdate = true;</script>
@endpush
@include('backend_views.admins.js')
