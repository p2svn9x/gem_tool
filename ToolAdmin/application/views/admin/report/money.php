<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
        </div>
        <div class="clear"></div>
    </div>
</div>
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
<?php $this->load->view('admin/error')?>
    <div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <form class="list_filter form" action="<?php echo admin_url('report/money') ?>" method="post">
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
                    <td style="">
                        <input type="button" id="exportexel" value="Xuất Exel" class="button blueB"
                               style="margin-left: 20px">
                    </td>

                </tr>
            </table>
        </div>
    </form>

    <div class="widget">
    <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
    <div id="widget">


    <div class="formRow">
    <div class="row">
    <div class="col-xs-12">
    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
    <tr>
        <td colspan="2"></td>
        <td style="color: #000000;font-size: 20px;text-align: right;font-weight: 600">VND</td>
        <td style="color: #000000;font-size: 20px;text-align: right;font-weight: 600">Vin</td>

    </tr>
    <tr>
        <td rowspan="28"
            style="vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px">
            Tiền vào game
        </td>
        <td colspan="3" style="color:#000000;font-size: 18px;font-weight: 600">User nạp</td>

    </tr>
    <tr class="moneysystem">
        <td>Nạp qua thẻ</td>
        <td class="tdmoney" id="money1"></td>
        <td class="tdmoney" id="money2"></td>

    </tr>
    <tr class="moneysystem">
        <td>Nạp qua ngân hàng</td>
        <td class="tdmoney" id="money3"></td>
        <td class="tdmoney" id="money4"></td>
    </tr>
    <tr class="moneysystem">
        <td>Nạp qua IAP</td>
        <td class="tdmoney" id="money5"></td>
        <td class="tdmoney" id="money6"></td>
    </tr>
    <tr class="moneysystem">
        <td>Nạp qua SMS</td>
        <td class="tdmoney" id="money7"></td>
        <td class="tdmoney" id="money8"></td>
    </tr>
    <tr class="moneysystem">
        <td>Nạp qua Vincard</td>
        <td class="tdmoney" id="money9"></td>
        <td class="tdmoney" id="money10"></td>
    </tr>
	 <tr class="moneysystem">
        <td>Nạp qua MegaCard</td>
        <td class="tdmoney" id="money999"></td>
        <td class="tdmoney" id="money100"></td>
    </tr>
	<tr class="moneysystem">
        <td>Nạp từ VTC</td>
        <td class="tdmoney" id="money77"></td>
        <td class="tdmoney" id="money88"></td>
    </tr>
    <tr class="moneysystem">
        <td style="color: #ba9406;font-size: 20px;font-weight:700">Tổng user nạp</td>
        <td style="color: #ba9406;font-size: 20px;font-weight:700;text-align: right" id="money11"></td>
        <td style="color: #ba9406;font-size: 20px;font-weight:700;text-align: right" id="money12"></td>
    </tr>
    <tr>
        <td colspan="3" style="color: #000000;font-size: 18px;font-weight: 600">Sự kiện + Quà tặng</td>
    </tr>
    <tr class="moneysystem">
        <td>Giftcode</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money13"></td>

    </tr>
    <tr class="moneysystem">
        <td>Giftcode vận hành</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money14"></td>

    </tr>

    <tr class="moneysystem">
        <td>Giftcode marketing</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money15"></td>

    </tr>
	<tr class="moneysystem">
        <td>Giftcode đại lý</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money151"></td>

    </tr>
    <tr class="moneysystem">
        <td>Vippoint event</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money16"></td>
    </tr>
	<tr class="moneysystem">
        <td>Thưởng nhiệm vụ</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money166"></td>
    </tr>
    <tr class="moneysystem">
        <td>Vòng quay may mắn</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money17"></td>
    </tr>
    <tr class="moneysystem">
        <td>Vòng quay vip</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money18"></td>
    </tr>
    <tr class="moneysystem">
        <td>Kho báu free</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money19"></td>
    </tr>
    <tr class="moneysystem">
        <td>Siêu anh hùng free</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money20"></td>
    </tr>

    <tr class="moneysystem">
        <td>Nữ điệp viên free</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money21"></td>
    </tr>
    <tr class="moneysystem">
        <td>Vương quốc vin free</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money22"></td>
    </tr>
    <tr class="moneysystem">
        <td>Đổi thưởng vippoint</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money23"></td>
    </tr>
    <tr class="moneysystem">
        <td>Hoàn trả phí đại lý</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money24"></td>
    </tr>
    <tr class="moneysystem">
        <td>Thưởng doanh số đại lý</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money25"></td>
    </tr>
    <tr class="moneysystem">
        <td>Trao thưởng vippoint event</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money26"></td>
    </tr>
    <tr>
        <td style="color: #ba9406;font-size: 20px;font-weight:700">Tổng sự kiện quà tặng</td>
        <td style="color: #ba9406;font-size: 20px;font-weight:700;text-align: right" id="money27"></td>
        <td style="color: #ba9406;font-size: 20px;font-weight:700;text-align: right" id="money28"></td>
    </tr>
    <tr>
        <td style="color:  #0000ff;font-size: 20px;font-weight:700">Tổng tiền vào</td>
        <td style="color: #0000ff;font-size: 20px;font-weight:700;text-align: right" ></td>
        <td style="color: #0000ff;font-size: 20px;font-weight:700;text-align: right" id="money29"></td>
    </tr>
    <tr>
        <td colspan="4" style="height: 50px"></td>
    </tr>
    <tr>
        <td rowspan="9"
            style="vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px">
            Tiền đổi thưởng
        </td>
        <td colspan="3" style="color: #000000;font-size: 18px;font-weight: 600">Tiền đổi thưởng</td>
    </tr>
    <tr class="moneysystem">
        <td>Đổi thẻ</td>
        <td class="tdmoney" id="money30"></td>
        <td class="tdmoney" id="money31"></td>
    </tr>
    <tr class="moneysystem">
        <td>Nạp điện thoại</td>
        <td class="tdmoney" id="money32"></td>
        <td class="tdmoney" id="money33"></td>
    </tr>
    <tr>
        <td style="color: #ba9406;font-size: 20px;font-weight:700">Tổng tiền ra</td>
        <td style="color: #ba9406;font-size: 20px;font-weight:700;text-align: right" id="money34"></td>
        <td style="color: #ba9406;font-size: 20px;font-weight:700;text-align: right" id="money35"></td>
    </tr>
    <tr>
        <td colspan="3" style="color: #000000;font-size: 18px;font-weight: 600">Đại lý</td>

    </tr>
    <tr class="moneysystem">
        <td>Tổng tiền đại lý đầu tháng</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money36">0</td>
    </tr>
    <tr class="moneysystem">
        <td>Tổng tiền đại lý cuối tháng</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money37">0</td>
    </tr>
    <tr>
        <td style="color: #ba9406;font-size: 20px;font-weight:700">Tiền lệch đại lý</td>
        <td style="color: #ba9406;font-size: 20px;font-weight:700;text-align: right" id="money38">0</td>
        <td style="color: #ba9406;font-size: 20px;font-weight:700;text-align: right" id="money39">0</td>
    </tr>
    <tr>
        <td style="color: #0000ff;font-size: 20px;font-weight:700">Tổng tiền đổi thưởng</td>
        <td style="color: #0000ff;font-size: 20px;font-weight:700;text-align: right" id="money40"></td>
        <td style="color: #0000ff;font-size: 20px;font-weight:700;text-align: right" id="money41"></td>
    </tr>
    <tr>
        <td colspan="4" style="height: 50px"></td>
    </tr>
    <tr>
        <td rowspan="9"
            style="vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px">
            Tiền hệ thống thu được
        </td>
        <td colspan="3" style="color:#000000;font-size: 18px;font-weight: 600">Tiền hệ thống thu</td>
    </tr>
    <tr class="moneysystem">
        <td>Minigame</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money42"></td>
    </tr>
    <tr class="moneysystem">
        <td>Game bài</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money43"></td>
    </tr>
    <tr class="moneysystem">
        <td>Phí chuyển khoản</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money44"></td>
    </tr>
    <tr class="moneysystem">
        <td>Phí sms đại lý</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money45"></td>
    </tr>
    <tr class="moneysystem">
        <td>Đổi xu</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money46"></td>
    </tr>
    <tr class="moneysystem">
        <td>Tiền Admin trừ</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money47"></td>
    </tr>
    <tr class="moneysystem">
        <td>Đại lý xuất giftcode</td>
        <td class="tdmoney"></td>
        <td class="tdmoney" id="money55"></td>
    </tr>
    <tr>
        <td style="color: blue;font-size: 20px;font-weight:700">Tổng</td>
        <td style="color:#0000ff;font-size: 20px;font-weight:700;text-align: right" id="money48"></td>
        <td style="color:#0000ff;font-size: 20px;font-weight:700;text-align: right" id="money49"></td>
    </tr>
    <tr>
        <td colspan="4" style="height: 50px"></td>
    </tr>
    <tr>
        <td rowspan="4"
            style="vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px">
            Tiền tồn trong user
        </td>
        <td colspan="3" style="color: #000000;font-size: 18px;font-weight: 600">Tiền trong user</td>
    </tr>
    <tr class="moneysystem">
        <td>Tổng tiền trong user đầu tháng</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money50"></td>
    </tr>
    <tr class="moneysystem">
        <td>Tổng tiền trong user cuối tháng</td>
        <td class="tdmoney" ></td>
        <td class="tdmoney" id="money51"></td>
    </tr>

    <tr>
        <td style="color: #0000ff;font-size: 20px;font-weight:700">Tiền lệch user</td>
        <td style="color: #0000ff;font-size: 20px;font-weight:700;text-align: right" id="money52"></td>
        <td style="color: #0000ff;font-size: 20px;font-weight:700;text-align: right" id="money53"></td>
    </tr>
    <tr>
        <td colspan="4" style="height: 50px"></td>
    </tr>
    <tr>
        <td></td>
        <td style="color: #0000ff;font-size: 20px;font-weight:700">Tỉ lệ đổi thưởng</td>
        <td colspan="2" style="color: blue;font-size: 20px;font-weight:700" id="money54">0</td>
    </tr>
    </table>
    </div>
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

    .moneysystem {
        font-weight: 500;
        font-size: 16px;
        color: #000000;
    }

    .tdmoney {
        text-align: right;
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
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.table2excel.js"></script>
<script>
$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'DD-MM-YYYY'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'DD-MM-YYYY'
    });

});


