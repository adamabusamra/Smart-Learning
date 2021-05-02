"use strict";

// Class definition
var KTWizard2 = (function () {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizardObj;
    var _validations = [];

    // Private functions
    var _initWizard = function () {
        // Initialize form wizard
        _wizardObj = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: false, // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
        });

        // Validation before going to next page
        _wizardObj.on("change", function (wizard) {
            if (wizard.getStep() > wizard.getNewStep()) {
                return; // Skip if stepped back
            }

            // Validate form before change wizard step
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

            if (validator) {
                validator.validate().then(function (status) {
                    if (status == "Valid") {
                        wizard.goTo(wizard.getNewStep());

                        KTUtil.scrollTop();
                    } else {
                        Swal.fire({
                            text:
                                "Sorry, looks like you didn't fill all the fields",
                            icon: "warning",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light",
                            },
                        }).then(function () {
                            KTUtil.scrollTop();
                        });
                    }
                });
            }

            return false; // Do not change wizard step, further action will be handled by he validator
        });

        // Change event
        _wizardObj.on("changed", function (wizard) {
            KTUtil.scrollTop();
        });

        // Submit event
        _wizardObj.on("submit", function (wizard) {
            // Validate form before submit
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

            if (validator) {
                validator.validate().then(function (status) {
                    if (status == "Valid") {
                        _formEl.submit(); // submit form
                    } else {
                        Swal.fire({
                            text:
                                "Sorry, looks like you didn't fill all the fields",
                            icon: "warning",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light",
                            },
                        }).then(function () {
                            KTUtil.scrollTop();
                        });
                    }
                });
            }
        });
    };

    var _initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Step 1
        _validations.push(
            FormValidation.formValidation(_formEl, {
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: "First name is required",
                            },
                        },
                    },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: "Last Name is required",
                            },
                        },
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email is required",
                            },
                            emailAddress: {
                                message:
                                    "The value is not a valid email address",
                            },
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "Password is required",
                            },
                            stringLength: {
                                min: 8,
                                message:
                                    "The password must be at least 8 characters long",
                            },
                        },
                    },
                    password_confirmation: {
                        validators: {
                            identical: {
                                compare: function () {
                                    return _formEl.querySelector(
                                        '[name="password"]'
                                    ).value;
                                },
                                message:
                                    "The password and its confirm are not the same",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: "",
                    }),
                },
            })
        );

        // Step 2
        _validations.push(
            FormValidation.formValidation(_formEl, {
                fields: {
                    address1: {
                        validators: {
                            notEmpty: {
                                message: "Address is required",
                            },
                        },
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: "City is required",
                            },
                        },
                    },
                    country: {
                        validators: {
                            notEmpty: {
                                message: "Country is required",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: "",
                    }),
                },
            })
        );

        // Step 3
        _validations.push(
            FormValidation.formValidation(_formEl, {
                fields: {
                    field: {
                        validators: {
                            notEmpty: {
                                message: "Field type is required",
                            },
                        },
                    },
                    speciality: {
                        validators: {
                            notEmpty: {
                                message: "Choosing speciality is required",
                            },
                        },
                    },
                    title: {
                        validators: {
                            notEmpty: {
                                message: "Professional title is required",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: "",
                    }),
                },
            })
        );
    };

    return {
        // public functions
        init: function () {
            _wizardEl = KTUtil.getById("kt_wizard");
            _formEl = KTUtil.getById("kt_form");

            _initWizard();
            _initValidation();
        },
    };
})();

jQuery(document).ready(function () {
    KTWizard2.init();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('input[name="_token"]').val(),
        },
    });

    $('[name="field"]').change(function () {
        let id = $(this).val();
        $.ajax({
            type: "GET",
            url: `/dashboard/admin/fields/${id}/specialities`,
            success: function (data) {
                $('[name="speciality"]')
                    .empty()
                    .append(
                        '<option value="" selected hidden>Choose speciality</option>;'
                    );
                data.forEach((item) => {
                    $('[name="speciality"]').append(
                        `<option value="${item.id}">${item.name}</option>`
                    );
                });
            },
            error: function (err) {
                console.log(err);
            },
        });
    });
});
