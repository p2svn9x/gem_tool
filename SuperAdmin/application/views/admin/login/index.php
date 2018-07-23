<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GemClub | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo public_url("admin") ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo public_url("admin") ?>/dist/css/AdminLTE.min.css">
    <script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo public_url('admin') ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.md5.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>SuperAdmin</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <input type="hidden" id="nickname">
        <div class="box box-info">
            <div class="form-group has-error">
                <div class="col-sm-12">
                    <label class="control-label pull-left"  id="validate-text" for="inputError"></label>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="param_username" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="param_password" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="button" value="Login" id = "login" class="btn btn-primary pull-right">
                </div>
            </form>
            <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="mySmallModalLabel">Nhập odp</h4>
                        </div>
                        <div class="modal-body" style="height: 100px">

                            <input class="form-control" type="text" id="odplogin" placeholder="Nhập ODP">
                            <input type="button" class="btn btn-primary pull-right" style="margin-top: 10px" value="Đăng nhập" id="loginodp">
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-primary pull-left" value="Lấy ODP" id="getodp">
                            <input type="button" class="btn btn-primary pull-right" value="Lấy lại ODP" id="getreodp">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script>
    $('#param_password').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            if($("#param_password").val()== "" && $("#param_username").val()== "" ){
                $("#validate-text").html("Bạn chưa nhập tên đăng nhập và mật khẩu");
                return false;
            }
            if($("#param_username").val()== ""){
                $("#validate-text").html("Bạn chưa nhập tên đăng nhập");
                return false;
            }
            if($("#param_password").val()== ""){
                $("#validate-text").html("Bạn chưa nhập mật khẩu");
                return false;
            }
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('login/loginajax')?>",
                data: {
                    username: $("#param_username").val(),
                    password: $.md5($("#param_password").val())
                },
                dataType: 'json',
                success: function (result) {
                    if(result.errorCode == 0){
                        var info = atob(result.sessionKey);
                        obj = JSON.parse(info);
                        $("#nickname").val(obj.nickname) ;
                        if(obj.daiLy != 0){
                             $("#bsModal3").modal('show');
                            $("#validate-text").css("display","none");
                        }else{
                            $("#validate-text").html("Tài khoản không phải là admin hoặc đại lý");
                        }
                    } else if(result.errorCode == 1001){
                        $("#validate-text").html("Hệ thống gián đoạn");
                        $("#bsModal3").modal('hide');
                    }

                    else if(result.errorCode == 1005){
                        $("#validate-text").html("Tên đăng nhập không tồn tại");
                        $("#bsModal3").modal('hide');
                    }
                    else if(result.errorCode == 1007){
                        $("#validate-text").html("Mật khẩu không chính xác");
                        $("#bsModal3").modal('hide');
                    } else if(result.errorCode == 1109){
                        $("#validate-text").html("Tài khoản bị khóa");
                        $("#bsModal3").modal('hide');
                    }
                    else if(result.errorCode == 1114){
                        $("#validate-text").html("Hệ thống bảo trì");
                        $("#bsModal3").modal('hide');
                    }
                    else if(result.errorCode == 2001){
                        $("#validate-text").html("Tài khoản chưa cập nhật nickname");
                        $("#bsModal3").modal('hide');
                    }
                    else if(result.errorCode == 1012){
                        $("#validate-text").html("Tài khoản bảo mật đăng nhập OTP");
                        $("#bsModal3").modal('hide');
                    }
                }
            });
        }
    });
    $("#login").click(function() {
        if($("#param_password").val()== "" && $("#param_username").val()== "" ){
            $("#validate-text").html("Bạn chưa nhập tên đăng nhập và mật khẩu");
            return false;
        }
        if($("#param_username").val()== ""){
            $("#validate-text").html("Bạn chưa nhập tên đăng nhập");
            return false;
        }
        if($("#param_password").val()== ""){
            $("#validate-text").html("Bạn chưa nhập mật khẩu");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('login/loginajax')?>",
            data: {
                username: $("#param_username").val(),
                password: $.md5($("#param_password").val())
            },
            dataType: 'json',
            success: function (result) {
                if(result.errorCode == 0){
                    var info = atob(result.sessionKey);
                    obj = JSON.parse(info);
                    $("#nickname").val(obj.nickname) ;
                    if(obj.daiLy != 0){
                        //$("#bsModal3").modal('show');
						 var baseurl = "<?php echo base_url('') ?>";
                    window.location.href = baseurl;
                        $("#validate-text").css("display","none");
                    }else{
                        $("#validate-text").html("Tài khoản không phải là admin hoặc đại lý");
                    }
                }else if(result.errorCode == 1001){
                        $("#validate-text").html("Hệ thống gián đoạn");
                        $("#bsModal3").modal('hide');
                    }

                    else if(result.errorCode == 1005){
                        $("#validate-text").html("Tên đăng nhập không tồn tại");
                        $("#bsModal3").modal('hide');
                    }
                    else if(result.errorCode == 1007){
                        $("#validate-text").html("Mật khẩu không chính xác");
                        $("#bsModal3").modal('hide');
                    } else if(result.errorCode == 1109){
                        $("#validate-text").html("Tài khoản bị khóa");
                        $("#bsModal3").modal('hide');
                    }
                    else if(result.errorCode == 1114){
                        $("#validate-text").html("Hệ thống bảo trì");
                        $("#bsModal3").modal('hide');
                    }
                    else if(result.errorCode == 2001){
                        $("#validate-text").html("Tài khoản chưa cập nhật nickname");
                        $("#bsModal3").modal('hide');
                    }
                    else if(result.errorCode == 1012){
                        $("#validate-text").html("Tài khoản bảo mật đăng nhập OTP");
                        $("#bsModal3").modal('hide');
                    }
            }
        });
    })

    $("#getodp").click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('login/getodpajax')?>",
            data: {
                nickname :$("#nickname").val()
            },

            dataType: 'json',
            success: function (result) {
                if(result == 0){
                    alert("Bạn lấy mã odp thành công")
                }else if(result == 1){
                    alert("Tài khoản chưa được phân quyền")
                }else if(result == 2){
                    alert("Nickname không tồn tại")
                }else if(result == 4){
                    alert("Bạn chưa đăng ký bảo mật trên trang Gem.club")
                }else if(result == 5){
                    alert("Bạn đã lấy odp rồi, gửi tin nhắn để lấy lại")
                }

            }
        });
    });
    $("#getreodp").click(function() {
        alert("Mời bạn soạn tin nhắn VIN ODP gửi 8079 để lấy lại ODP")
    });

    $("#loginodp").click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('login/loginodpajax')?>",
            data: {
                nickname : $("#nickname").val(),
				  username: $("#param_username").val(),
                otp : $("#odplogin").val()
            },

            dataType: 'json',
            success: function (result) {
                if(result == 1){
                    var baseurl = "<?php echo base_url('') ?>";
                    window.location.href = baseurl;

                }else if(result == 2){
                    alert("Tài khoản chưa được phân quyền")
                }else if(result == 3){
                    alert("Hệ thống gián đoạn")
                }else if(result == 4){
                    alert("Nick name không tồn tại")
                }else if(result == 5){
                    alert("Tài khoản không pahir là đại lý hoặc admin")
                }else if(result == 6){
                    alert("Tài khoản chưa đăng ký bảo mật")
                }
                else if(result == 7){
                    alert("ODP sai")
                }
                else if(result == 8){
                    alert("ODP hết hạn")
                }

            }
        });
    })


</script>
