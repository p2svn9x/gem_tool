<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.css">
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

<form class="list_filter form" action="<?php echo admin_url('report/moneysystemnew') ?>" method="post">


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
                           onclick="window.location.href = '<?php echo admin_url('report/moneysystemnew') ?>'; "
                           value="Reset" class="basic" style="margin-left: 20px">
                </td>
            </tr>
        </table>
    </div>

</form>

<div class="formRow">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                    <thead>
                    <tr style="height: 20px;">
                        <td>Tiền nạp</td>
                        <td>Tiền sự kiên</td>
                        <td>Tiền đại lý bán</td>
                        <td style="font-weight: 600;color: #0000ff">Tổng nạp</td>
                        <td>Tiền đổi thưởng</td>
                        <td>Tiền đại lý mua</td>
					
                        <td style="font-weight: 600;color: #0000ff">Tổng đổi thưởng</td>
                        <td style="font-weight: 600;color: #0000ff">Tỉ lệ đổi thưởng</td>
                    </tr>
                    </thead>
                    <tbody id="logactiontotal"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<div class="formRow">
<div class="container">
<div id="tabs-container">
<ul class="tabs-menu">
    <li class="current"><a href="#tab-1">Game</a></li>
    <li><a href="#tab-2">Tiền vào game</a></li>
    <li><a href="#tab-3">Tiền ra game</a></li>
    <li><a href="#tab-4">Tiền khác</a></li>
    <!--<li><a href="#tab-5">Bot</a></li>-->
</ul>
<div class="tab row">
<div id="tab-1" class="tab-content col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <h4 id="" style="color: red;margin-left: 20px">Minigame</h4>
        </div>
        <div class="col-sm-12">
            <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                <thead>
                <tr style="height: 20px;">
                    <td>Tên game</td>
                    <td>Tiền cược</td>
                    <td>Trả thưởng</td>
                    <td>Tiền hoàn trả</td>
                    <td>Tiền sự kiện</td>
                    <td>Phế</td>
                    <td class="col-sm-2">Tiền thắng trong game</td>
                    <td>Tiền thắng tổng</td>
                </tr>
                </thead>
                <tbody id="logaction1"></tbody>
                <tbody>
                <tr>
                    <td colspan="">Tổng:</td>
                    <td id="totalmoneylost" style="color:#0000ff "></td>
                    <td id="totalmoneywin" style="color: #0000ff"></td>
                    <td id="totalrefund" style="color: #0000ff">0</td>
                    <td id="totalmoneyother" style="color: #0000ff"></td>
                    <td id="totalmoneyfee" style="color: #0000ff"></td>
                    <td id="totalmoneyplay" style="color: #0000ff"></td>
                    <td id="totalmoney" style="color: #0000ff"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12">
            <h4 id="" style="color: red;margin-left: 20px">Game bài</h4>
        </div>
        <div class="col-sm-12">
            <table id="checkAll1" class="table table-bordered" style="table-layout: fixed">
                <thead>
                <tr style="height: 20px;">
                    <td>Tên game</td>
                    <td>Tiền cược</td>
                    <td>Trả thưởng</td>
                    <td>Tiền hoàn trả</td>
                    <td>Tiền sự kiện</td>
                    <td>Phế</td>
                    <td class="col-sm-2">Tiền thắng trong game</td>
                    <td>Tiền thắng tổng</td>
                </tr>
                </thead>
                <tbody id="logaction2"></tbody>
                <tbody>
                <tr>
                    <td colspan="">Tổng:</td>
                    <td id="totalmoneylostbai" style="color:#0000ff "></td>
                    <td id="totalmoneywinbai" style="color: #0000ff"></td>
                    <td id="" style="color: #0000ff">0</td>
                    <td id="totalmoneyotherbai" style="color: #0000ff"></td>
                    <td id="totalmoneyfeebai" style="color: #0000ff"></td>
                    <td id="totalmoneyplaybai" style="color: #0000ff" ></td>
                    <td id="totalmoneybai" style="color: #0000ff"></td>
                </tr>
                </tbody>
            </table>
        </div>
		 <div class="col-sm-12">
            <h4 id="" style="color: red;margin-left: 20px">Game khác</h4>
        </div>
        <div class="col-sm-12">
            <table id="checkAll1" class="table table-bordered" style="table-layout: fixed">
                <thead>
                <tr style="height: 20px;">
                    <td>Tên game</td>
                    <td>Tiền Vin đổi sang</td>
                    <td>Tiền đổi sang Vin</td>
                    <td>Tiền hoàn trả</td>
                    <td>Tiền sự kiện</td>
                    <td>Phế</td>
                    <td class="col-sm-2">Tiền thắng trong game</td>
                    <td>Tiền thắng tổng</td>
                </tr>
                </thead>
                <tbody id="logactiongamekhac"></tbody>
            </table>
        </div>
        <div class="col-sm-12">
            <h4 id="" style="color: red;margin-left: 20px">Tổng</h4>
        </div>
        <div class="col-sm-12">
            <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                <tbody>
                <tr>
                    <td colspan="">Tổng:</td>
                    <td id="summoneylost" style="color:#0000ff "></td>
                    <td id="summoneywin" style="color: #0000ff"></td>
                    <td id="sumrefund" style="color: #0000ff"></td>
                    <td id="summoneyother" style="color: #0000ff"></td>
                    <td id="summoneyfee" style="color: #0000ff"></td>
                    <td id="summoneyplay" style="color: #0000ff" class="col-sm-2"></td>
                    <td id="summoney" style="color: #0000ff"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<div id="tab-2" class="tab-content col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                <tr>
                    <td rowspan="8"
                        style="vertical-align: middle;text-align: center;color: red;font-weight: 600">
                        Tiền nạp user
                    </td>
                    <td>Tiền nạp thẻ</td>
                    <td id="money1" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>IAP</td>
                    <td id="money2" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>SMS</td>
                    <td id="money3" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Ngân hàng</td>
                    <td id="money4" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>VinCard</td>
                    <td id="money5" class="moneyhtml"></td>
                </tr>
				 <tr>

                    <td>MegaCard</td>
                    <td id="money555" class="moneyhtml"></td>
                </tr>
				<tr>

                    <td>Tiền nạp từ VTC</td>
                    <td id="money444" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td style="color: #0000ff;font-weight: 600">Tổng</td>
                    <td id="money6" style="color: #0000ff;font-weight: 600;text-align: right"></td>
                </tr>
                <tr>
                    <td colspan="3" style="height: 30px"></td>
                </tr>

                <tr>
                    <td rowspan="17"
                        style="vertical-align: middle;text-align: center;color: red;font-weight: 600">
                        Tiền sự kiện
                    </td>
                    <td>GiftCode</td>
                    <td id="money7" class="moneyhtml"></td>
                </tr>

                <tr>

                    <td>GiftCode vận hành</td>
                    <td id="money8" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Gift code marketing</td>
                    <td id="money9" class="moneyhtml"></td>
                </tr>
				 <tr>

                    <td>Gift code đại lý</td>
                    <td id="money91" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Vippoint event</td>
                    <td id="money10" class="moneyhtml"></td>
                </tr>
				 <tr>

                    <td>Thưởng nhiệm vụ</td>
                    <td id="money200" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Vòng quay may mắn</td>
                    <td id="money11" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Vòng quay vip</td>
                    <td id="money12" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Kho báu free</td>
                    <td id="money13" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Siêu anh hùng free</td>
                    <td id="money14" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Nữ điệp viên free</td>
                    <td id="money15" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Vương quốc vin free</td>
                    <td id="money16" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Đổi thưởng vippoint</td>
                    <td id="money17" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Hoàn trả phí đại lý</td>
                    <td id="money18" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Thưởng doanh số đại lý</td>
                    <td id="money19" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Trao thưởng vippoint event</td>
                    <td id="money20" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td style="color: #0000ff;font-weight: 600">Tổng</td>
                    <td id="money21" style="color: #0000ff;font-weight: 600; text-align: right"></td>
                </tr>

                <tr>
                    <td colspan="3" style="height: 30px"></td>
                </tr>

                <tr>
                    <td
                        style="vertical-align: middle;text-align: center;color: red;font-weight: 600">
                        Tổng tiền vào
                    </td>

                    <td colspan="2" id="money22"
                        style="vertical-align: middle;text-align: right;color: red;font-weight: 600"></td>
                </tr>
            </table>


        </div>
    </div>

</div>
<div id="tab-3" class="tab-content col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                <tr>
                    <td rowspan="3"
                        style="vertical-align: middle;text-align: center;color: red;font-weight: 600">
                        Tiền user đổi thưởng
                    </td>
                    <td>Đổi thẻ</td>
                    <td id="money23" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td>Nạp tiền điện thoại</td>
                    <td id="money24" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td style="color: #0000ff;font-weight: 600">Tổng</td>
                    <td id="money25" style="color: #0000ff;font-weight: 600;text-align: right"></td>
                </tr>
                <tr>
                    <td colspan="3" style="height: 30px"></td>
                </tr>

                <tr>
                    <td rowspan="3"
                        style="vertical-align: middle;text-align: center;color: red;font-weight: 600">
                        Tiền lệch đại lý
                    </td>
                    <td>Đầu</td>
                    <td id="money26" class="moneyhtml"></td>
                </tr>

                <tr>

                    <td>Cuối</td>
                    <td id="money27" class="moneyhtml"></td>
                </tr>

                <tr>

                    <td style="color: #0000ff;font-weight: 600">Tiền lệch</td>
                    <td id="money28" style="color: #0000ff;font-weight: 600; text-align: right"></td>
                </tr>

                <tr>
                    <td colspan="3" style="height: 30px"></td>
                </tr>

                <tr>
                    <td
                        style="vertical-align: middle;text-align: center;color: red;font-weight: 600">
                        Tổng tiền ra
                    </td>

                    <td colspan="2" id="money29"
                        style="vertical-align: middle;text-align: right;color: red;font-weight: 600"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div id="tab-4" class="tab-content col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                <tr>
                    <td rowspan="6"
                        style="vertical-align: middle;text-align: center;color: red;font-weight: 600">
                        Tiền khác
                    </td>
                    <td>Phí chuyển khoản</td>
                    <td id="money30" class="moneyhtml"></td>
                </tr>
                <tr>
                    <td>Đổi xu</td>
                    <td id="money31" class="moneyhtml"></td>
                </tr>
                <tr>
                    <td>Phí SMS</td>
                    <td id="money32" class="moneyhtml"></td>
                </tr>
                <tr>
                    <td>Admin</td>
                    <td id="money33" class="moneyhtml"></td>
                </tr>
                <tr>
                    <td>Đại lý xuất giftcode</td>
                    <td id="money34" class="moneyhtml"></td>
                </tr>
                <tr>

                    <td style="color: #0000ff;font-weight: 600">Tổng</td>
                    <td id="money35" style="color: #0000ff;font-weight: 600;text-align: right"></td>
                </tr>
                <tr>
                    <td colspan="3" style="height: 30px"></td>
                </tr>

                <tr>
                    <td rowspan="3"
                        style="vertical-align: middle;text-align: center;color: red;font-weight: 600">
                        Tiền lệch user
                    </td>
                    <td>Đầu</td>
                    <td id="money36" class="moneyhtml"></td>
                </tr>

                <tr>

                    <td>Cuối</td>
                    <td id="money37" class="moneyhtml"></td>
                </tr>

                <tr>

                    <td style="color: #0000ff;font-weight: 600">Tiền lệch</td>
                    <td id="money38" style="color: #0000ff;font-weight: 600; text-align: right"></td>
                </tr>

            </table>
        </div>
    </div>
