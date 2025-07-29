<!--begin::Toolbar-->
<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
    <!--begin::Add customer-->
    <a href="{{route($guard.'.cities.create')}}"
       class="btn btn-primary">
                     <span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                              rx="1" transform="rotate(-90 11.364 20.364)"
                                                              fill="black"></rect>
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                              fill="black"></rect>
													</svg>
												</span>
        {{trans('messages.add')}} {{trans('messages.attributes.City')}}</a>

    <!--end::Add customer-->
</div>
<!--end::Toolbar-->
<!--begin::Group actions-->
<div class="d-flex justify-content-end align-items-center d-none"
     data-kt-customer-table-toolbar="selected">
    <div class="fw-bolder me-5">
                                    <span class="me-2"
                                          data-kt-customer-table-select="selected_count"></span> {{trans('messages.selected')}}
    </div>
    <button type="button" class="btn btn-danger"
            data-kt-customer-table-select="delete_selected">{{trans('messages.delete_selected')}}
    </button>
</div>
<!--end::Group actions-->
