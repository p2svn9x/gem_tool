
$("#btn-signup").click(function () {
   // check_input_empty_checkbox('chkdieukhoan','regError');
    //check_input_empty_captcha('input_captcha_register','regError','mã xác nhận');
    check_is_dupicate('password2_reg','password_reg','regError','mật khẩu');
    check_is_valid_name('password_reg','regError','mật khẩu',8,18,4);
    check_is_valid_name('username_reg','regError','tên tài khoản',6,18,1);

});
$(document).ready(function(){
    $(document).on("click", '#refresh-captcha', function(event) {
        reload_captcha('captcha');
    });
    $(document).on("click", '#btn-signup', function(event) {
    });
});

$("#btn_login").click(function () {


    loginid();
    check_input_empty('txtpassword','regError','mật khẩu');
    check_input_empty('txtusername','regError','tên tài khoản');

});

