<!-- head -->
<?php $this->load->view('admin/admin/head', $this->data) ?>
<div class="line"></div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="wrapper">
    <div class="widget">

        <?php if ($admin_info->Status == "A"): ?>
            <div class="title">
                <h6>Thêm mới quản trị viên</h6>
            </div>
            <form id="form" class="form" enctype="multipart/form-data" method="post" action="">

                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <label class="control-label" id="errorstatus" style="color: red"></label>
                        </div>
                    </div>
                </div>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <label for="inputEmail3" class="col-sm-1 control-label">Nick name:</label>

                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="name" id="param_name"
                                   placeholder="Nhập nick name">
                        </div>
                        <div class="col-sm-3">
                            <input type="button" value="Tìm kiếm" name="submit"
                                   class="button blueB" id="searchnickname">
                        </div>
                    </div>
                </div>


            </form>
            <div id="info_user" style="display: none">
                <input type="hidden" name="username" id="username"
                       value="">
                <input type="hidden" name="nickname" id="nickname"
                       value="">
                <input type="hidden" name="iduser" id="iduser"
                       value="">

                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập:&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;<label for="inputEmail3" class="control-label"
                                                     style="color: #0000ff" id="lblusername"></label></label>
                    </div>
                </div>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <label class="col-sm-1">Bộ phận:</label>
                        <div class="col-sm-1">
                            <select for="inputEmail3" id="selectchucnang">
                                <option value="W">Vận hành</option>
								  <option value="LM">Leader Maketing</option>
                                <option value="M">Maketing</option>
                                <option value="S">Chăm sóc khách hàng</option>
                                <option value="L">Lãnh đạo</option>
                                <option value="D">Chăm sóc đại lý</option>
                                <option value="Q">Quản lý chung</option>
                                <option value="K">Kế toán</option>
                                <option value="C">Developer</option>
                                <option value="A">Admin</option>

                            </select>
                        </div>

                    </div>
                </div>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <label for="inputEmail3" class="col-sm-1" style=>Phân
                            quyền:</label>
                        <div class="col-sm-1">
                            <select for="inputEmail3" id="selectrole">
                                <option value="">Chọn</option>
                                <?php foreach ($listrole as $row): ?>
                                    <option value="<?php echo $row->Id ?>"><?php echo $row->Name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <label for="inputEmail3" class="col-sm-1 control-label" >Setadmin:</label>

                        <div class="col-sm-1">
                            <input type="button" value="Thêm mới"
                                   class="button blueB" id="setadmin">

                        </div>

                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>

        <?php endif ?>
    </div>
</div>

<script>
    $("#searchnickname").click(function () {
        if ($("#param_name").val() == "") {
            $("#errorstatus").css("display", "block");
            $("#info_user").css("display", "none")
            $("#errorstatus").html("Bạn chưa nhập nick name");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('admin/getinfoajax')?>",
            data: {
                nickname: $("#param_name").val()
            },
            dataType: 'json',
            success: function (result) {
                if (result.user != null) {
                    $("#info_user").css("display", "block");
                    $("#errorstatus").html("");
                    $("#lblusername").html(result.user.username);
                    $("#lblnickname").html(result.user.nickname);
                    $("#username").val(result.user.username);
                    $("#nickname").val(result.user.nickname);
                    $("#iduser").val(result.user.id);
                    $("#setadmin").val("Thêm mới");
                } else if (result.user == null) {
                    $("#errorstatus").html("Nick name đã được đăng ký hoặc không tồn tại");
                    $("#info_user").css("display", "none")
                }
            }
        })

    });

    $("#setadmin").click(function () {
        if($("#selectrole").val() == ""){
            $("#errorstatus").html("Bạn chưa chọn nhóm phân quyền");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('admin/addadminajax')?>",
            dataType: 'json',
            data: {
                nickname: $("#nickname").val()
            },
            success: function (res) {
                if (res.errorCode == 0) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo admin_url(); ?>" + "/admin/addadmin",
                        dataType: 'json',
                        data: {
                            username: $("#username").val(),
                            nickname: $("#nickname").val(),
                            iduser: $("#iduser").val(),
                            role: $("#selectrole").val(),
                            chucnang: $("#selectchucnang").val()
                        },
                        success: function (response) {
                            if (response == 2) {
                                var baseurl = "<?php echo admin_url('admin') ?>";
                                window.location.href = baseurl;
                            } else if (response == 0) {
                                $("#errorstatus").html("Tài khoản đã tồn tại");
                            }

                        }
                    });

                } else if (res.errorCode == 1001) {
                    $("#errorstatus").html("Bạn thêm không thành công");
                }
            }
        });

    });
</script>