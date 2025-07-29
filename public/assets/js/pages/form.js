var validation;

/******/
(() => { // webpackBootstrap
    /******/
    "use strict";
    var __webpack_exports__ = {};
// Class definition
    var KTDetails = function () {
        // Private variables
        var form;
        var submitButton;

        // Private functions
        var initValidation = function () {

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                form,
                {
                    fields: fields,
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        })
                    }
                }
            );

            $('.later-validate').each(function (i, obj) {
                validation.addField($(obj).attr('name'), {validators: {notEmpty: {message: required_name}}});
            });
        }

        var handleForm = function () {
            submitButton.addEventListener('click', function (e) {
                e.preventDefault();

                validation.validate().then(function (status) {
                    if (status == 'Valid') {

                        form.submit();

                    } else {
                        Swal.fire({
                            text: some_errors,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: got_it,
                            customClass: {confirmButton: "btn btn-primary"}
                        });
                    }
                });
            });
        }

        // Public methods
        return {
            init: function () {
                form = document.getElementById('kt_form');
                submitButton = form.querySelector('#kt_submit');

                initValidation();
                handleForm();
            }
        }
    }();

// On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDetails.init();
    });

    /******/
})();
//# sourceMappingURL=profile-details.js.map
