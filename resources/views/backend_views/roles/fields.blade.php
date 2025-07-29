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
    {!! Form::label('guard_name', trans("messages.attributes.guard_name"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
    <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row ">
            <!--begin::Input-->
            {!! Form::text('guard_name', 'web', ['class' => 'form-control '.($errors->has('guard_name') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.guard_name"), 'required']) !!}
            @if ($errors->has('guard_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('guard_name') }}
                </div>
        @endif
        <!--end::Input-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

    <!--begin::Permissions-->
    <div class="fv-row">
        <!--begin::Label-->
        <label class="fs-5 fw-bolder form-label mb-2">{{trans('messages.attributes.role_permissions')}}</label>
        <!--end::Label-->
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                <!--begin::Table row-->
                <tr class="row">
                    <td class="col-lg-4 text-gray-800">{{trans('messages.full_access')}}</td>
                    <td class="col-lg-8">
                        <!--begin::Checkbox-->
                        <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                            <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all"/>
                            <span class="form-check-label" for="kt_roles_select_all">{{trans('messages.select_all')}}</span>
                        </label>
                        <!--end::Checkbox-->
                    </td>
                </tr>
                <!--end::Table row-->
                @foreach($permissions as $permission)
                    <!--begin::Table row-->
                    <tr class="row">
                        <!--begin::Label-->
                        <td class="col-lg-4 text-gray-800">{{trans('messages.attributes.'.\Str::snake($permission['module']))}}</td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td class="col-lg-8">
                            <!--begin::Wrapper-->
                            <div class="d-flex">
                            @foreach($permission['permissions'] as $access)
                                <!--begin::Checkbox-->
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                        <input class="form-check-input" type="checkbox"
                                               value="{{$permission['module'].'.'.$access}}" name="permissions[]"
                                        @if(!empty($role) && $role->hasPermissionTo($permission['module'].'.'.$access)) checked @endif/>
                                        <span class="form-check-label">{{trans('messages.'.$access)}}</span>
                                    </label>
                                    <!--end::Checkbox-->
                                @endforeach
                            </div>
                            <!--end::Wrapper-->
                        </td>
                        <!--end::Input group-->
                    </tr>
                    <!--end::Table row-->
                @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Permissions-->

</div>
<!--end::Card body-->
<!--begin::Actions-->
<div class="card-footer d-flex justify-content-end py-6 px-9">
    <button type="reset" class="btn btn-light btn-active-light-primary me-2">{{trans("messages.discard")}}</button>
    <button type="submit" class="btn btn-primary" id="kt_submit">{{trans("messages.save_changes")}}</button>
</div>
<!--end::Actions-->
