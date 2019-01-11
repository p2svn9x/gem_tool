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
<?php $this->load->view('admin/error')?>
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

        <div class="widget">
            <div class="title">
                <h6>Luồng tiền người chơi</h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('report/moneyuser') ?>" method="post">
                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 70px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="toDate" name="toDate"
                                           value="<?php echo $this->input->post('toDate') ?>"> <span
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
                                           value="<?php echo $this->input->post('fromDate') ?>"> <span
                                        class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                </div>
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Nick name:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name"></td>
                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 70px">
                            </td>
                            <td>
                                <input type="reset"
                                       onclick="window.location.href = '<?php echo admin_url('report/moneyuser') ?>'; "
                                       value="Reset" class="basic" style="margin-left: 20px">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
            <input type="hidden" value="<?php echo $admin_info->Status ?>" id="status">
            <div class="formRow">
                <h4>Tài khoản:<span id="typetaikhoan" style="color: #0000ff"></span>  Số dư vin:<span id="vinht" style="color: #0000ff"></span>  Két sắt: <span id="ketsat" style="color: #0000ff"></span> Tổng vin: <span id="totalvin" style="color: #0000ff"></span></h4>
            </div>

            <div class="formRow">
                <div class="row">
                    <h4 id="" style="color: #0000ff;margin-left: 20px">Minigame</h4>
                    <h4 id="resultsearch" style="color: red;text-align:center"></h4>
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
                                <td>Tiền sư kiện</td>
                                <td>Phế</td>
                                <td>Tiền thắng trong game</td>
                                <td>Tiền thắng tổng</td>
                            </tr>
                            </thead>
                            <tbody id="logaction">
                            </tbody>
                            <tbody><tr id="totalmar">
                                <td colspan="2">Tổng:</td>

                                <td class="rowDataSd" id="totalmoneywin" style="color: blue"></td>
                                <td class="rowDataSd" id="totalmoneylost" style="color:blue "></td>
                                <td class="rowDataSd" id="totalsk" style="color: blue"></td>
                                <td class="rowDataSd" id="totalfee" style="color: blue"></td>
                                <td class="rowDataSd" id="totalmoney" style="color:blue "></td>
                                <td class="rowDataSd" id="totalrevalue" style="color: blue"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="formRow">
                <div class="row">
                    <h4 id="" style="color: #0000ff;margin-left: 20px">Game bài</h4>
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
                                <td>Tiền sư kiện</td>
                                <td>Phế</td>
                                <td>Tiền thắng trong game</td>
                                <td>Tiền thắng tổng</td>
                            </tr>
                            </thead>
                            <tbody id="logactionbai">
                            </tbody>
                            <tbody><tr id="totalmar">
                                <td colspan="2">Tổng:</td>

                                <td class="rowDataSd" id="totalmoneywinbai" style="color: blue"></td>
                                <td class="rowDataSd" id="totalmoneylostbai" style="color:blue "></td>
                                <td class="rowDataSd" id="totalskbai" style="color: blue"></td>
                                <td class="rowDataSd" id="totalfeebai" style="color: blue"></td>
                                <td class="rowDataSd" id="totalmoneybai" style="color:blue "></td>
                                <td class="rowDataSd" id="totalrevaluebai" style="color: blue"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="formRow">
                <div class="row">
                    <h4 id="" style="color: blue;margin-left: 20px">Tiền khác</h4>
                    <h4 id="resultsearchother" style="color: red;text-align:center"></h4>
                </div>
            </div>
            <div class="formRow">
                <div class="row">
                    <div class="col-xs-12">
                        <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr style="height: 20px;">
                                <td>STT</td>
                                <td>Dịch vụ</td>
                                <td>Tiền</td>
                            </tr>
                            </thead>
                            <tbody id="logdichvu">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
    if($("#filter_iname").val()==""){
        alert('Bạn phải nhập nickname')
        return false;

    }
    var result1 = "";
    var result2 = "";
    var result3 = "";
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('report/moneyuserajax')?>",
        // url: "http://192.168.0.251:8082/api_backend",
        data: {
            nickname: $("#filter_iname").val(),
            toDate: $("#toDate").val(),
            fromDate : $("#fromDate").val()
        },

        dataType: 'json',
        success: function (res) {

            $("#spinner").hide();
            if(res.users.isBot == 0){
                $('#typetaikhoan').html("Thường");
            }else if(res.users.isBot == 1){
                $('#typetaikhoan').html("Bot");
            }
            $('#vinht').html(commaSeparateNumber(res.users.currentMoney));
            $('#ketsat').html(commaSeparateNumber(res.users.safeMoney));
            $('#totalvin').html(commaSeparateNumber(res.users.totalMoney));
            if ($.isEmptyObject(res.users.actionGame)) {
                $('#logaction').html("");
                $('#logactionbai').html("");
                $("#resultsearch").html("Không tìm thấy kết quả");
                $("#totalmoneywin").text("");
                $("#totalmoneylost").text("");
                $("#totalfee").text("");
                $("#totalmoney").text("");
                $("#totalrevalue").text("");
                $("#totalmoneywinbai").text("");
                $("#totalmoneylostbai").text("");
                $("#totalfeebai").text("");
                $("#totalmoneybai").text("");
                $("#totalrevaluebai").text("");
				  $("#totalskbai").html("");
                $("#totalsk").html("");
            } else  {

                var total=0;
                var total1=0;
                var total2=0;
                var total3=0;
                var total4=0;
                var total5=0;
                var total6=0;
                var total7 =0;
                var total8=0;
                var total9=0;
                var total10=0;
                var total11=0;
                $("#resultsearch").html("");
                if(res.users.actionGame.TaiXiu != null) {
                    var stt = 1;
                    result1 += resultSearchTransction(stt, "Tài Xỉu", res.users.actionGame.TaiXiu.moneyWin, res.users.actionGame.TaiXiu.moneyLost, res.users.actionGame.TaiXiu.moneyOther, res.users.actionGame.TaiXiu.fee, res.users.actionGame.TaiXiu.revenuePlayGame, res.users.actionGame.TaiXiu.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.TaiXiu.moneyWin;
                    total1 += res.users.actionGame.TaiXiu.moneyLost;
                    total2 += res.users.actionGame.TaiXiu.moneyOther;
                    total3 += res.users.actionGame.TaiXiu.fee;
                    total4 += res.users.actionGame.TaiXiu.revenuePlayGame;
                    total5 += res.users.actionGame.TaiXiu.revenue;
                }else{
                    result1 += "";
                    $('#logaction').html(result1);
                }
                if(res.users.actionGame.MiniPoker != null) {
                    var stt = 2;
                    result1 += resultSearchTransction(stt, "MiniPoker", res.users.actionGame.MiniPoker.moneyWin, res.users.actionGame.MiniPoker.moneyLost, res.users.actionGame.MiniPoker.moneyOther, res.users.actionGame.MiniPoker.fee, res.users.actionGame.MiniPoker.revenuePlayGame, res.users.actionGame.MiniPoker.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.MiniPoker.moneyWin;
                    total1 += res.users.actionGame.MiniPoker.moneyLost;
                    total2 += res.users.actionGame.MiniPoker.moneyOther;
                    total3 += res.users.actionGame.MiniPoker.fee;
                    total4 += res.users.actionGame.MiniPoker.revenuePlayGame;
                    total5 += res.users.actionGame.MiniPoker.revenue;
                }
                else{
                    result1 += "";
                    $('#logaction').html(result1);
                }
                if(res.users.actionGame.CaoThap != null) {
                    var stt = 3;
                    result1 += resultSearchTransction(stt, "Cao Thấp", res.users.actionGame.CaoThap.moneyWin, res.users.actionGame.CaoThap.moneyLost, res.users.actionGame.CaoThap.moneyOther, res.users.actionGame.CaoThap.fee, res.users.actionGame.CaoThap.revenuePlayGame, res.users.actionGame.CaoThap.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.CaoThap.moneyWin;
                    total1 += res.users.actionGame.CaoThap.moneyLost;
                    total2 += res.users.actionGame.CaoThap.moneyOther;
                    total3 += res.users.actionGame.CaoThap.fee;
                    total4 += res.users.actionGame.CaoThap.revenuePlayGame;
                    total5 += res.users.actionGame.CaoThap.revenue;
                }

                else{
                    result1 += "";
                    $('#logaction').html(result1);
                }
                if(res.users.actionGame.BauCua != null) {
                    var stt = 4;
                    result1 += resultSearchTransction(stt, "Bầu Cua", res.users.actionGame.BauCua.moneyWin, res.users.actionGame.BauCua.moneyLost, res.users.actionGame.BauCua.moneyOther, res.users.actionGame.BauCua.fee, res.users.actionGame.BauCua.revenuePlayGame, res.users.actionGame.BauCua.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.BauCua.moneyWin;
                    total1 += res.users.actionGame.BauCua.moneyLost;
                    total2 += res.users.actionGame.BauCua.moneyOther;
                    total3 += res.users.actionGame.BauCua.fee;
                    total4 += res.users.actionGame.BauCua.revenuePlayGame;
                    total5 += res.users.actionGame.BauCua.revenue;
                }
                else{
                    result1 += "";
                    $('#logaction').html(result1);
                }
                if(res.users.actionGame.PokeGo != null) {
                    var stt = 5;
                    result1 += resultSearchTransction(stt, "PokeGo", res.users.actionGame.PokeGo.moneyWin, res.users.actionGame.PokeGo.moneyLost, res.users.actionGame.PokeGo.moneyOther, res.users.actionGame.PokeGo.fee, res.users.actionGame.PokeGo.revenuePlayGame, res.users.actionGame.PokeGo.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.PokeGo.moneyWin;
                    total1 += res.users.actionGame.PokeGo.moneyLost;
                    total2 += res.users.actionGame.PokeGo.moneyOther;
                    total3 += res.users.actionGame.PokeGo.fee;
                    total4 += res.users.actionGame.PokeGo.revenuePlayGame;
                    total5 += res.users.actionGame.PokeGo.revenue;
                }
                else{
                    result1 += "";
                    $('#logaction').html(result1);
                }
                if(res.users.actionGame.KhoBau != null) {
                    var stt = 6;
                    result1 += resultSearchTransction(stt, "Kho Báu", res.users.actionGame.KhoBau.moneyWin, res.users.actionGame.KhoBau.moneyLost, res.users.actionGame.KhoBau.moneyOther, res.users.actionGame.KhoBau.fee, res.users.actionGame.KhoBau.revenuePlayGame, res.users.actionGame.KhoBau.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.KhoBau.moneyWin;
                    total1 += res.users.actionGame.KhoBau.moneyLost;
                    total2 += res.users.actionGame.KhoBau.moneyOther;
                    total3 += res.users.actionGame.KhoBau.fee;
                    total4 += res.users.actionGame.KhoBau.revenuePlayGame;
                    total5 += res.users.actionGame.KhoBau.revenue;
                }
                else{
                    result1 += "";
                    $('#logaction').html(result1);
                }
                if(res.users.actionGame.SieuAnhHung != null) {
                    var stt = 7;
                    result1 += resultSearchTransction(stt, "Sieu Anh Hùng", res.users.actionGame.SieuAnhHung.moneyWin, res.users.actionGame.SieuAnhHung.moneyLost, res.users.actionGame.SieuAnhHung.moneyOther, res.users.actionGame.SieuAnhHung.fee, res.users.actionGame.SieuAnhHung.revenuePlayGame, res.users.actionGame.SieuAnhHung.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.SieuAnhHung.moneyWin;
                    total1 += res.users.actionGame.SieuAnhHung.moneyLost;
                    total2 += res.users.actionGame.SieuAnhHung.moneyOther;
                    total3 += res.users.actionGame.SieuAnhHung.fee;
                    total4 += res.users.actionGame.SieuAnhHung.revenuePlayGame;
                    total5 += res.users.actionGame.SieuAnhHung.revenue;
                }
                else{
                    result1 += "";
                    $('#logaction').html(result1);
                }
                if(res.users.actionGame.MyNhanNgu != null) {
                    var stt = 8;
                    result1 += resultSearchTransction(stt, "Mỹ Nhân Ngư", res.users.actionGame.MyNhanNgu.moneyWin, res.users.actionGame.MyNhanNgu.moneyLost, res.users.actionGame.MyNhanNgu.moneyOther, res.users.actionGame.MyNhanNgu.fee, res.users.actionGame.MyNhanNgu.revenuePlayGame, res.users.actionGame.MyNhanNgu.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.MyNhanNgu.moneyWin;
                    total1 += res.users.actionGame.MyNhanNgu.moneyLost;
                    total2 += res.users.actionGame.MyNhanNgu.moneyOther;
                    total3 += res.users.actionGame.MyNhanNgu.fee;
                    total4 += res.users.actionGame.MyNhanNgu.revenuePlayGame;
                    total5 += res.users.actionGame.MyNhanNgu.revenue;
                }
                else{
                    result1 += "";
                    $('#logaction').html(result1);
                }
                if(res.users.actionGame.NuDiepVien != null) {
                    var stt = 9;
                    result1 += resultSearchTransction(stt, "Nữ Điệp Viên", res.users.actionGame.NuDiepVien.moneyWin, res.users.actionGame.NuDiepVien.moneyLost, res.users.actionGame.NuDiepVien.moneyOther, res.users.actionGame.NuDiepVien.fee, res.users.actionGame.NuDiepVien.revenuePlayGame, res.users.actionGame.NuDiepVien.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.NuDiepVien.moneyWin;
                    total1 += res.users.actionGame.NuDiepVien.moneyLost;
                    total2 += res.users.actionGame.NuDiepVien.moneyOther;
                    total3 += res.users.actionGame.NuDiepVien.fee;
                    total4 += res.users.actionGame.NuDiepVien.revenuePlayGame;
                    total5 += res.users.actionGame.NuDiepVien.revenue;
                }
                else{
                    result1 += "";
                    $('#logaction').html(result1);
                }
				 if(res.users.actionGame.VuongQuocVin != null) {
                    var stt = 10;
                    result1 += resultSearchTransction(stt, "Vương Quốc Vin", res.users.actionGame.VuongQuocVin.moneyWin, res.users.actionGame.VuongQuocVin.moneyLost, res.users.actionGame.VuongQuocVin.moneyOther, res.users.actionGame.VuongQuocVin.fee, res.users.actionGame.VuongQuocVin.revenuePlayGame, res.users.actionGame.VuongQuocVin.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.VuongQuocVin.moneyWin;
                    total1 += res.users.actionGame.VuongQuocVin.moneyLost;
                    total2 += res.users.actionGame.VuongQuocVin.moneyOther;
                    total3 += res.users.actionGame.VuongQuocVin.fee;
                    total4 += res.users.actionGame.VuongQuocVin.revenuePlayGame;
                    total5 += res.users.actionGame.VuongQuocVin.revenue;
                }
                else{
                    result1 += "";
                    $('#logaction').html(result1);
                }

                if(res.users.actionGame.DeCheLaMa != null) {
                    var stt = 10;
                    result1 += resultSearchTransction(stt, "Đế Chế La Mã", res.users.actionGame.DeCheLaMa.moneyWin, res.users.actionGame.DeCheLaMa.moneyLost, res.users.actionGame.DeCheLaMa.moneyOther, res.users.actionGame.DeCheLaMa.fee, res.users.actionGame.DeCheLaMa.revenuePlayGame, res.users.actionGame.DeCheLaMa.revenue);
                    $('#logaction').html(result1);
                    total += res.users.actionGame.DeCheLaMa.moneyWin;
                    total1 += res.users.actionGame.DeCheLaMa.moneyLost;
                    total2 += res.users.actionGame.DeCheLaMa.moneyOther;
                    total3 += res.users.actionGame.DeCheLaMa.fee;
                    total4 += res.users.actionGame.DeCheLaMa.revenuePlayGame;
                    total5 += res.users.actionGame.DeCheLaMa.revenue;
                }
                else{
                    result1 += "";
                    $('#logaction').html(result1);
                }
				
                if(res.users.actionGame.Sam != null) {
                    var stt = 1;
                    result2 += resultSearchTransctionbai(stt, "Sâm", res.users.actionGame.Sam.moneyWin, res.users.actionGame.Sam.moneyLost, res.users.actionGame.Sam.moneyOther, res.users.actionGame.Sam.fee, res.users.actionGame.Sam.revenuePlayGame, res.users.actionGame.Sam.revenue);
                    $('#logactionbai').html(result2);

                    total6 += res.users.actionGame.Sam.moneyWin;
                    total7 += res.users.actionGame.Sam.moneyLost;
                    total8 += res.users.actionGame.Sam.moneyOther;
                    total9 += res.users.actionGame.Sam.fee;
                    total10 += res.users.actionGame.Sam.revenuePlayGame;
                    total11 += res.users.actionGame.Sam.revenue;
                }else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
                if(res.users.actionGame.BaCay != null) {
                    var stt = 2;
                    result2 += resultSearchTransctionbai(stt, "Ba Cây", res.users.actionGame.BaCay.moneyWin, res.users.actionGame.BaCay.moneyLost, res.users.actionGame.BaCay.moneyOther, res.users.actionGame.BaCay.fee, res.users.actionGame.BaCay.revenuePlayGame, res.users.actionGame.BaCay.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.BaCay.moneyWin;
                    total7 += res.users.actionGame.BaCay.moneyLost;
                    total8 += res.users.actionGame.BaCay.moneyOther;
                    total9 += res.users.actionGame.BaCay.fee;
                    total10 += res.users.actionGame.BaCay.revenuePlayGame;
                    total11 += res.users.actionGame.BaCay.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
                if(res.users.actionGame.Binh != null) {
                    var stt = 3;
                    result2 += resultSearchTransctionbai(stt, "Binh", res.users.actionGame.Binh.moneyWin, res.users.actionGame.Binh.moneyLost, res.users.actionGame.Binh.moneyOther, res.users.actionGame.Binh.fee, res.users.actionGame.Binh.revenuePlayGame, res.users.actionGame.Binh.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.Binh.moneyWin;
                    total7 += res.users.actionGame.Binh.moneyLost;
                    total8 += res.users.actionGame.Binh.moneyOther;
                    total9 += res.users.actionGame.Binh.fee;
                    total10 += res.users.actionGame.Binh.revenuePlayGame;
                    total11 += res.users.actionGame.Binh.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
                if(res.users.actionGame.Tlmn != null) {
                    var stt = 4;
                    result2 += resultSearchTransctionbai(stt, "Tiến Lên Miền Nam", res.users.actionGame.Tlmn.moneyWin, res.users.actionGame.Tlmn.moneyLost, res.users.actionGame.Tlmn.moneyOther, res.users.actionGame.Tlmn.fee, res.users.actionGame.Tlmn.revenuePlayGame, res.users.actionGame.Tlmn.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.Tlmn.moneyWin;
                    total7 += res.users.actionGame.Tlmn.moneyLost;
                    total8 += res.users.actionGame.Tlmn.moneyOther;
                    total9 += res.users.actionGame.Tlmn.fee;
                    total10 += res.users.actionGame.Tlmn.revenuePlayGame;
                    total11 += res.users.actionGame.Tlmn.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
                if(res.users.actionGame.TaLa != null) {
                    var stt = 5;
                    result2 += resultSearchTransctionbai(stt, "Tá Lả", res.users.actionGame.TaLa.moneyWin, res.users.actionGame.TaLa.moneyLost, res.users.actionGame.TaLa.moneyOther, res.users.actionGame.TaLa.fee, res.users.actionGame.TaLa.revenuePlayGame, res.users.actionGame.TaLa.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.TaLa.moneyWin;
                    total7 += res.users.actionGame.TaLa.moneyLost;
                    total8 += res.users.actionGame.TaLa.moneyOther;
                    total9 += res.users.actionGame.TaLa.fee;
                    total10 += res.users.actionGame.TaLa.revenuePlayGame;
                    total11 += res.users.actionGame.TaLa.revenue;
                }
                else{
                    $('#logactionbai').html("");
                }
                if(res.users.actionGame.Lieng != null) {
                    var stt = 6;
                    result2 += resultSearchTransctionbai(stt, "Liêng", res.users.actionGame.Lieng.moneyWin, res.users.actionGame.Lieng.moneyLost, res.users.actionGame.Lieng.moneyOther, res.users.actionGame.Lieng.fee, res.users.actionGame.Lieng.revenuePlayGame, res.users.actionGame.Lieng.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.Lieng.moneyWin;
                    total7 += res.users.actionGame.Lieng.moneyLost;
                    total8 += res.users.actionGame.Lieng.moneyOther;
                    total9 += res.users.actionGame.Lieng.fee;
                    total10 += res.users.actionGame.Lieng.revenuePlayGame;
                    total11 += res.users.actionGame.Lieng.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
                if(res.users.actionGame.XiTo != null) {
                    var stt = 7;
                    result2 += resultSearchTransctionbai(stt, "Xì Tố", res.users.actionGame.XiTo.moneyWin, res.users.actionGame.XiTo.moneyLost, res.users.actionGame.XiTo.moneyOther, res.users.actionGame.XiTo.fee, res.users.actionGame.XiTo.revenuePlayGame, res.users.actionGame.XiTo.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.XiTo.moneyWin;
                    total7 += res.users.actionGame.XiTo.moneyLost;
                    total8 += res.users.actionGame.XiTo.moneyOther;
                    total9 += res.users.actionGame.XiTo.fee;
                    total10 += res.users.actionGame.XiTo.revenuePlayGame;
                    total11 += res.users.actionGame.XiTo.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
                if(res.users.actionGame.BaiCao != null) {
                    var stt = 8;
                    result2 += resultSearchTransctionbai(stt, "Bài Cào", res.users.actionGame.BaiCao.moneyWin, res.users.actionGame.BaiCao.moneyLost, res.users.actionGame.BaiCao.moneyOther, res.users.actionGame.BaiCao.fee, res.users.actionGame.BaiCao.revenuePlayGame, res.users.actionGame.BaiCao.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.BaiCao.moneyWin;
                    total7 += res.users.actionGame.BaiCao.moneyLost;
                    total8 += res.users.actionGame.BaiCao.moneyOther;
                    total9 += res.users.actionGame.BaiCao.fee;
                    total10 += res.users.actionGame.BaiCao.revenuePlayGame;
                    total11 += res.users.actionGame.BaiCao.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
                if(res.users.actionGame.Poker != null) {
                    var stt = 9;
                    result2 += resultSearchTransctionbai(stt, "Poker", res.users.actionGame.Poker.moneyWin, res.users.actionGame.Poker.moneyLost, res.users.actionGame.Poker.moneyOther, res.users.actionGame.Poker.fee, res.users.actionGame.Poker.revenuePlayGame, res.users.actionGame.Poker.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.Poker.moneyWin;
                    total7 += res.users.actionGame.Poker.moneyLost;
                    total8 += res.users.actionGame.Poker.moneyOther;
                    total9 += res.users.actionGame.Poker.fee;
                    total10 += res.users.actionGame.Poker.revenuePlayGame;
                    total11 += res.users.actionGame.Poker.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
				
				if(res.users.actionGame.PokerTour != null) {
                    var stt = 13;
                    result2 += resultSearchTransctionbai(stt, "PokerTour", res.users.actionGame.PokerTour.moneyWin, res.users.actionGame.PokerTour.moneyLost, res.users.actionGame.PokerTour.moneyOther, res.users.actionGame.PokerTour.fee, res.users.actionGame.PokerTour.revenuePlayGame, res.users.actionGame.PokerTour.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.PokerTour.moneyWin;
                    total7 += res.users.actionGame.PokerTour.moneyLost;
                    total8 += res.users.actionGame.PokerTour.moneyOther;
                    total9 += res.users.actionGame.PokerTour.fee;
                    total10 += res.users.actionGame.PokerTour.revenuePlayGame;
                    total11 += res.users.actionGame.PokerTour.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
				if(res.users.actionGame.XiDzach != null) {
                    var stt = 10;
                    result2 += resultSearchTransctionbai(stt, "XiDzach", res.users.actionGame.XiDzach.moneyWin, res.users.actionGame.XiDzach.moneyLost, res.users.actionGame.XiDzach.moneyOther, res.users.actionGame.XiDzach.fee, res.users.actionGame.XiDzach.revenuePlayGame, res.users.actionGame.XiDzach.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.XiDzach.moneyWin;
                    total7 += res.users.actionGame.XiDzach.moneyLost;
                    total8 += res.users.actionGame.XiDzach.moneyOther;
                    total9 += res.users.actionGame.XiDzach.fee;
                    total10 += res.users.actionGame.XiDzach.revenuePlayGame;
                    total11 += res.users.actionGame.XiDzach.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
				
				 if(res.users.actionGame.XocDia != null) {
                    var stt = 14;
                    result2 += resultSearchTransctionbai(stt, "Xóc Đĩa", res.users.actionGame.XocDia.moneyWin, res.users.actionGame.XocDia.moneyLost, res.users.actionGame.XocDia.moneyOther, res.users.actionGame.XocDia.fee, res.users.actionGame.XocDia.revenuePlayGame, res.users.actionGame.XocDia.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.XocDia.moneyWin;
                    total7 += res.users.actionGame.XocDia.moneyLost;
                    total8 += res.users.actionGame.XocDia.moneyOther;
                    total9 += res.users.actionGame.XocDia.fee;
                    total10 += res.users.actionGame.XocDia.revenuePlayGame;
                    total11 += res.users.actionGame.XocDia.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
                if(res.users.actionGame.Caro != null) {
                    var stt = 11;
                    result2 += resultSearchTransctionbai(stt, "Caro", res.users.actionGame.Caro.moneyWin, res.users.actionGame.Caro.moneyLost, res.users.actionGame.Caro.moneyOther, res.users.actionGame.Caro.fee, res.users.actionGame.Caro.revenuePlayGame, res.users.actionGame.Caro.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.Caro.moneyWin;
                    total7 += res.users.actionGame.Caro.moneyLost;
                    total8 += res.users.actionGame.Caro.moneyOther;
                    total9 += res.users.actionGame.Caro.fee;
                    total10 += res.users.actionGame.Caro.revenuePlayGame;
                    total11 += res.users.actionGame.Caro.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
				if(res.users.actionGame.CoTuong != null) {
                    var stt = 12;
                    result2 += resultSearchTransctionbai(stt, "Cờ tướng", res.users.actionGame.CoTuong.moneyWin, res.users.actionGame.CoTuong.moneyLost, res.users.actionGame.CoTuong.moneyOther, res.users.actionGame.CoTuong.fee, res.users.actionGame.CoTuong.revenuePlayGame, res.users.actionGame.CoTuong.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.CoTuong.moneyWin;
                    total7 += res.users.actionGame.CoTuong.moneyLost;
                    total8 += res.users.actionGame.CoTuong.moneyOther;
                    total9 += res.users.actionGame.CoTuong.fee;
                    total10 += res.users.actionGame.CoTuong.revenuePlayGame;
                    total11 += res.users.actionGame.CoTuong.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
				if(res.users.actionGame.CoUp != null) {
                    var stt = 13;
                    result2 += resultSearchTransctionbai(stt, "Cờ Úp", res.users.actionGame.CoUp.moneyWin, res.users.actionGame.CoUp.moneyLost, res.users.actionGame.CoUp.moneyOther, res.users.actionGame.CoUp.fee, res.users.actionGame.CoUp.revenuePlayGame, res.users.actionGame.CoUp.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.CoUp.moneyWin;
                    total7 += res.users.actionGame.CoUp.moneyLost;
                    total8 += res.users.actionGame.CoUp.moneyOther;
                    total9 += res.users.actionGame.CoUp.fee;
                    total10 += res.users.actionGame.CoUp.revenuePlayGame;
                    total11 += res.users.actionGame.CoUp.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
				if(res.users.actionGame.HamCaMap != null) {
                    var stt = 15;
                    result2 += resultSearchTransctionbai(stt, "Hàm cá mập", res.users.actionGame.HamCaMap.moneyWin, res.users.actionGame.HamCaMap.moneyLost, res.users.actionGame.HamCaMap.moneyOther, res.users.actionGame.HamCaMap.fee, res.users.actionGame.HamCaMap.revenuePlayGame, res.users.actionGame.HamCaMap.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.HamCaMap.moneyWin;
                    total7 += res.users.actionGame.HamCaMap.moneyLost;
                    total8 += res.users.actionGame.HamCaMap.moneyOther;
                    total9 += res.users.actionGame.HamCaMap.fee;
                    total10 += res.users.actionGame.HamCaMap.revenuePlayGame;
                    total11 += res.users.actionGame.HamCaMap.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }
                if(res.users.actionGame.ThanBien != null) {
                    var stt = 16;
                    result2 += resultSearchTransctionbai(stt, "Thần Biển", res.users.actionGame.ThanBien.moneyWin, res.users.actionGame.ThanBien.moneyLost, res.users.actionGame.ThanBien.moneyOther, res.users.actionGame.ThanBien.fee, res.users.actionGame.ThanBien.revenuePlayGame, res.users.actionGame.ThanBien.revenue);
                    $('#logactionbai').html(result2);
                    total6 += res.users.actionGame.ThanBien.moneyWin;
                    total7 += res.users.actionGame.ThanBien.moneyLost;
                    total8 += res.users.actionGame.ThanBien.moneyOther;
                    total9 += res.users.actionGame.ThanBien.fee;
                    total10 += res.users.actionGame.ThanBien.revenuePlayGame;
                    total11 += res.users.actionGame.ThanBien.revenue;
                }
                else{
                    result2 += "";
                    $('#logactionbai').html(result2);
                }

                    $("#totalmoneywin").text(commaSeparateNumber(total));
                    $("#totalmoneylost").text(commaSeparateNumber(total1));
                    $("#totalsk").text(commaSeparateNumber(total2));
                    $("#totalfee").text(commaSeparateNumber(total3));
                    $("#totalmoney").text(commaSeparateNumber(total4));
                    $("#totalrevalue").text(commaSeparateNumber(total5));
                    $("#totalmoneywinbai").text(commaSeparateNumber(total6));
                    $("#totalmoneylostbai").text(commaSeparateNumber(total7));
                    $("#totalskbai").text(commaSeparateNumber(total8));
                    $("#totalfeebai").text(commaSeparateNumber(total9));
                    $("#totalmoneybai").text(commaSeparateNumber(total10));
                    $("#totalrevaluebai").text(commaSeparateNumber(total11));

            }


            if ($.isEmptyObject(res.users.actionOther)) {

                $("#resultsearchother").html("Không tìm thấy kết quả");
                $('#logdichvu').html("");
            }else  {
                $("#resultsearchother").html("");
                    if(res.users.actionOther.RechargeByCard != null) {
                    var stt = 1;
                    result3 += resultmoneyother(stt,"Nạp vin qua thẻ",res.users.actionOther.RechargeByCard);
                    $('#logdichvu').html(result3);
                }else{
                        result3 += "";
                        $('#logdichvu').html(result3);
                    }
                if(res.users.actionOther.RechargeByBank != null) {
                    var stt = 2;
                    result3 += resultmoneyother(stt,"Nạp vin qua ngân hàng",res.users.actionOther.RechargeByBank);
                    $('#logdichvu').html(result3);
                }else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.VQMM != null) {
                    var stt = 3;
                    result3 += resultmoneyother(stt,"Vòng quay may mắn",res.users.actionOther.VQMM);
                    $('#logdichvu').html(result3);
                }else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.GiftCode != null) {
                    var stt = 4;
                    result3 += resultmoneyother(stt,"Giftcode",res.users.actionOther.GiftCode);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }

                if(res.users.actionOther.CashoutByVP != null) {
                    var stt = 5;
                    result3 += resultmoneyother(stt,"Đổi thưởng vippoint",res.users.actionOther.CashoutByVP);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.RefundFee != null) {
                    var stt = 6;
                    result3 += resultmoneyother(stt,"Hoàn trả phí",res.users.actionOther.RefundFee);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.CashOutByCard != null) {
                    var stt = 7;
                    result3 += resultmoneyother(stt,"Mua mã thẻ",res.users.actionOther.CashOutByCard);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.CashOutByTopUp != null) {
                    var stt = 8;
                    result3 += resultmoneyother(stt,"Nạp tiền điện thoại",res.users.actionOther.CashOutByTopUp);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.NapXu != null) {
                    var stt = 9;
                    result3 += resultmoneyother(stt,"Nạp xu",res.users.actionOther.NapXu);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.ChargeSMS != null) {
                    var stt = 10;
                    result3 += resultmoneyother(stt,"Phí SMS đại lý",res.users.actionOther.ChargeSMS);
                    $('#logdichvu').html(result3);
                }else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.TransferMoney != null) {
                    var stt = 11;
                    result3 += resultmoneyother(stt,"Chuyển khoản",0-res.users.actionOther.TransferMoney);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.Admin != null) {
                    var stt = 12;
                    result3 += resultmoneyother(stt,"Cộng trừ tiền Admin",res.users.actionOther.Admin);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.Bot != null) {
                    var stt = 13;
                    result3 += resultmoneyother(stt,"Cộng trừ tiền Bot",res.users.actionOther.Bot);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.RechargeByIAP != null) {
                    var stt = 14;
                    result3 += resultmoneyother(stt,"Nạp vin qua IAP",res.users.actionOther.RechargeByIAP);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.EventVPBonus != null) {
                    var stt = 15;
                    result3 += resultmoneyother(stt,"Vippoint Event",res.users.actionOther.EventVPBonus);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.GcAgent != null) {
                    var stt = 16;
                    result3 += resultmoneyother(stt,"Giftcode đại lý",res.users.actionOther.GcAgent);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.BonusTopDS != null) {
                    var stt = 17;
                    result3 += resultmoneyother(stt,"Thưởng doanh số đại lý",res.users.actionOther.BonusTopDS);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.RechargeBySMS != null) {
                    var stt = 18;
                    result3 += resultmoneyother(stt,"Nạp tiền qua SMS",res.users.actionOther.RechargeBySMS);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.GiftCodeVH != null) {
                    var stt = 19;
                    result3 += resultmoneyother(stt,"Giftcode vận hành",res.users.actionOther.GiftCodeVH);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.GiftCodeMKT != null) {
                    var stt = 20;
                    result3 += resultmoneyother(stt,"Giftcode marketing",res.users.actionOther.GiftCodeMKT);
                    $('#logdichvu').html(result3);
                }
                else{
                    $('#logdichvu').html("");
                }
                if(res.users.actionOther.GcAgent != null) {
                    var stt = 22;
                    result3 += resultmoneyother(stt,"Giftcode agent",res.users.actionOther.GcAgent);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.EventVP != null) {
                    var stt = 23;
                    result3 += resultmoneyother(stt,"Trao thưởng Vippoint Event",res.users.actionOther.EventVP);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.VQVIP != null) {
                    var stt = 24;
                    result3 += resultmoneyother(stt,"Vòng quay vip",res.users.actionOther.VQVIP);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.KhoBauVqFree != null) {
                    var stt = 25;
                    result3 += resultmoneyother(stt,"Vòng quay kho báu free",res.users.actionOther.KhoBauVqFree);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.NuDiepVienVqFree != null) {
                    var stt = 26;
                    result3 += resultmoneyother(stt,"Vòng quay nữ điệp viên free",res.users.actionOther.NuDiepVienVqFree);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.SieuAnhHungVqFree != null) {
                    var stt = 27;
                    result3 += resultmoneyother(stt,"Vòng quay siêu anh hùng free",res.users.actionOther.SieuAnhHungVqFree);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
                if(res.users.actionOther.VuongQuocVinVqFree != null) {
                    var stt = 28;
                    result3 += resultmoneyother(stt,"Vòng quay vương quốc vin free",res.users.actionOther.VuongQuocVinVqFree);
                    $('#logdichvu').html(result3);
                }
                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
				
				 if(res.users.actionOther.RechargeByVinCard != null) {
                    var stt = 29;
                    result3 += resultmoneyother(stt,"Nạp vin qua Vincard",res.users.actionOther.RechargeByVinCard);
                    $('#logdichvu').html(result3);
                }

                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }

                if(res.users.actionOther.RechargeByMegaCard != null) {
                    var stt = 30;
                    result3 += resultmoneyother(stt,"Nạp vin qua Megacard",res.users.actionOther.RechargeByVinCard);
                    $('#logdichvu').html(result3);
                }

                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }

                if(res.users.actionOther.NhiemVu != null) {
                    var stt = 31;
                    result3 += resultmoneyother(stt,"Thưởng nhiệm vụ",res.users.actionOther.NhiemVu);
                    $('#logdichvu').html(result3);
                }

                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
				 if(res.users.actionOther.TopupVTCPay != null) {
                    var stt = 32;
                    result3 += resultmoneyother(stt,"Nạp từ VTC",res.users.actionOther.TopupVTCPay);
                    $('#logdichvu').html(result3);
                }

                else{
                    result3 += "";
                    $('#logdichvu').html(result3);
                }
            }

        }, error: function () {
            $("#spinner").hide();
            $("#error-popup").modal("show");
        }, timeout: 40000
    })
});
function resultSearchTransction(stt, gamename, moneywin, moneylost,moneyother, fee, moneytotal, revenue) {

    var rs = "";
    rs += "<tr>";
    rs += "<td >" + stt + "</td>";
    rs += "<td>" + gamename + "</td>";
    rs += "<td class='rowDataSd1'>" + commaSeparateNumber(moneywin) + "</td>";
    rs += "<td class='rowDataSd2'>" + commaSeparateNumber(moneylost) + "</td>";
    rs += "<td class='rowDataSd3'>" + commaSeparateNumber(moneyother) + "</td>";
    rs += "<td class='rowDataSd4'>" + commaSeparateNumber(fee) + "</td>";
    rs += "<td class='rowDataSd5'>" + commaSeparateNumber(moneytotal) + "</td>";
    rs += "<td class='rowDataSd6'>" + commaSeparateNumber(revenue) + "</td>";
    rs += "</tr>";
    return rs;
}
function resultSearchTransctionbai(stt, gamename, moneywin, moneylost,moneyother, fee, moneytotal, revenue) {

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
function resultmoneyother(stt, gamename, money) {

    var rs = "";
    rs += "<tr>";
    rs += "<td >" + stt + "</td>";
    rs += "<td>" + gamename + "</td>";
    rs += "<td>" + commaSeparateNumber(money) + "</td>";
    rs += "</tr>";
    return rs;
}
$(document).ready(function () {
    $("#toDate").val( moment().format('DD-MM-YYYY'));
    $("#fromDate").val( moment().format('DD-MM-YYYY'));
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