</div>
<div id="tab-5" class="tab-content col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <h4 id="" style="color: red;margin-left: 20px">Tiền bot</h4>
        </div>
        <div class="col-sm-12">
            <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                <thead>
                <tr style="height: 20px;">
                    <td>Cộng trừ tiền bot</td>
                    <td>Admin</td>
                    <td>Vippoint event</td>
                </tr>
                <tr style="height: 20px;">
                    <td id="bot1"></td>
                    <td id="bot2"></td>
                    <td id="bot3"></td>
                </tr>
                </thead>

            </table>
        </div>

        
        <div class="col-sm-12">
            <h4 id="" style="color: red;margin-left: 20px">Minigame</h4>
        </div>
        <div class="col-sm-12">
            <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                <thead>
                <tr style="height: 20px;">
                    <td>Tên game</td>
                    <td>Tiền cược</td>
                    <td>Trả thưởng</td>
                    <td>Tiền hoàn trả</td>
                    <td>Tiền sự kiện</td>
                    <td>Phế</td>
                    <td>Tiền thắng trong game</td>
                    <td>Tiền thắng tổng</td>
                </tr>
                </thead>
                <tbody id="logactionbot1"></tbody>
                <tbody>
                <tr>
                    <td colspan="">Tổng:</td>
                    <td id="totalmoneylostbot" style="color:#0000ff "></td>
                    <td id="totalmoneywinbot" style="color: #0000ff"></td>
                    <td id="totalrefundbot" style="color: #0000ff"></td>
                    <td id="totalmoneyotherbot" style="color: #0000ff"></td>
                    <td id="totalmoneyfeebot" style="color: #0000ff"></td>
                    <td id="totalmoneyplaybot" style="color: #0000ff"></td>
                    <td id="totalmoneybot" style="color: #0000ff"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12">
            <h4 id="" style="color: red;margin-left: 20px">Game bài</h4>
        </div>
        <div class="col-sm-12">
            <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                <thead>
                <tr style="height: 20px;">
                    <td>Tên game</td>
                    <td>Tiền cược</td>
                    <td>Trả thưởng</td>
                    <td>Tiền hoàn trả</td>
                    <td>Tiền sự kiện</td>
                    <td>Phế</td>
                    <td>Tiền thắng trong game</td>
                    <td>Tiền thắng tổng</td>
                </tr>
                </thead>
                <tbody id="logactionbot2"></tbody>
                <tbody>
                <tr>
                    <td colspan="">Tổng:</td>
                    <td id="totalmoneylostbaibot" style="color:#0000ff "></td>
                    <td id="totalmoneywinbaibot" style="color: #0000ff"></td>
                    <td id="" style="color: #0000ff">0</td>
                    <td id="totalmoneyotherbaibot" style="color: #0000ff"></td>
                    <td id="totalmoneyfeebaibot" style="color: #0000ff"></td>
                    <td id="totalmoneyplaybaibot" style="color: #0000ff"></td>
                    <td id="totalmoneybaibot" style="color: #0000ff"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12">
            <h4 id="" style="color: red;margin-left: 20px">Tổng</h4>
        </div>
        <div class="col-sm-12">
            <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                <tbody>
                <tr>
                    <td colspan="">Tổng:</td>
                    <td id="summoneylostbot" style="color:#0000ff "></td>
                    <td id="summoneywinbot" style="color: #0000ff"></td>
                    <td id="sumrefundbot" style="color: #0000ff"></td>
                    <td id="summoneyotherbot" style="color: #0000ff"></td>
                    <td id="summoneyfeebot" style="color: #0000ff"></td>
                    <td id="summoneyplaybot" style="color: #0000ff"></td>
                    <td id="summoneybot" style="color: #0000ff"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php endif; ?>
</div>

