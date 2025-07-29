@push('scripts_lib')
    <script>
        var fields = {
            name: {validators: {notEmpty: {message: required_name}}},
            "state_id": {validators: {notEmpty: {message: required_state}}},
            "merchant_id": {validators: {notEmpty: {message: required_merchant}}},
            "location[latitude]": {validators: {notEmpty: {message: required_latitude}}},
            "location[longitude]": {validators: {notEmpty: {message: required_longitude}}},
            "responsible_name": {validators: {notEmpty: {message: required_responsible_name}}},
            "responsible_phone": {validators: {notEmpty: {message: required_responsible_phone}}},
        };
    </script>
    <script src="{{asset('assets/js/pages/form.js')}}"></script>
@endpush
