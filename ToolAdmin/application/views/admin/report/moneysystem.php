
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/css/bootstrap-datetimepicker.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<?php if($role == false): ?>
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
    <form class="list_filter form" action="<?php echo admin_url('report/moneysystem') ?>" method="post">
        <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 70px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                    <td class="item">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" id="toDate" name="toDate"
                                   value="<?php echo $start_time ?>"> <span
                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                        </div>


                    </td>

                    <td>
                        <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                               class="formLeft"> Đến ngày: </label>
                    </td>
                    <td class="item">

                        <div class="input-group date" id="datetimepicker2">
                            <input type="text" id="fromDate" name="fromDate"
                                   value="<?php echo $end_time ?>"> <span
                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                        </div>
                    </td>
                    <td style="">
                        <input type="submit" id="search_tran" value="Tìm kiếm" class="button blueB"
                               style="margin-left: 70px">
                    </td>
                    <td>
                        <input type="reset"
                               onclick="window.location.href = '<?php echo admin_url('report/moneysystem') ?>'; "
                               value="Reset" class="basic" style="margin-left: 20px">
                    </td>
                </tr>
            </table>
        </div>
    </form>

    <div class="widget">
        <div class="title">
            <h6>Tiền người chơi</h6>
        </div>

        <input type="hidden" value="<?php echo $admin_info->Status ?>" id="status">
        <div class="formRow">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Tiền sự kiện: <span id = "spanevent" style="color: #0000ff"></span></h5>
                </div>
                <div class="col-sm-3">
                    <h5>Phế: <span id = "spanphe" style="color: #0000ff"></span></h5>
                </div>
                <div class="col-sm-3">
                    <h5>Tiền thắng trong game: <span id = "spanmoneygame" style="color: #0000ff"></span></h5>
                </div>
                <div class="col-sm-3">
                    <h5>Tiền thắng tổng: <span id = "spanmoney" style="color: #0000ff"></span></h5>
                </div>
            </div>
        </div>

        <div class="formRow">
            <div class="row">
                <h4 id="" style="color: red;margin-left: 20px">Tiền nạp game (VNĐ)</h4>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>Nạp qua IAP</td>
                            <td>Nạp qua thẻ</td>
                            <td>Nạp qua ngân hàng</td>
                            <td>Nạp qua SMS</td>
                            <td>Tổng tiền</td>
                        </tr>
                        </thead>
                        <tbody id="logrecharge">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <h4 id="" style="color: red;margin-left: 20px">Minigame</h4>
                </div>
            </div>
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>STT</td>
                            <td>Tên game</td>
                            <td>Trả thưởng</td>
                            <td>Tiền cược</td>
                            <td>Tiền sự kiện</td>
                            <td>Phế</td>
                            <td>Tiền thắng trong game</td>
                            <td>Tiền thắng tổng</td>
                        </tr>
                        </thead>
                        <tbody id="logaction"> </tbody>
                        <tbody><tr>
                            <td colspan="2">Tổng:</td>
                            <td id="totalmoneywin" style="color: #0000ff"></td>
                            <td  id="totalmoneylost" style="color:#0000ff "></td>
                            <td  id="totalmoneyother" style="color: #0000ff"></td>
                            <td  id="totalmoneyfee" style="color: #0000ff"></td>
                            <td  id="totalmoneyplay" style="color: #0000ff"></td>
                            <td  id="totalmoney" style="color: #0000ff"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <h4 id="" style="color: red;margin-left: 20px">Game bài</h4>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>STT</td>
                            <td>Tên game</td>
                            <td>Tiền thắng</td>
                            <td>Tiền thua</td>
                            <td>Tiền sự kiện</td>
                            <td>Phế</td>
                            <td>Tiền thắng trong game</td>
                            <td>Tiền thắng tổng</td>
                        </tr>
                        </thead>
                        <tbody id="logactiongamebai"></tbody>
                        <tbody><tr>
                            <td colspan="2">Tổng:</td>
                            <td id="totalmoneywinbai" style="color: #0000ff"></td>
                            <td  id="totalmoneylostbai" style="color:#0000ff "></td>
                            <td  id="totalmoneyotherbai" style="color: #0000ff"></td>
                            <td  id="totalmoneyfeebai" style="color: #0000ff"></td>
                            <td  id="totalmoneyplaybai" style="color: #0000ff"></td>
                            <td  id="totalmoneybai" style="color: #0000ff"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="title">
            <h6>Tiền Bot</h6>
        </div>
        <div class="formRow">
            <div class="row">
                <h4 id="" style="color: red;margin-left: 20px">Minigame</h4>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table  class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>STT</td>
                            <td>Tên game</td>
                            <td>Trả thưởng</td>
                            <td>Tiền cược</td>
                            <td>Tiền sự kiện</td>
                            <td>Phế</td>
                            <td>Tiền thắng trong game</td>
                            <td>Tiền thắng tổng</td>
                        </tr>
                        </thead>
                        <tbody id="logactionbot">
                        </tbody>
                        <tbody><tr>
                            <td colspan="2">Tổng:</td>
                            <td id="totalmoneywinbot" style="color: #0000ff"></td>
                            <td  id="totalmoneylostbot" style="color:#0000ff "></td>
                            <td  id="totalmoneyotherbot" style="color: #0000ff"></td>
                            <td  id="totalmoneyfeebot" style="color: #0000ff"></td>
                            <td  id="totalmoneyplaybot" style="color: #0000ff"></td>
                            <td  id="totalmoneybot" style="color: #0000ff"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <h4 id="" style="color: red;margin-left: 20px">Game bài</h4>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table  class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>STT</td>
                            <td>Tên game</td>
                            <td>Tiền thắng</td>
                            <td>Tiền thua</td>
                            <td>Tiền sự kiện</td>
                            <td>Phế</td>
                            <td>Tiền thắng trong game</td>
                            <td>Tiền thắng tổng</td>
                        </tr>
                        </thead>
                        <tbody id="logactionbotgamebai">
                        </tbody>
                        <tbody><tr>
                            <td colspan="2">Tổng:</td>
                            <td id="totalmoneywinbotbai" style="color: #0000ff"></td>
                            <td  id="totalmoneylostbotbai" style="color:#0000ff "></td>
                            <td  id="totalmoneyotherbotbai" style="color: #0000ff"></td>
                            <td  id="totalmoneyfeebotbai" style="color: #0000ff"></td>
                            <td  id="totalmoneyplaybotbai" style="color: #0000ff"></td>
                            <td  id="totalmoneybotbai" style="color: #0000ff"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="title">
            <h6>Tổng tiền hiện tại trong hệ thống</h6>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>Người chơi</td>
                            <td>Tổng đại lý</td>
                            <td>Đại lý cấp 1</td>
                            <td>Đại lý cấp 2</td>
                            <td>Bot</td>
                            <td>Tổng tiền
                            </td>
                        </tr>
                        </thead>
                        <tbody id="logcurrent">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="title">
            <h6>Tiền vào game (VIN)</h6>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>Nạp qua IAP</td>
                            <td>Nạp qua thẻ</td>
                            <td>Nạp qua ngân hàng</td>
                            <td>Nạp qua SMS</td>
                            <td>Vòng quay may mắn</td>
                            <td>Giftcode</td>
                            <td>Đổi thưởng Vippoint</td>
                            <td>Hoàn trả phí</td>
                            <td>Vippoint Event</td>
                            <td>Thưởng top doanh số</td>
                            <td>Tổng tiền</td>
                        </tr>
                        </thead>
                        <tbody id="logvinin">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="title">
            <h6>Tiền ra game</h6>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>Mua mã thẻ</td>
                            <td>Nạp tiền điện thoại</td>
                            <td>Nạp xu</td>
                            <td>Phí SMS đại lý</td>
                            <td>Phí chuyển khoản</td>
                            <td>Giftcode đại lý</td>
                            <td>Tổng tiền</td>
                        </tr>
                        </thead>
                        <tbody id="logvinout">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="title">
            <h6>Tiền khác</h6>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>Cộng trừ tiền Admin</td>
                            <td>Cộng trừ tiền Bot</td>
                        </tr>
                        </thead>
                        <tbody id="logtranfer">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<!--        <div class="title">-->
