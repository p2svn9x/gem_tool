<?php if($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
    <section class="content-header">
        <h1>
            Cộng trừ số lượt quay slot
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <label class="col-sm-2  control-label" style="color: red" id="errorvin"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <label class="col-sm-1 control-label">Nick name:</label>
                                <input id="checknickname" type="hidden">
                                <div class="col-sm-2">
                                    <input type="text" id="nickname" class="form-control"  onblur="myFunction()">
                                </div>
                                <label id="lblnickname" style="color: blueviolet"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <label class="col-sm-1 control-label">Số lượt quay:</label>
                                <div class="col-sm-2">
                                    <select id="numberquay" class="form-control">
                                        <option value="">Chọn</option>
                                        <option value="1">1 lượt</option>
                                        <option value="2">2 lượt</option>
                                        <option value="3">3 lượt</option>
                                    </select>

                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <label class="col-sm-1 control-label">Tên slot:</label>

                                <div class="col-sm-2">
                                    <select id="type_slot" class="form-control">
                                        <option value="">Chọn</option>
                                        <option value="NuDiepVien">Nữ Điệp Viên</option>
                                        <option value="KhoBau">Kho Báu</option>
                                        <option value="SieuAnhHung">Siêu Anh Hùng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <label class="col-sm-1 control-label">OTP:</label>

                                <div class="col-sm-1">
                                    <input id="txtotp" type="text" class="form-control" placeholder="Nhập OTP">
                                </div>
                                <div class="col-sm-1">
                                    <select id="typeotp" class="form-control">
                                        <option value="0">OTP SMS</option>
                                        <option value="1">OTP APP</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-1">
                                    <input type="button" id="congslot"
                                           value="Cộng lượt quay" class="btn btn-primary pull-left">
                                </div>
                                <div class="col-sm-1">
                                    <input type="button" id="truslot"
                                           value="Trừ lượt quay" class="btn btn-primary pull-left">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="spinner" class="spinner" style="display:none;">
                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                     alt="Loading"/>
            </div>

            <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body">
                            <p style="color: #0000ff" id="text-popup"></p>
                        </div>
                        <div class="modal-footer">
                            <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                   aria-hidden="true">
                        </div>
                    </div>
                </div>
            </div>
    </section>
<?php endif; ?>
<style>
    .spinner {
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

</style>

<script>


    $("#congslot").click(function () {
        if ($("#nickname").val() == "") {
            $("#errorvin").html("Bạn chưa nhập nickname");
            return false;
        }
        else if($("#checknickname").val() == -1) {
            $("#errorvin").html("Nickname không tồn tại");
            return false;
        }
        else if($("#checknickname").val() == -2) {
            $("#errorvin").html("Hệ thống gián đoạn");
            return false;
        } else if($("#txtotp").val() == "") {
            $("#errorvin").html("Bạn chưa nhập OTP");
            return false;
        }else if($("#numberquay").val() == "") {
            $("#errorvin").html("Bạn chưa chọn số lượt quay");
            return false;
        }
        else if($("#type_slot").val() == "") {
            $("#errorvin").html("Bạn chưa chọn game slot");
            return false;
        }


        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("user/congtruslotajax") ?>",
            data: {
                nickname: $("#nickname").val(),
                ac: $("#type_security").val(),
                otp : $("#txtotp").val(),
                type: $("#typeotp").val(),
                number : $("#numberquay").val(),
                slot : $("#type_slot").val(),
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                $("#errorvin").html("");


                if (result.errorCode == 0) {
                    $("#bsModal3").modal("show");
                    $("#text-popup").html("Cộng số lượt quay slot thành công");
                    $("#errorvin").html("");
                }
                else if (result.errorCode == 1008) {

                    $("#errorvin").html("Otp sai");
                }
                else if (result.errorCode == 1021) {

                    $("#errorvin").html("Otp hết hạn");
                }
                else if (result.errorCode == 1001) {
                    $("#errorvin").html("Hệ thống gián đoạn");
                }

            }, error: function () {
                $("#spinner").hide();
                $("#errorvin").html("Hệ thống quá tải.Vui lòng thử lại");
            }, timeout: 40000
        })

    });

    $("#truslot").click(function () {
        if ($("#nickname").val() == "") {
            $("#errorvin").html("Bạn chưa nhập nickname");
            return false;
        }
        else if($("#checknickname").val() == -1) {
            $("#errorvin").html("Nickname không tồn tại");
            return false;
        }
        else if($("#checknickname").val() == -2) {
            $("#errorvin").html("Hệ thống gián đoạn");
            return false;
        } else if($("#txtotp").val() == "") {
            $("#errorvin").html("Bạn chưa nhập OTP");
            return false;
        }else if($("#numberquay").val() == "") {
            $("#errorvin").html("Bạn chưa chọn số lượt quay");
            return false;
        }
        else if($("#type_slot").val() == "") {
            $("#errorvin").html("Bạn chưa chọn game slot");
            return false;
        }


        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("user/congtruslotajax") ?>",
            data: {
                nickname: $("#nickname").val(),
                ac: $("#type_security").val(),
                otp : $("#txtotp").val(),
                type: $("#typeotp").val(),
                number : -$("#numberquay").val(),
                slot : $("#type_slot").val(),
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                $("#errorvin").html("");


                if (result.errorCode == 0) {
                    $("#bsModal3").modal("show");
                    $("#text-popup").html("Trừ số lượt quay slot thành công");
                    $("#errorvin").html("");
                }
                else if (result.errorCode == 1008) {

                    $("#errorvin").html("Otp sai");
                }
                else if (result.errorCode == 1021) {

                    $("#errorvin").html("Otp hết hạn");
                }
                else if (result.errorCode == 1001) {
                    $("#errorvin").html("Hệ thống gián đoạn");
                }

            }, error: function () {
                $("#spinner").hide();
                $("#errorvin").html("Hệ thống quá tải.Vui lòng thử lại");
            }, timeout: 40000
        })

    });

    $('#bsModal3').on('hidden.bs.modal', function () {
        window.location.href = '<?php echo base_url("user/congtruslot") ?>';
    });



    function myFunction() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("user/getnicknameajax") ?>",
            data: {
                nickname: $("#nickname").val()
            },
            dataType: 'json',
            success: function (res) {
                $("#checknickname").val(res);
                if (res == -2) {
                    $("#lblnickname").text("Hệ thống gián đoạn");
                    $("#errorvin").html("");
                }
                else if (res == -1) {
                    $("#lblnickname").text("Nickname không tồn tại");
                    $("#errorvin").html("");
                }
                else if (res == 0) {
                    $("#lblnickname").text("Tài khoản thường");
                    $("#errorvin").html("");
                }
                else if (res == 1) {
                    $("#lblnickname").text("Tài khoản đại lý cấp 1");
                    $("#errorvin").html("");
                }
                else if (res == 2) {
                    $("#lblnickname").text("Tài khoản đại lý cấp 2");
                    $("#errorvin").html("");
                }
                else if (res == 100) {
                    $("#lblnickname").text("Tài khoản admin");
                    $("#errorvin").html("");
                }
            }
        })
    }
</script>