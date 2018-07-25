//check không dược để trống
function check_input_empty(id, msg_id, field) {
    if (($("#" + id).val()) == "") {

        $("#" + msg_id).html("Vui lòng nhập  " + field);
        $("#" + id).focus();
        return false;
    }

}

function check_input_empty_captcha(id, msg_id, field) {
    if (($("#" + id).val()) == "") {

        $("#" + msg_id).html("Vui lòng nhập  " + field);
        $("#" + id).focus();
        return false;
    }else{
        check_captcha(id,msg_id);

    }

}

function check_input_empty_checkbox(id, msg_id) {
    var remember = document.getElementById(id);
    if (remember.checked){
        registerid();
    }else{
        $("#" + msg_id).html("Bạn chưa đồng ý điều khoản sử dụng.");
        $("#" + id).focus();
        return false;
    }

}
//check max length and min length
function check_input_length(id, msg_id, field, minlength, maxlength) {
    //check trường không được để trống
    if (($("#" + id).val()) == "") {
        check_input_empty(id, msg_id, field);
    }
    //tính length chuỗi nhập vào
    else {
        var len = $("#" + id).val().length;
        if (maxlength > 0) {
            if (len > maxlength) {
                $("#" + msg_id).html("Trường " + field + " không được vượt quá" + maxlength + "kí tự");
                $("#" + id).focus();
                return false;
            }
        }
        if (minlength > 0) {
            if (len < minlength) {
                $("#" + msg_id).html("Độ dài " + field + " cần tối thiểu " + minlength + "  kí tự");
                $("#" + id).focus();
                return false;
            }
        }
    }

}
//check email
function check_email(id, msg_id) {
    //check trường không được để trống
    check_input_empty(id, msg_id);
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test($("#" + id).val())) {
        $("#" + msg_id).html("Email không đúng định dạng");
        $("#" + id).focus();
        return false;
    }
}
//Check user name

function check_is_dupicate(id,id_dup,msg_id, field) {

    var nameid = $("#" + id).val();
    var nameiddup = $("#" + id_dup).val();


    if (($("#" + id).val()) == "" || (nameid != nameiddup)) {

        $("#" + msg_id).html("Nhập lại " + field + " chưa chính xác. Vui lòng thử lại.");
        $("#" + id).focus();
        return false;
    }
    else {
        registerid();
    }


    //if(nameid != nameiddup ){
    //
    //    $("#" + msg_id).html("Nhập lại " + field + " chưa chính xác. Vui lòng thử lại.");
    //    $("#" + id).focus();
    //    return false;
    //}

}

function checkbox_checked(id, msg_id) {
    if ($("#" + id).is("")) {
        $("#" + msg_id).html("Bạn chưa đồng ý điều khoản sử dụng.");
        $("#" + id).focus();
        return false;
    }
}

