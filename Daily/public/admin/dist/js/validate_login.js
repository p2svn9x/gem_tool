$(function () {
    $("#login-vin").validate({
        errorClass: "tranfer-error",
        ignore: [],
        debug: false,
        rules: {
            username: {
                required: true
            },
            password: {
                required: true
            }
        },
        // Specify the validation error messages
        messages: {
            username: "Username không được để trống",
            password: "Password không được để trống"
        },
        submitHandler: function (form) {
            form.submit(function(e){
                $("#bsModal3").modal('show');
            });
        }
    });

});