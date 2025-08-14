@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="table-responsive">

        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-center" id="kt_customers_table"
               data-delete_url="{{route($guard.'.merchants.deleteAll')}}">
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
                <th class="min-w-125px">{{trans('messages.attributes.image')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.name')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.Brand')}}</th>

                <th class="min-w-70px">{{trans('messages.actions')}}</th>
            </tr>
            <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
    @foreach($merchants as $merchant)
        <tr>
           
            <td>
                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <img src="{{asset( $merchant->image_path) }}" 
                         alt="{{ $merchant->name }}"  
                         onerror="this.src='{{ asset('image.png') }}'" 
                         class="w-100">
                </div>
            </td>
            <td>{{ $merchant->name }}</td>
            <td>{{ $merchant->brand_name }}</td>
            <td>
                <!-- <a href="{{ route($guard.'.merchants.edit', $merchant->id) }}" 
                   class="btn btn-sm btn-light btn-primary">
                   {{ trans('messages.edit') }}
                </a> -->
               <form action="{{ route($guard.'.merchants.delete', $merchant->id) }}" 
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
        </tr>
    @endforeach
</tbody>

            <!--end::Table body-->
        </table>
    </div>
</div>
