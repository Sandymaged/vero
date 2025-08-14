<!--begin::Card body-->
<div class="card-body border-top p-9">
<!--begin::Input group-->
<div class="row mb-6">
        <!--begin::Label-->
    {!! Form::label('name', trans("messages.attributes.name"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::text('name', null, ['class' => 'form-control '.($errors->has('name') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.name"), 'required']) !!}
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
        @endif
        <!--end::Input-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->  
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
    {!! Form::label('category_id', trans("messages.attributes.Category"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::select('category_id', $categories, null, ['class' => 'form-select '.($errors->has('category_id') ? 'is-invalid':'').' form-select-solid form-select-lg fw-bold',
'aria-label'=>trans('messages.select').' '.trans('messages.attributes.category'), 'data-control'=>"select2", 'data-language' => app()->getLocale(), 'data-placeholder'=>trans('messages.select').' '.trans('messages.attributes.category').'...', 'required',
'onchange'=>"getRequest('".route($guard.'.categories.getCategories')."?parent_id='+this.value,'subcategory-select','select')"]) !!}
            @if ($errors->has('category_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('category_id') }}
                </div>
        @endif
        <!--end::Input-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
    {!! Form::label('subcategory_id', trans("messages.attributes.Subcategory"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::select('subcategory_id', [], null, ['class' => 'form-select '.($errors->has('subcategory_id') ? 'is-invalid':'').' form-select-solid form-select-lg fw-bold',
'data-id' => (!empty($offer) ? $offer->subcategory_id : ''),
'aria-label'=>trans('messages.select').' '.trans('messages.attributes.subcategory'), 'data-control'=>"select2", 'data-language' => app()->getLocale(), 'data-placeholder'=>trans('messages.select').' '.trans('messages.attributes.subcategory').'...', 'id' => 'subcategory-select',
'onchange'=>"getRequest('".route($guard.'.categories.getCategories')."?parent_id='+this.value,'service-select','select')"]) !!}
            @if ($errors->has('subcategory_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('subcategory_id') }}
                </div>
        @endif
        <!--end::Input-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
    {!! Form::label('Description', trans("messages.attributes.description"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::textarea('extra_details', null, ['class' => 'form-control '.($errors->has('extra_details') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.description")]) !!}
            @if ($errors->has('extra_details'))
                <div class="invalid-feedback">
                    {{ $errors->first('extra_details') }}
                </div>
        @endif
        <!--end::Input-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
    {!! Form::label('image', trans("messages.attributes.image"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            @include('layouts.commons.image-field', ['model' => !empty($offer) ? $offer : null, 'imageName' => 'image'])
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    
    <!--end::Input group-->

</div>
<!--end::Card body-->
<!--begin::Actions-->
<div class="card-footer d-flex justify-content-end py-6 px-9">
    <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{trans("messages.discard")}}</button>
    <button type="submit" class="btn btn-primary" id="kt_submit">{{trans("messages.save_changes")}}</button>
</div>
<!--end::Actions-->
