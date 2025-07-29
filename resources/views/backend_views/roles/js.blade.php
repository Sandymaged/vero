@push('scripts_lib')
    <script>
        var fields = {
            name: {validators: {notEmpty: {message: required_name}}},
            'guard_name': {validators: {notEmpty: {message: required_guard_name}}}
        };
    </script>
    <script src="{{asset('assets/js/pages/form.js')}}"></script>
@endpush
