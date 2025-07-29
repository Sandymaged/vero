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
'data-id' => (!empty($merchantUser) ? $merchantUser->merchant_branch_id : ''),
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
    {!! Form::label('email', trans("messages.attributes.email"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::email('email', null, ['class' => 'form-control '.($errors->has('email') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.email"), 'required']) !!}
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
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
    {!! Form::label('password', trans("messages.attributes.password"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::password('password', ['class' => 'form-control '.($errors->has('password') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.password"), 'required']) !!}
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
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
    {!! Form::label('password_confirmation', trans("messages.attributes.password_confirmation"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::password('password_confirmation', ['class' => 'form-control '.($errors->has('password_confirmation') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.password_confirmation"), 'required']) !!}
            @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
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
            @include('layouts.commons.boolean-field', ['model' => !empty($merchantUser) ? $merchantUser : null, 'name' => 'is_active'])
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
            @include('layouts.commons.image-field', ['model' => !empty($merchantUser) ? $merchantUser : null, 'imageName' => 'image'])
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
