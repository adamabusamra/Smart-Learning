"use strict";

// Class definition
var KTWizard3 = (function () {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizardObj;
    var _validations = [];
    var _avatar;
    // Private functions
    var _initWizard = function () {
        // Initialize form wizard
        _wizardObj = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: true, // allow step clicking
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
                            icon: "error",
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

        // Changed event
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
                        alert("submit");

                        Swal.fire({
                            text:
                                "Sorry, looks like you didn't fill all the fields",
                            icon: "error",
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
                    image: {
                        validators: {
                            file: {
                                extension: "jpeg,jpg,png",
                                type: "image/jpeg,image/png",
                                maxSize: 2097152, // 2048 * 1024
                                message:
                                    "Only jpeg,jpg,png files alowed & must be less than 2mb",
                            },
                        },
                    },
                    title: {
                        validators: {
                            notEmpty: {
                                message: "Title field is required",
                            },
                            stringLength: {
                                min: 3,
                                message:
                                    "The title must be at least 3 characters long",
                            },
                        },
                    },
                    short_description: {
                        validators: {
                            notEmpty: {
                                message: "Brief field is required",
                            },
                            stringLength: {
                                min: 8,
                                message:
                                    "The brief must be at least 8 characters long",
                            },
                        },
                    },
                    start_date: {
                        validators: {
                            notEmpty: {
                                message: "Start date is required",
                            },
                            // date: {
                            //     min: $("input[name=start_date]").val(),
                            //     message:
                            //         "The end date must be after the start date",
                            // },
                        },
                    },
                    end_date: {
                        validators: {
                            notEmpty: {
                                message: "End date is required",
                            },
                            // date: {
                            //     min: $("input[name=start_date]").val(),
                            //     message:
                            //         "The end date must be after the start date",
                            // },
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
                    short_description: {
                        validators: {
                            notEmpty: {
                                message: "Project brief is required",
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
                    // resources: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: "Resource field can't be empty",
                    //         },
                    //     },
                    // },
                    // competencies: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: "Competency field can't be empty",
                    //         },
                    //     },
                    // },
                    // deleverables: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: "Deleverables field can't be empty",
                    //         },
                    //     },
                    // },
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
    var _initAvatar = function () {
        _avatar = new KTImageInput("kt_user_add_avatar");
    };

    return {
        // public functions
        init: function () {
            _wizardEl = KTUtil.getById("kt_wizard_v3");
            _formEl = KTUtil.getById("kt_form");

            _initWizard();
            _initValidation();
            _initAvatar();
        },
    };
})();

jQuery(document).ready(function () {
    KTWizard3.init();
});

$(document).ready(function () {
    $(".add-more").click(function () {
        var error = false;
        var expression = /(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi;
        var regex = new RegExp(expression);

        $(".add-more-input").each(function () {
            if (
                $(this).val() == "" &&
                $(this).parent().parent().attr("class") != "copy d-none"
            ) {
                $(this).addClass("is-invalid");
                error = true;
            } else if (
                !$(this).val().match(regex) &&
                $(this).parent().parent().attr("class") != "copy d-none"
            ) {
                $(this).addClass("is-invalid");
                if (
                    $(this).parent().next().attr("class") !=
                    "fv-plugins-message-container regex-error"
                ) {
                    $(this)
                        .parent()
                        .after(
                            "<div class='fv-plugins-message-container regex-error'><div class='fv-help-block'>Invalid Link Format</div></div>"
                        );
                }

                error = true;
            } else {
                $(this).removeClass("is-invalid");
                if (
                    $(this).parent().next().attr("class") ==
                    "fv-plugins-message-container regex-error"
                ) {
                    $(this).parent().next().remove();
                }
            }
        });
        if (!error) {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        }
    });
    $("body").on("click", ".remove", function () {
        $(this).parents(".control-group").remove();
    });
});
