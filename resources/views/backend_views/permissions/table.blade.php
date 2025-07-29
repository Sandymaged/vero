<div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="table-responsive">

        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-center" id="kt_customers_table"
               data-delete_url="{{route($guard.'.permissions.deleteAll')}}">
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
                <th class="min-w-125px">{{trans('messages.attributes.name')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.guard_name')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.created_at')}}</th>
                <th class="text-center min-w-70px">{{trans('messages.actions')}}</th>
            </tr>
            <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
            @foreach($permissions as $permission)
                <tr>
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input cell-checkbox" type="checkbox" value="1" data-id="{{$permission->id}}"/>
                        </div>
                    </td>
                    <!--begin::Name=-->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{$permission->name}}</a>
                    </td>
                    <!--end::Name=-->
                    <!--begin::Name=-->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{$permission->guard_name}}</a>
                    </td>
                    <!--end::Name=-->
                    <!--begin::Payment method=-->
                    <td style="direction: ltr;">
                        {{$permission->created_at->format('d M Y, h:i a')}}
                    </td>
                    <!--end::Payment method=-->
                    <!--begin::Action=-->
                    <td>
                        <!--begin::Update-->
                        <a class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" href="{{route($guard.'.permissions.edit', $permission->id)}}">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
																	<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
																</svg>
															</span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--end::Update-->
                        <!--begin::Delete-->
                        <a class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-customer-table-filter="delete_row" href="{{route($guard.'.permissions.delete', $permission->id)}}">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
																</svg>
															</span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--end::Delete-->
                    </td>
                    <!--end::Action=-->
                </tr>
            @endforeach
            </tbody>
            <!--end::Table body-->
        </table>
    </div>
</div>
