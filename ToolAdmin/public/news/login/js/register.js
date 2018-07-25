$("#btnLogin").click(function () {



    if (($("#txtPassword").val()) != "") {

         loginid();
    }
    check_input_empty('txtPassword', 'regError', 'mật khẩu');
    check_input_empty('txtUserName', 'regError', 'tên tài khoản');


});


