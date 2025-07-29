@push('scripts_lib')
    <script>
        var fields = {
            name: {validators: {notEmpty: {message: required_name}}},
            // "merchant_branch_id": {validators: {notEmpty: {message: offer_required_branch}}},
            "merchant_id": {validators: {notEmpty: {message: required_merchant}}},
            "category_id": {validators: {notEmpty: {message:required_category}}},
            "type": {validators: {notEmpty: {message: required_type}}},
            "price": {validators: {notEmpty: {message: required_price}}},
            "application_percentage": {validators: {notEmpty: {message: required_application_percentage}}},
        };
    </script>
    <script src="{{asset('assets/js/pages/form.js')}}"></script>
@endpush
