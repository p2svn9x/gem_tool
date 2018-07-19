
<section class="content-header">
    <h1>
        Xuất giftcode
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
                            <label class="control-label col-sm-2" id="successgift" style="color: #00a65a"></label>
                        </div>
                    </div>
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
                            <label id="labelvin" class="col-sm-1 control-label">Mệnh giá</label>

                            <div class="col-sm-2" id="menhgiavin">
                                <select name="menhgiavin" class="form-control" id="roomvin">
                                    <option value="">Chọn</option>
                                    <?php foreach($listvin as $key => $row): ?>
                                        <option value="<?php echo $row ?>"><?php echo $row."K Vin" ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-1 control-label">Số lượng:</label>

                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="soluong" placeholder="Bạn chỉ được xuất tối đa 10 giftcode">
                            </div>
                            <label class="col-sm-2" id="errorsl" style="color: red"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-1 control-label">Đợt phát hành:</label>

                            <div class="col-sm-2">
                                <select id="phathanh" class="form-control">
                                    <option value="">Chọn</option>
                                    
                                        <option value="1">Đợt 1</option>
                                  
                                </select>
                            </div>
                            <label class="col-sm-2" id="errorph" style="color: red"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-1 control-label">Mã otp:</label>

                            <div class="col-sm-1">
                                <select id="selectotp" class="form-control">
                                    <option value="0">OTP SMS</option>
                                    <option value="1">OTP APP</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <input id="txtotp" type="text" class="form-control" placeholder="Mã OTP" maxlength="5">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-1"><input type="submit" value="Thêm giftcode" name="submit"
                                                         class="btn btn-primary pull-left" id="search_tran"></div>
                        </div>
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
                            <p style="color: #0000ff">Bạn xuất giftcode thành công</p>
                        </div>
                        <div class="modal-footer">
                            <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                   aria-hidden="true">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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

    $(".successful").click(function () {
        $(".successful").hide();
    });
    $("#search_tran").click(function () {
        var account = $("#nguonxuat option:selected").text();
        if ($("#roomvin").val() == "") {
            $("#errorgift").html("Bạn phải chọn mệnh giá giftcode");
            return false;
        }  else if ($("#soluong").val() == "") {
            $("#errorgift").html("Bạn phải nhập số lượng giftcode");
            return false;
        }  else if ($("#soluong").val() > 10) {
            $("#errorgift").html("Bạn chỉ được xuất tối đa 10 giftcode");
            return false;
        }
        else if ($("#phathanh").val() == "") {
            $("#errorgift").html("Bạn phải chọn đợt phát hành giftcode");
            return false;
        }else if($("#txtotp").val() == ""){
            $("#errorgift").html("Bạn phải nhập mã OTP");
            return false;
        }

        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/addgiftcode') ?>",
            data: {
                money: $("#roomvin").val(),
                quantity: $("#soluong").val(),
                version: $("#phathanh").val(),
                otp : $("#txtotp").val(),
                typeotp : $("#selectotp").val()
            },
            dataType: 'json',
            success: function (result) {

                $("#spinner").hide();
                if (result == 1) {
                    $("#bsModal3").modal("show");
                    $("#errorgift").html("");
                    $("#roomvin").val("");
                    $("#soluong").val("");
                    $("#phathanh").val("");
                    $("#txtotp").val("");


                } else if (result == 2) {
                    $("#errorgift").html("Bạn nhập số lượng giftcode lớn hơn trong kho hoăc mệnh giá không tồn tại");
                    $("#successgift").html("");
                }else if (result == 3) {
                    $("#errorgift").html("Tài khoản không đủ tiền");
                    $("#successgift").html("");
                }
                else if (result == 4) {
                    $("#errorgift").html("Otp sai");
                    $("#successgift").html("");
                }
                else if (result == 5) {
                    $("#errorgift").html("Otp hết hạn");
                    $("#successgift").html("");
                }
            }

        });
    });

    $('#bsModal3').on('hidden.bs.modal', function () {
        var  baseurl = "<?php echo base_url("agency/addgiftcode") ?>";
        window.location.href = baseurl;
    });
    $(document).ready(function () {
        $("#soluong").keydown(function (e) {
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
