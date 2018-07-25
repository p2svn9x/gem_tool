<?php $this->load->view('admin/usergame/head', $this->data) ?>
<div class="line"></div>
<?php if ($role == false): ?>
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="wrapper">
        <?php $this->load->view('admin/message', $this->data); ?>
        <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
        <link rel="stylesheet"
              href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
        <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
        <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
        <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
        <script
            src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
        <input type="hidden" id="listnickname" value="<?php echo $listnn ?>">

        <div class="widget">
            <div class="title">
                <h4 style="margin-left: 20px">Kiểm tra tài khoản vip</h4>
            </div>

            <div class="formRow">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <label class="col-sm-4" style="color: red;word-break: break-all" id="errocode"><?php echo $error; ?>
                    </label>

                </div>
            </div>
            <div class="formRow">
                <form action="<?php echo admin_url("usergame/checkinfo") ?>" id="fileinfo" name="fileinfo"
                      enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 control-label" for="exampleInputEmail1">Tài khoản:</label>

                        <div class="col-sm-2">
                            <input type="file" id="userfile" name="filexls"
                                   value="<?php echo $this->input->post('filexls') ?>">
                        </div>
                        <div class="col-sm-1">
                            <input type="submit" class="btn btn-primary pull-left button blueB" id="upload"
                                   value="Upload" name="ok">
                        </div>
                    </div>
                </form>

            </div>

            <input type="hidden" id="status" value="<?php echo $admin_info->Status ?>">


            <div class="formRow">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <label for="param_name" class="col-sm-1" id="nameuser">Từ ngày:</label>

                    <div class="col-sm-2">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" id="toDate" name="toDate" class="form-control"
                                   value="<?php echo $start_time ?>"> <span
                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                        </div>
                    </div>
                    <label for="param_name" class="col-sm-1"> Đến ngày: </label>

                    <div class="col-sm-2">
                        <div class="input-group date" id="datetimepicker2">
                            <input type="text" id="fromDate" name="fromDate" class="form-control"
                                   value="<?php echo $end_time ?>"> <span
                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                        </div>
                    </div>
                    <div class="col-sm-1"><input type="button" id="openuser" value="Tìm kiếm" class="button blueB">
                    </div>

                    <div class="col-sm-1"><input type="button" id="exportexel" value="Xuất Exel" class="button blueB">
                    </div>

                </div>
            </div>
            <div class="formRow">
                <div class="row">
                    <div class="col-xs-12">
                        <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr style="height: 20px;">
                                <td>STT</td>
                                <td>Nickname</td>
                                <td>Tiền nạp</td>
                                <td>Tiền thắng tổng</td>
                                <td>Chuyển khoản</td>
                                <td>Mua mã thẻ</td>
                                <td>Nạp điện thoại</td>
                            </tr>
                            </thead>
                            <tbody id="logaction">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

