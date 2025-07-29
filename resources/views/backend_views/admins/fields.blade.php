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
    {!! Form::label('password', trans("messages.attributes.password"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 '.(empty($admin) ? 'required' : '')]) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::password('password', ['class' => 'form-control '.($errors->has('password') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.password"), (empty($admin) ? 'required' : '')]) !!}
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
    {!! Form::label('password_confirmation', trans("messages.attributes.password_confirmation"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 '. (empty($admin) ? 'required' : '')]) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::password('password_confirmation', ['class' => 'form-control '.($errors->has('password_confirmation') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.password_confirmation"), (empty($admin) ? 'required' : '')]) !!}
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
    {!! Form::label('roles[]', trans('messages.attributes.roles'), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::select('roles[]', $roles, !empty($admin) ? $admin->roles()->pluck('id')->toArray() : [], [
    'class' => 'form-select '.($errors->has('merchant_branch_id') ? 'is-invalid':'').' form-select-solid form-select-lg fw-bold',
'aria-label'=>trans('messages.select').' '.trans('messages.attributes.roles'), 'data-control'=>"select2", 'data-language' => app()->getLocale(),
'data-dir' => 'rtl', 'data-placeholder'=>trans('messages.select').' '.trans('messages.attributes.roles').'...', 'required', 'multiple']) !!}
            @if ($errors->has('roles'))
                <div class="invalid-feedback">
                    {{ $errors->first('roles') }}
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
            @include('layouts.commons.boolean-field', ['model' => !empty($admin) ? $admin : null, 'name' => 'is_active'])
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
            @include('layouts.commons.image-field', ['model' => !empty($admin) ? $admin : null, 'imageName' => 'image'])
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
