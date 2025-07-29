<script>
    // form
    var form_not_cancel = '{{trans('messages.form_not_cancel')}}';
    var yes_cancel = '{{trans('messages.yes_cancel')}}';
    var no_return = '{{trans('messages.no_return')}}';
    var like_to_cancel = '{{trans('messages.like_to_cancel')}}';
    var not_cancel = '{{trans('messages.not_cancel')}}';
    var sure_cancel = '{{trans('messages.sure_cancel')}}';
    var some_errors = '{{trans('messages.some_errors')}}';

    // list
    var yes_delete = '{{trans('messages.yes_delete')}}';
    var no_cancel = '{{trans('messages.no_cancel')}}';
    var are_you_want_delete = '{{trans('messages.are_you_want_delete')}}';
    var are_you_want_delete_selected = '{{trans('messages.are_you_want_delete_selected')}}';
    var you_have_deleted = '{{trans('messages.you_have_deleted')}}';
    var selected_was_deleted = '{{trans('messages.selected_was_deleted')}}';
    var you_have_deleted_selected = '{{trans('messages.you_have_deleted_selected')}}';
    var got_it = '{{trans('messages.got_it')}}';
    var not_deleted = '{{trans('messages.not_deleted')}}';
    var selected_not_deleted = '{{trans('messages.selected_not_deleted')}}';

    // validation
    var required_name = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.name')])}}';
    var required_roles = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.roles')])}}';
    var required_email = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.email')])}}';
    var required_password = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.password')])}}';
    var required_password_confirmation = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.password_confirmation')])}}';
    var required_state = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.state')])}}';
    var required_type = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.type')])}}';
    var required_latitude = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.latitude')])}}';
    var required_longitude = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.longitude')])}}';
    var required_deposit_percentage = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.deposit_percentage')])}}';
    var required_merchant = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.merchant')])}}';
    var required_responsible_name = '{{trans('messages.field_required', ['operator' => trans('messages.name', ['operator' => trans('messages.attributes.responsible')])])}}';
    var required_responsible_phone = '{{trans('messages.field_required', ['operator' => trans('messages.phone', ['operator' => trans('messages.attributes.responsible')])])}}';
    var required_category = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.category')])}}';
    var required_price = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.price')])}}';
    var required_application_percentage = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.application_percentage')])}}';
    var required_guard_name = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.guard_name')])}}';
    var required_subcategory = '{{trans('messages.field_required', ['operator' => trans('messages.attributes.subcategory')])}}';

    var datatableJson = {!!  file_get_contents(base_path('resources/lang/'.app()->getLocale().'/datatable.json')) !!}

</script>
