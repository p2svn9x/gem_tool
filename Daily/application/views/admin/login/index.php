<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đại lý GemClub| Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo public_url("admin") ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo public_url("admin") ?>/dist/css/AdminLTE.min.css">
    <script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo public_url('admin') ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.md5.js"></script>
    <script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.validate.min.js"></script>
    <script src="<?php echo public_url('admin') ?>/dist/js/validate_login.js"></script>
     <script src="<?php echo public_url('admin') ?>/dist/js/base64.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Đại lý GemClub</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <input type="hidden" id="nickname">
        <input type="hidden" id="vintotal">

        <div class="box box-info">
            <div class="form-group has-error">
                <div class="col-sm-12">
                    <label class="control-label pull-left" id="validate-text"
                           for="inputError"><?php echo $errors ?></label>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div class="error" style="margin-bottom: 10px;color: #ff0000;font-size: 14px"></div>
            
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="param_username" name="username"
                                   placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="param_password" name="password"
                                   placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="button" value="Login" id="login" class="btn btn-primary pull-right">
                    <div id="flag" style="display: none"><?php echo $flag ?></div>
                </div>
                <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                           
                                <input type="hidden" id="hdnusername" name="hdnusername" value="">
                                <input type="hidden" id="hndvin" name="hndvin" value="">
								  <input type="hidden" id="hndvippoint" name="hndvippoint" value="">
                            <input type="hidden" id="hndvippointsave" name="hndvippointsave" value="">
							<input type="hidden" id="hdnaccesstoken" name="hdnaccesstoken" value="">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="mySmallModalLabel">Nhập odp</h4>

                                <div id="error" style="color: #ff0000"></div>
                            </div>
                            <div class="modal-body" style="height: 100px">

                                <input class="form-control" type="text" id="odplogin" name="odplogin"
                                       placeholder="Nhập ODP" maxlength="5">
                                <input type="button" class="btn btn-primary pull-right" style="margin-top: 10px"
                                       value="Đăng nhập" id="loginodp">
                            </div>
                        
                          
                                <div class="modal-footer">
                                    <input type="hidden" id="hdnusername" name="hdnusername" value="<?php echo $nickname ?>">
                                    <input type="button" class="btn btn-primary pull-left" value="Lấy ODP" id="getodp">
                                    <input type="button" class="btn btn-primary pull-right" value="Lấy lại ODP" id="getreodp">
                                </div>
                            
                        </div>
                    </div>
                </div>


            <style>.spinner {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    margin-left: -50px; /* half width of the spinner gif */
                    margin-top: -50px; /* half height of the spinner gif */
                    text-align: center;
                    z-index: 1234;
                    overflow: auto;
                    width: 100px; /* width of the spinner gif */
                    height: 102px; /*hight of the spinner gif +2px to fix IE8 issue */

                }

                .tranfer-error {
                    color: #FF0000; /* red */
                    font-weight: normal;
                }

            </style>
            <div id="spinner" class="spinner" style="display:none;">
                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        if ($("#flag").text() == 1) {

            $("#bsModal3").modal('show');
            return false;
        }
    });
    $("#login").click(function(){
        if($("#param_username").val()=="")
        {
            $("#validate-text").html("Username không được để trống");
            $("#param_username").focus();
            return false;
        }
        else if($("#param_password").val()=="")
        {
            $("#validate-text").html("Password không được để trống");
            $("#param_password").focus();
            return false;
        }
        else{
             $("#validate-text").html("");
             //call ajax
              $.getJSON({
                type: "post",
                url: "<?php echo base_url('login/acceptlogin')?>",
                data: {
                    username: $("#param_username").val(),
                    password: $("#param_password").val(),
                },
                dataType: 'json',
                success: function (data) {
                   
                    if(data.errorCode=="0")
                    {
                        var sess=data.sessionKey;
                        var info =$.parseJSON(Base64.decode(sess));
                        $("#hdnusername").val(info.nickname);
                        $("#hndvin").val(info.vinTotal);
                        $("#hndvippoint").val(info.vippoint);
                        $("#hndvippointsave").val(info.vippointSave);
                        $("#hdnaccesstoken").val(data.accessToken);
                        $("#bsModal3").modal('show');
                    }
                   else if (data.errorCode == "1001") {
                    $("#validate-text").html('Bạn không có quyền truy cập');
                    } else if (data.errorCode == "1005") {
                        $("#validate-text").html( 'Tên đăng nhập không tồn tại');
                    } else if (data.errorCode == "1007") {
                         $("#validate-text").html( 'Mật khẩu không chính xác');
                    } else if (data.errorCode == "1009") {
                         $("#validate-text").html('Tài khoản bị khóa');
                    }
                }
                ,error: function(){
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
                
            });
        }



    });
    $("#getodp").click(function(){
        $.getJSON({
                type: "post",
                url: "<?php echo base_url('login/getODP')?>",
                dataType: 'json',
                 data: {
                    hdnusername: $("#hdnusername").val()
                },
                success: function (data) {
                  if(data=="0")
                  {
                    $("#error").html("Bạn lấy mã odp thành công");
                  }
                 else if(data=="1")
                  {
                    $("#error").html("Hệ thống bị gián đoạn");
                  }
                 else if(data=="2")
                  {
                    $("#error").html("Nickname không tồn tại");
                  }
                 else if(data=="4")
                  {
                    $("#error").html("Bạn chưa đăng ký bảo mật trên trang Gem.club");
                  }
                 else if(data=="5")
                  {
                    $("#error").html("Bạn đã lấy odp rồi, gửi tin nhắn để lấy lại");
                  }
                }
                ,error: function(){
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
                
            });
    });
    $("#getreodp").click(function () {
        $("#error").html("Mời bạn soạn tin nhắn VIN ODP gửi 8079 để lấy lại ODP");
    });
    $("#loginodp").click(function () {
        if ($("#odplogin").val() == "") {
            $("#error").html("Mã otp không được để trống ");
        }
        else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('login/loginODP')?>",
                data: {
                    hdnusername: $("#hdnusername").val(),
                    odplogin: $("#odplogin").val(),
                    hndvin: $("#hndvin").val()
                },
                dataType: 'json',
                success: function (result) {
                    if (result == 0) {
                       //lưu vào session
                       $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('login/saveUserLogin')?>",
                        data: {
                            hdnusername: $("#hdnusername").val(),
                            hndvin: $("#hndvin").val(),
                            hndvippoint: $("#hndvippoint").val(),
                            hndvippointsave: $("#hndvippointsave").val(),
							hdnaccesstoken:$("#hdnaccesstoken").val()
                        },
                        dataType: 'json',
                        success: function (result) {
                         if(result==0)
                         {
                            window.location.href = "";
                         }
                        }
                    });
                   }
                    else if (result == 1) {
                        $("#error").html("Hệ thống bị gián đoạn");

                    } else if (result == 2) {
                        $("#error").html("Nickname không tồn tại");

                    } else if (result == 4) {
                        $("#error").html("chưa đăng ký bảo mật trên trang gem.club");

                    } else if (result == 5) {
                        $("#error").html("odp sai");

                    }
                    else if (result == 6) {
                        $("#error").html("odp hết hạn");

                    }

                }
				,error: function(){
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
				
            });
        }
    });
</script>
</body>
</html>

