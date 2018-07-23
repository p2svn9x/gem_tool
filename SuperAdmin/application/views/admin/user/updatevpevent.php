<?php if($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
    <section class="content-header">
        <h1>
            Update vippoint event
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
                                <label class="col-sm-2  control-label" style="color: red" id="errorupdate"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <label class="col-sm-1 control-label">Nick name:</label>
                                <div class="col-sm-2">
                                    <input type="text" id="nickname" class="form-control" placeholder="Nhập nickname">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <label class="col-sm-1 control-label">Loại:</label>
                                <div class="col-sm-1">
                                    <select id="selectloai" class="form-control">
                                        <option value="0">Rồng lửa</option>
                                        <option value="1">Gói quà</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <label class="col-sm-1 control-label">Giá trị:</label>
                                <div class="col-sm-2">
                                    <input type="text" id="txtvalue" class="form-control" placeholder="Nhập giá trị">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <label class="col-sm-1 control-label">OTP:</label>
                                <div class="col-sm-1">
                                    <select id="selectotp" class="form-control">
                                        <option value="0">SMS OTP</option>
                                        <option value="1">APP OTP</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" id="txtotp" placeholder="Nhập mã otp" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-1">
                                    <input type="button" id="updatevp"
                                           value="Update" class="btn btn-primary pull-left">
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <p style="color: #0000ff">Bạn update vippoint thành công</p>
                                    </div>
                                    <div class="modal-footer">
                                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                               aria-hidden="true">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="spinner" class="spinner" style="display:none;">
                        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
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
    $("#updatevp").click(function () {
        if ($("#nickname").val() == "") {
            $("#errorupdate").html("Bạn chưa nhập nickname");
            return false;
        }
        else if ($("#txtvalue").val() == "") {
            $("#errorupdate").html("Bạn chưa nhập giá trị");
            return false;
        }
        else if ($("#txtotp").val() == "") {
            $("#errorupdate").html("Bạn chưa nhập mã otp");
            return false;
        }

        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user/updatevpajax')?>",
            data: {
                nickname: $("#nickname").val(),
                type : $("#selectloai").val(),
                value : $("#txtvalue").val(),
                otp :  $("#txtotp").val(),
                typeotp : $("#selectotp").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if(result == 0){
                    $("#errorupdate").html("");
                    $("#nickname").val("");
                    $("#txtvalue").val("");
                    $("#txtotp").val("");
                    $("#bsModal3").modal("show");

                }
                else if(result == 1008){
                    $("#errorvin").html("Mã otp sai");
                }
                else if(result == 1021){
                    $("#errorvin").html("Mã otp hết hạn");
                }
                else if(result == 1001){
                    $("#errorvin").html("Hệ thống gián đoạn hoặc nickname không tồn tại");
                }
            }
        });

    });
    $(document).ready(function () {
        $("#txtvalue").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });
</script>