<div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="table-responsive">

        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-center" id="kt_customers_table"
               data-delete_url="{{route($guard.'.offers.deleteAll')}}">
            <!--begin::Table head-->
            <thead>
            <!--begin::Table row-->
            <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
               
                <th class="min-w-125px">{{trans('messages.attributes.image')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.name')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.description')}}</th>
                <th class="min-w-125px">{{trans('messages.attributes.created_at')}}</th>
                <th class="text-center min-w-70px">{{trans('messages.actions')}}</th>
            </tr>
            <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
            @foreach($offers as $offer)
                <tr>
                   
                    <!--begin::Checkbox-->
                    <td>
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="#">
                                <div class="symbol-label">
                                    <img src="{{asset($offer->image1)}}" alt="{{$offer->name}}"  onerror="this.src='{{asset('public/image.png')}}'"
                                         class="w-100">
                                </div>
                            </a>
                        </div>
                    </td>
                    <!--end::Checkbox-->
                    <!--begin::Name=-->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{$offer->name}}{{$offer->image1}}</a>
                    </td>
                    <!--end::Name=-->
                    <!--begin::Email=-->
                    <td>
                        <a href="#"
                           class="text-gray-600 text-hover-primary mb-1">{{$offer->description}}</a>
                    </td>
                   
                    <td style="direction: ltr;">
                        {{$offer->created_at}}
                    </td>
                    <!--end::Payment method=-->
                    <!--begin::Action=-->
                   
                        <td>
                            <form action="{{ route($guard.'.offers.delete', $offer->id) }}" 
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
                        <!--end::Menu-->
                </tr>
            @endforeach
            </tbody>
            <!--end::Table body-->
        </table>
    </div>
</div>
