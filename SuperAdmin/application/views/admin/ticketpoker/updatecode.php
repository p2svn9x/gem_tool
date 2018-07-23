<?php if ($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
    <section class="content-header">
        <h1>
            Cập nhật trạng thái code Pokertour
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group successful">
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <label class="control-label col-sm-4" id="errorgift" style="color: red"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-1 control-label">ID:</label>

                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="idcode" placeholder="Nhập ID">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-1 control-label">ID lô:</label>

                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="idlocode" placeholder="Nhập Lô ID">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-1 control-label">Code:</label>

                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="code" placeholder="Nhập code">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-1 control-label" for="exampleInputEmail1">Trạng thái</label>

                                <div class="col-sm-2">
                                    <select class="form-control" id="statuscode">
                                        <option value="1">Active</option>
                                        <option value="2">Block</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-1 control-label" for="exampleInputEmail1">Loại code</label>

                                <div class="col-sm-2">
                                    <select class="form-control" id="typecode" name="money">
                                        <option value="-1">Tất cả</option>
                                        <option value="1">Daily</option>
                                        <option value="2">Vip</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label id="labelvin" class="col-sm-1 control-label">Giá trị</label>

                                <div class="col-sm-2">
                                    <select class="form-control" id="menhgiacode">
                                        <option value="-1">Tất cả</option>
                                        <option value="10000">10K</option>
                                        <option value="50000">50K</option>
                                        <option value="100000">100K</option>
                                        <option value="200000">200K</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-1 control-label">OTP:</label>

                                <div class="col-sm-1">
                                    <select id="typeotp" class="form-control">
                                        <option value="0">OTP SMS</option>
                                        <option value="1">OTP APP</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="otpcode" placeholder="Nhập OTP">
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-1"><input type="submit" value="Thêm code" name="submit"
                                                             class="btn btn-primary pull-left" id="search_tran"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<div class="modal fade" id="error-popup" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p id="status-error" style="color: blue;font-weight: 600">Bạn cập nhật trạng thái code PokerTour thành công</p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                       aria-hidden="true">
            </div>
        </div>
    </div>
</div>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
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
    }</style>
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    });
    $(".successful").click(function () {
        $("#errorgift").html("");
    });
    $("#search_tran").click(function () {
       if ($("#idlocode").val() == "") {
            $("#errorgift").html("Bạn chưa nhập lô ID");
            return false;
        }
        else if ($("#otpcode").val() == "") {
            $("#errorgift").html("Bạn chưa nhập OTP");
            return false;
        }

        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('pokertour/updateajax') ?>",
            data: {
                id : $("#idcode").val(),
                idlocode : $("#idlocode").val(),
                code : $("#code").val(),
                status : $("#statuscode").val(),
                typecode: $("#typecode").val(),
                menhgiacode: $("#menhgiacode").val(),
                typeotp: $("#typeotp").val(),
                otp: $("#otpcode").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if(result == 0){
                    $("#errorgift").html("");
                    $("#error-popup").modal("show");

                }else if(result == 1){
                    $("#errorgift").html("Hệ thống quá tải.Vui lòng thử lại");

                }else if(result == 2){
                    $("#errorgift").html("OTP sai");

                }else if(result == 3){
                    $("#errorgift").html("OTP hết hạn");
                }

            }, error: function () {
                $("#spinner").hide();
                $("#errorgift").html("Hệ thống quá tải.Vui lòng thử lại");
            }, timeout: 40000
        })

    });

    $('#error-popup').on('hidden.bs.modal', function () {
        window.location.href = '<?php echo base_url("pokertour/updatecode") ?>';
    });

    $(document).ready(function () {
        $("#idlocode").keydown(function (e) {
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
