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
    {!! Form::label('parent_id', trans("messages.attributes.category"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::select('parent_id', $categories, null, ['class' => 'form-select '.($errors->has('parent_id') ? 'is-invalid':'').' form-select-solid form-select-lg fw-bold',
'aria-label'=>trans('messages.select').' '.trans('messages.attributes.category'), 'data-control'=>"select2", 'data-language' => app()->getLocale(), 'data-placeholder'=>trans('messages.select').' '.trans('messages.attributes.category').'...', 'required']) !!}
            @if ($errors->has('parent_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('parent_id') }}
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
    {!! Form::label('state_id', trans("messages.attributes.state"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::select('state_id', $states, null, ['class' => 'form-select '.($errors->has('state_id') ? 'is-invalid':'').' form-select-solid form-select-lg fw-bold',
'aria-label'=>trans('messages.select').' '.trans('messages.attributes.state'), 'data-control'=>"select2", 'data-language' => app()->getLocale(), 'data-placeholder'=>trans('messages.select').' '.trans('messages.attributes.state').'...', 'required']) !!}
            @if ($errors->has('state_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('state_id') }}
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
            @include('layouts.commons.boolean-field', ['model' => !empty($subcategory) ? $subcategory : null, 'name' => 'is_active'])
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
