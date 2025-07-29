@push('scripts_lib')
    <script>
        var fields = {
            name: {validators: {notEmpty: {message: required_name}}}
        };
    </script>
    <script src="{{asset('assets/js/pages/form.js')}}"></script>
    <script>
        $(document).on('click', '.delete-row', function (e) {
            e.preventDefault();
            key = $(this).data('index');
            $(this).closest('tr').remove();

            $('.serial').each(function (i, obj) {
                $(obj).text((i + 1));
            });

            if (!$('.city-wrapper').length) {
                $(".no-data-row").removeClass('d-none');
            }

            validation.removeField(`cities[${key}][name]`, {validators: {notEmpty: {message: required_name}}});

        });

        $(document).on('click', '.add-row', function (e) {
            $(".no-data-row").addClass('d-none');
            const key = $('.city-wrapper').length ? $('.city-wrapper').length : 0;
            const i = key + 1;
            const row = `<tr class="row city-wrapper">
                            <!--begin::Label-->
                            <td class="col-lg-4 text-gray-800">
                            <input type="hidden" name="cities[${key}][id]" value="">
                            <label for="cities[${key}][name]" class="col-form-label fw-bold fs-6 serial">${i}</label>
            </td>
            <!--end::Label-->
            <!--begin::Input group-->
            <td class="col-lg-4">
                <!--begin::Input-->
                <input type="text" class="form-control form-control-lg form-control-solid" name="cities[${key}][name]" value="" placeholder="{{trans("messages.attributes.name")}}" required>
            <!--end::Input-->
            </td>
            <!--end::Input group-->
            <td class="col-lg-2">
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-solid form-switch fv-row">
                        <input id="hidden_cities-0-is_active" name="cities[${key}][is_active]" type="hidden" value="0">
                        <input class="form-check-input w-45px h-30px" id="cities-${key}-is_active" name="cities[${key}][is_active]" type="checkbox" value="1">
                    </div>
                </div>
            </td>
            <!--end::Input group-->
            <td class="col-lg-2">
                <a class="btn btn-icon btn-active-light-primary w-30px h-30px delete-row" data-index="${key}"
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
fill="#000000" opacity="0.3"/>
</g>
</svg><!--end::Svg Icon-->
                    </span>
                </a>

            </td>
        </tr>
        <!--end::Table row-->`;

            $("tbody").append(row);

            validation.addField(`cities[${key}][name]`, {validators: {notEmpty: {message: required_name}}});
        });
    </script>

@endpush
