<?php if($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
    <section class="content-header">
        <h1>
            Cập nhật doanh số đại lý
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-3"></div>
                                <label class="col-xs-4 col-sm-4 col-md-2  control-label" style="color: red" id="errorvin"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                <label id="labelvin" class="col-xs-2 col-sm-2 col-md-1 control-label">OTP:</label>
                                <div class="col-xs-3 col-sm-3 col-md-2">
                                    <select id="selectotp" class="form-control">
                                        <option value="0">SMS OTP</option>
                                        <option value="1">APP OTP</option>
                                    </select>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-2">
                                    <input type="text" id="txtotp" placeholder="Nhập mã otp" class="form-control" maxlength="5">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                <label id="labelvin" class="col-xs-2 col-sm-2 col-md-1 control-label">Thời gian cập nhật doanh số:</label>
                                <div class="col-xs-3 col-sm-3 col-md-2">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input type="text" class="form-control" id="txtDate1" name="txtDate1"
                                               value=""> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-2">
                                    <div class="input-group date" id="datetimepicker3">
                                        <input type="text" class="form-control" id="txtDate2" name="txtDate2"
                                               value=""> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                <label id="labelvin" class="col-xs-2 col-sm-2 col-md-1 control-label">Doanh số:</label>
                                <div class="col-xs-3 col-sm-3 col-md-2">
                                    <select class="form-control" id="seclect-ds">
                                        <option value="0">Không tính doanh số</option>
                                        <option value="1">Tính doanh số</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-3"></div>
                                <div class="col-sm-2">
                                    <input type="button" id="updateds"
                                           value="Cập nhật doanh số đại lý" class="btn btn-primary pull-left">
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="bsModal5" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <p style="color: #0000ff">Bạn cập nhật doamh số đại lý thành công</p>
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
    $(function () {
        $('#datetimepicker2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#datetimepicker3').datetimepicker({
            format: 'DD-MM-YYYY'
        });

    });


    $("#updateds").click(function () {
        if ($("#txtotp").val() == "") {
            $("#errorvin").html("Bạn chưa nhập mã otp");
            return false;
        }else if($("#txtDate1").val() == ""){
            $("#errorvin").html("Bạn chưa nhập thời gian bắt đầu");
            return false;
        }
        else if($("#txtDate2").val() == ""){
            $("#errorvin").html("Bạn chưa nhập thời gian kết thúc");
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user/updatedsajax')?>",
            data: {
                type : $("#selectotp").val(),
                otp :  $("#txtotp").val(),
                ts :  $("#txtDate1").val(),
                te :  $("#txtDate2").val(),
                tu: $("#seclect-ds").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if(result == 0){
                    $("#errorvin").html("");
                    $("#txtotp").val("");
                    $("#bsModal5").modal("show");
                }
                else if(result == 1001){
                    $("#errorvin").html("Hệ thống gián đoạn");
                }
                else if(result == 1008){
                    $("#errorvin").html("Mã otp sai");
                }
                else if(result == 1021){
                    $("#errorvin").html("Mã otp hết hạn");
                }
                else if(result == 1001){
                    $("#errorvin").html("Hệ thống gián đoạn");
                }
            }
        });

    });

</script>