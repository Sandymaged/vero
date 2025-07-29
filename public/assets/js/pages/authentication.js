"use strict";
var KTSigninGeneral = function () {
    var t, e, i;
    return {
        init: function () {
            t = document.querySelector("#kt_sign_in_form"), e = document.querySelector("#kt_sign_in_submit"), i = FormValidation.formValidation(t, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {message: email_required},
                            emailAddress: {message: not_valid_email}
                        }
                    }, password: {validators: {notEmpty: {message: password_required}}}
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({rowSelector: ".fv-row"})
                }
            }), e.addEventListener("click", (function (n) {
                n.preventDefault(), i.validate().then((function (i) {
                    "Valid" == i ? $("#kt_sign_in_form").submit() : Swal.fire({
                        text: some_errors,
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: got_it,
                        customClass: {confirmButton: "btn btn-primary"}
                    })
                }))
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTSigninGeneral.init()
}));
