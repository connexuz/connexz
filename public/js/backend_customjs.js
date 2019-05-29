function isNumberOrNot(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
}

jQuery(document).ready(function ($) {
    /*
     * backend
     */

    $.validator.addMethod("noSpace", function(value, element) {
        return $.trim(value) != "";
    }, "No space please and don't leave it empty");

    $.validator.addMethod("oldPassword", function(value, element) {
        return $.trim($("#old_password").val()) != "";
    }, "Please enter old password first");

    $.validator.addMethod("checkEmail", function(value, element) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var send_email = true;
        var result = value.replace(/\s/g, "").split(/,|;/);
        for (var i = 0; i < result.length; i++) {
            if (!regex.test(result[i])) {
                send_email = false;
                break;
            }
        }
        if (!send_email) {
            $(element).css('border', '1px solid red');
            //toastr.error('Please Enter valid Email Address.');
            $(element).focus();
            return false;
        } else {
            $(element).css('border', '');
            return true;
        }
    }, "Please Enter valid Email Address.");

    $('#date_of_birth').datepicker({
        format: 'dd-mm-yyyy',
        maxDate: '0',
        changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
    });
    
    $("#date_of_birth").keydown(false);
    $("#education_from_date").keydown(false);
    $("#education_to_date").keydown(false);
    
    $('#education_from_date').datepicker({
        format: 'dd-mm-yyyy',
        maxDate: '0',
        changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
        onSelect: function(date){
            var selectedDate = new Date(date);
            var endDate = selectedDate;

        //Set Minimum Date of EndDatePicker After Selected Date of StartDatePicker
            $("#education_to_date").datepicker( "option", "minDate", endDate );
        }
    });
    $('#education_to_date').datepicker({
        format: 'dd-mm-yyyy',
        maxDate: '0',
        changeMonth: true,
      changeYear: true,
      yearRange: "-100:+0",
    });

    $("#user-form").validate({
        focusInvalid: false,
        rules: {
            first_name: {
                required: true,
                noSpace: true,
            },
            last_name: {
                required: true,
                noSpace: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                noSpace: true
            },
            password_confirmation: {
                required: true,
                noSpace: true
            },
            date_of_birth: {
                required: true,
                noSpace: true,
            },
            gender: {
                required: true
            },
            city: {
                required: true,
                noSpace: true
            },
            country: {
                required: true
            },
            about: {
                required: true,
                noSpace: true
            },
            university: {
                required: true,
                noSpace: true
            },
            education_from_date: {
                required: true,
                noSpace: true
            },
            education_to_date: {
                required: true,
                noSpace: true
            },
            education_about: {
                required: true,
                noSpace: true
            },
            graduted: {
                required: true
            }

        },
        messages: {
            first_name: "Please enter your first name",
            last_name: "Please enter your last name",
            email: "Please enter your email id",
            date_of_birth: "Please enter your date of birth",
            gender: "Please select your gender",
            city: "Please enter your city name",
            country: "Please select your country",
            about: "Please enter about you",
            university: "Please enter your university name",
            education_from_date: "Please select your university start date",
            education_to_date: "Please select your university end date",
            education_about: "Please enter about your university",
            graduted: "Please select you are graduated"
        },
        invalidHandler: function(validator) {
            $('html, body').stop().animate({
                scrollTop: parseInt($(validator.errorList[0].element).offset().top) + 500
            }, 1000);
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    

});