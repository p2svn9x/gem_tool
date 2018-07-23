<?php if ($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
    <section class="content-header">
        <h1>
            Cộng tiền cho nhiều tài khoản
        </h1>
    </section>
    <input type="hidden" id="listnickname" value='<?php echo $listnn ?>'>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <label class="col-sm-4" style="color: red;word-break: break-all"
                                       id="errorcode"><?php echo $error; ?>
                                </label>
                            </div>
                        </div>
                        <form action="<?php echo base_url("user/congtientaixiu") ?>" id="fileinfo" name="fileinfo"
                              enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <label class="col-sm-2 control-label" for="exampleInputEmail1">Tài khoản:</label>

                                    <div class="col-sm-2">
                                        <input type="file" id="userfile" name="filexls"
                                               value="<?php echo $this->input->post('filexls') ?>">
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="submit" class="btn btn-primary pull-left" id="upload"
                                               value="Upload"
                                               name="ok">

                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-2 control-label">Lý do:</label>

                                <div class="col-sm-2">
                                    <input id="txtlydo" type="text" class="form-control"
                                           placeholder="Nhập lý do cộng tiền">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-2 control-label">Loại tiền:</label>

                                <div class="col-sm-2">
                                    <select class="form-control" id="typemoney">
                                        <option value="vin">Vin</option>
                                        <option value="xu">Xu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-2 control-label">Hành động:</label>

                                <div class="col-sm-2">
                                    <select class="form-control" id="typeaction">
                                        <option value="Admin">Hoàn tiền tài xỉu</option>
                                        <option value="EventVP">Trả thưởng vippoint event</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <label class="col-sm-2 control-label">OTP:</label>

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
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-1"><input type="button" value="Cộng tiền" name="submit"
                                                             class="btn btn-primary pull-left" id="congtien"></div>

                            </div>
                        </div>
                        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog"
                             aria-labelledby="mySmallModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <p style="color: #0000ff">Bạn cộng tiền thành công</p>
                                    </div>
                                    <div class="modal-footer">
                                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                               aria-hidden="true">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Nickname</th>
                                    <th>Tiền</th>
                                    <th>Tài khoản</th>
                                    <th>Mã lỗi</th>
                                </tr>
                                </thead>
                                <tbody id="logaction">

                                </tbody>
                            </table>

                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                     alt="Loading"/>
                            </div>
                            <div class="text-center pull-right">
                                <ul id="pagination-demo" class="pagination-lg"></ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
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
    $("#congtien").click(function () {
        if ($("#txtlydo").val() == "") {
            $("#errorcode").html("Bạn chưa nhập lý do cộng tiền");
            return false;
        }

        if ($("#txtotp").val() == "") {
            $("#errorcode").html("Bạn chưa nhập mã OTP");
            return false;
        }
        if ($("#listnickname").val() == "") {
            $("#errorcode").html("Không tồn tại file hoặc key Nickname , Money viết sai");
        } else {
            $("#spinner").show();
            var result = "";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('user/congtientaixiuajax')?>",
                data: {
                    nickname: $("#listnickname").val(),
                    money: $("#typemoney").val(),
                    otp: $("#txtotp").val(),
                    lydo: $("#txtlydo").val(),
                    typeotp: $("#typeotp").val(),
					 action : $("#typeaction").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    console.log(res);
                    if (res.errorCode == 0) {
                        $("#bsModal3").modal("show");
                        $("#errorcode").html("");
                        $("#txtlydo").val("");
                        $("#txtotp").val("");
						
                        stt = 1;
                        $.each(res.listResponse, function (index, value) {
                            result += resultrespone(stt, value.nickname, value.money, value.isBot, value.errorCode);
                            stt++;
                        });
                        $('#logaction').html(result);

                        $("#example2").table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "listuser",
                            fileext: ".xls",
                            exclude_img: true,
                            exclude_links: true,
                            exclude_inputs: true
                        });

                    } else if (res.errorCode == 1001) {
                        $("#errorcode").html("Cộng tiền thất bại");
                    }
                    else if (res.errorCode == 1008) {
                        $("#errorcode").html("OTP sai");
                    }
                    else if (res.errorCode == 1021) {
                        $("#errorcode").html("OTP hết hạn");
                    }

                }, error: function () {
                    $("#spinner").hide();
                    $("#errorcode").html("Hệ thống gián đoan . Vui lòng liên hệ 19006896");
                }, timeout: 30000
            });
        }
    });
	 $('#bsModal3').on('hidden.bs.modal', function () {
        window.location.href = '<?php echo base_url("user/congtientaixiu") ?>';
    });
    function resultrespone(stt,nickname,money,isbot,error) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(money) + "</td>";
        if (isbot == true) {
            rs += "<td>" + "Bot" + "</td>";
        } else if (isbot == false) {
            rs += "<td>" + "Thường" + "</td>";
        }
        rs += "<td>" + kqresult(error) + "</td>";

        rs += "</tr>";
        return rs;
    }

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }

function kqresult(error){
    var str = "";
    if (error == 0) {
        str = "Thành công";
    } else if (error == 1001) {
        str = "Thất bại";
    }
    else if (error == 1002) {
        str = "Tài khoản không đủ tiền";
    }
    else if (error == 2001) {
        str = "Nickname không tồn tại";
    }
    else  {
        str = "Lỗi khác";
    }
    return str;
}
</script>
