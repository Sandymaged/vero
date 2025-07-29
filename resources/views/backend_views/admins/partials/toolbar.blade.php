<!--begin::Toolbar-->
<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
    <!--begin::Filter-->
    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
            data-kt-menu-placement="bottom-end">
        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
        <span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<path
                                                            d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                            fill="black"/>
													</svg>
												</span>
        <!--end::Svg Icon-->{{trans('messages.filter')}}
    </button>
    <!--begin::Menu 1-->
    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
        <!--begin::Header-->
        <div class="px-7 py-5">
            <div class="fs-4 text-dark fw-bolder">{{trans('messages.filter_options')}}</div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator border-gray-200"></div>
        <!--end::Separator-->
        <!--begin::Content-->
        <div class="px-7 py-5">
            <form>
                <!--begin::Input group-->
                <div class="mb-10">
                    <!--begin::Label-->
                    <label class="form-label fs-5 fw-bold mb-3">{{trans('messages.attributes.roles')}}:</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                {!! Form::select('role_id', $roles, [], ['class' => 'form-select form-select-solid fw-bolder filter-input', 'data-kt-select2'=>"true", 'name'=>"roles",
                            'id'=>"role_id", 'data-placeholder'=>trans('messages.select').' '.trans('messages.attributes.roles'), 'data-allow-clear'=>false,
                            'data-dropdown-parent'=>"#kt-toolbar-filter"]) !!}
                <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10">
                    <!--begin::Label-->
                    <label class="form-label fs-5 fw-bold mb-3">{{trans('messages.attributes.is_active')}}:</label>
                    <!--end::Label-->
                    <!--begin::Options-->
                    <div class="d-flex flex-column flex-wrap fw-bold" data-kt-customer-table-filter="payment_type">
                        <!--begin::Option-->
                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                            {!! Form::radio('is_active', 1, false,['class' => 'form-check-input filter-input']) !!}
                            <span class="form-check-label text-gray-600">{{trans('messages.active')}}</span>
                        </label>
                        <!--end::Option-->
                        <!--begin::Option-->
                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                            {!! Form::radio('is_active', 0, false,['class' => 'form-check-input filter-input']) !!}
                            <span class="form-check-label text-gray-600">{{trans('messages.inactive')}}</span>
                        </label>
                        <!--end::Option-->
                    </div>
                    <!--end::Options-->
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true"
                            data-kt-customer-table-filter="reset">{{trans('messages.reset')}}
                    </button>
                    <button type="button" class="btn btn-primary" data-kt-menu-dismiss="true"
                            data-kt-customer-table-filter="filter">{{trans('messages.apply')}}
                    </button>
                </div>
                <!--end::Actions-->
            </form>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Menu 1-->
    <!--end::Filter-->

    <!--begin::Add customer-->
    <a href="{{route($guard.'.admins.create')}}"
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
        {{trans('messages.add')}} {{trans('messages.attributes.Admin')}}</a>

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