<?php endif; ?>
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
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
</div>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.table2excel.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'DD-MM-YYYY'
        });

    });
    $("#openuser").click(function () {
        var result = ""
        if ($("#listnickname").val() == "") {
            $("#errocode").html("Không tồn tại file ");
        } else {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('usergame/checkinfoajax')?>",
                data: {
                    nickname: $("#listnickname").val(),
                    todate : $("#toDate").val(),
                    fromdate : $("#fromDate").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res.errorCode == 0) {
                        if (res.lstExitsNickName != null || res.lstExitsNickName != "") {
                            $("#errocode").html("Nick name không tồn tại:" + (res.lstExitsNickName));
                        }
                        stt = 1;

                        $.each(res.transactions, function (index, value) {
                            var total11 = 0;
                            var total12 = 0;
                            var total13 = 0;
                            var total14 = 0;
                            var total15 = 0;
                            if(value.actionOther.RechargeByCard != null) {
                                total15 += value.actionOther.RechargeByCard ;
                            }
                            if(value.actionOther.RechargeByBank != null) {
                                total15 += value.actionOther.RechargeByBank ;
                            }
                            if(value.actionOther.RechargeByIAP != null) {
                                total15 += value.actionOther.RechargeByIAP ;
                            }
                            if(value.actionOther.RechargeBySMS != null) {
                                total15 += value.actionOther.RechargeBySMS ;
                            }
                            if(value.actionOther.RechargeByVinCard != null) {
                                total15 += value.actionOther.RechargeByVinCard ;
                            }
                            if(value.actionOther.TransferMoney != null) {
                                total12 = value.actionOther.TransferMoney;
                            }
                            if(value.actionOther.CashOutByCard != null) {
                                total13 = value.actionOther.CashOutByCard;
                            }
                            if(value.actionOther.CashOutByTopUp != null) {
                                total14 = value.actionOther.CashOutByTopUp;
                            }
                            if(value.actionGame.TaiXiu != null) {
                                total11 += value.actionGame.TaiXiu.revenue;
                            }
                            if(value.actionGame.MiniPoker != null) {

                                total11 += value.actionGame.MiniPoker.revenue;
                            }

                            if(value.actionGame.CaoThap != null) {

                                total11 += value.actionGame.CaoThap.revenue;
                            }


                            if(value.actionGame.BauCua != null) {

                                total11 += value.actionGame.BauCua.revenue;
                            }

                            if(value.actionGame.PokeGo != null) {

                                total11 += value.actionGame.PokeGo.revenue;
                            }

                            if(value.actionGame.KhoBau != null) {

                                total11 += value.actionGame.KhoBau.revenue;
                            }

                            if(value.actionGame.SieuAnhHung != null) {

                                total11 += value.actionGame.SieuAnhHung.revenue;
                            }

                            if(value.actionGame.MyNhanNgu != null) {

                                total11 += value.actionGame.MyNhanNgu.revenue;
                            }

                            if(value.actionGame.NuDiepVien != null) {

                                total11 += value.actionGame.NuDiepVien.revenue;
                            }
							
							 if(value.actionGame.VuongQuocVin != null) {

                                total11 += value.actionGame.VuongQuocVin.revenue;
                            }

                            if(value.actionGame.Sam != null) {

                                total11 += value.actionGame.Sam.revenue;
                            }
                            if(value.BaCay != null) {
                                total11 += value.actionGame.BaCay.revenue;
                            }

                            if(value.actionGame.Binh != null) {

                                total11 += value.actionGame.Binh.revenue;
                            }

                            if(value.actionGame.Tlmn != null) {

                                total11 += value.actionGame.Tlmn.revenue;
                            }

                            if(value.actionGame.TaLa != null) {

                                total11 += value.actionGame.TaLa.revenue;
                            }

                            if(value.actionGame.Lieng != null) {
                                total11 += value.actionGame.Lieng.revenue;
                            }



                            if(value.actionGame.BaiCao != null) {

                                total11 += value.actionGame.BaiCao.revenue;
                            }


                            if(value.actionGame.Poker != null) {
                                total11 += value.actionGame.Poker.revenue;
                            }
							 if(value.actionGame.PokerTour != null) {
                                total11 += value.actionGame.PokerTour.revenue;
                            }
                            if(value.actionGame.XiDzach != null) {
                                total11 += value.actionGame.XiDzach.revenue;
                            }

                            if(value.actionGame.XocDia != null) {

                                total11 += value.actionGame.XocDia.revenue;
                            }

                            if(value.actionGame.Caro != null) {
                                total11 += value.actionGame.Caro.revenue;
                            }

                            if(value.actionGame.CoTuong != null) {
                                total11 += value.actionGame.CoTuong.revenue;
                            }
                            if(value.actionGame.CoUp != null) {
                                total11 += value.actionGame.CoUp.revenue;
                            }
							 if(value.actionGame.HamCaMap != null) {
                                total11 += value.actionGame.HamCaMap.revenue;
                            }


                            result += resultSearchTransction(stt, value.nickName, total15,total11,total12,total13,total14);
                            stt++;


                        });
                        $('#logaction').html(result);
                    }
                }, error: function () {
                    $("#spinner").hide();
                    $("#errocode").html("Hệ thống quá tải. Vui lòng gọi 19008698");
                }, timeout: 20000
            });
        }

    });
    $("#exportexel").click(function () {
        $("#checkAll").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "Listuser",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
    function resultSearchTransction(stt, nickname, rechargemoney, moneywin, tranfermoney,cashoutcard,cashoutdt) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(rechargemoney) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneywin) + "</td>";
        rs += "<td>" + commaSeparateNumber(tranfermoney) + "</td>";
        rs += "<td>" + commaSeparateNumber(cashoutcard) + "</td>";
        rs += "<td>" + commaSeparateNumber(cashoutdt) + "</td>";
        return rs;
    }

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>