<style>

    .moneyhtml {
        text-align: right;
    }

    .tabs-menu {
        height: 30px;
        /*float: left;*/
        clear: both;
    }

    .tabs-menu li {
        height: 30px;
        line-height: 30px;
        float: left;
        margin-right: 10px;
        background-color: #ccc;
        border-top: 1px solid #d4d4d1;
        border-right: 1px solid #d4d4d1;
        border-left: 1px solid #d4d4d1;
    }

    .tabs-menu li.current {
        position: relative;
        background-color: #fff;
        border-bottom: 1px solid #fff;
        z-index: 5;
    }

    .tabs-menu li a {
        padding: 10px;
        text-transform: uppercase;
        color: #fff;
        text-decoration: none;
    }

    .tabs-menu .current a {
        color: #2e7da3;
    }

    .tab {
        border: 1px solid #d4d4d1;
        background-color: #fff;
        float: left;
        margin-bottom: 20px;
        width: auto;
    }

    .tab-content {
        width: 100%;
        padding: 20px;
        display: none;
    }

    #tab-1 {
        display: block;
    }

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
function resultSearchTransction(gamename, moneywin, moneylost, moneyother, fee, moneytotal, revenue) {

    var rs = "";
    rs += "<tr>";
    rs += "<td>" + gamename + "</td>";
    rs += "<td class='moneylostuser'>" + commaSeparateNumber(moneylost) + "</td>";
    rs += "<td class='moneywinuser'>" + commaSeparateNumber(moneywin) + "</td>";
    rs += "<td class='moneywinuser'>" + commaSeparateNumber(0) + "</td>";
    rs += "<td class='moneyotheruser'>" + commaSeparateNumber(moneyother) + "</td>";
    rs += "<td class='feeuser'>" + commaSeparateNumber(fee) + "</td>";
    rs += "<td class='moneytotaluser'>" + commaSeparateNumber(moneytotal) + "</td>";
    rs += "<td class='revenueuser'>" + commaSeparateNumber(revenue) + "</td>";
    rs += "</tr>";
    return rs;
}
function resulttotal(inuser, inevent, totalin, outuser, outagent, totalout, ratio, inagent) {

    var rs = "";
    rs += "<tr style='color: #0000ff'>";
    rs += "<td >" + commaSeparateNumber(inuser) + "</td>";
    rs += "<td>" + commaSeparateNumber(inevent) + "</td>";
    rs += "<td>" + commaSeparateNumber(inagent) + "</td>";
    rs += "<td>" + commaSeparateNumber(totalin) + "</td>";
    rs += "<td>" + commaSeparateNumber(outuser) + "</td>";
    rs += "<td>" + commaSeparateNumber(outagent) + "</td>";
  
    rs += "<td>" + commaSeparateNumber(totalout) + "</td>";

    rs += "<td>" + ratio + "%" + "</td>";
    rs += "</tr>";
    return rs;
}
function resultSearchTransctiontaixiu(gamename, moneywin, moneylost,moneyrefund, moneyother, fee, moneytotal, revenue) {

    var rs = "";
    rs += "<tr>";
    rs += "<td>" + gamename + "</td>";
    rs += "<td>" + commaSeparateNumber(moneylost) + "</td>";
    rs += "<td>" + commaSeparateNumber(moneywin) + "</td>";
    rs += "<td>" + commaSeparateNumber(moneyrefund) + "</td>";
    rs += "<td>" + commaSeparateNumber(moneyother) + "</td>";
    rs += "<td>" + commaSeparateNumber(fee) + "</td>";
    rs += "<td>" + commaSeparateNumber(moneytotal) + "</td>";
    rs += "<td>" + commaSeparateNumber(revenue) + "</td>";
    rs += "</tr>";
    return rs;
}
$(document).ready(function () {
    var result1 = "";
    var result2 = "";
    var result3 = "";
	 var result4 = "";
    var result11 = "";
    var result22 = "";
    var result33 = "";
    var result44 = "";
    $(".tabs-menu a").click(function (event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
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
            var total2 = 0;
            var total3 = 0;
            var total4 = 0;
            var total5 = 0;
            var total6 = 0;
            var total7 = 0;
            var total8 = 0;
            var total9 = 0;
            var total10 = 0;
            var total11 = 0;
            var total12 = 0;
            var total13 = 0;
            var total14 = 0;
            var total15 = 0;
            var total16 = 0;
            var total17 = 0;
            var total18 = 0;
			  var total19 = 0;
            var total20 = 0;
            var total21 = 0;
            var total22 = 0;
            var total23 = 0;
            var total24 = 0;
            var totalrefund = 0;

            if (res.taiXiu != null || res.taiXiu != "") {
                result2 += resultSearchTransctiontaixiu("Tài Xỉu", res.taiXiu.moneyWin, res.taiXiu.moneyLost,res.taiXiu.moneyRefund, res.taiXiu.moneyOther, res.taiXiu.fee, res.taiXiu.revenuePlayGame, res.taiXiu.revenue);
                $('#logaction1').html(result2);
                total13 += res.taiXiu.moneyWin;
                total14 += res.taiXiu.moneyLost;
                total15 += res.taiXiu.moneyOther;
                total16 += res.taiXiu.fee;
                total17 += res.taiXiu.revenuePlayGame;
                total18 += res.taiXiu.revenue;
                totalrefund += res.taiXiu.moneyRefund;
            } else {
                result2 += resultSearchTransction("Tài Xỉu", 0, 0, 0, 0, 0, 0);
                $('#logaction1').html(result2);
            }

            if (res.actionGame != null || res.actionGame != "") {
                if (res.actionGame.MiniPoker != null) {
                    result2 += resultSearchTransction("MiniPoker", res.actionGame.MiniPoker.moneyWin, res.actionGame.MiniPoker.moneyLost, res.actionGame.MiniPoker.moneyOther, res.actionGame.MiniPoker.fee, res.actionGame.MiniPoker.revenuePlayGame, res.actionGame.MiniPoker.revenue);
                    $('#logaction1').html(result2);
                    total1 += res.actionGame.MiniPoker.moneyWin;
                    total2 += res.actionGame.MiniPoker.moneyLost;
                    total3 += res.actionGame.MiniPoker.moneyOther;
                    total4 += res.actionGame.MiniPoker.fee;
                    total5 += res.actionGame.MiniPoker.revenuePlayGame;
                    total6 += res.actionGame.MiniPoker.revenue;

                } else {
                    result2 += resultSearchTransction("MiniPoker", 0, 0, 0, 0, 0, 0);
                    $('#logaction1').html(result2);
                }
                if (res.actionGame.CaoThap != null) {
                    result2 += resultSearchTransction("Cao Thấp", res.actionGame.CaoThap.moneyWin, res.actionGame.CaoThap.moneyLost, res.actionGame.CaoThap.moneyOther, res.actionGame.CaoThap.fee, res.actionGame.CaoThap.revenuePlayGame, res.actionGame.CaoThap.revenue);
                    $('#logaction1').html(result2);
                    total1 += res.actionGame.CaoThap.moneyWin;
                    total2 += res.actionGame.CaoThap.moneyLost;
                    total3 += res.actionGame.CaoThap.moneyOther;
                    total4 += res.actionGame.CaoThap.fee;
                    total5 += res.actionGame.CaoThap.revenuePlayGame;
                    total6 += res.actionGame.CaoThap.revenue;

                } else {
                    result2 += resultSearchTransction("Cao Thấp", 0, 0, 0, 0, 0, 0);
                    $('#logaction1').html(result2);
                }
                if (res.actionGame.BauCua != null) {
                    result2 += resultSearchTransction("Bầu Cua", res.actionGame.BauCua.moneyWin, res.actionGame.BauCua.moneyLost, res.actionGame.BauCua.moneyOther, res.actionGame.BauCua.fee, res.actionGame.BauCua.revenuePlayGame, res.actionGame.BauCua.revenue);
                    $('#logaction1').html(result2);
                    total1 += res.actionGame.BauCua.moneyWin;
                    total2 += res.actionGame.BauCua.moneyLost;
                    total3 += res.actionGame.BauCua.moneyOther;
                    total4 += res.actionGame.BauCua.fee;
                    total5 += res.actionGame.BauCua.revenuePlayGame;
                    total6 += res.actionGame.BauCua.revenue;
                } else {
                    result2 += resultSearchTransction("Bầu Cua", 0, 0, 0, 0, 0, 0);
                    $('#logaction1').html(result2);
                }
                if (res.actionGame.PokeGo != null) {
                    result2 += resultSearchTransction("PokeGo", res.actionGame.PokeGo.moneyWin, res.actionGame.PokeGo.moneyLost, res.actionGame.PokeGo.moneyOther, res.actionGame.PokeGo.fee, res.actionGame.PokeGo.revenuePlayGame, res.actionGame.PokeGo.revenue);
                    $('#logaction1').html(result2);
                    total1 += res.actionGame.PokeGo.moneyWin;
                    total2 += res.actionGame.PokeGo.moneyLost;
                    total3 += res.actionGame.PokeGo.moneyOther;
                    total4 += res.actionGame.PokeGo.fee;
                    total5 += res.actionGame.PokeGo.revenuePlayGame;
                    total6 += res.actionGame.PokeGo.revenue;
                } else {
                    result2 += resultSearchTransction("PokeGo", 0, 0, 0, 0, 0, 0);
                    $('#logaction1').html(result2);
                }
                if (res.actionGame.KhoBau != null) {
                    result2 += resultSearchTransction("Kho Báu", res.actionGame.KhoBau.moneyWin, res.actionGame.KhoBau.moneyLost, res.actionGame.KhoBau.moneyOther, res.actionGame.KhoBau.fee, res.actionGame.KhoBau.revenuePlayGame, res.actionGame.KhoBau.revenue);
                    $('#logaction1').html(result2);
                    total1 += res.actionGame.KhoBau.moneyWin;
                    total2 += res.actionGame.KhoBau.moneyLost;
                    total3 += res.actionGame.KhoBau.moneyOther;
                    total4 += res.actionGame.KhoBau.fee;
                    total5 += res.actionGame.KhoBau.revenuePlayGame;
                    total6 += res.actionGame.KhoBau.revenue;
                } else {
                    result2 += resultSearchTransction("Kho Báu", 0, 0, 0, 0, 0, 0);
                    $('#logaction1').html(result2);
                }
                if (res.actionGame.SieuAnhHung != null) {
                    result2 += resultSearchTransction("Siêu Anh Hùng", res.actionGame.SieuAnhHung.moneyWin, res.actionGame.SieuAnhHung.moneyLost, res.actionGame.SieuAnhHung.moneyOther, res.actionGame.SieuAnhHung.fee, res.actionGame.SieuAnhHung.revenuePlayGame, res.actionGame.SieuAnhHung.revenue);
                    $('#logaction1').html(result2);
                    total1 += res.actionGame.SieuAnhHung.moneyWin;
                    total2 += res.actionGame.SieuAnhHung.moneyLost;
                    total3 += res.actionGame.SieuAnhHung.moneyOther;
                    total4 += res.actionGame.SieuAnhHung.fee;
                    total5 += res.actionGame.SieuAnhHung.revenuePlayGame;
                    total6 += res.actionGame.SieuAnhHung.revenue;
                } else {
                    result2 += resultSearchTransction("Siêu Anh Hùng", 0, 0, 0, 0, 0, 0);
                    $('#logaction1').html(result2);
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
                    result2 += resultSearchTransction("Nữ Điệp Viên", res.actionGame.NuDiepVien.moneyWin, res.actionGame.NuDiepVien.moneyLost, res.actionGame.NuDiepVien.moneyOther, res.actionGame.NuDiepVien.fee, res.actionGame.NuDiepVien.revenuePlayGame, res.actionGame.NuDiepVien.revenue);
                    $('#logaction1').html(result2);
                    total1 += res.actionGame.NuDiepVien.moneyWin;
                    total2 += res.actionGame.NuDiepVien.moneyLost;
                    total3 += res.actionGame.NuDiepVien.moneyOther;
                    total4 += res.actionGame.NuDiepVien.fee;
                    total5 += res.actionGame.NuDiepVien.revenuePlayGame;
                    total6 += res.actionGame.NuDiepVien.revenue;
                } else {
                    result2 += resultSearchTransction("Nữ Điệp Viên", 0, 0, 0, 0, 0, 0);
                    $('#logaction1').html(result2);
                }


				
				if (res.actionGame.VuongQuocVin != null) {
                    result2 += resultSearchTransction("Vương Quốc Vin", res.actionGame.VuongQuocVin.moneyWin, res.actionGame.VuongQuocVin.moneyLost, res.actionGame.VuongQuocVin.moneyOther, res.actionGame.VuongQuocVin.fee, res.actionGame.VuongQuocVin.revenuePlayGame, res.actionGame.VuongQuocVin.revenue);
                    $('#logaction1').html(result2);
                    total1 += res.actionGame.VuongQuocVin.moneyWin;
                    total2 += res.actionGame.VuongQuocVin.moneyLost;
                    total3 += res.actionGame.VuongQuocVin.moneyOther;
                    total4 += res.actionGame.VuongQuocVin.fee;
                    total5 += res.actionGame.VuongQuocVin.revenuePlayGame;
                    total6 += res.actionGame.VuongQuocVin.revenue;
                } else {
                    result2 += resultSearchTransction("Vương Quốc Vin", 0, 0, 0, 0, 0, 0);
                    $('#logaction1').html(result2);
                }

                if (res.actionGame.NuChienThan != null) {
                    result2 += resultSearchTransction("Nũ Chiến Thần", res.actionGame.NuChienThan.moneyWin, res.actionGame.NuChienThan.moneyLost, res.actionGame.NuChienThan.moneyOther, res.actionGame.NuChienThan.fee, res.actionGame.NuChienThan.revenuePlayGame, res.actionGame.NuChienThan.revenue);
                    $('#logaction1').html(result2);
                    total1 += res.actionGame.NuChienThan.moneyWin;
                    total2 += res.actionGame.NuChienThan.moneyLost;
                    total3 += res.actionGame.NuChienThan.moneyOther;
                    total4 += res.actionGame.NuChienThan.fee;
                    total5 += res.actionGame.NuChienThan.revenuePlayGame;
                    total6 += res.actionGame.NuChienThan.revenue;
                } else {
                    result2 += resultSearchTransction("Nũ Chiến Thần", 0, 0, 0, 0, 0, 0);
                    $('#logaction1').html(result2);
                }

                if (res.actionGame.DeCheLaMa != null) {
                    result2 += resultSearchTransction("Đế Chế La Mã", res.actionGame.DeCheLaMa.moneyWin, res.actionGame.DeCheLaMa.moneyLost, res.actionGame.DeCheLaMa.moneyOther, res.actionGame.DeCheLaMa.fee, res.actionGame.DeCheLaMa.revenuePlayGame, res.actionGame.DeCheLaMa.revenue);
                    $('#logaction1').html(result2);
                    total1 += res.actionGame.DeCheLaMa.moneyWin;
                    total2 += res.actionGame.DeCheLaMa.moneyLost;
                    total3 += res.actionGame.DeCheLaMa.moneyOther;
                    total4 += res.actionGame.DeCheLaMa.fee;
                    total5 += res.actionGame.DeCheLaMa.revenuePlayGame;
                    total6 += res.actionGame.DeCheLaMa.revenue;
                } else {
                    result2 += resultSearchTransction("Đế Chế La Mã", 0, 0, 0, 0, 0, 0);
                    $('#logaction1').html(result2);
                }
                $('#totalmoneywin').html(commaSeparateNumber(total1+total13));
                $('#totalmoneylost').html(commaSeparateNumber(total2+total14));
                $('#totalrefund').html(commaSeparateNumber(totalrefund));
                $('#totalmoneyother').html(commaSeparateNumber(total3+total15));
                $('#totalmoneyfee').html(commaSeparateNumber(total4+total16));
                $('#totalmoneyplay').html(commaSeparateNumber(total5+total17));
                $('#totalmoney').html(commaSeparateNumber(total6 + total18));
                if (res.actionGame.Sam != null) {
                    result3 += resultSearchTransction("Sâm", res.actionGame.Sam.moneyWin, res.actionGame.Sam.moneyLost, res.actionGame.Sam.moneyOther, res.actionGame.Sam.fee, res.actionGame.Sam.revenuePlayGame, res.actionGame.Sam.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.Sam.moneyWin;
                    total8 += res.actionGame.Sam.moneyLost;
                    total9 += res.actionGame.Sam.moneyOther;
                    total10 += res.actionGame.Sam.fee;
                    total11 += res.actionGame.Sam.revenuePlayGame;
                    total12 += res.actionGame.Sam.revenue;
                }
                else {
                    result3 += resultSearchTransction("Sâm", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }
                if (res.actionGame.BaCay != null) {
                    result3 += resultSearchTransction("Ba Cây", res.actionGame.BaCay.moneyWin, res.actionGame.BaCay.moneyLost, res.actionGame.BaCay.moneyOther, res.actionGame.BaCay.fee, res.actionGame.BaCay.revenuePlayGame, res.actionGame.BaCay.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.BaCay.moneyWin;
                    total8 += res.actionGame.BaCay.moneyLost;
                    total9 += res.actionGame.BaCay.moneyOther;
                    total10 += res.actionGame.BaCay.fee;
                    total11 += res.actionGame.BaCay.revenuePlayGame;
                    total12 += res.actionGame.BaCay.revenue;
                }
                else {
                    result3 += resultSearchTransction("Ba Cây", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }
                if (res.actionGame.Binh != null) {
                    result3 += resultSearchTransction("Binh", res.actionGame.Binh.moneyWin, res.actionGame.Binh.moneyLost, res.actionGame.Binh.moneyOther, res.actionGame.Binh.fee, res.actionGame.Binh.revenuePlayGame, res.actionGame.Binh.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.Binh.moneyWin;
                    total8 += res.actionGame.Binh.moneyLost;
                    total9 += res.actionGame.Binh.moneyOther;
                    total10 += res.actionGame.Binh.fee;
                    total11 += res.actionGame.Binh.revenuePlayGame;
                    total12 += res.actionGame.Binh.revenue;
                } else {
                    result3 += resultSearchTransction("Binh", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }
                if (res.actionGame.Tlmn != null) {
                    result3 += resultSearchTransction("Tiến Lên Miền Nam", res.actionGame.Tlmn.moneyWin, res.actionGame.Tlmn.moneyLost, res.actionGame.Tlmn.moneyOther, res.actionGame.Tlmn.fee, res.actionGame.Tlmn.revenuePlayGame, res.actionGame.Tlmn.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.Tlmn.moneyWin;
                    total8 += res.actionGame.Tlmn.moneyLost;
                    total9 += res.actionGame.Tlmn.moneyOther;
                    total10 += res.actionGame.Tlmn.fee;
                    total11 += res.actionGame.Tlmn.revenuePlayGame;
                    total12 += res.actionGame.Tlmn.revenue;
                }
                else {
                    result3 += resultSearchTransction("Tiến lên miền nam", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }
				if(res.actionGame.XiDzach != null) {
                    result3 += resultSearchTransction("XiDzach", res.actionGame.XiDzach.moneyWin, res.actionGame.XiDzach.moneyLost, res.actionGame.XiDzach.moneyOther, res.actionGame.XiDzach.fee, res.actionGame.XiDzach.revenuePlayGame, res.actionGame.XiDzach.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.XiDzach.moneyWin;
                    total8 +=  res.actionGame.XiDzach.moneyLost;
                    total9 += res.actionGame.XiDzach.moneyOther;
                    total10 += res.actionGame.XiDzach.fee;
                    total11 += res.actionGame.XiDzach.revenuePlayGame;
                    total12 += res.actionGame.XiDzach.revenue;
                }
                else{
                    result3 += resultSearchTransction("XiDzach", 0, 0, 0, 0,0, 0);
                    $('#logaction2').html(result3);
                }
                if (res.actionGame.Lieng != null) {

                    result3 += resultSearchTransction("Liêng", res.actionGame.Lieng.moneyWin, res.actionGame.Lieng.moneyLost, res.actionGame.Lieng.moneyOther, res.actionGame.Lieng.fee, res.actionGame.Lieng.revenuePlayGame, res.actionGame.Lieng.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.Lieng.moneyWin;
                    total8 += res.actionGame.Lieng.moneyLost;
                    total9 += res.actionGame.Lieng.moneyOther;
                    total10 += res.actionGame.Lieng.fee;
                    total11 += res.actionGame.Lieng.revenuePlayGame;
                    total12 += res.actionGame.Lieng.revenue;
                }
                else {
                    result3 += resultSearchTransction("Liêng", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }
				 if(res.actionGame.XocDia != null) {

                    result3 += resultSearchTransction("Xoc Đĩa", res.actionGame.XocDia.moneyWin, res.actionGame.XocDia.moneyLost, res.actionGame.XocDia.moneyOther, res.actionGame.XocDia.fee, res.actionGame.XocDia.revenuePlayGame, res.actionGame.XocDia.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.XocDia.moneyWin;
                    total8 +=  res.actionGame.XocDia.moneyLost;
                    total9 += res.actionGame.XocDia.moneyOther;
                    total10 += res.actionGame.XocDia.fee;
                    total11 += res.actionGame.XocDia.revenuePlayGame;
                    total12 += res.actionGame.XocDia.revenue;
                }
                else{
                    result3 += resultSearchTransction("Xóc Đĩa", 0, 0, 0, 0,0, 0);
                    $('#logaction2').html(result3);
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

                    result3 += resultSearchTransction("Bài Cào", res.actionGame.BaiCao.moneyWin, res.actionGame.BaiCao.moneyLost, res.actionGame.BaiCao.moneyOther, res.actionGame.BaiCao.fee, res.actionGame.BaiCao.revenuePlayGame, res.actionGame.BaiCao.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.BaiCao.moneyWin;
                    total8 += res.actionGame.BaiCao.moneyLost;
                    total9 += res.actionGame.BaiCao.moneyOther;
                    total10 += res.actionGame.BaiCao.fee;
                    total11 += res.actionGame.BaiCao.revenuePlayGame;
                    total12 += res.actionGame.BaiCao.revenue;
                }
                else {
                    result3 += resultSearchTransction("Bài cào", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }
                if (res.actionGame.Poker != null) {

                    result3 += resultSearchTransction("Poker", res.actionGame.Poker.moneyWin, res.actionGame.Poker.moneyLost, res.actionGame.Poker.moneyOther, res.actionGame.Poker.fee, res.actionGame.Poker.revenuePlayGame, res.actionGame.Poker.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.Poker.moneyWin;
                    total8 += res.actionGame.Poker.moneyLost;
                    total9 += res.actionGame.Poker.moneyOther;
                    total10 += res.actionGame.Poker.fee;
                    total11 += res.actionGame.Poker.revenuePlayGame;
                    total12 += res.actionGame.Poker.revenue;
                }
                else {
                    result3 += resultSearchTransction("Poker", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }
				
				  if (res.actionGame.PokerTour != null) {

                    result3 += resultSearchTransction("PokerTour", res.actionGame.PokerTour.moneyWin, res.actionGame.PokerTour.moneyLost, res.actionGame.PokerTour.moneyOther, res.actionGame.PokerTour.fee, res.actionGame.PokerTour.revenuePlayGame, res.actionGame.PokerTour.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.PokerTour.moneyWin;
                    total8 += res.actionGame.PokerTour.moneyLost;
                    total9 += res.actionGame.PokerTour.moneyOther;
                    total10 += res.actionGame.PokerTour.fee;
                    total11 += res.actionGame.PokerTour.revenuePlayGame;
                    total12 += res.actionGame.PokerTour.revenue;
                }
                else {
                    result3 += resultSearchTransction("PokerTour", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }

                if (res.actionGame.Caro != null) {
                    result3 += resultSearchTransction("Caro", res.actionGame.Caro.moneyWin, res.actionGame.Caro.moneyLost, res.actionGame.Caro.moneyOther, res.actionGame.Caro.fee, res.actionGame.Caro.revenuePlayGame, res.actionGame.Caro.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.Caro.moneyWin;
                    total8 += res.actionGame.Caro.moneyLost;
                    total9 += res.actionGame.Caro.moneyOther;
                    total10 += res.actionGame.Caro.fee;
                    total11 += res.actionGame.Caro.revenuePlayGame;
                    total12 += res.actionGame.Caro.revenue;
                } else {
                    result3 += resultSearchTransction("Caro", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }
				if (res.actionGame.CoTuong != null) {
                    result3 += resultSearchTransction("Cờ Tướng", res.actionGame.CoTuong.moneyWin, res.actionGame.CoTuong.moneyLost, res.actionGame.CoTuong.moneyOther, res.actionGame.CoTuong.fee, res.actionGame.CoTuong.revenuePlayGame, res.actionGame.CoTuong.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.CoTuong.moneyWin;
                    total8 += res.actionGame.CoTuong.moneyLost;
                    total9 += res.actionGame.CoTuong.moneyOther;
                    total10 += res.actionGame.CoTuong.fee;
                    total11 += res.actionGame.CoTuong.revenuePlayGame;
                    total12 += res.actionGame.CoTuong.revenue;
                } else {
                    result3 += resultSearchTransction("Cờ Tướng", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }
				 if (res.actionGame.CoUp != null) {
                    result3 += resultSearchTransction("Cờ Úp", res.actionGame.CoUp.moneyWin, res.actionGame.CoUp.moneyLost, res.actionGame.CoUp.moneyOther, res.actionGame.CoUp.fee, res.actionGame.CoUp.revenuePlayGame, res.actionGame.CoUp.revenue);
                    $('#logaction2').html(result3);
                    total7 += res.actionGame.CoUp.moneyWin;
                    total8 += res.actionGame.CoUp.moneyLost;
                    total9 += res.actionGame.CoUp.moneyOther;
                    total10 += res.actionGame.CoUp.fee;
                    total11 += res.actionGame.CoUp.revenuePlayGame;
                    total12 += res.actionGame.CoUp.revenue;
                } else {
                    result3 += resultSearchTransction("Cờ Úp", 0, 0, 0, 0, 0, 0);
                    $('#logaction2').html(result3);
                }
				
				 if(res.actionGame.HamCaMap != null){
                    result4 += resultSearchTransction("Hàm Cá Mập", res.actionGame.HamCaMap.moneyWin, res.actionGame.HamCaMap.moneyLost, res.actionGame.HamCaMap.moneyOther, res.actionGame.HamCaMap.fee, res.actionGame.HamCaMap.revenuePlayGame, res.actionGame.HamCaMap.revenue);
                    $('#logactiongamekhac').html(result4);
                    total19 += res.actionGame.HamCaMap.moneyWin;
                    total20+= res.actionGame.HamCaMap.moneyLost;
                    total21 += res.actionGame.HamCaMap.moneyOther;
                    total22 += res.actionGame.HamCaMap.fee;
                    total23 += res.actionGame.HamCaMap.revenuePlayGame;
                    total24 += res.actionGame.HamCaMap.revenue;
                }else{
                    result4 += resultSearchTransction("Hàm Cá Mập", 0, 0, 0, 0, 0, 0);
                    $('#logactiongamekhac').html(result4);
                }

                if(res.actionGame.ThanBien != null){
                    result4 += resultSearchTransction("Thần Biển", res.actionGame.ThanBien.moneyWin, res.actionGame.ThanBien.moneyLost, res.actionGame.ThanBien.moneyOther, res.actionGame.ThanBien.fee, res.actionGame.ThanBien.revenuePlayGame, res.actionGame.ThanBien.revenue);
                    $('#logactiongamekhac').html(result4);
                    total19 += res.actionGame.ThanBien.moneyWin;
                    total20+= res.actionGame.ThanBien.moneyLost;
                    total21 += res.actionGame.ThanBien.moneyOther;
                    total22 += res.actionGame.ThanBien.fee;
                    total23 += res.actionGame.ThanBien.revenuePlayGame;
                    total24 += res.actionGame.ThanBien.revenue;
                }else{
                    result4 += resultSearchTransction("Thần Biển", 0, 0, 0, 0, 0, 0);
                    $('#logactiongamekhac').html(result4);
                }

                $('#totalmoneywinbai').html(commaSeparateNumber(total7));
                $('#totalmoneylostbai').html(commaSeparateNumber(total8));
                $('#totalmoneyotherbai').html(commaSeparateNumber(total9));
                $('#totalmoneyfeebai').html(commaSeparateNumber(total10));
                $('#totalmoneyplaybai').html(commaSeparateNumber(total11));
                $('#totalmoneybai').html(commaSeparateNumber(total12));
                $('#summoneywin').html(commaSeparateNumber(total1 + total7 + total13 + total19));
                $('#summoneylost').html(commaSeparateNumber(total2 + total8 + total14 + total20));
                $('#sumrefund').html(commaSeparateNumber(totalrefund));
                $('#summoneyother').html(commaSeparateNumber(total3 + total9 + total15+ total21));
                $('#summoneyfee').html(commaSeparateNumber(total4 + total10 + total16+ total22));
                $('#summoneyplay').html(commaSeparateNumber(total5 + total11 + total17+ total23));
                $('#summoney').html(commaSeparateNumber(total6 + total12 + total18 + total24));
				  var table = $('#checkAll1').DataTable({
                    "ordering": true,
                    "searching": false,
                    "paging": false,
                    "draw": false, 
					"bInfo" : false
                });

            }
            var total19 = 0;
            var total20 = 0;
            if ($.isEmptyObject(res.vinInUser)) {
                $("#money1").html(0);
                $("#money2").html(0);
                $("#money3").html(0);
                $("#money4").html(0);
                $("#money5").html(0);
				$("#money555").html(0);
				 $("#money444").html(0);
                $("#money6").html(0);
            } else {
                if (res.vinInUser.RechargeByCard != null || res.vinInUser.RechargeByCard != null) {
                    $("#money1").html(commaSeparateNumber(res.vinInUser.RechargeByCard));
                    total19 += res.vinInUser.RechargeByCard;
                } else {
                    $("#money1").html(0);
                }
                if (res.vinInUser.RechargeByIAP != null || res.vinInUser.RechargeByIAP != null) {
                    $("#money2").html(commaSeparateNumber(res.vinInUser.RechargeByIAP));
                    total19 += res.vinInUser.RechargeByIAP;
                } else {
                    $("#money2").html(0);
                }
                if (res.vinInUser.RechargeBySMS != null || res.vinInUser.RechargeBySMS != null) {
                    $("#money3").html(commaSeparateNumber(res.vinInUser.RechargeBySMS));
                    total19 += res.vinInUser.RechargeBySMS;
                } else {
                    $("#money3").html(0);
                }
                if (res.vinInUser.RechargeByBank != null || res.vinInUser.RechargeByBank != null) {
                    $("#money4").html(commaSeparateNumber(res.vinInUser.RechargeByBank));
                    total19 += res.vinInUser.RechargeByBank;
                } else {
                    $("#money4").html(0);
                }
                if (res.vinInUser.RechargeByVinCard != null || res.vinInUser.RechargeByVinCard != null) {
                    $("#money5").html(commaSeparateNumber(res.vinInUser.RechargeByVinCard));
                    total19 += res.vinInUser.RechargeByVinCard;
                } else {
                    $("#money5").html(0);
                }
				 if (res.vinInUser.RechargeByMegaCard != null || res.vinInUser.RechargeByMegaCard != null) {
                    $("#money555").html(commaSeparateNumber(res.vinInUser.RechargeByMegaCard));
                    total19 += res.vinInUser.RechargeByMegaCard;
                } else {
                    $("#money555").html(0);
                }
				if (res.vinInUser.TopupVTCPay != null || res.vinInUser.TopupVTCPay != null) {
                    $("#money444").html(commaSeparateNumber(res.vinInUser.TopupVTCPay));
                    total19 += res.vinInUser.TopupVTCPay;
                } else {
                    $("#money444").html(0);
                }

                $("#money6").html(commaSeparateNumber(total19));

            }

            if ($.isEmptyObject(res.vinInEvent)) {
                $("#money7").html(0);
                $("#money8").html(0);
                $("#money9").html(0);
				$("#money91").html(0);
                $("#money10").html(0);
                $("#money11").html(0);
                $("#money12").html(0);
                $("#money13").html(0);
                $("#money14").html(0);
                $("#money15").html(0);
                $("#money16").html(0);
                $("#money17").html(0);
                $("#money18").html(0);
                $("#money19").html(0);
                $("#money20").html(0);
				 $("#money200").html(0);
                $("#money21").html(0);

            } else {
                if (res.vinInEvent.GiftCode != null || res.vinInEvent.GiftCode != null) {
                    $("#money7").html(commaSeparateNumber(res.vinInEvent.GiftCode));
                    total20 += res.vinInEvent.GiftCode;
                } else {
                    $("#money7").html(0);
                }
                if (res.vinInEvent.GiftCodeVH != null || res.vinInEvent.GiftCodeVH != null) {
                    $("#money8").html(commaSeparateNumber(res.vinInEvent.GiftCodeVH));
                    total20 += res.vinInEvent.GiftCodeVH;
                } else {
                    $("#money8").html(0);
                }

                if (res.vinInEvent.GiftCodeMKT != null || res.vinInEvent.GiftCodeMKT != null) {
                    $("#money9").html(commaSeparateNumber(res.vinInEvent.GiftCodeMKT));
                    total20 += res.vinInEvent.GiftCodeMKT;
                } else {
                    $("#money9").html(0);
                }
				
				   if (res.vinInEvent.GcAgentImport != null || res.vinInEvent.GcAgentImport != null) {
                    $("#money91").html(commaSeparateNumber(res.vinInEvent.GcAgentImport));
                    total20 += res.vinInEvent.GcAgentImport;
                } else {
                    $("#money91").html(0);
                }
                if (res.vinInEvent.EventVPBonus != null || res.vinInEvent.EventVPBonus != null) {
                    $("#money10").html(commaSeparateNumber(res.vinInEvent.EventVPBonus));
                    total20 += res.vinInEvent.EventVPBonus;
                } else {
                    $("#money10").html(0);
                }
				 if (res.vinInEvent.NhiemVu != null || res.vinInEvent.NhiemVu != null) {
                    $("#money200").html(commaSeparateNumber(res.vinInEvent.NhiemVu));
                    total20 += res.vinInEvent.NhiemVu;
                } else {
                    $("#money200").html(0);
                }
                if (res.vinInEvent.VQMM != null || res.vinInEvent.VQMM != null) {
                    $("#money11").html(commaSeparateNumber(res.vinInEvent.VQMM));
                    total20 += res.vinInEvent.VQMM;
                } else {
                    $("#money11").html(0);
                }
                if (res.vinInEvent.VQVIP != null || res.vinInEvent.VQVIP != null) {
                    $("#money12").html(commaSeparateNumber(res.vinInEvent.VQVIP));
                    total20 += res.vinInEvent.VQVIP;
                } else {
                    $("#money12").html(0);
                }
                if (res.vinInEvent.KhoBauVqFree != null || res.vinInEvent.KhoBauVqFree != null) {
                    $("#money13").html(commaSeparateNumber(res.vinInEvent.KhoBauVqFree));
                    total20 += res.vinInEvent.KhoBauVqFree;
                } else {
                    $("#money13").html(0);
                }
                if (res.vinInEvent.SieuAnhHungVqFree != null || res.vinInEvent.SieuAnhHungVqFree != null) {
                    $("#money14").html(commaSeparateNumber(res.vinInEvent.SieuAnhHungVqFree));
                    total20 += res.vinInEvent.SieuAnhHungVqFree;
                } else {
                    $("#money14").html(0);
                }
                if (res.vinInEvent.NuDiepVienVqFree != null || res.vinInEvent.NuDiepVienVqFree != null) {
                    $("#money15").html(commaSeparateNumber(res.vinInEvent.NuDiepVienVqFree));
                    total20 += res.vinInEvent.NuDiepVienVqFree;
                } else {
                    $("#money15").html(0);
                }
                if (res.vinInEvent.VuongQuocVinVqFree != null || res.vinInEvent.VuongQuocVinVqFree != null) {
                    $("#money16").html(commaSeparateNumber(res.vinInEvent.VuongQuocVinVqFree));
                    total20 += res.vinInEvent.VuongQuocVinVqFree;
                } else {
                    $("#money16").html(0);
                }
                if (res.vinInEvent.CashoutByVP != null || res.vinInEvent.CashoutByVP != null) {
                    $("#money17").html(commaSeparateNumber(res.vinInEvent.CashoutByVP));
                    total20 += res.vinInEvent.CashoutByVP;
                } else {
                    $("#money17").html(0);
                }

                if (res.vinInEvent.RefundFee != null || res.vinInEvent.RefundFee != null) {
                    $("#money18").html(commaSeparateNumber(res.vinInEvent.RefundFee));
                    total20 += res.vinInEvent.RefundFee;
                } else {
                    $("#money18").html(0);
                }
                if (res.vinInEvent.BonusTopDS != null || res.vinInEvent.BonusTopDS != null) {
                    $("#money19").html(commaSeparateNumber(res.vinInEvent.BonusTopDS));
                    total20 += res.vinInEvent.BonusTopDS;
                } else {
                    $("#money19").html(0);
                }
                if (res.vinInEvent.EventVP != null || res.vinInEvent.EventVP != null) {
                    $("#money20").html(commaSeparateNumber(res.vinInEvent.EventVP));
                    total20 += res.vinInEvent.EventVP;
                } else {
                    $("#money20").html(0);
                }
                $("#money21").html(commaSeparateNumber(total20));


            }
            $("#money22").html(commaSeparateNumber(total19 + total20));
            var total21 = 0;
            var total22 = 0;
            var total23 = 0;
            if ($.isEmptyObject(res.vinOutUser)) {
                $("#money23").html(0);
                $("#money24").html(0);
                $("#money25").html(0);
            } else {
                if (res.vinOutUser.CashOutByCard != null || res.vinOutUser.CashOutByCard != null) {
                    $("#money23").html(commaSeparateNumber(res.vinOutUser.CashOutByCard));
                    total21 += res.vinOutUser.CashOutByCard;
                } else {
                    $("#money23").html(0);
                }
                if (res.vinOutUser.CashOutByTopUp != null || res.vinOutUser.CashOutByTopUp != null) {
                    $("#money24").html(commaSeparateNumber(res.vinOutUser.CashOutByTopUp));
                    total21 += res.vinOutUser.CashOutByTopUp;
                } else {
                    $("#money24").html(0);
                }
                $("#money25").html(commaSeparateNumber(total21));

            }
            if ($.isEmptyObject(res.vinOutAgent)) {
                $("#money26").html(0);
                $("#money27").html(0);
                $("#money28").html(0);
            } else {
                if (res.vinOutAgent.agentStart != null || res.vinOutAgent.agentStart != null) {
                    $("#money26").html(commaSeparateNumber(res.vinOutAgent.agentStart));
                    total22 = res.vinOutAgent.agentStart;
                } else {
                    $("#money26").html(0);
                }
                if (res.vinOutAgent.agentEnd != null || res.vinOutAgent.agentEnd != null) {
                    $("#money27").html(commaSeparateNumber(res.vinOutAgent.agentEnd));
                    total23 += res.vinOutAgent.agentEnd;
                } else {
                    $("#money27").html(0);
                }
                $("#money28").html(commaSeparateNumber(total23 - total22));

            }
            $("#money29").html(commaSeparateNumber(total21 + total23 - total22));
            var total24 = 0;
            var total25 = 0;
            var total26 = 0;
			  var total266 = 0;
            if ($.isEmptyObject(res.vinOther)) {
                $("#money30").html(0);
                $("#money31").html(0);
                $("#money32").html(0);
                $("#money33").html(0);
                $("#money34").html(0);
                $("#money35").html(0);
            } else {
                if (res.vinOther.TransferMoney != null || res.vinOther.TransferMoney != null) {
                    $("#money30").html(commaSeparateNumber(res.vinOther.TransferMoney));
                    total24 += res.vinOther.TransferMoney;
                } else {
                    $("#money30").html(0);
                }
                if (res.vinOther.NapXu != null || res.vinOther.NapXu != null) {
                    $("#money31").html(commaSeparateNumber(res.vinOther.NapXu));
                    total24 += res.vinOther.NapXu;
                } else {
                    $("#money31").html(0);
                }
                if (res.vinOther.ChargeSMS != null || res.vinOther.ChargeSMS != null) {
                    $("#money32").html(commaSeparateNumber(res.vinOther.ChargeSMS));
                    total24 += res.vinOther.ChargeSMS;
                } else {
                    $("#money32").html(0);
                }
                if (res.vinOther.Admin != null || res.vinOther.Admin != null) {
                    $("#money33").html(commaSeparateNumber(res.vinOther.Admin));
                    total24 += res.vinOther.Admin;
                } else {
                    $("#money33").html(0);
                }
                if ( res.vinOther.GcAgent != null) {
                    total24 += res.vinOther.GcAgent;
                    total266 += res.vinOther.GcAgent;
                }
                if ( res.vinOther.GcAgentExport != null) {
                    total24 +=  res.vinOther.GcAgentExport;
                    total266 += res.vinOther.GcAgentExport;
                }
                $("#money34").html(commaSeparateNumber(total266));
                $("#money35").html(commaSeparateNumber(total24));

            }
            if ($.isEmptyObject(res.user)) {
                $("#money36").html(0);
                $("#money37").html(0);
                $("#money38").html(0);
            } else {
                if (res.user.userStart != null || res.user.userStart != null) {
                    $("#money36").html(commaSeparateNumber(res.user.userStart));
                    total25 = res.user.userStart;
                } else {
                    $("#money36").html(0);
                }
                if (res.user.userEnd != null || res.user.userEnd != null) {
                    $("#money37").html(commaSeparateNumber(res.user.userEnd));
                    total26 += res.user.userEnd;
                } else {
                    $("#money37").html(0);
                }
                $("#money38").html(commaSeparateNumber(total26 - total25));

            }

            if ($.isEmptyObject(res.bot)) {
                $("#bo1").html(0);
                $("#bot2").html(0);
                $("#bot3").html(0);
            } else {
                if (res.bot.Bot != null || res.bot.Bot != null) {
                    $("#bot1").html(commaSeparateNumber(res.bot.Bot));
                } else {
                    $("#bot1").html(0);
                }
                if (res.bot.Admin != null || res.bot.Admin != null) {
                    $("#bot2").html(commaSeparateNumber(res.bot.Admin));

                } else {
                    $("#bot2").html(0);
                }
                if (res.bot.EventVPBonus != null || res.bot.EventVPBonus != null) {
                    $("#bot3").html(commaSeparateNumber(res.bot.EventVPBonus));
                } else {
                    $("#bot3").html(0);
                }

            }


            var total31 = 0;
            var total32 = 0;
            var total33 = 0;
            var total34 = 0;
            var total35 = 0;
            var total36 = 0;
            var total37 = 0;
            var total38 = 0;
            var total39 = 0;
            var total40 = 0;
            var total41 = 0;
            var total42 = 0;
            var total43 = 0;
            var total44 = 0;
            var total45 = 0;
            var total46 = 0;
            var total47 = 0;
            var total48 = 0;
            var totalrefundbot = 0;
            if (res.taiXiuBot != null || res.taiXiuBot != "") {
                result22 += resultSearchTransctiontaixiu("Tài Xỉu", res.taiXiuBot.moneyWin, res.taiXiuBot.moneyLost,res.taiXiuBot.moneyRefund, res.taiXiuBot.moneyOther, res.taiXiuBot.fee, res.taiXiuBot.revenuePlayGame, res.taiXiuBot.revenue);
                $('#logactionbot1').html(result22);
                total43 += res.taiXiuBot.moneyWin;
                total44 += res.taiXiuBot.moneyLost;
                total45 += res.taiXiuBot.moneyOther;
                total46 += res.taiXiuBot.fee;
                total47 += res.taiXiuBot.revenuePlayGame;
                total48 += res.taiXiuBot.revenue;
                totalrefundbot = res.taiXiuBot.moneyRefund;
            } else {
                result22 += resultSearchTransction("Tài Xỉu", 0, 0, 0, 0, 0, 0);
                $('#logactionbot1').html(result22);
            }

            if (res.actionGameBot != null || res.actionGameBot != "") {
                if (res.actionGameBot.MiniPoker != null) {
                    result22 += resultSearchTransction("MiniPoker", res.actionGameBot.MiniPoker.moneyWin, res.actionGameBot.MiniPoker.moneyLost, res.actionGameBot.MiniPoker.moneyOther, res.actionGameBot.MiniPoker.fee, res.actionGameBot.MiniPoker.revenuePlayGame, res.actionGameBot.MiniPoker.revenue);
                    $('#logactionbot1').html(result22);
                    total31 += res.actionGameBot.MiniPoker.moneyWin;
                    total32 += res.actionGameBot.MiniPoker.moneyLost;
                    total33 += res.actionGameBot.MiniPoker.moneyOther;
                    total34 += res.actionGameBot.MiniPoker.fee;
                    total35 += res.actionGameBot.MiniPoker.revenuePlayGame;
                    total36 += res.actionGameBot.MiniPoker.revenue;

                } else {
                    result22 += resultSearchTransction("MiniPoker", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot1').html(result22);
                }
                if (res.actionGameBot.CaoThap != null) {
                    result22 += resultSearchTransction("Cao Thấp", res.actionGameBot.CaoThap.moneyWin, res.actionGameBot.CaoThap.moneyLost, res.actionGameBot.CaoThap.moneyOther, res.actionGameBot.CaoThap.fee, res.actionGameBot.CaoThap.revenuePlayGame, res.actionGameBot.CaoThap.revenue);
                    $('#logactionbot1').html(result22);
                    total31 += res.actionGameBot.CaoThap.moneyWin;
                    total32 += res.actionGameBot.CaoThap.moneyLost;
                    total33 += res.actionGameBot.CaoThap.moneyOther;
                    total34 += res.actionGameBot.CaoThap.fee;
                    total35 += res.actionGameBot.CaoThap.revenuePlayGame;
                    total36 += res.actionGameBot.CaoThap.revenue;

                } else {
                    result22 += resultSearchTransction("Cao Thấp", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot1').html(result22);
                }
                if (res.actionGameBot.BauCua != null) {
                    result22 += resultSearchTransction("Bầu Cua", res.actionGameBot.BauCua.moneyWin, res.actionGameBot.BauCua.moneyLost, res.actionGameBot.BauCua.moneyOther, res.actionGameBot.BauCua.fee, res.actionGameBot.BauCua.revenuePlayGame, res.actionGameBot.BauCua.revenue);
                    $('#logactionbot1').html(result22);
                    total31 += res.actionGameBot.BauCua.moneyWin;
                    total32 += res.actionGameBot.BauCua.moneyLost;
                    total33 += res.actionGameBot.BauCua.moneyOther;
                    total34 += res.actionGameBot.BauCua.fee;
                    total35 += res.actionGameBot.BauCua.revenuePlayGame;
                    total36 += res.actionGameBot.BauCua.revenue;
                } else {
                    result22 += resultSearchTransction("Bầu Cua", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot1').html(result22);
                }
                if (res.actionGameBot.PokeGo != null) {
                    result22 += resultSearchTransction("PokeGo", res.actionGameBot.PokeGo.moneyWin, res.actionGameBot.PokeGo.moneyLost, res.actionGameBot.PokeGo.moneyOther, res.actionGameBot.PokeGo.fee, res.actionGameBot.PokeGo.revenuePlayGame, res.actionGameBot.PokeGo.revenue);
                    $('#logactionbot1').html(result22);
                    total31 += res.actionGameBot.PokeGo.moneyWin;
                    total32 += res.actionGameBot.PokeGo.moneyLost;
                    total33 += res.actionGameBot.PokeGo.moneyOther;
                    total34 += res.actionGameBot.PokeGo.fee;
                    total35 += res.actionGameBot.PokeGo.revenuePlayGame;
                    total36 += res.actionGameBot.PokeGo.revenue;
                } else {
                    result22 += resultSearchTransction("PokeGo", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot1').html(result22);
                }
                if (res.actionGameBot.KhoBau != null) {
                    result22 += resultSearchTransction("Kho Báu", res.actionGameBot.KhoBau.moneyWin, res.actionGameBot.KhoBau.moneyLost, res.actionGameBot.KhoBau.moneyOther, res.actionGameBot.KhoBau.fee, res.actionGameBot.KhoBau.revenuePlayGame, res.actionGameBot.KhoBau.revenue);
                    $('#logactionbot1').html(result22);
                    total31 += res.actionGameBot.KhoBau.moneyWin;
                    total32 += res.actionGameBot.KhoBau.moneyLost;
                    total33 += res.actionGameBot.KhoBau.moneyOther;
                    total34 += res.actionGameBot.KhoBau.fee;
                    total35 += res.actionGameBot.KhoBau.revenuePlayGame;
                    total36 += res.actionGameBot.KhoBau.revenue;
                } else {
                    result22 += resultSearchTransction("Kho Báu", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot1').html(result22);
                }
                if (res.actionGameBot.SieuAnhHung != null) {
                    result22 += resultSearchTransction("Siêu Anh Hùng", res.actionGameBot.SieuAnhHung.moneyWin, res.actionGameBot.SieuAnhHung.moneyLost, res.actionGameBot.SieuAnhHung.moneyOther, res.actionGameBot.SieuAnhHung.fee, res.actionGameBot.SieuAnhHung.revenuePlayGame, res.actionGameBot.SieuAnhHung.revenue);
                    $('#logactionbot1').html(result22);
                    total31 += res.actionGameBot.SieuAnhHung.moneyWin;
                    total32 += res.actionGameBot.SieuAnhHung.moneyLost;
                    total33 += res.actionGameBot.SieuAnhHung.moneyOther;
                    total34 += res.actionGameBot.SieuAnhHung.fee;
                    total35 += res.actionGameBot.SieuAnhHung.revenuePlayGame;
                    total36 += res.actionGameBot.SieuAnhHung.revenue;
                } else {
                    result22 += resultSearchTransction("Siêu Anh Hùng", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot1').html(result22);
                }
//                if (res.actionGameBot.MyNhanNgu != null) {
//                    result22 += resultSearchTransction("Mỹ Nhân Ngư", res.actionGameBot.MyNhanNgu.moneyWin, res.actionGameBot.MyNhanNgu.moneyLost, res.actionGameBot.MyNhanNgu.moneyOther, res.actionGameBot.MyNhanNgu.fee, res.actionGameBot.MyNhanNgu.revenuePlayGame, res.actionGameBot.MyNhanNgu.revenue);
//                    $('#logactionbot1').html(result22);
//                    total31 += res.actionGameBot.MyNhanNgu.moneyWin;
//                    total32 += res.actionGameBot.MyNhanNgu.moneyLost;
//                    total33 += res.actionGameBot.MyNhanNgu.moneyOther;
//                    total34 += res.actionGameBot.MyNhanNgu.fee;
//                    total35 += res.actionGameBot.MyNhanNgu.revenuePlayGame;
//                    total36 += res.actionGameBot.MyNhanNgu.revenue;
//                }
//                else {
//                    result22 += resultSearchTransction("Mỹ Nhân Ngư", 0, 0, 0, 0, 0, 0);
//                    $('#logactionbot1').html(result22);
//                }
                if (res.actionGameBot.NuDiepVien != null) {
                    result22 += resultSearchTransction("Nữ Điệp Viên", res.actionGameBot.NuDiepVien.moneyWin, res.actionGameBot.NuDiepVien.moneyLost, res.actionGameBot.NuDiepVien.moneyOther, res.actionGameBot.NuDiepVien.fee, res.actionGameBot.NuDiepVien.revenuePlayGame, res.actionGameBot.NuDiepVien.revenue);
                    $('#logactionbot1').html(result22);
                    total31 += res.actionGameBot.NuDiepVien.moneyWin;
                    total32 += res.actionGameBot.NuDiepVien.moneyLost;
                    total33 += res.actionGameBot.NuDiepVien.moneyOther;
                    total34 += res.actionGameBot.NuDiepVien.fee;
                    total35 += res.actionGameBot.NuDiepVien.revenuePlayGame;
                    total36 += res.actionGameBot.NuDiepVien.revenue;
                } else {
                    result22 += resultSearchTransction("Nữ Điệp Viên", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot1').html(result22);
                }
				
				if (res.actionGameBot.VuongQuocVin != null) {
                    result22 += resultSearchTransction("Vương Quốc Vin", res.actionGameBot.VuongQuocVin.moneyWin, res.actionGameBot.VuongQuocVin.moneyLost, res.actionGameBot.VuongQuocVin.moneyOther, res.actionGameBot.VuongQuocVin.fee, res.actionGameBot.VuongQuocVin.revenuePlayGame, res.actionGameBot.VuongQuocVin.revenue);
                    $('#logactionbot1').html(result22);
                    total31 += res.actionGameBot.VuongQuocVin.moneyWin;
                    total32 += res.actionGameBot.VuongQuocVin.moneyLost;
                    total33 += res.actionGameBot.VuongQuocVin.moneyOther;
                    total34 += res.actionGameBot.VuongQuocVin.fee;
                    total35 += res.actionGameBot.VuongQuocVin.revenuePlayGame;
                    total36 += res.actionGameBot.VuongQuocVin.revenue;
                } else {
                    result22 += resultSearchTransction("Vương Quốc Vin", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot1').html(result22);
                }
                $('#totalmoneywinbot').html(commaSeparateNumber(total31+total43));
                $('#totalmoneylostbot').html(commaSeparateNumber(total32+total44));
                $('#totalrefundbot').html(commaSeparateNumber(totalrefundbot));

                $('#totalmoneyotherbot').html(commaSeparateNumber(total33+total45));
                $('#totalmoneyfeebot').html(commaSeparateNumber(total34+total46));
                $('#totalmoneyplaybot').html(commaSeparateNumber(total35+total47));
                $('#totalmoneybot').html(commaSeparateNumber(total36+total48));
                if (res.actionGameBot.Sam != null) {
                    result33 += resultSearchTransction("Sâm", res.actionGameBot.Sam.moneyWin, res.actionGameBot.Sam.moneyLost, res.actionGameBot.Sam.moneyOther, res.actionGameBot.Sam.fee, res.actionGameBot.Sam.revenuePlayGame, res.actionGameBot.Sam.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.Sam.moneyWin;
                    total38 += res.actionGameBot.Sam.moneyLost;
                    total39 += res.actionGameBot.Sam.moneyOther;
                    total40 += res.actionGameBot.Sam.fee;
                    total41 += res.actionGameBot.Sam.revenuePlayGame;
                    total42 += res.actionGameBot.Sam.revenue;
                }
                else {
                    result33 += resultSearchTransction("Sâm", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
                }
                if (res.actionGameBot.BaCay != null) {
                    result33 += resultSearchTransction("Ba Cây", res.actionGameBot.BaCay.moneyWin, res.actionGameBot.BaCay.moneyLost, res.actionGameBot.BaCay.moneyOther, res.actionGameBot.BaCay.fee, res.actionGameBot.BaCay.revenuePlayGame, res.actionGameBot.BaCay.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.BaCay.moneyWin;
                    total38 += res.actionGameBot.BaCay.moneyLost;
                    total39 += res.actionGameBot.BaCay.moneyOther;
                    total40 += res.actionGameBot.BaCay.fee;
                    total41 += res.actionGameBot.BaCay.revenuePlayGame;
                    total42 += res.actionGameBot.BaCay.revenue;
                }
                else {
                    result33 += resultSearchTransction("Ba Cây", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
                }
                if (res.actionGameBot.Binh != null) {
                    result33 += resultSearchTransction("Binh", res.actionGameBot.Binh.moneyWin, res.actionGameBot.Binh.moneyLost, res.actionGameBot.Binh.moneyOther, res.actionGameBot.Binh.fee, res.actionGameBot.Binh.revenuePlayGame, res.actionGameBot.Binh.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.Binh.moneyWin;
                    total38 += res.actionGameBot.Binh.moneyLost;
                    total39 += res.actionGameBot.Binh.moneyOther;
                    total40 += res.actionGameBot.Binh.fee;
                    total41 += res.actionGameBot.Binh.revenuePlayGame;
                    total42 += res.actionGameBot.Binh.revenue;
                } else {
                    result33 += resultSearchTransction("Binh", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
                }
                if (res.actionGameBot.Tlmn != null) {
                    result33 += resultSearchTransction("Tiến Lên Miền Nam", res.actionGameBot.Tlmn.moneyWin, res.actionGameBot.Tlmn.moneyLost, res.actionGameBot.Tlmn.moneyOther, res.actionGameBot.Tlmn.fee, res.actionGameBot.Tlmn.revenuePlayGame, res.actionGameBot.Tlmn.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.Tlmn.moneyWin;
                    total38 += res.actionGameBot.Tlmn.moneyLost;
                    total39 += res.actionGameBot.Tlmn.moneyOther;
                    total40 += res.actionGameBot.Tlmn.fee;
                    total41 += res.actionGameBot.Tlmn.revenuePlayGame;
                    total42 += res.actionGameBot.Tlmn.revenue;
                }
                else {
                    result33 += resultSearchTransction("Tiến lên miền nam", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
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
                if (res.actionGameBot.Lieng != null) {

                    result33 += resultSearchTransction("Liêng", res.actionGameBot.Lieng.moneyWin, res.actionGameBot.Lieng.moneyLost, res.actionGameBot.Lieng.moneyOther, res.actionGameBot.Lieng.fee, res.actionGameBot.Lieng.revenuePlayGame, res.actionGameBot.Lieng.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.Lieng.moneyWin;
                    total38 += res.actionGameBot.Lieng.moneyLost;
                    total39 += res.actionGameBot.Lieng.moneyOther;
                    total40 += res.actionGameBot.Lieng.fee;
                    total41 += res.actionGameBot.Lieng.revenuePlayGame;
                    total42 += res.actionGameBot.Lieng.revenue;
                }
                else {
                    result33 += resultSearchTransction("Liêng", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
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
                if (res.actionGameBot.BaiCao != null) {

                    result33 += resultSearchTransction("Bài Cào", res.actionGameBot.BaiCao.moneyWin, res.actionGameBot.BaiCao.moneyLost, res.actionGameBot.BaiCao.moneyOther, res.actionGameBot.BaiCao.fee, res.actionGameBot.BaiCao.revenuePlayGame, res.actionGameBot.BaiCao.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGame.BaiCao.moneyWin;
                    total38 += res.actionGame.BaiCao.moneyLost;
                    total39 += res.actionGame.BaiCao.moneyOther;
                    total40 += res.actionGame.BaiCao.fee;
                    total41 += res.actionGame.BaiCao.revenuePlayGame;
                    total42 += res.actionGame.BaiCao.revenue;
                }
                else {
                    result33 += resultSearchTransction("Bài cào", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
                }
                if (res.actionGameBot.Poker != null) {

                    result33 += resultSearchTransction("Poker", res.actionGameBot.Poker.moneyWin, res.actionGameBot.Poker.moneyLost, res.actionGameBot.Poker.moneyOther, res.actionGameBot.Poker.fee, res.actionGameBot.Poker.revenuePlayGame, res.actionGameBot.Poker.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.Poker.moneyWin;
                    total38 += res.actionGameBot.Poker.moneyLost;
                    total39 += res.actionGameBot.Poker.moneyOther;
                    total40 += res.actionGameBot.Poker.fee;
                    total41 += res.actionGameBot.Poker.revenuePlayGame;
                    total42 += res.actionGameBot.Poker.revenue;
                }
                else {
                    result33 += resultSearchTransction("Poker", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
                }
				 if (res.actionGameBot.XiDzach != null) {

                    result33 += resultSearchTransction("XiDzach", res.actionGameBot.XiDzach.moneyWin, res.actionGameBot.XiDzach.moneyLost, res.actionGameBot.XiDzach.moneyOther, res.actionGameBot.XiDzach.fee, res.actionGameBot.XiDzach.revenuePlayGame, res.actionGameBot.XiDzach.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.XiDzach.moneyWin;
                    total38 += res.actionGameBot.XiDzach.moneyLost;
                    total39 += res.actionGameBot.XiDzach.moneyOther;
                    total40 += res.actionGameBot.XiDzach.fee;
                    total41 += res.actionGameBot.XiDzach.revenuePlayGame;
                    total42 += res.actionGameBot.XiDzach.revenue;
                }
                else {
                    result33 += resultSearchTransction("XiDzach", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
                }
				 if (res.actionGameBot.XocDia != null) {

                    result33 += resultSearchTransction("Xóc Đĩa", res.actionGameBot.XocDia.moneyWin, res.actionGameBot.XocDia.moneyLost, res.actionGameBot.XocDia.moneyOther, res.actionGameBot.XocDia.fee, res.actionGameBot.XocDia.revenuePlayGame, res.actionGameBot.XocDia.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.XocDia.moneyWin;
                    total38 += res.actionGameBot.XocDia.moneyLost;
                    total39 += res.actionGameBot.XocDia.moneyOther;
                    total40 += res.actionGameBot.XocDia.fee;
                    total41 += res.actionGameBot.XocDia.revenuePlayGame;
                    total42 += res.actionGameBot.XocDia.revenue;
                }
                else {
                    result33 += resultSearchTransction("Xóc Đĩa", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
                }

                if (res.actionGameBot.Caro != null) {
                    result33 += resultSearchTransction("Caro", res.actionGameBot.Caro.moneyWin, res.actionGameBot.Caro.moneyLost, res.actionGameBot.Caro.moneyOther, res.actionGameBot.Caro.fee, res.actionGameBot.Caro.revenuePlayGame, res.actionGameBot.Caro.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.Caro.moneyWin;
                    total38 += res.actionGameBot.Caro.moneyLost;
                    total39 += res.actionGameBot.Caro.moneyOther;
                    total40 += res.actionGameBot.Caro.fee;
                    total41 += res.actionGameBot.Caro.revenuePlayGame;
                    total42 += res.actionGameBot.Caro.revenue;
                } else {
                    result33 += resultSearchTransction("Caro", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
                }
				if (res.actionGameBot.CoTuong != null) {
                    result33 += resultSearchTransction("Cờ Tướng", res.actionGameBot.CoTuong.moneyWin, res.actionGameBot.CoTuong.moneyLost, res.actionGameBot.CoTuong.moneyOther, res.actionGameBot.CoTuong.fee, res.actionGameBot.CoTuong.revenuePlayGame, res.actionGameBot.CoTuong.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.CoTuong.moneyWin;
                    total38 += res.actionGameBot.CoTuong.moneyLost;
                    total39 += res.actionGameBot.CoTuong.moneyOther;
                    total40 += res.actionGameBot.CoTuong.fee;
                    total41 += res.actionGameBot.CoTuong.revenuePlayGame;
                    total42 += res.actionGameBot.CoTuong.revenue;
                } else {
                    result33 += resultSearchTransction("Cờ Tướng", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
                }
				if (res.actionGameBot.CoUp != null) {
                    result33 += resultSearchTransction("Cờ Úp", res.actionGameBot.CoUp.moneyWin, res.actionGameBot.CoUp.moneyLost, res.actionGameBot.CoUp.moneyOther, res.actionGameBot.CoUp.fee, res.actionGameBot.CoUp.revenuePlayGame, res.actionGameBot.CoUp.revenue);
                    $('#logactionbot2').html(result33);
                    total37 += res.actionGameBot.CoUp.moneyWin;
                    total38 += res.actionGameBot.CoUp.moneyLost;
                    total39 += res.actionGameBot.CoUp.moneyOther;
                    total40 += res.actionGameBot.CoUp.fee;
                    total41 += res.actionGameBot.CoUp.revenuePlayGame;
                    total42 += res.actionGameBot.CoUp.revenue;
                } else {
                    result33 += resultSearchTransction("Cờ Úp", 0, 0, 0, 0, 0, 0);
                    $('#logactionbot2').html(result33);
                }
                $('#totalmoneywinbaibot').html(commaSeparateNumber(total37));
                $('#totalmoneylostbaibot').html(commaSeparateNumber(total38));
                $('#totalmoneyotherbaibot').html(commaSeparateNumber(total39));
                $('#totalmoneyfeebaibot').html(commaSeparateNumber(total40));
                $('#totalmoneyplaybaibot').html(commaSeparateNumber(total41));
                $('#totalmoneybaibot').html(commaSeparateNumber(total42));
                $('#summoneywinbot').html(commaSeparateNumber(total31 + total37 + total43));
                $('#summoneylostbot').html(commaSeparateNumber(total32 + total38 + total44));
                $('#sumrefundbot').html(commaSeparateNumber(totalrefundbot));
                $('#summoneyotherbot').html(commaSeparateNumber(total33 + total39 + total45));
                $('#summoneyfeebot').html(commaSeparateNumber(total34 + total40 + total46));
                $('#summoneyplaybot').html(commaSeparateNumber(total35 + total41 + total47));
                $('#summoneybot').html(commaSeparateNumber(total36 + total42 + total48));

            }
            result44 += resulttotal(res.totalInUser, res.totalInEvent, res.totalIn, res.totalOutUser, res.totalOutAgent,res.totalOut, res.ratioCashout, res.totalInAgent);
            $('#logactiontotal').html(result44);

        }, error: function () {
            $("#spinner").hide();
            $("#error-popup").modal("show");
        }, timeout: 40000
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