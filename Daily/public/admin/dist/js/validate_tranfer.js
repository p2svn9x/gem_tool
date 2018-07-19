$(function () {

    $("#tranfer").validate({
        errorClass: "tranfer-error",
        ignore: [],
        debug: false,
        rules: {
            nickname: {
                required: true
            },
            renickname: {
                required: true, equalTo: "#nickname"
            },
            hdntranfer: {
                max: function () {
                    return parseInt($('#vindu').val());
                }
            },
            vinchuyen: {
                required: true,
                number: true,
                min: 10000,
                max: function () {
                    return parseInt($('#vindu').val());
                }
            },
            reasonchuyen: "required",
            maotp: "required"
        },
        // Specify the validation error messages
        messages: {
            nickname: "Nickname không được để trống",
            renickname: {
                required: "Nickname nhập lại không được để trống",
                equalTo: "Nickname nhập lại không giống với nickname"
            },
            hdntranfer: {
                max: "Số vin bị trừ không vượt quá số dư hiện tại"
            },
            vinchuyen: {
                required: "Số vin chuyển không được để trống",
                number: "Số vin chuyển phải là số",
                min: "Số vin chuyển tối thiểu là 10,000 vin",
                max: "Số vin chuyển không vượt quá số dư hiện tại"
            },

            reasonchuyen: "Lý do chuyển không được để trống",
            maotp: "Mã OTP không đươc để trống"
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});
var format = function(num){
    var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ",") {
            output.push(str[j]);
            if(i%3 == 0 && j < (len - 1)) {
                output.push(",");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    return(formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};