<!--            <h6>Tiền khởi tạo</h6>-->
<!--        </div>-->
<!--        <div class="formRow">-->
<!--            <div class="row">-->
<!--                <div class="col-xs-12">-->
<!--                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">-->
<!--                        <thead>-->
<!--                        <tr style="height: 20px;">-->
<!--                            <td>Tổng đại lý</td>-->
<!--                            <td>Bot</td>-->
<!--                            <td>Tổng tiền</td>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                        <tbody id="loginitital">-->
<!--                        </tbody>-->
<!--                    </table>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->



    </div>
</div>
<?php endif; ?>
<style>
    td {
        word-break: break-all;
    }

    thead {
        font-size: 12px;
    }

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
    }</style>
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
    <div class="text-center">
        <ul id="pagination-demo" class="pagination-lg"></ul>
    </div>
</div>
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'DD-MM-YYYY'
        });

    });
    $("#search_tran").click(function () {

    });
    function resultSearchTransction(stt, gamename, moneywin, moneylost, moneyother,fee, moneytotal, revenue) {

        var rs = "";
        rs += "<tr>";
        rs += "<td >" + stt + "</td>";
        rs += "<td>" + gamename + "</td>";
        rs += "<td class='moneywinuser'>" + commaSeparateNumber(moneywin) + "</td>";
        rs += "<td class='moneylostuser'>" + commaSeparateNumber(moneylost) + "</td>";
        rs += "<td class='moneyotheruser'>" + commaSeparateNumber(moneyother) + "</td>";
        rs += "<td class='feeuser'>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td class='moneytotaluser'>" + commaSeparateNumber(moneytotal) + "</td>";
        rs += "<td class='revenueuser'>" + commaSeparateNumber(revenue) + "</td>";
        rs += "</tr>";
        return rs;
    }
    function resultSearchTransctionbai(stt, gamename, moneywin, moneylost, moneyother,fee, moneytotal, revenue) {

        var rs = "";
        rs += "<tr>";
        rs += "<td >" + stt + "</td>";
        rs += "<td>" + gamename + "</td>";
        rs += "<td class='moneywinuserbai'>" + commaSeparateNumber(moneywin) + "</td>";
        rs += "<td class='moneylostuserbai'>" + commaSeparateNumber(moneylost) + "</td>";
        rs += "<td class='moneyotheruserbai'>" + commaSeparateNumber(moneyother) + "</td>";
        rs += "<td class='feeuserbai'>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td class='moneytotaluserbai'>" + commaSeparateNumber(moneytotal) + "</td>";
        rs += "<td class='revenueuserbai'>" + commaSeparateNumber(revenue) + "</td>";
        rs += "</tr>";
        return rs;
    }
    function resultSearchTransctionbot(stt, gamename, moneywin, moneylost, moneyother,fee, moneytotal, revenue) {

        var rs = "";
        rs += "<tr>";
        rs += "<td >" + stt + "</td>";
        rs += "<td>" + gamename + "</td>";
        rs += "<td class='moneywinuserbot'>" + commaSeparateNumber(moneywin) + "</td>";
        rs += "<td class='moneylostuserbot'>" + commaSeparateNumber(moneylost) + "</td>";
        rs += "<td class='moneyotheruserbot'>" + commaSeparateNumber(moneyother) + "</td>";
        rs += "<td class='feeuserbot'>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td class='moneytotaluserbot'>" + commaSeparateNumber(moneytotal) + "</td>";
        rs += "<td class='revenueuserbot'>" + commaSeparateNumber(revenue) + "</td>";
        rs += "</tr>";
        return rs;
    }
    function resultSearchTransctionbotbai(stt, gamename, moneywin, moneylost, moneyother,fee, moneytotal, revenue) {

        var rs = "";
        rs += "<tr>";
        rs += "<td >" + stt + "</td>";
        rs += "<td>" + gamename + "</td>";
        rs += "<td class='moneywinuserbotbai'>" + commaSeparateNumber(moneywin) + "</td>";
        rs += "<td class='moneylostuserbotbai'>" + commaSeparateNumber(moneylost) + "</td>";
        rs += "<td class='moneyotheruserbotbai'>" + commaSeparateNumber(moneyother) + "</td>";
        rs += "<td class='feeuserbotbai'>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td class='moneytotaluserbotbai'>" + commaSeparateNumber(moneytotal) + "</td>";
        rs += "<td class='revenueuserbotbai'>" + commaSeparateNumber(revenue) + "</td>";
        rs += "</tr>";
        return rs;
    }

    function resulttranfer(moneyother, fee) {

        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(moneyother) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(fee) + "</td>";
        rs += "</tr>";
        return rs;
    }
    function resulttotalvinin(rechargeiap,rechargecard, rechargebank,vqmm,giftcode,cashoutvp,refundfee,vippointevent,bonustopds,rechargesms,total) {
        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargeiap) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargecard) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargebank) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargesms) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(vqmm) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(giftcode) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(cashoutvp) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(refundfee) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(vippointevent) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonustopds) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(total) + "</td>";
        rs += "</tr>";
        return rs;
    }

    function resulttotalrecharge(rechargeiap,rechargecard, rechargebank,rechargesms,total) {
        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargeiap) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargecard) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargebank) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargesms) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(total) + "</td>";
        rs += "</tr>";
        return rs;
    }
    function resulttotalvinout(cashoutcard, cashouttopup, vin2xu,chargesms,fee,gcagent,total) {

        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(cashoutcard) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(cashouttopup) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(vin2xu) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(chargesms) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(gcagent) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(total) + "</td>";
        rs += "</tr>";
        return rs;
    }

    function resulttotalinitital(superagent, bot,total) {

        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(superagent) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bot) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(total) + "</td>";
        rs += "</tr>";
        return rs;
    }
    function resulttotalcurrent(moneyuser,moneyagent,moneyagent1,moneyagent2,moneybot,total) {

        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(moneyuser) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(moneyagent) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(moneyagent1) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(moneyagent2) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(moneybot) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(total) + "</total>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        var result1 = "";
        var result11 = "";
        var result2 = "";
        var result3 = "";
        var result33 = "";
        var result4 = "";
        var result5 = "";
        var result6 = "";
        var result7 = "";
        var result8 = "";
        var result9 = "";
        var result10 = "";
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/moneysystemajax  ')?>",
            // url: "http://192.168.0.251:8082/api_backend",
            data: {
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()
            },

            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                if (res.actionGame == null || res.actionGame == "" ) {
                    $("#resultsearch").html("");
                } else {


                    if(res.actionGame.TaiXiu != null) {
                        var stt = 1;
                        result1 += resultSearchTransction(stt, "Tài Xỉu", res.actionGame.TaiXiu.moneyWin, res.actionGame.TaiXiu.moneyLost, res.actionGame.TaiXiu.moneyOther, res.actionGame.TaiXiu.fee, res.actionGame.TaiXiu.revenuePlayGame, res.actionGame.TaiXiu.revenue);
                        $('#logaction').html(result1);
                    }
                    if(res.actionGame.MiniPoker != null) {
                        var stt = 2;
                        result1 += resultSearchTransction(stt, "MiniPoker", res.actionGame.MiniPoker.moneyWin, res.actionGame.MiniPoker.moneyLost, res.actionGame.MiniPoker.moneyOther, res.actionGame.MiniPoker.fee, res.actionGame.MiniPoker.revenuePlayGame, res.actionGame.MiniPoker.revenue);
                        $('#logaction').html(result1);
                    }
                    if(res.actionGame.CaoThap != null) {
                        var stt = 3;
                        result1 += resultSearchTransction(stt, "Cao Thấp", res.actionGame.CaoThap.moneyWin, res.actionGame.CaoThap.moneyLost, res.actionGame.CaoThap.moneyOther, res.actionGame.CaoThap.fee, res.actionGame.CaoThap.revenuePlayGame, res.actionGame.CaoThap.revenue);
                        $('#logaction').html(result1);
                    }
                    if(res.actionGame.BauCua != null) {
                        var stt = 4;
                        result1 += resultSearchTransction(stt, "Bầu Cua", res.actionGame.BauCua.moneyWin, res.actionGame.BauCua.moneyLost, res.actionGame.BauCua.moneyOther, res.actionGame.BauCua.fee, res.actionGame.BauCua.revenuePlayGame, res.actionGame.BauCua.revenue);
                        $('#logaction').html(result1);
                    }
                    if(res.actionGame.PokeGo != null) {
                        var stt = 5;
                        result1 += resultSearchTransction(stt, "PokeGo", res.actionGame.PokeGo.moneyWin, res.actionGame.PokeGo.moneyLost, res.actionGame.PokeGo.moneyOther, res.actionGame.PokeGo.fee, res.actionGame.PokeGo.revenuePlayGame, res.actionGame.PokeGo.revenue);
                        $('#logaction').html(result1);
                    }
                    if(res.actionGame.KhoBau != null) {
                        var stt = 6;
                        result1 += resultSearchTransction(stt, "Kho Báu", res.actionGame.KhoBau.moneyWin, res.actionGame.KhoBau.moneyLost, res.actionGame.KhoBau.moneyOther, res.actionGame.KhoBau.fee, res.actionGame.KhoBau.revenuePlayGame, res.actionGame.KhoBau.revenue);
                        $('#logaction').html(result1);
                    }
                    if(res.actionGame.SieuAnhHung != null) {
                        var stt = 7;
                        result1 += resultSearchTransction(stt, "Sieu Anh Hùng", res.actionGame.SieuAnhHung.moneyWin, res.actionGame.SieuAnhHung.moneyLost, res.actionGame.SieuAnhHung.moneyOther, res.actionGame.SieuAnhHung.fee, res.actionGame.SieuAnhHung.revenuePlayGame, res.actionGame.SieuAnhHung.revenue);
                        $('#logaction').html(result1);
                    }
                    if(res.actionGame.MyNhanNgu != null) {
                        var stt = 8;
                        result1 += resultSearchTransction(stt, "Mỹ Nhân Ngư", res.actionGame.MyNhanNgu.moneyWin, res.actionGame.MyNhanNgu.moneyLost, res.actionGame.MyNhanNgu.moneyOther, res.actionGame.MyNhanNgu.fee, res.actionGame.MyNhanNgu.revenuePlayGame, res.actionGame.MyNhanNgu.revenue);
                        $('#logaction').html(result1);
                    }
                    if(res.actionGame.NuDiepVien != null) {
                        var stt = 9;
                        result1 += resultSearchTransction(stt, "Nữ Điệp Viên", res.actionGame.NuDiepVien.moneyWin, res.actionGame.NuDiepVien.moneyLost, res.actionGame.NuDiepVien.moneyOther, res.actionGame.NuDiepVien.fee, res.actionGame.NuDiepVien.revenuePlayGame, res.actionGame.NuDiepVien.revenue);
                        $('#logaction').html(result1);
                    }
                    var total1=0;
                    var total2=0;
                    var total3=0;
                    var total4=0;
                    var total5=0;
                    var total6=0;

                    $(".moneywinuser" ).each(function( index ) {
                        total1 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneywin").text(commaSeparateNumber(total1));

                    });
                    $(".moneylostuser" ).each(function( index ) {
                        total2 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneylost").text(commaSeparateNumber(total2));
                    });
                    $(".moneyotheruser" ).each(function( index ) {
                        total3 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyother").text(commaSeparateNumber(total3));
                    });
                    $(".feeuser" ).each(function( index ) {
                        total4 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyfee").text(commaSeparateNumber(total4));

                    });
                    $(".moneytotaluser" ).each(function( index ) {
                        total5 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyplay").text(commaSeparateNumber(total5));
                    });
                    $(".revenueuser " ).each(function( index ) {
                        total6 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoney").text(commaSeparateNumber(total6));
                    });
                    if(res.actionGame.Sam != null) {
                        var stt = 1;
                        result11 += resultSearchTransctionbai(stt, "Sâm", res.actionGame.Sam.moneyWin, res.actionGame.Sam.moneyLost, res.actionGame.Sam.moneyOther, res.actionGame.Sam.fee, res.actionGame.Sam.revenuePlayGame, res.actionGame.Sam.revenue);
                        $('#logactiongamebai').html(result11);
                    }
                    if(res.actionGame.BaCay != null) {
                        var stt = 2;
                        result11 += resultSearchTransctionbai(stt, "Ba Cây", res.actionGame.BaCay.moneyWin, res.actionGame.BaCay.moneyLost, res.actionGame.BaCay.moneyOther, res.actionGame.BaCay.fee, res.actionGame.BaCay.revenuePlayGame, res.actionGame.BaCay.revenue);
                        $('#logactiongamebai').html(result11);
                    }
                    if(res.actionGame.Binh != null) {
                        var stt =3;
                        result11 += resultSearchTransctionbai(stt, "Binh", res.actionGame.Binh.moneyWin, res.actionGame.Binh.moneyLost, res.actionGame.Binh.moneyOther, res.actionGame.Binh.fee, res.actionGame.Binh.revenuePlayGame, res.actionGame.Binh.revenue);
                        $('#logactiongamebai').html(result11);
                    }
                    if(res.actionGame.Tlmn != null) {
                        var stt = 4;
                        result11 += resultSearchTransctionbai(stt, "Tiến Lên Miền Nam", res.actionGame.Tlmn.moneyWin, res.actionGame.Tlmn.moneyLost, res.actionGame.Tlmn.moneyOther, res.actionGame.Tlmn.fee, res.actionGame.Tlmn.revenuePlayGame, res.actionGame.Tlmn.revenue);
                        $('#logactiongamebai').html(result11);
                    }
                    if(res.actionGame.TaLa != null) {
                        var stt = 5;
                        result11 += resultSearchTransctionbai(stt, "Tá Lả", res.actionGame.TaLa.moneyWin, res.actionGame.TaLa.moneyLost, res.actionGame.TaLa.moneyOther, res.actionGame.TaLa.fee, res.actionGame.TaLa.revenuePlayGame, res.actionGame.TaLa.revenue);
                        $('#logactiongamebai').html(result11);
                    }
                    if(res.actionGame.Lieng != null) {
                        var stt = 6;
                        result11 += resultSearchTransctionbai(stt, "Liêng", res.actionGame.Lieng.moneyWin, res.actionGame.Lieng.moneyLost, res.actionGame.Lieng.moneyOther, res.actionGame.Lieng.fee, res.actionGame.Lieng.revenuePlayGame, res.actionGame.Lieng.revenue);
                        $('#logactiongamebai').html(result11);
                    }
                    if(res.actionGame.XiTo != null) {
                        var stt = 7;
                        result11 += resultSearchTransctionbai(stt, "Xì Tố", res.actionGame.XiTo.moneyWin, res.actionGame.XiTo.moneyLost, res.actionGame.XiTo.moneyOther, res.actionGame.XiTo.fee, res.actionGame.XiTo.revenuePlayGame, res.actionGame.XiTo.revenue);
                        $('#logactiongamebai').html(result11);
                    }
                    if(res.actionGame.BaiCao != null) {
                        var stt = 8;
                        result11 += resultSearchTransctionbai(stt, "Bài Cào", res.actionGame.BaiCao.moneyWin, res.actionGame.BaiCao.moneyLost, res.actionGame.BaiCao.moneyOther, res.actionGame.BaiCao.fee, res.actionGame.BaiCao.revenuePlayGame, res.actionGame.BaiCao.revenue);
                        $('#logactiongamebai').html(result11);
                    }
                    if(res.actionGame.Poker != null) {
                        var stt = 9;
                        result11 += resultSearchTransctionbai(stt, "Poker", res.actionGame.Poker.moneyWin, res.actionGame.Poker.moneyLost, res.actionGame.Poker.moneyOther, res.actionGame.Poker.fee, res.actionGame.Poker.revenuePlayGame, res.actionGame.Poker.revenue);
                        $('#logactiongamebai').html(result11);
                    }
					  if(res.actionGame.Caro != null) {
                        var stt = 10;
                        result11 += resultSearchTransctionbai(stt, "Caro", res.actionGame.Caro.moneyWin, res.actionGame.Caro.moneyLost, res.actionGame.Caro.moneyOther, res.actionGame.Caro.fee, res.actionGame.Caro.revenuePlayGame, res.actionGame.Caro.revenue);
                        $('#logactiongamebai').html(result11);
                    }
                    var total7=0;
                    var total8=0;
                    var total9=0;
                    var total10=0;
                    var total11=0;
                    var total12=0;
                    $(".moneywinuserbai" ).each(function( index ) {
                        total7 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneywinbai").text(commaSeparateNumber(total7));

                    });
                    $(".moneylostuserbai" ).each(function( index ) {
                        total8 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneylostbai").text(commaSeparateNumber(total8));
                    });
                    $(".moneyotheruserbai" ).each(function( index ) {
                        total9 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyotherbai").text(commaSeparateNumber(total9));
                    });
                    $(".feeuserbai" ).each(function( index ) {
                        total10 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyfeebai").text(commaSeparateNumber(total10));

                    });
                    $(".moneytotaluserbai" ).each(function( index ) {
                        total11 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyplaybai").text(commaSeparateNumber(total11));
                    });
                    $(".revenueuserbai" ).each(function( index ) {
                        total12 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneybai").text(commaSeparateNumber(total12));
                    });
                    $("#spanevent").text(commaSeparateNumber(total3 + total9));
                    $("#spanphe").text(commaSeparateNumber(total4 + total10));
                    $("#spanmoneygame").text(commaSeparateNumber(total5 + total11));
                    $("#spanmoney").text(commaSeparateNumber(total6 + total12));
                }




                if (res.actionGameBot == null || res.actionGameBot == "") {
                    $("#resultsearch").html("");
                } else {

                    if(res.actionGameBot.TaiXiu != null) {
                        var stt = 1;
                        result3 += resultSearchTransctionbot(stt, "Tài Xỉu", res.actionGameBot.TaiXiu.moneyWin, res.actionGameBot.TaiXiu.moneyLost, res.actionGameBot.TaiXiu.moneyOther, res.actionGameBot.TaiXiu.fee, res.actionGameBot.TaiXiu.revenuePlayGame, res.actionGameBot.TaiXiu.revenue);
                        $('#logactionbot').html(result3);
                    }
                    if(res.actionGameBot.MiniPoker != null) {
                        var stt = 2;
                        result3 += resultSearchTransctionbot(stt, "MiniPoker", res.actionGameBot.MiniPoker.moneyWin, res.actionGameBot.MiniPoker.moneyLost, res.actionGameBot.MiniPoker.moneyOther, res.actionGameBot.MiniPoker.fee, res.actionGameBot.MiniPoker.revenuePlayGame, res.actionGameBot.MiniPoker.revenue);
                        $('#logactionbot').html(result3);
                    }
                    if(res.actionGameBot.CaoThap != null) {
                        var stt = 3;
                        result3 += resultSearchTransctionbot(stt, "Cao Thấp", res.actionGameBot.CaoThap.moneyWin, res.actionGameBot.CaoThap.moneyLost, res.actionGameBot.CaoThap.moneyOther, res.actionGameBot.CaoThap.fee, res.actionGameBot.CaoThap.revenuePlayGame, res.actionGameBot.CaoThap.revenue);
                        $('#logactionbot').html(result3);
                    }
                    if(res.actionGameBot.BauCua != null) {
                        var stt = 4;
                        result3 += resultSearchTransctionbot(stt, "Bầu Cua", res.actionGameBot.BauCua.moneyWin, res.actionGameBot.BauCua.moneyLost, res.actionGameBot.BauCua.moneyOther, res.actionGameBot.BauCua.fee, res.actionGameBot.BauCua.revenuePlayGame, res.actionGameBot.BauCua.revenue);
                        $('#logactionbot').html(result3);
                    }
                    if(res.actionGameBot.PokeGo != null) {
                        var stt = 5;
                        result3 += resultSearchTransctionbot(stt, "PokeGo", res.actionGameBot.PokeGo.moneyWin, res.actionGameBot.PokeGo.moneyLost, res.actionGameBot.PokeGo.moneyOther, res.actionGameBot.PokeGo.fee, res.actionGameBot.PokeGo.revenuePlayGame, res.actionGameBot.PokeGo.revenue);
                        $('#logactionbot').html(result3);
                    }
                    if(res.actionGameBot.KhoBau != null) {
                        var stt = 6;
                        result3 += resultSearchTransctionbot(stt, "Kho Báu", res.actionGameBot.KhoBau.moneyWin, res.actionGameBot.KhoBau.moneyLost, res.actionGameBot.KhoBau.moneyOther, res.actionGameBot.KhoBau.fee, res.actionGameBot.KhoBau.revenuePlayGame, res.actionGameBot.KhoBau.revenue);
                        $('#logactionbot').html(result3);
                    }
                    if(res.actionGameBot.SieuAnhHung != null) {
                        var stt = 7;
                        result3 += resultSearchTransctionbot(stt, "Sieu Anh Hùng", res.actionGameBot.SieuAnhHung.moneyWin, res.actionGameBot.SieuAnhHung.moneyLost, res.actionGameBot.SieuAnhHung.moneyOther, res.actionGameBot.SieuAnhHung.fee, res.actionGameBot.SieuAnhHung.revenuePlayGame, res.actionGameBot.SieuAnhHung.revenue);
                        $('#logactionbot').html(result3);
                    }
                    if(res.actionGameBot.MyNhanNgu != null) {
                        var stt = 8;
                        result3 += resultSearchTransctionbot(stt, "Mỹ Nhân Ngư", res.actionGameBot.MyNhanNgu.moneyWin, res.actionGameBot.MyNhanNgu.moneyLost, res.actionGameBot.MyNhanNgu.moneyOther, res.actionGameBot.MyNhanNgu.fee, res.actionGameBot.MyNhanNgu.revenuePlayGame, res.actionGameBot.MyNhanNgu.revenue);
                        $('#logactionbot').html(result3);
                    }
                    if(res.actionGameBot.NuDiepVien != null) {
                        var stt = 9;
                        result3 += resultSearchTransctionbot(stt, "Nũ Điệp Viên", res.actionGameBot.NuDiepVien.moneyWin, res.actionGameBot.NuDiepVien.moneyLost, res.actionGameBot.NuDiepVien.moneyOther, res.actionGameBot.NuDiepVien.fee, res.actionGameBot.NuDiepVien.revenuePlayGame, res.actionGameBot.NuDiepVien.revenue);
                        $('#logactionbot').html(result3);
                    }
                    var total1=0;
                    var total2=0;
                    var total3=0;
                    var total4=0;
                    var total5=0;
                    var total6=0;
                    $(".moneywinuserbot" ).each(function( index ) {
                        total1 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneywinbot").text(commaSeparateNumber(total1));

                    });
                    $(".moneylostuserbot" ).each(function( index ) {
                        total2 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneylostbot").text(commaSeparateNumber(total2));
                    });
                    $(".moneyotheruserbot" ).each(function( index ) {
                        total3 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyotherbot").text(commaSeparateNumber(total3));
                    });
                    $(".feeuserbot" ).each(function( index ) {
                        total4 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyfeebot").text(commaSeparateNumber(total4));

                    });
                    $(".moneytotaluserbot" ).each(function( index ) {
                        total5 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyplaybot").text(commaSeparateNumber(total5));
                    });
                    $(".revenueuserbot" ).each(function( index ) {
                        total6 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneybot").text(commaSeparateNumber(total6));
                    });
                    if(res.actionGameBot.Sam != null) {
                        var stt = 1;
                        result33 += resultSearchTransctionbotbai(stt, "Sâm", res.actionGameBot.Sam.moneyWin, res.actionGameBot.Sam.moneyLost, res.actionGameBot.Sam.moneyOther, res.actionGameBot.Sam.fee, res.actionGameBot.Sam.revenuePlayGame, res.actionGameBot.Sam.revenue);
                        $('#logactionbotgamebai').html(result33);
                    }
                    if(res.actionGameBot.BaCay != null) {
                        var stt = 2;
                        result33 += resultSearchTransctionbotbai(stt, "Ba Cây", res.actionGameBot.BaCay.moneyWin, res.actionGameBot.BaCay.moneyLost, res.actionGameBot.BaCay.moneyOther, res.actionGameBot.BaCay.fee, res.actionGameBot.BaCay.revenuePlayGame, res.actionGameBot.BaCay.revenue);
                        $('#logactionbotgamebai').html(result33);
                    }
                    if(res.actionGameBot.Binh != null) {
                        var stt = 3;
                        result33 += resultSearchTransctionbotbai(stt, "Binh", res.actionGameBot.Binh.moneyWin, res.actionGameBot.Binh.moneyLost, res.actionGameBot.Binh.moneyOther, res.actionGameBot.Binh.fee, res.actionGameBot.Binh.revenuePlayGame, res.actionGameBot.Binh.revenue);
                        $('#logactionbotgamebai').html(result33);
                    }
                    if(res.actionGameBot.Tlmn != null) {
                        var stt = 4;
                        result33 += resultSearchTransctionbotbai(stt, "Tiến Lên Miền Nam", res.actionGameBot.Tlmn.moneyWin, res.actionGameBot.Tlmn.moneyLost, res.actionGameBot.Tlmn.moneyOther, res.actionGameBot.Tlmn.fee, res.actionGameBot.Tlmn.revenuePlayGame, res.actionGameBot.Tlmn.revenue);
                        $('#logactionbotgamebai').html(result33);
                    }
                    if(res.actionGameBot.TaLa != null) {
                        var stt = 5;
                        result33 += resultSearchTransctionbotbai(stt, "Tá Lả", res.actionGameBot.TaLa.moneyWin, res.actionGameBot.TaLa.moneyLost, res.actionGameBot.TaLa.moneyOther, res.actionGameBot.TaLa.fee, res.actionGameBot.TaLa.revenuePlayGame, res.actionGameBot.TaLa.revenue);
                        $('#logactionbotgamebai').html(result33);
                    }
                    if(res.actionGameBot.Lieng != null) {
                        var stt = 6;
                        result33 += resultSearchTransctionbotbai(stt, "Liêng", res.actionGameBot.Lieng.moneyWin, res.actionGameBot.Lieng.moneyLost, res.actionGameBot.Lieng.moneyOther, res.actionGameBot.Lieng.fee, res.actionGameBot.Lieng.revenuePlayGame, res.actionGameBot.Lieng.revenue);
                        $('#logactionbotgamebai').html(result33);
                    }
                    if(res.actionGameBot.XiTo != null) {
                        var stt = 7;
                        result33 += resultSearchTransctionbotbai(stt, "Xì Tố", res.actionGameBot.XiTo.moneyWin, res.actionGameBot.XiTo.moneyLost, res.actionGameBot.XiTo.moneyOther, res.actionGameBot.XiTo.fee, res.actionGameBot.XiTo.revenuePlayGame, res.actionGameBot.XiTo.revenue);
                        $('#logactionbotgamebai').html(result33);
                    }
                    if(res.actionGameBot.BaiCao != null) {
                        var stt = 8;
                        result33 += resultSearchTransctionbotbai(stt, "Bài Cào", res.actionGameBot.BaiCao.moneyWin, res.actionGameBot.BaiCao.moneyLost, res.actionGameBot.BaiCao.moneyOther, res.actionGameBot.BaiCao.fee, res.actionGameBot.BaiCao.revenuePlayGame, res.actionGameBot.BaiCao.revenue);
                        $('#logactionbotgamebai').html(result33);
                    }
                    if(res.actionGameBot.Poker != null) {
                        var stt = 9;
                        result33 += resultSearchTransctionbotbai(stt, "Poker", res.actionGameBot.Poker.moneyWin, res.actionGameBot.Poker.moneyLost, res.actionGameBot.Poker.moneyOther, res.actionGameBot.Poker.fee, res.actionGameBot.Poker.revenuePlayGame, res.actionGameBot.Poker.revenue);
                        $('#logactionbotgamebai').html(result33);
                    }
					  if(res.actionGameBot.Caro != null) {
                        var stt = 10;
                        result33 += resultSearchTransctionbotbai(stt, "Caro", res.actionGameBot.Caro.moneyWin, res.actionGameBot.Caro.moneyLost, res.actionGameBot.Caro.moneyOther, res.actionGameBot.Caro.fee, res.actionGameBot.Caro.revenuePlayGame, res.actionGameBot.Caro.revenue);
                        $('#logactionbotgamebai').html(result33);
                    }

                    var total7=0;
                    var total8=0;
                    var total9=0;
                    var total10=0;
                    var total11=0;
                    var total12=0;
                    $(".moneywinuserbotbai" ).each(function( index ) {
                        total7 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneywinbotbai").text(commaSeparateNumber(total7));

                    });
                    $(".moneylostuserbotbai" ).each(function( index ) {
                        total8 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneylostbotbai").text(commaSeparateNumber(total8));
                    });
                    $(".moneyotheruserbotbai" ).each(function( index ) {
                        total9 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyotherbotbai").text(commaSeparateNumber(total9));
                    });
                    $(".feeuserbotbai" ).each(function( index ) {
                        total10 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyfeebotbai").text(commaSeparateNumber(total10));

                    });
                    $(".moneytotaluserbotbai" ).each(function( index ) {
                        total11 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneyplaybotbai").text(commaSeparateNumber(total11));
                    });
                    $(".revenueuserbotbai" ).each(function( index ) {
                        total12 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalmoneybotbai").text(commaSeparateNumber(total12));
                    });
                }
                if (res.actionGame.TransferMoney == "") {
                    $("#resultsearch").html("");
                } else {
                    result4 = resulttranfer(res.admin, res.bot);
                    $('#logtranfer').html(result4);
                }
//                if (res.revenue == "") {
//                    $("#resultsearch").html("");
//                } else {
//                    result5 = resulttotalus(res.revenue.moneyWin, res.revenue.moneyLost,res.revenue.moneyOther,res.revenue.fee,res.revenue.revenuePlayGame,res.revenue.revenue);
//                    $('#totallocation').html(result5);
//                }
                if (res.vinIn == null) {
                    $("#resultsearch").html("");
                } else {
                    var totalvinin = res.vinIn.rechargeIAP + res.vinIn.rechargeCard + res.vinIn.rechargeBank + res.vinIn.vqmm + res.vinIn.giftCode + res.vinIn.cashoutVippoint + res.vinIn.refundFee + res.vinIn.eventVP + res.vinIn.bonusTopDS + res.vinIn.rechargeSMS;
                    result6 = resulttotalvinin(res.vinIn.rechargeIAP,res.vinIn.rechargeCard, res.vinIn.rechargeBank, res.vinIn.vqmm, res.vinIn.giftCode,res.vinIn.cashoutVippoint,res.vinIn.refundFee,res.vinIn.eventVP,res.vinIn.bonusTopDS,res.vinIn.rechargeSMS,totalvinin);
                    $('#logvinin').html(result6);
                    var totalrecharge = Math.round(res.vinIn.rechargeIAP *(22/15)) + res.vinIn.rechargeCard + Math.round(res.vinIn.rechargeBank / 1.1) + res.vinIn.rechargeSMS * 2;
                    result10 = resulttotalrecharge(Math.round(res.vinIn.rechargeIAP * (22/15)),res.vinIn.rechargeCard, Math.round(res.vinIn.rechargeBank / 1.1) ,res.vinIn.rechargeSMS * 2,totalrecharge);
                    $('#logrecharge').html(result10);
                }
                if (res.vinOut == null) {
                    $("#resultsearch").html("");
                } else {
                        var totalvinout = res.vinOut.cashOutCard + res.vinOut.cashOutTopup + res.vinOut.vin2xu + res.vinOut.chargeSMS + res.vinOut.transferMoney + res.vinOut.gcAgent ;
                        result7 = resulttotalvinout(res.vinOut.cashOutCard, res.vinOut.cashOutTopup, res.vinOut.vin2xu, res.vinOut.chargeSMS,res.vinOut.transferMoney,res.vinOut.gcAgent,totalvinout);
                        $('#logvinout').html(result7);
                }
                if (res.initital == null) {
                    $("#resultsearch").html("");
                } else {
                    result8 = resulttotalinitital(res.initital.superAgent, res.initital.bot, res.initital.total);
                    $('#loginitital').html(result8);
                }
                if (res.current == null) {
                    $("#resultsearch").html("");
                } else {
                    result9 = resulttotalcurrent(res.current.moneyUser,res.current.moneySuperAgent,res.current.moneyAgent1,res.current.moneyAgent2, res.current.moneyBot,res.current.total);
                    $('#logcurrent').html(result9);
                }
                if (res.x == null) {
                    $("#resultsearch").html("");
                } else {
                    $('#transactionx').html(commaSeparateNumber(res.x));
                }

            }
        })
    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>