function check_is_valid_name(id, msg_id, field, minlen, maxlen, type) {
    //check trường không được để trống
    if (($("#" + id).val()) == "") {

        $("#" + msg_id).html("Vui lòng nhập  " + field);
        $("#" + id).focus();
        return false;
    }else {

        //tính length chuỗi nhập vào
        var input_len = $("#" + id).val().length;
        if (input_len > 0) {
            if (input_len > maxlen) {
                $("#" + msg_id).html("Trường " + field + " không được vượt quá " + maxlen + " kí tự");
                $("#" + id).focus();
                return false;
            }

            if (input_len < minlen) {
                $("#" + msg_id).html("Độ dài " + field + " cần tối thiểu " + minlen + "  kí tự");
                $("#" + id).focus();
                return false;
            }
        }
        //type=1: check user name bắt đầu bằng chữ cái và bao gồm chứ và số
        //type=2: check password bao gồm chứ và số và có các kí tự đặc biệt @#$%^&*
        //type=3: check nickname bắt đầu bằng chữ cái và dấu _
        if (type == 1) {

            //check tên phải bắt đầu bằng chữ cái
            var regex = /^[A-Za-z][A-Za-z0-9]*$/;
            if (!regex.test($("#" + id).val())) {
                $("#" + msg_id).html(field + " phải dài từ 6-18 ký tự ,gồm chũ cái, chữ số.Phải bắt đầu bằng chữ cái");
                $("#" + id).focus();
                return false;
            }
        }
        if (type == 2) {
            //check tên phải bắt đầu bằng chữ cái và character @#$%^&*
            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/;
            if (!regex.test($("#" + id).val())) {
                $("#" + msg_id).html("Mã" + field + "không đúng");
                $("#" + id).focus();
                return false;
            }
        }
        if (type == 3) {
            //check tên phải bắt đầu bằng chữ cái
            var regex = /^[ A-Za-z0-9_]*$/;
            if (!regex.test($("#" + id).val())) {
                $("#" + msg_id).html(field + " phải dài từ 8-18 ký tự ,gồm chũ cái, chữ số và không trùng tên tài khoản");
                $("#" + id).focus();
                return false;
            }
        }
        if (type == 4) {
            //check tên phải bắt đầu bằng chữ cái
            var regex = /^[A-Za-z][A-Za-z0-9!@#$%^&*()_]*$/;
            if (!regex.test($("#" + id).val())) {
                $("#" + msg_id).html(field + " phải dài từ 8-18 ký tự ,gồm chũ cái, chữ số và không trùng tên tài khoản");
                $("#" + id).focus();
                return false;
            }
        }
    }


}
//check validate captcha
function check_captcha(id, msg_id) {
    var captch = $('#' + id).val();
    var dataString = 'captch=' + captch;

    $.ajax({
        type: "POST",
        url: "public/site/captcha/captcha_verify.php",
        data: dataString,
        dataType: "html",
        success: function (data) {
            if (data == '0') {
                $('#' + msg_id).html('Mã xác nhận không đúng.');
                $("#" + id).focus();
                reload_captcha('captcha');
                return false;

            }
             if (data == '1') {

                 return true;

            }

        }
    });

}
//reload captcha
function reload_captcha($id) {
    /*document.getElementById('captcha').src='<?php echo public_url('site/captcha/captcha.php?')?>'+Math.random();
     document.getElementById('captcha-form').focus();*/

    $("#" + $id).attr('src', 'public/site/captcha/captcha.php?' + Math.random());


}

function registerid () {

    $.ajax({


        type: "GET",
        url: "http://192.168.0.127:8080/VinPlayAPIs/user/quickRegister",
        data: {username: $("#username_reg").val(), password: $("#password_reg").val()},
        dataType:'json',

        success: function (result) {

            console.log(result.errorCode);
            if (result.errorCode == 0) {
                loginid();
                       // window.location.href = "http://localhost:8080/GamePortal/" ;


            }

                    else {
                        $("#regError").html('Tài khoản đã tồn tại');
                        reload_captcha('captcha');
                        $("#password_reg" ).val('');
                        $("#password2_reg" ).val('') ;
                        $("#input_captcha_register" ).val('');

                        return false;

                    }

        }
    });
}
function loginid () {
    $.ajax({
        type: "GET",
        url: "http://192.168.0.127:8080/VinPlayAPIs/user/login",
        data: {username: $("#txtusername").val(), password: $("#txtpassword").val()},
        dataType:'json',
        success: function (result) {
            console.log(result.users);
            //window.location.href = "http://localhost:8080/GamePortal/register" ;
            if (result.errorCode == 0) {

                percent=result;

                    $('.resizeable').css('display', 'none');
                    $('.login_info').css('display', 'block');
                    $(".avarta_name").html(result.users.nickName);
                     $("#inputmoney_vin").val(result.users.vin);

                   $("#inputmoney_xu").val( result.users.xu);

                    //$("#inputmoney_vin").val() == result.users.vin;
                    //$("#inputmoney_xu").val() == result.users.xu;


            }
        }
    });

}






