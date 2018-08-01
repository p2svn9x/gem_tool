<script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.validate.min.js"></script>
<script src="<?php echo public_url('admin') ?>/dist/js/validate_tranfer.js"></script>
<section class="content-header">
    <h1>
        Chuyển Vin
    </h1>
</section>

<section class="content">
    <div class="row">
	<div style="width: 100%;float: left;color: #ff0000;" id="error"></div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group has-error">
                        <div class="col-sm-12">
                            <label class="control-label pull-left" id="validate-text"
                                   for="inputError"><?php echo $errors ?></label>
                            <input type="hidden" id="">
                        </div>
                    </div>
                    <form id="tranfer" action="chuyenvin" method="post" novalidate="novalidate">
                        <input type="hidden" id="nicknamesend" name="nicknamesend"
                               value="<?php echo $admin_info->nickname ?>">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4"></div>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 control-label">Số dư khả dụng:</label>

                                        <div class="col-sm-6">
                                            <input type="text" id="sovindu" class="form-control" readonly
                                                   value="<?php echo number_format($vin) ?>">
                                            <input type="hidden" id="vindu" value="<?php echo $vin ?>">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 control-label">Nick name nhận:</label>

                                        <div class="col-sm-6">
                                            <input type="text" id="nickname" name="nickname" class="form-control"
                                                   placeholder="Nhập nickname">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 control-label">Nhập lại nick name:</label>

                                        <div class="col-sm-6">
                                            <input type="text" id="renickname" name="renickname" class="form-control"
                                                   onblur="myFunction()">
                                            <label id="nicknamehd" style="margin-left: 10px;color: blueviolet"></label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 control-label">Số vin chuyển:</label>

                                        <div class="col-sm-6">
                                            <input type="text" id="vinchuyen" name="vinchuyen" class="form-control"
                                                   onblur="myFunction()"
                                                   placeholder="Nhập số vin">

                                            <label id="numchuyen" style="margin-left: 10px;color: blueviolet"></label>
                                            <label id="lblphichuyen" style="color: red"> </label><span id="phichuyen"
                                                                                                       style="margin-left: 10px;color: blueviolet"></span>
                                            <input type="hidden" id="hdntranfer" name="hdntranfer" class="form-control"
                                                   value="0">
                                            <input type="hidden" id="feeck">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 control-label">Số vin nhận:</label>

                                        <div class="col-sm-6">
                                            <input type="text" id="vinnhan" name="vinnhan" class="form-control"
                                                   placeholder="Số vin nhận" readonly="readonly">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 control-label">Lý do chuyển:</label>

                                        <div class="col-sm-6">
                                            <input type="text" id="reasonchuyen" name="reasonchuyen"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 control-label">Mã OTP:</label>

                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" id="maotp" name="maotp"
                                                   maxlength="5" placeholder="Nhập OTP">
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="form-control" id="otpselect" name="otpselect">
<!--                                                <option value="0">OTP SMS</option>-->
                                                <option value="1">OTP APP</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-2">
                                            <input type="submit" id="chuyenvin"
                                                   value="Chuyển vin" class="btn btn-primary pull-left">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <h3>Quy định chuyển khoản</h3>
                                    <h5>+ Giá trị giao dịch tối thiểu: <span style="color: #0000ff">10,000 Vin</span>
                                    </h5>
                                    <h5>+ Chi phí giao dịch là: <span style="color: #0000ff">0%</span></h5>
                                    <h5>+ Không giới hạn giá trị giao dịch tối đa và số lần giao dịch trong ngày</h5>
                                </div>
                                <div style="color: #0000ff">
                                    <h3>Chú ý</h3>
                                    <h5>+ Nickname là tên nhân vật(Tên hiển thị trong game).Không phải là tên tài khoản
                                        đăng nhập</h5>
                                    <h5>+ Các giao dịch chuyển nhầm tên tài khoản được tính là giao dịch hợp lệ và không
                                        được hoàn trả.Bạn vui lòng kiểm tra lại tên Nickname nhận trước khi thực hiện
                                        giao dịch</h5>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
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

    .tranfer-error {
        color: #FF0000; /* red */
        font-weight: normal;
    }


</style>

<script>
    $('#nickname').keyup(function () {
        if ($("#validate-text").html() != "") {
            $("#validate-text").html('')
        }
    });
    $("#vinchuyen").keyup(function (e) {
        $(this).val(($(this).val()));
        $("#vinnhan").val($(this).val());
        $("#numchuyen").text(format($(this).val()));


    });

    function myFunction() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("TranferAjax/checknickname") ?>",
            data: {
                nickname: $("#renickname").val()
            },
            dataType: 'json',
            success: function (res) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url("TranferAjax/getfee") ?>",
                    data: {},
                    dataType: 'json',
                    success: function (respone) {
						$("#error").html("");
                        if (res == -2) {

                            $("#lblphichuyen").html("");
                            $("#phichuyen").html("");
                            $("#hdphichuyen").val("");
                            $("#nicknamehd").html("Hệ thống gián đoạn");
                        }
                        else if (res == -1) {
                            $("#lblphichuyen").html("");
                            $("#phichuyen").html("");
                            $("#hdntranfer").val("");
                            $("#nicknamehd").html("Nick name không tồn tại");
                        }
                        else if (res == 0) {

                            $fee = Math.round(parseInt($("#vinchuyen").val()) * (1 - respone.ratio_transfer_dl_1).toFixed(2));
                            $totalchuyen = parseInt($("#vinchuyen").val()) + parseInt($fee);
                           // $("#lblphichuyen").html("Số tiền đại lý bị trừ:  ");

//                            $("#hdntranfer").val($('#vindu').val());
                            $("#nicknamehd").html("Tài khoản thường");

                        }
                        else if (res == 1) {
                            $fee = Math.round(parseInt($("#vinchuyen").val()) * (1 - respone.r_tf_11).toFixed(2));
                            $totalchuyen = parseInt($("#vinchuyen").val()) + parseInt($fee);
                           // $("#lblphichuyen").html("Số tiền đại lý bị trừ:  ");
//                            $("#hdntranfer").val($('#vindu').val());
                            $("#nicknamehd").html("Tài khoản đại lý");
                        }
                        else if (res == 2) {
                            $fee = Math.round(parseInt($("#vinchuyen").val()) * (1 - respone.r_tf_12).toFixed(2));
                            $totalchuyen = parseInt($("#vinchuyen").val()) + parseInt($fee);
                           // $("#lblphichuyen").html("Số tiền đại lý bị trừ:  ");
                           // $("#phichuyen").html(format($totalchuyen));
                            $("#hdntranfer").val($('#vindu').val());
                            $("#nicknamehd").html("Tài khoản đại lý");
                        }
                        else if (res == 100) {
                            $fee = Math.round(parseInt($("#vinchuyen").val()) * (1 - respone.ratio_transfer_dl_1).toFixed(2));
                            $totalchuyen = parseInt($("#vinchuyen").val()) + parseInt($fee);
                           // $("#lblphichuyen").html("Số tiền đại lý bị trừ:  ");
                          //  $("#phichuyen").html(format($totalchuyen));
                            $("#hdntranfer").val($('#vindu').val());
                            $("#nicknamehd").html("Tài khoản thường");
                        }
                    },error: function(){
										$("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
									},
									timeout:30000


                });
            }
        })
    }

</script>