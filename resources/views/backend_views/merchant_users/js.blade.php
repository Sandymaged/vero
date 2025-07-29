@push('scripts_lib')
    <script>
        var fields = {
            name: {validators: {notEmpty: {message: required_name}}},
            // "merchant_branch_id": {validators: {notEmpty: {message: merchant_user_required_branch}}},
            "merchant_id": {validators: {notEmpty: {message: required_merchant}}},
            "email": {validators: {notEmpty: {message: required_email}}},
            "password": {validators: {notEmpty: {message: required_password}}},
            "password_confirmation": {validators: {notEmpty: {message: required_password_confirmation}}},
        };

        if (typeof isUpdate !== 'undefined') {
            delete fields.password;
            delete fields.password_confirmation
        }
    </script>
    <script src="{{asset('assets/js/pages/form.js')}}"></script>
@endpush
