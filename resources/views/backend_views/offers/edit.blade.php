@extends('layouts.backend.app')

@section('title')
    {{trans('messages.edit').' '.trans('messages.attributes.Offer')}}
@stop

@include('backend_views.offers.css')

@section('content')

@section('toolbar')
    @include('layouts.commons.toolbar', ['current' => trans('messages.edit').' '.trans('messages.attributes.Offer'),
'parent' => ['url' => route($guard.'.offers.index'), 'name' =>  trans('messages.attributes.offers'),]])
@stop

<!--begin::Card-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{trans('messages.edit').' '.trans('messages.attributes.Offer')}}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Form-->
{!! Form::model($offer, ['route' => [$guard.'.offers.update', $offer->id], 'files' => true, 'class' => 'form fv-plugins-bootstrap5 fv-plugins-framework', 'id' => 'kt_form', 'method' => 'patch']) !!}
@include('backend_views.offers.fields')
{!! Form::close() !!}
<!--end::Form-->
</div>
<!--end::Card-->

@endsection

@push('scripts_lib')
    <script>
        var isUpdate = true;

        var isUpdate = true;
        $(document).ready(function () {
            setTimeout(function () {
                let merchant = $("#merchant_id").val();
                let branch = $("#merchant-branch-select").attr("data-id");
                getRequest('{{route($guard.'.merchantBranches.getBranches')}}?merchant_id=' + merchant + '&branch=' + branch, 'merchant-branch-select', 'select');

                let category = $("#category_id").val();
                let subcategory = $("#subcategory-select").attr("data-id");
                let service = $("#service-select").attr("data-id");
                getRequest('{{route($guard.'.categories.getCategories')}}?parent_id=' + category + '&subcategory=' + subcategory, 'subcategory-select', 'select');
                getRequest('{{route($guard.'.categories.getCategories')}}?parent_id=' + subcategory + '&subcategory=' + service, 'service-select', 'select');


            }, 100);
        });

    </script>
    </script>
@endpush
@include('backend_views.offers.js')
