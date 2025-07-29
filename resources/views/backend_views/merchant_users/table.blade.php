<div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="table-responsive">

        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-center" id="kt_customers_table"
               data-delete_url="{{route($guard.'.merchantUsers.deleteAll')}}">
            <!--begin::Table head-->
            <thead>
            <!--begin::Table row-->
            <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="



													" style="width: 29.25px;">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                               data-kt-check-target="#kt_customers_table .form-check-input" value="1">
                    </div>
                </th>
                <th class="min-w-125px">{{trans('messages.attributes.image')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.name')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.email')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.merchant')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.merchant_branch')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.is_active')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.created_at')}}</th>
                <th class="text-center min-w-70px">{{trans('messages.actions')}}</th>
            </tr>
            <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
            @foreach($merchantUsers as $merchantUser)
                <tr>
                    <!--begin::Checkbox-->
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input cell-checkbox" type="checkbox" value="1" data-id="{{$merchantUser->id}}"/>
                        </div>
                    </td>
                    <!--end::Checkbox-->
                    <td>
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="#">
                                <div class="symbol-label">
                                    <img src="{{$merchantUser->image_path}}" alt="{{$merchantUser->name}}"  onerror="this.src='{{asset('public/image.png')}}'"
                                         class="w-100">
                                </div>
                            </a>
                        </div>
                    </td>
                    <!--begin::Name=-->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{$merchantUser->name}}</a>
                    </td>
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{$merchantUser->email}}</a>
                    </td>
                    <!--begin::Email=-->
                    <td>
                        <a href="#"
                           class="text-gray-600 text-hover-primary mb-1">{{optional($merchantUser->merchant)->name}}</a>
                    </td>
                    <td>
                        <a href="#"
                           class="text-gray-600 text-hover-primary mb-1">{{optional($merchantUser->merchantBranch)->name}}</a>
                    </td>
                    <td>
                        {!! getIsActive($merchantUser->is_active) !!}
                    </td>
                    <!--end::Email=-->
                    <!--begin::Payment method=-->
                    <td style="direction: ltr;">
                        {{$merchantUser->created_at->format('d M Y, h:i a')}}
                    </td>
                    <!--end::Payment method=-->
                    <!--begin::Action=-->
                    <td>
                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click"
                           data-kt-menu-placement="bottom-end">{{trans('messages.actions')}}
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-5 m-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="black"/>
															</svg>
														</span>
                            <!--end::Svg Icon--></a>
                        <!--begin::Menu-->
                        <div
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{route($guard.'.merchantUsers.edit', $merchantUser->id)}}" class="menu-link px-3">{{trans('messages.edit')}}</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{route($guard.'.merchantUsers.delete', $merchantUser->id)}}" class="menu-link px-3"
                                   data-kt-customer-table-filter="delete_row">{{trans('messages.delete')}}</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </td>
                    <!--end::Action=-->
                </tr>
            @endforeach
            </tbody>
            <!--end::Table body-->
        </table>
    </div>
</div>
