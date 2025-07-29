<!--begin::Card body-->
<div class="card-body border-top p-9">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
    {!! Form::label('merchant_id', trans("messages.attributes.merchant"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::select('merchant_id', $merchants, null, ['class' => 'form-select '.($errors->has('merchant_id') ? 'is-invalid':'').' form-select-solid form-select-lg fw-bold',
'onchange'=>"getRequest('".route($guard.'.merchantBranches.getBranches')."?merchant_id='+this.value,'merchant-branch-select','select')",
'aria-label'=>trans('messages.select').' '.trans('messages.attributes.merchant'), 'data-control'=>"select2", 'data-language' => app()->getLocale(), 'data-placeholder'=>trans('messages.select').' '.trans('messages.attributes.merchant').'...', 'required']) !!}
            @if ($errors->has('merchant_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('merchant_id') }}
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
    {!! Form::label('merchant_branch_id', trans("messages.attributes.branch"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::select('merchant_branch_id', [], null, ['class' => 'form-select '.($errors->has('merchant_branch_id') ? 'is-invalid':'').' form-select-solid form-select-lg fw-bold',
'data-id' => (!empty($offer) ? $offer->merchant_branch_id : ''),
'aria-label'=>trans('messages.select').' '.trans('messages.attributes.merchant_branch'), 'data-control'=>"select2", 'data-language' => app()->getLocale(), 'data-placeholder'=>trans('messages.select').' '.trans('messages.attributes.merchant_branch').'...', 'id' => 'merchant-branch-select']) !!}
            @if ($errors->has('merchant_branch_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('merchant_branch_id') }}
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
    {!! Form::label('type', trans("messages.attributes.type"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::select('type', ["" => "", 1 => trans('messages.attributes.man'), 2 => trans('messages.attributes.female')], null, ['class' => 'form-select '.($errors->has('type') ? 'is-invalid':'').' form-select-solid form-select-lg fw-bold',
'aria-label'=>trans('messages.select').' '.trans('messages.attributes.type'), 'data-control'=>"select2", 'data-language' => app()->getLocale(), 'data-placeholder'=>trans('messages.select').' '.trans('messages.attributes.type').'...', 'required']) !!}
            @if ($errors->has('type'))
                <div class="invalid-feedback">
                    {{ $errors->first('type') }}
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
    {!! Form::label('category_id', trans("messages.attributes.category"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
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
    {!! Form::label('subcategory_id', trans("messages.attributes.subcategory"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
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
    {!! Form::label('service_id', trans("messages.attributes.service"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::select('service_id', [], null, ['class' => 'form-select '.($errors->has('service_id') ? 'is-invalid':'').' form-select-solid form-select-lg fw-bold',
'data-id' => (!empty($offer) ? $offer->service_id : ''),
'aria-label'=>trans('messages.select').' '.trans('messages.attributes.service'), 'data-control'=>"select2", 'data-language' => app()->getLocale(), 'data-placeholder'=>trans('messages.select').' '.trans('messages.attributes.service').'...', 'id' => 'service-select']) !!}
            @if ($errors->has('service_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('service_id') }}
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
    {!! Form::label('extra_details', trans("messages.attributes.extra_details"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::textarea('extra_details', null, ['class' => 'form-control '.($errors->has('extra_details') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.extra_details")]) !!}
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
    {!! Form::label('is_active', trans("messages.attributes.is_active"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            @include('layouts.commons.boolean-field', ['model' => !empty($offer) ? $offer : null, 'name' => 'is_active'])
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
    {!! Form::label('image', trans("messages.attributes.image"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            @include('layouts.commons.image-field', ['model' => !empty($offer) ? $offer : null, 'imageName' => 'image'])
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
    {!! Form::label('video_url', trans("messages.attributes.video_url"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::text('video_url', null, ['class' => 'form-control '.($errors->has('video_url') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.video_url")]) !!}
            @if ($errors->has('video_url'))
                <div class="invalid-feedback">
                    {{ $errors->first('video_url') }}
                </div>
        @endif
        <!--end::Input-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <h3 class="font-size-lg text-dark font-weight-bold mb-6">{{trans('messages.attributes.price')}}</h3>

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
    {!! Form::label('price', trans("messages.attributes.price"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::number('price', null, ['class' => 'form-control '.($errors->has('price') ? 'is-invalid':'').' form-control-lg form-control-solid',
'placeholder' => trans("messages.attributes.price"), 'required', 'min'=>"1", 'step'=>"0.01", 'onkeypress'=>"return isNumber(event)"]) !!}
            @if ($errors->has('price'))
                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
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
    {!! Form::label('application_percentage', trans("messages.attributes.application_percentage"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::number('application_percentage', null, ['class' => 'form-control '.($errors->has('application_percentage') ? 'is-invalid':'').' form-control-lg form-control-solid',
'placeholder' => trans("messages.attributes.application_percentage"), 'required', 'min'=>"1", 'max'=>"100", 'step'=>"0.01", 'onkeypress'=>"return isNumber(event)"]) !!}
            @if ($errors->has('application_percentage'))
                <div class="invalid-feedback">
                    {{ $errors->first('application_percentage') }}
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
    {!! Form::label('notes', trans("messages.attributes.notes"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::textarea('notes', null, ['class' => 'form-control '.($errors->has('notes') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.notes")]) !!}
            @if ($errors->has('notes'))
                <div class="invalid-feedback">
                    {{ $errors->first('notes') }}
                </div>
        @endif
        <!--end::Input-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

</div>
<!--end::Card body-->
<!--begin::Actions-->
<div class="card-footer d-flex justify-content-end py-6 px-9">
    <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{trans("messages.discard")}}</button>
    <button type="submit" class="btn btn-primary" id="kt_submit">{{trans("messages.save_changes")}}</button>
</div>
<!--end::Actions-->
