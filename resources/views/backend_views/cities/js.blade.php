@push('scripts_lib')
    <script>
        var fields = {
            name: {validators: {notEmpty: {message: required_name}}},
            'state_id': {validators: {notEmpty: {message: required_state}}}
        };
    </script>
    <script src="{{asset('assets/js/pages/form.js')}}"></script>
@endpush
