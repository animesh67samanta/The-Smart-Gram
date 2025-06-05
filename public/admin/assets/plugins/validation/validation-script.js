$.validator.setDefaults({
    submitHandler: function () {
       
    }
});

$(document).ready(function () {

    $(".jQueryValidationForm").validate({
        rules: {
            yourname: "required",

            phone: {
                required: true,
                minlength: 10
            },
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            },
            old_password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#input38"
            },
            email: {
                required: true,
                email: true
            },
            country: "required",
            address: "required",
            agree: "required"
        },
        messages: {
            yourname: "Please enter your your name",
            phone: {
                required: "Please enter your phone number",
                minlength: "Your phone number must be at least 10 digits long",
            },
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            old_password: {
                required: "Please provide Old password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
            country: "Please select country",
            address: "Please type your Address",
            agree: "Please accept our policy"
        },

    });



});
