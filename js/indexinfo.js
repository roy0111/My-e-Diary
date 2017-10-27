  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    phone: {
                        country: 'BD',
                        message: 'Please supply a vaild phone number with area code'
                    }
                }
            },
            address: {
                validators: {
                     stringLength: {
                        min: 8,
                        max:31,
                        message:'length must be less then 32 charecter'
                    },
                    notEmpty: {
                        message: 'Please supply your street address'
                    }
                }
            },
            city: {
                validators: {
                     stringLength: {
                        min: 4,
                        max:19,
                         message:'length must be less then 20 charecter'
                    },
                    notEmpty: {
                        message: 'Please enter your city'
                    }
                }
            },
         Occupation: {
                validators: {
                     stringLength: {
                        min: 4,
                        max: 15,
                         message:'length must be less then 16 charecter'
                    },
                    notEmpty: {
                        message: 'Please enter your occupation'
                    }
                }
            },
            division: {
                validators: {
                    
                    notEmpty: {
                        message: 'Select enter your Division'
                    }
                }
            },
            BloodGroup: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Blood Group'
                    }
                }
            },
           Gender: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Gender'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'BD',
                        message: 'Please supply a vaild zip code'
                    }
                }
            }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});