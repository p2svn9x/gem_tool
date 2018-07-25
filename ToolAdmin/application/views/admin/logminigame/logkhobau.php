<?php $this->load->view('admin/logminigame/head', $this->data) ?>
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
    <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
    <div class="widget">
        <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
        <div class="title">
            <h6>Log kho báu</h6>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('logminigame/logkhobau') ?>" method="post">
            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" id="toDate" name="toDate" value="<?php echo $this->input->post('toDate')?>"> <span class="input-group-addon">
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
                                <input type="text" id="fromDate" name="fromDate" value="<?php echo $this->input->post('fromDate')?>"> <span class="input-group-addon">
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
                        <td><label  style="margin-left: 70px;margin-bottom:-2px;width: 80px;">Phiên:</label></td>
                        <td ><input type="text" style="margin-left: 0px;margin-bottom:-2px;width: 150px"  id="phienbc" value="<?php echo $this->input->post('phienbc') ?>" name="phienbc"></td>

                        <td><label  id = "labelvin" style="margin-left: 75px;margin-bottom:-2px;width: 80px;">Nickname:</label></td>

                        <td ><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"  id="name" value="<?php echo $this->input->post('name') ?>" name="name"></td>

                    </tr>
                </table>
            </div>
            <div class="formRow">
                <table>
                    <tr>
                        <td><label  id = "labelvin" style="margin-left: 65px;margin-bottom:-2px;width: 75px;">Phòng vin:</label></td>

                        <td><select id="menhgiavin" name="menhgiavin"
                                    style="margin-left: 10px;margin-bottom:-2px;width: 150px;">
                                <option value="" <?php if($this->input->post('menhgiavin')== "" ){echo "selected";} ?> >Chọn</option>
                                <option value="100" <?php if($this->input->post('menhgiavin')== "100" ){echo "selected";} ?>>100 Vin</option>
                                <option value="1000" <?php if($this->input->post('menhgiavin')== "1000" ){echo "selected";} ?>>1K Vin</option>
                                <option value="10000" <?php if($this->input->post('menhgiavin')== "10000" ){echo "selected";} ?>>10K Vin</option>
                            </select></td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 40px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('logminigame/logkhobau') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="formRow"></div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td>STT</td>
                <td>Phiên</td>
                <td>Nickname</td>
                <td>Phòng</td>
                <td>Dòng đặt</td>
                <td>Dòng thắng</td>
                <td>Tiền thưởng</td>
                <td>Tổng thưởng</td>
                <td>Kết quả</td>

                <td>Thời gian</td>
            </tr>
            </thead>
            <tbody id="logaction">
            </tbody>
        </table>

    </div>
</div>
<?php endif; ?>
<style>
    td{
        word-break: break-all;
    }
    thead{
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
        format: 'HH:mm:ss DD-MM-YYYY'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'HH:mm:ss DD-MM-YYYY'
    });

});
$("#search_tran").click(function () {
    var fromDatetime = $("#toDate").val();
    var toDatetime = $("#fromDate").val();
    if (fromDatetime > toDatetime) {
        alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
        return false;
    }
})
function resultlogpokego(stt,referid,nickname,room,linebet,linewin,prizeline,prize,result,time_log) {
    var rs = "";
    rs += "<tr>";
    rs += "<td>" + stt + "</td>";
    rs += "<td>" + referid + "</td>";
    rs += "<td>" + nickname + "</td>";
    rs += "<td>" + room + "</td>";
    rs += "<td class='col-sm-2'>" + linebet + "</td>";
    rs += "<td class='col-sm-2'>" + linewin + "</td>";
    rs += "<td class='col-sm-2'>" + prizeline + "</td>";
    rs += "<td>" + commaSeparateNumber(prize) + "</td>";
    rs += "<td>" + resultpokego(result) + "</td>";
    rs += "<td>" + time_log + "</td>";
    rs += "</tr>";
    return rs;
}
$(document).ready(function () {
	   $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
})
$("#search_tran").click(function () {
    var result = "";
    var oldpage = 0;
    $('#pagination-demo').css("display", "block");
    $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('logminigame/logkhobauajax')?>",
            data: {
                phienbc: $("#phienbc").val(),
                nickname: $("#name").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                roomvin: $("#menhgiavin").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					 $('#logaction').html("");
                } else {
                    var totalPage = result.total;
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultlogpokego(stt, value.reference_id, value.user_name, value.bet_value, value.lines_betting, value.lines_win, value.prizes_on_line, value.prize, value.result, value.time_log);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldpage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('logminigame/logkhobauajax')?>",
                                    data: {

                                        phienbc: $("#phienbc").val(),
                                        nickname: $("#name").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        roomvin: $("#menhgiavin").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultlogpokego(stt, value.reference_id, value.user_name, value.bet_value, value.lines_betting, value.lines_win, value.prizes_on_line, value.prize, value.result, value.time_log);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }
                                });
                            }
                            oldpage = page;
                        }
                    });

                }
            }
        })
});
function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }
    return val;
}

function resultpokego(count) {
    var strresult;
    switch (count) {
        case 0:
            strresult = "Trượt";
            break;
        case 1:
            strresult = "Thắng";
            break;
        case 2:
            strresult = "Thắng lớn";
            break;
        case 3:
            strresult = "Nổ hũ";
            break;
        case 4:
            strresult = "Nổ hũ x2";
            break;
        case 5:
            strresult = "Mini kho báu";
            break;
        case 100:
            strresult = "Lỗi hệ thống";
            break;
        case 101:
            strresult = "Đặt cược không hợp lệ";
            break;
        case 102:
            strresult = "Không đủ tiền";
            break;
    }
    return strresult;
}
</script>
