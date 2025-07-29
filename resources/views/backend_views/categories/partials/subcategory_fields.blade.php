<!--begin::Input group-->
<div class="row mb-6">
    <!--begin::Col-->
    <div class="col-12 fv-row ">
        <!--begin::Label-->
        <label class="fs-5 fw-bolder form-label mb-2 me-5">{{trans('messages.attributes.subcategories')}}</label>
        <!--end::Label-->
        <button type="button" class="btn btn-secondary btn-sm btn-active-light-info me-2 add-row">
            {{trans('messages.add')}} {{trans('messages.attributes.Subcategory')}}</a>
        </button>
    </div>
    <!--end::Col-->
</div>

<!--end::Input group-->
<div class="fv-row">
    <!--begin::Table wrapper-->
    <div class="table-responsive">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5">
            <thead class="text-gray-600 fw-bold">
            <!--begin::Table row-->
            <tr class="row">
                <!--begin::Label-->
                <td class="col-lg-4 text-gray-800">
                    {!! Form::label('#', '#', ['class' => 'col-form-label fw-bold fs-6']) !!}
                </td>
                <!--end::Label-->
                <!--begin::Input group-->
                <td class="col-lg-4">
                    {!! Form::label('name', trans("messages.attributes.name"), ['class' => 'col-form-label fw-bold fs-6 required']) !!}
                </td>
                <!--end::Input group-->
                <td class="col-lg-2">
                    {!! Form::label('is_active', trans("messages.attributes.is_active"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
                </td>
                <!--end::Input group-->
                <td class="col-lg-2">
                    {!! Form::label('is_active', trans("messages.attributes.is_active"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
                </td>
            </tr>
            </thead>
            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">

            @if(!empty($category) && $category->subcategories->count())
                @foreach($category->subcategories as $key => $subcategory)
                    <tr class="row subcategory-wrapper">
                        <!--begin::Label-->
                        <td class="col-lg-4 text-gray-800">
                            {!! Form::hidden('subcategories['.$key.'][id]', $subcategory->id) !!}
                            {!! Form::label('subcategories['.$key.'][name]', ($key+1), ['class' => 'col-form-label fw-bold fs-6 serial']) !!}
                        </td>
                        <!--end::Label-->
                        <!--begin::Input group-->
                        <td class="col-lg-4">
                            <!--begin::Input-->
                            {!! Form::text('subcategories['.$key.'][name]', null, ['class' => 'later-validate form-control '.($errors->has('subcategories.'.$key.'.name') ? 'is-invalid':'').' form-control-lg form-control-solid', 'placeholder' => trans("messages.attributes.name"), 'required']) !!}
                            @if ($errors->has('subcategories.'.$key.'.name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subcategories.'.$key.'.name') }}
                                </div>
                        @endif
                        <!--end::Input-->
                        </td>
                        <!--end::Input group-->
                        <td class="col-lg-2">
                            @include('layouts.commons.boolean-field', ['model' => !empty($subcategory) ? $subcategory : null, 'key' => 'subcategories['.$key.'][is_active]', 'name' => 'is_active', 'id' => 'subcategories-'.$key.'-is_active'])
                        </td>
                        <!--end::Input group-->
                        <td class="col-lg-2">
                            <a class="btn btn-icon btn-active-light-primary w-30px h-30px delete-row"
                               data-index="{{$key}}"
                               href="javascript:">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                <span class="svg-icon svg-icon-danger svg-icon-2x">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
            fill="#000000" fill-rule="nonzero"/>
        <path
            d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
            fill="#000000" opasubcategory="0.3"/>
    </g>
</svg><!--end::Svg Icon-->
                                    </span>
                            </a>

                        </td>
                    </tr>
                    <!--end::Table row-->
                @endforeach
            @endif

            <tr class="row no-data-row @if(!empty($category) && !$category->subcategories->isEmpty()) d-none @endif">
                <td colspan="4" class="col-12 text-gray-800 text-center">
                    {{trans('messages.no_data', ['operator' => trans('messages.attributes.Subcategories')])}}
                </td>
            </tr>

            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>
    <!--end::Table wrapper-->
</div>
