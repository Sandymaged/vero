@push('scripts_lib')
    <script>
        var fields = {
            name: {validators: {notEmpty: {message: required_name}}},
            "state_id": {validators: {notEmpty: {message: required_state}}},
            "location[latitude]": {validators: {notEmpty: {message: required_latitude}}},
            "location[longitude]": {validators: {notEmpty: {message: required_longitude}}},
            "type": {validators: {notEmpty: {message: required_type}}},
            "deposit_percentage": {validators: {notEmpty: {message: required_deposit_percentage}}},
            "email": {validators: {notEmpty: {message: required_email}}},
        };
    </script>
    <script src="{{asset('assets/js/pages/form.js')}}"></script>
@endpush