$(document).ready(function () {
    var total20 = 0;
    var total21 = 0;
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
            $("#resultsearch").html("");
            var total1 = 0;
            if ($.isEmptyObject(res.vinInUser)) {
                $("#money1").html(0);
                $("#money2").html(0);
                $("#money3").html(0);
                $("#money4").html(0);
                $("#money5").html(0);
                $("#money6").html(0);
                $("#money7").html(0);
                $("#money8").html(0);
                $("#money9").html(0);
                $("#money10").html(0);
				 $("#money999").html(0);
                $("#money100").html(0);
				  $("#money77").html(0);
                $("#money88").html(0);
            } else {
                if (res.vinInUser.RechargeByCard != null || res.vinInUser.RechargeByCard != null) {
                    $("#money1").html(commaSeparateNumber(Math.round(res.vinInUser.RechargeByCard/0.8)));
                    $("#money2").html(commaSeparateNumber(res.vinInUser.RechargeByCard));
                    total1 += Math.round(res.vinInUser.RechargeByCard/0.8);
                } else {
                    $("#money1").html(0);
                    $("#money2").html(0);
                }


                if (res.vinInUser.RechargeByBank != null || res.vinInUser.RechargeByBank != null) {
                    $("#money3").html(commaSeparateNumber(Math.round(res.vinInUser.RechargeByBank / 1.1)));
                    $("#money4").html(commaSeparateNumber(res.vinInUser.RechargeByBank));
                    total1 += Math.round(res.vinInUser.RechargeByBank / 1.1);
                } else {
                    $("#money3").html(0);
                    $("#money4").html(0);
                }
                if (res.vinInUser.RechargeByIAP != null || res.vinInUser.RechargeByIAP != null) {
                    $("#money5").html(commaSeparateNumber(Math.round(res.vinInUser.RechargeByIAP * 22000 / 15)));
                    $("#money6").html(commaSeparateNumber(res.vinInUser.RechargeByIAP));
                    total1 += Math.round(res.vinInUser.RechargeByIAP * 22000 / 15);
                } else {
                    $("#money5").html(0);
                    $("#money6").html(0);
                }
                if (res.vinInUser.RechargeBySMS != null || res.vinInUser.RechargeBySMS != null) {
                    $("#money7").html(commaSeparateNumber(Math.round(res.vinInUser.RechargeBySMS * 2)));
                    $("#money8").html(commaSeparateNumber(res.vinInUser.RechargeBySMS));
                    total1 += Math.round(res.vinInUser.RechargeBySMS * 2);
                } else {
                    $("#money7").html(0);
                    $("#money8").html(0);
                }
                if (res.vinInUser.RechargeByVinCard != null || res.vinInUser.RechargeByVinCard != null) {
                    $("#money9").html(commaSeparateNumber(Math.round(res.vinInUser.RechargeByVinCard / 1.05)));
                    $("#money10").html(commaSeparateNumber(res.vinInUser.RechargeByVinCard));
                    total1 += Math.round(res.vinInUser.RechargeByVinCard / 1.05)
                } else {
                    $("#money9").html(0);
                    $("#money10").html(0);
                }
				 if (res.vinInUser.RechargeByMegaCard != null || res.vinInUser.RechargeByMegaCard != null) {
                     $("#money999").html(commaSeparateNumber(res.vinInUser.RechargeByMegaCard/1.05));
                    $("#money100").html(commaSeparateNumber(res.vinInUser.RechargeByMegaCard));
                    total1 += res.vinInUser.RechargeByMegaCard / 1.05;
					
                } else {
                    $("#money999").html(0);
                    $("#money100").html(0);
                }
			
				 if (res.vinInUser.TopupVTCPay != null || res.vinInUser.TopupVTCPay != null) {
                    $("#money77").html(commaSeparateNumber(res.vinInUser.TopupVTCPay));
                    $("#money88").html(commaSeparateNumber(res.vinInUser.TopupVTCPay));
                    total1 += res.vinInUser.TopupVTCPay;
                } else {

                    $("#money77").html(0);
                    $("#money88").html(0);
                }
				
                $("#money12").html(commaSeparateNumber(res.totalInUser));
                $("#money11").html(commaSeparateNumber(total1));

            }

            if ($.isEmptyObject(res.vinInEvent)) {
                $("#money13").html(0);
                $("#money14").html(0);
                $("#money15").html(0);
				 $("#money151").html(0);
                $("#money16").html(0);
                $("#money17").html(0);
                $("#money18").html(0);
                $("#money19").html(0);
                $("#money20").html(0);
                $("#money21").html(0);
                $("#money22").html(0);
                $("#money23").html(0);
                $("#money24").html(0);
                $("#money25").html(0);
                $("#money26").html(0);
                $("#money27").html(0);
				 $("#money166").html(0);

            } else {
                if (res.vinInEvent.GiftCode != null || res.vinInEvent.GiftCode != null) {
                    $("#money13").html(commaSeparateNumber(res.vinInEvent.GiftCode));
                } else {
                    $("#money13").html(0);
                }
                if (res.vinInEvent.GiftCodeVH != null || res.vinInEvent.GiftCodeVH != null) {
                    $("#money14").html(commaSeparateNumber(res.vinInEvent.GiftCodeVH));

                } else {
                    $("#money14").html(0);
                }

                if (res.vinInEvent.GiftCodeMKT != null || res.vinInEvent.GiftCodeMKT != null) {
                    $("#money15").html(commaSeparateNumber(res.vinInEvent.GiftCodeMKT));
                } else {
                    $("#money15").html(0);
                }
				 if (res.vinInEvent.GcAgentImport != null || res.vinInEvent.GcAgentImport != null) {
                    $("#money151").html(commaSeparateNumber(res.vinInEvent.GcAgentImport));
                } else {
                    $("#money151").html(0);
                }
                if (res.vinInEvent.EventVPBonus != null || res.vinInEvent.EventVPBonus != null) {
                    $("#money16").html(commaSeparateNumber(res.vinInEvent.EventVPBonus));

                } else {
                    $("#money16").html(0);
                }
				 if (res.vinInEvent.NhiemVu != null || res.vinInEvent.NhiemVu != null) {
                    $("#money166").html(commaSeparateNumber(res.vinInEvent.NhiemVu));

                } else {
                    $("#money166").html(0);
                }
                if (res.vinInEvent.VQMM != null || res.vinInEvent.VQMM != null) {
                    $("#money17").html(commaSeparateNumber(res.vinInEvent.VQMM));

                } else {
                    $("#money17").html(0);
                }
                if (res.vinInEvent.VQVIP != null || res.vinInEvent.VQVIP != null) {
                    $("#money18").html(commaSeparateNumber(res.vinInEvent.VQVIP));

                } else {
                    $("#money18").html(0);
                }
                if (res.vinInEvent.KhoBauVqFree != null || res.vinInEvent.KhoBauVqFree != null) {
                    $("#money19").html(commaSeparateNumber(res.vinInEvent.KhoBauVqFree));
                } else {
                    $("#money19").html(0);
                }
                if (res.vinInEvent.SieuAnhHungVqFree != null || res.vinInEvent.SieuAnhHungVqFree != null) {
                    $("#money20").html(commaSeparateNumber(res.vinInEvent.SieuAnhHungVqFree));

                } else {
                    $("#money20").html(0);
                }
                if (res.vinInEvent.NuDiepVienVqFree != null || res.vinInEvent.NuDiepVienVqFree != null) {
                    $("#money21").html(commaSeparateNumber(res.vinInEvent.NuDiepVienVqFree));

                } else {
                    $("#money21").html(0);
                }
                if (res.vinInEvent.VuongQuocVinVqFree != null || res.vinInEvent.VuongQuocVinVqFree != null) {
                    $("#money22").html(commaSeparateNumber(res.vinInEvent.VuongQuocVinVqFree));
                } else {
                    $("#money22").html(0);
                }
                if (res.vinInEvent.CashoutByVP != null || res.vinInEvent.CashoutByVP != null) {
                    $("#money23").html(commaSeparateNumber(res.vinInEvent.CashoutByVP));

                } else {
                    $("#money23").html(0);
                }

                if (res.vinInEvent.RefundFee != null || res.vinInEvent.RefundFee != null) {
                    $("#money24").html(commaSeparateNumber(res.vinInEvent.RefundFee));

                } else {
                    $("#money24").html(0);
                }
                if (res.vinInEvent.BonusTopDS != null || res.vinInEvent.BonusTopDS != null) {
                    $("#money25").html(commaSeparateNumber(res.vinInEvent.BonusTopDS));

                } else {
                    $("#money25").html(0);
                }
                if (res.vinInEvent.EventVP != null || res.vinInEvent.EventVP != null) {
                    $("#money26").html(commaSeparateNumber(res.vinInEvent.EventVP));

                } else {
                    $("#money26").html(0);
                }


            }
            $("#money28").html(commaSeparateNumber(res.totalInEvent));
            $("#money27").html(commaSeparateNumber(Math.round(res.totalInEvent * 0.83)));
            $("#money29").html(commaSeparateNumber(res.totalIn));
            var total2 = 0;
            if ($.isEmptyObject(res.vinOutUser)) {
                $("#money30").html(0);
                $("#money31").html(0);
                $("#money32").html(0);
                $("#money33").html(0);
            } else {
                if (res.vinOutUser.CashOutByCard != null || res.vinOutUser.CashOutByCard != null) {
                    $("#money30").html(commaSeparateNumber(Math.round(res.vinOutUser.CashOutByCard/1.15)));
                    $("#money31").html(commaSeparateNumber(res.vinOutUser.CashOutByCard));
                    total2 += Math.round(res.vinOutUser.CashOutByCard/1.15);
                } else {
                    $("#money30").html(0);
                    $("#money31").html(0);
                }
                if (res.vinOutUser.CashOutByTopUp != null || res.vinOutUser.CashOutByTopUp != null) {
                    $("#money32").html(commaSeparateNumber(Math.round(res.vinOutUser.CashOutByTopUp/1.17)));
                    $("#money33").html(commaSeparateNumber(res.vinOutUser.CashOutByTopUp));
                    total2 += Math.round(Math.round(res.vinOutUser.CashOutByTopUp/1.17));
                } else {
                    $("#money32").html(0);
                    $("#money33").html(0);
                }


            }
            $("#money34").html(commaSeparateNumber(total2));
            $("#money35").html(commaSeparateNumber(res.totalOutUser));
            if ($.isEmptyObject(res.vinOutAgent)) {
                $("#money36").html(0);
                $("#money37").html(0);
            } else {
                if (res.vinOutAgent.agentStart != null || res.vinOutAgent.agentStart != null) {
                    $("#money36").html(commaSeparateNumber(res.vinOutAgent.agentStart));
                } else {
                    $("#money36").html(0);
                }
                if (res.vinOutAgent.agentEnd != null || res.vinOutAgent.agentEnd != null) {
                    $("#money37").html(commaSeparateNumber(res.vinOutAgent.agentEnd));
                } else {
                    $("#money37").html(0);
                }
            }
            $("#money38").html(commaSeparateNumber(Math.round(res.totalOutAgent*0.83)));
            $("#money39").html(commaSeparateNumber(res.totalOutAgent));
            $("#money40").html(commaSeparateNumber(Math.round(res.totalOutAgent*0.83)+total2));
            $("#money41").html(commaSeparateNumber(res.totalOut));
            var total3 = 0;
            var total4 = 0;
            if (res.taiXiu != null || res.taiXiu != "") {
                total3 += res.taiXiu.revenue;
            }
            if (res.actionGame != null || res.actionGame != "") {
                if (res.actionGame.MiniPoker != null) {
                    total3 += res.actionGame.MiniPoker.revenue;
                }
                if (res.actionGame.CaoThap != null) {
                    total3 += res.actionGame.CaoThap.revenue;

                }
                if (res.actionGame.BauCua != null) {
                    total3 += res.actionGame.BauCua.revenue;
                }
                if (res.actionGame.PokeGo != null) {
                    total3 += res.actionGame.PokeGo.revenue;
                }
                if (res.actionGame.KhoBau != null) {
                    total3 += res.actionGame.KhoBau.revenue;
                }
                if (res.actionGame.SieuAnhHung != null) {
                    total3 += res.actionGame.SieuAnhHung.revenue;
                }
//                if (res.actionGame.MyNhanNgu != null) {
//                    result2 += resultSearchTransction("Mỹ Nhân Ngư", res.actionGame.MyNhanNgu.moneyWin, res.actionGame.MyNhanNgu.moneyLost, res.actionGame.MyNhanNgu.moneyOther, res.actionGame.MyNhanNgu.fee, res.actionGame.MyNhanNgu.revenuePlayGame, res.actionGame.MyNhanNgu.revenue);
//                    $('#logaction1').html(result2);
//                    total1 += res.actionGame.MyNhanNgu.moneyWin;
//                    total2 += res.actionGame.MyNhanNgu.moneyLost;
//                    total3 += res.actionGame.MyNhanNgu.moneyOther;
//                    total4 += res.actionGame.MyNhanNgu.fee;
//                    total5 += res.actionGame.MyNhanNgu.revenuePlayGame;
//                    total6 += res.actionGame.MyNhanNgu.revenue;
//                }
//                else {
//                    result2 += resultSearchTransction("Mỹ Nhân Ngư", 0, 0, 0, 0, 0, 0);
//                    $('#logaction1').html(result2);
//                }
                if (res.actionGame.NuDiepVien != null) {
                    total3 += res.actionGame.NuDiepVien.revenue;
                }
				 if (res.actionGame.VuongQuocVin != null) {
                    total3 += res.actionGame.VuongQuocVin.revenue;
                }
                $('#money42').html(commaSeparateNumber(0-total3));
                if (res.actionGame.Sam != null) {
                    total4 += res.actionGame.Sam.revenue;
                }
                if (res.actionGame.BaCay != null) {
                    total4 += res.actionGame.BaCay.revenue;
                }
                if (res.actionGame.Binh != null) {
                    total4 += res.actionGame.Binh.revenue;
                }
                if (res.actionGame.Tlmn != null) {
                    total4 += res.actionGame.Tlmn.revenue;
                }
				if(res.actionGame.XiDzach != null) {
                    total4 += res.actionGame.XiDzach.revenue;
                }
//                if(res.actionGame.TaLa != null) {
//                    result3 += resultSearchTransction("Tá Lả", res.actionGame.TaLa.moneyWin, res.actionGame.TaLa.moneyLost, res.actionGame.TaLa.moneyOther, res.actionGame.TaLa.fee, res.actionGame.TaLa.revenuePlayGame, res.actionGame.TaLa.revenue);
//                    $('#logaction2').html(result3);
//                    total7 += res.actionGame.TaLa.moneyWin;
//                    total8 +=  res.actionGame.TaLa.moneyLost;
//                    total9 += res.actionGame.TaLa.moneyOther;
//                    total10 += res.actionGame.TaLa.fee;
//                    total11 += res.actionGame.TaLa.revenuePlayGame;
//                    total12 += res.actionGame.TaLa.revenue;
//                }  else{
//                    result3 += resultSearchTransction("Tá lả", 0, 0, 0, 0,0, 0);
//                    $('#logaction2').html(result3);
//                }
                if (res.actionGame.Lieng != null) {
                    total4 += res.actionGame.Lieng.revenue;
                }
//                if(res.actionGame.XiTo != null) {
//
//                    result3 += resultSearchTransction("Xì Tố", res.actionGame.XiTo.moneyWin, res.actionGame.XiTo.moneyLost, res.actionGame.XiTo.moneyOther, res.actionGame.XiTo.fee, res.actionGame.XiTo.revenuePlayGame, res.actionGame.XiTo.revenue);
//                    $('#logaction2').html(result3);
//                    total7 += res.actionGame.XiTo.moneyWin;
//                    total8 +=  res.actionGame.XiTo.moneyLost;
//                    total9 += res.actionGame.XiTo.moneyOther;
//                    total10 += res.actionGame.XiTo.fee;
//                    total11 += res.actionGame.XiTo.revenuePlayGame;
//                    total12 += res.actionGame.XiTo.revenue;
//                }
//                else{
//                    result3 += resultSearchTransction("Xì tố", 0, 0, 0, 0,0, 0);
//                    $('#logaction2').html(result3);
//                }
                if (res.actionGame.BaiCao != null) {

                    total4 += res.actionGame.BaiCao.revenue;
                }
                if (res.actionGame.Poker != null) {
                    total4 += res.actionGame.Poker.revenue;
                }
				  if (res.actionGame.PokerTour != null) {
                    total4 += res.actionGame.PokerTour.revenue;
                }
				if (res.actionGame.XocDia != null) {
                    total4 += res.actionGame.XocDia.revenue;
                }
                if (res.actionGame.Caro != null) {
                    total4 += res.actionGame.Caro.revenue;
                }
				 if (res.actionGame.CoTuong != null) {
                    total4 += res.actionGame.CoTuong.revenue;
                }
				 if (res.actionGame.CoUp != null) {
                    total4 += res.actionGame.CoUp.revenue;
                }
				  if (res.actionGame.HamCaMap != null) {
                    total4 += res.actionGame.HamCaMap.revenue;
                }
                $('#money43').html(commaSeparateNumber(0-total4));

            }else{
                $("#money42").html(0);
                $("#money43").html(0);
            }
            var total5 = 0;
			  var total55 = 0;
            if ($.isEmptyObject(res.vinOther)) {
                $("#money44").html(0);
                $("#money45").html(0);
                $("#money46").html(0);
                $("#money47").html(0);
                $("#money55").html(0);

            } else {
                if (res.vinOther.TransferMoney != null || res.vinOther.TransferMoney != null) {
                    $("#money44").html( commaSeparateNumber(res.vinOther.TransferMoney));
                    total5 += res.vinOther.TransferMoney;
                }else{
                    $("#money44").html(0);
                }
                if (res.vinOther.ChargeSMS != null || res.vinOther.ChargeSMS != null) {
                    $("#money45").html(commaSeparateNumber(res.vinOther.ChargeSMS));
                    total5 += res.vinOther.ChargeSMS;
                }else{
                    $("#money45").html(0);
                }


                if (res.vinOther.NapXu != null || res.vinOther.NapXu != null) {
                    $("#money46").html(commaSeparateNumber(res.vinOther.NapXu));
                    total5 += res.vinOther.NapXu;
                }else{
                    $("#money46").html(0);
                }

                if (res.vinOther.Admin != null || res.vinOther.Admin != null) {
                    $("#money47").html(commaSeparateNumber(res.vinOther.Admin));
                    total5 += res.vinOther.Admin;
                }else{
                    $("#money47").html(0);
                }
                if (res.vinOther.GcAgent != null || res.vinOther.GcAgent != null) {
                    total5 += res.vinOther.GcAgent;
                    total55 += res.vinOther.GcAgent;
                }
                if (res.vinOther.GcAgentExport != null || res.vinOther.GcAgentExport != null) {

                    total55 += res.vinOther.GcAgentExport;
                    total5 += res.vinOther.GcAgentExport;

                }
                $("#money55").html(commaSeparateNumber(total55));
            }
            $("#money48").html(commaSeparateNumber(Math.round((total5 - total4 - total3)*0.83)));
            $("#money49").html(commaSeparateNumber(total5 - total4 - total3));
            var total6 = 0;
            var total7 = 0;
            var total8 = 0;
            if ($.isEmptyObject(res.user)) {
                $("#money50").html(0);
                $("#money51").html(0);
                $("#money52").html(0);
            } else {
                if (res.user.userStart != null || res.user.userStart != null) {
                    $("#money50").html(commaSeparateNumber(res.user.userStart));
                    total6 = res.user.userStart;
                } else {
                    $("#money50").html(0);
                }
                if (res.user.userEnd != null || res.user.userEnd != null) {
                    $("#money51").html(commaSeparateNumber(res.user.userEnd));
                    total7 = res.user.userEnd;
                } else {
                    $("#money51").html(0);
                }
                $("#money53").html(commaSeparateNumber(res.user.userEnd - res.user.userStart));

                $("#money52").html(commaSeparateNumber(Math.round((res.user.userEnd- res.user.userStart)*0.83)));
            }





            $("#money54").html(res.ratioCashout + "%");

        }, error: function () {
            $("#spinner").hide();
            $("#error-popup").modal("show");
        }, timeout: 40000
    })
});

$("#exportexel").click(function () {
    $("#checkAll").table2excel({
        exclude: ".noExl",
        name: "Excel Document Name",
        filename: "Report",
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true
    });
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