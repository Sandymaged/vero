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
    {!! Form::label('merchant_id', trans("messages.attributes.merchant"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::select('merchant_id', $merchants, null, ['class' => 'form-select '.($errors->has('merchant_id') ? 'is-invalid':'').' form-select-solid form-select-lg fw-bold',
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
    {!! Form::label('location', trans("messages.attributes.location"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-6 fv-row">
                {!! Form::text('location[latitude]', (!empty($merchantBranch) ? $merchantBranch->latitude : null), ['class' => 'form-control '.($errors->has('location.latitude') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.latitude"), 'required']) !!}
                <!--begin::Hint-->
                    <div class="form-text">{{trans("messages.attributes.latitude")}}</div>
                    <!--end::Hint-->
                    @if ($errors->has('location.latitude'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location.latitude') }}
                        </div>
                    @endif
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-6 fv-row">
                {!! Form::text('location[longitude]', (!empty($merchantBranch) ? $merchantBranch->longitude : null), ['class' => 'form-control '.($errors->has('location.longitude') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.longitude"), 'required']) !!}
                <!--begin::Hint-->
                    <div class="form-text">{{trans("messages.attributes.longitude")}}</div>
                    <!--end::Hint-->
                    @if ($errors->has('location.longitude'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location.longitude') }}
                        </div>
                    @endif
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <h3 class="font-size-lg text-dark font-weight-bold mb-6">{{trans('messages.attributes.branch_responsible')}}</h3>

    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
    {!! Form::label('responsible_name', trans("messages.model_name", ['operator' => trans("messages.attributes.responsible")]), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::text('responsible_name', null, ['class' => 'form-control '.($errors->has('responsible_name') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.model_name", ['operator' => trans("messages.attributes.responsible")]), 'required']) !!}
            @if ($errors->has('responsible_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('responsible_name') }}
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
    {!! Form::label('responsible_phone', trans("messages.model_phone", ['operator' => trans("messages.attributes.responsible")]), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::text('responsible_phone', null, ['class' => 'form-control '.($errors->has('responsible_phone') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.model_phone", ['operator' => trans("messages.attributes.responsible")]), 'required']) !!}
            @if ($errors->has('responsible_phone'))
                <div class="invalid-feedback">
                    {{ $errors->first('responsible_phone') }}
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
            @include('layouts.commons.boolean-field', ['model' => !empty($merchantBranch) ? $merchantBranch : null, 'name' => 'is_active'])
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
            @include('layouts.commons.image-field', ['model' => !empty($merchantBranch) ? $merchantBranch : null, 'imageName' => 'image'])
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
