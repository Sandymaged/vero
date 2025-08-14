<div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="table-responsive">

        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-center" id="kt_customers_table"
               data-delete_url="{{route($guard.'.subcategories.deleteAll')}}">
            <!--begin::Table head-->
            <thead>
            <!--begin::Table row-->
            <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <!-- <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="



													" style="width: 29.25px;">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                               data-kt-check-target="#kt_customers_table .form-check-input" value="1">
                    </div>
                </th> -->
                <th class="min-w-125px">{{trans('messages.attributes.name')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.state')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.is_active')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.created_at')}}</th>
                <th class="min-w-70px">{{trans('messages.actions')}}</th>
            </tr>
            <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
            @foreach($subcategories as $subcategory)
                <tr>
                    <!--begin::Checkbox-->
                    <!-- <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input cell-checkbox" type="checkbox" value="1" data-id="{{$subcategory->id}}"/>
                        </div>
                    </td> -->
                    <!--end::Checkbox-->
                    <!--begin::Name=-->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{$subcategory->name}}</a>
                    </td>
                    <!--end::Name=-->
                    <!--begin::Name=-->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{optional($subcategory->state)->name}}</a>
                    </td>
                    <!--end::Name=-->
                    <!--begin::Email=-->
                    <td>
                        {!! getIsActive($subcategory->is_active) !!}
                    </td>
                    <!--end::Email=-->
                    <!--begin::Payment method=-->
                    <td style="direction: ltr;">
                        {{$subcategory->created_at->format('d M Y, h:i a')}}
                    </td>
                    <!--end::Payment method=-->
                    
                    <td>
                        <form action="{{ route($guard.'.subcategories.delete', $subcategory->id) }}" 
                            method="GET" 
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-light btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this?')">
                                {{ trans('messages.delete') }}
                            </button>
                        </form>
                    </td>
                    <!--end::Action=-->
                </tr>
            @endforeach
            </tbody>
            <!--end::Table body-->
        </table>
    </div>
</div>
