@push('scripts_lib')
    <script>
        var fields = {
            name: {validators: {notEmpty: {message: required_name}}},
            'state_id': {validators: {notEmpty: {message: required_state}}},
            'parent_id': {validators: {notEmpty: {message: required_subcategory}}}
        };
    </script>
    <script src="{{asset('assets/js/pages/form.js')}}"></script>
@endpush
