<?php $this->load->view('admin/giftcode/head', $this->data) ?>
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

    <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
<div class="wrapper">
    <div class="widget">
        <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
        <div class="title">
            <h6>Thống kê giftcode</h6>

        </div>
        <form class="list_filter form" >
            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 70px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" id="toDate" name="toDate" value="<?php echo $this->input->post('toDate') ?>"> <span class="input-group-addon">
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
                                <input type="text" id="fromDate" name="fromDate" value="<?php echo $this->input->post('fromDate') ?>"> <span class="input-group-addon">
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
                        <td>
                            <label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tìm theo:</label>
                        </td>
                        <td>
                            <select name="filterdate"  id="filterdate"  style="margin-left: 20px;width:138px">
                                <option value="1" <?php if ($this->input->post("filterdate") == "1") {echo "selected";} ?>>Ngày tạo</option>
                                <option value="2" <?php if ($this->input->post("filterdate") == "2") {echo "selected";} ?>>Ngày sử dụng</option>
                            </select>
                        </td>
                        <td>
                            <label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Nguồn xuất:</label></td>
                        <td class="item">
                            <select id="nguonxuat" name="nguonxuat"
                                    style="margin-left: 13px;margin-bottom:-2px;width: 150px">
                                <option value="" <?php if($this->input->post("nguonxuat")== ""){echo "selected";}  ?>>Chọn</option>
                                <?php foreach($source as $row): ?>
                                    <option value="<?php echo $row->key ?>" <?php if($this->input->post("nguonxuat")==  $row->key){echo "selected";}  ?>><?php echo $row->name ?></option>
                                <?php endforeach; ?>


                            </select>
                        </td>


                    </tr>
                </table>

        </div>
            <div class="formRow">
                <table>
                    <tr>
                        <td><label style="margin-left: 84px;margin-bottom:-2px;width: 64px">Tiền:</label></td>
                        <td class="">
                            <select id="money" name="money"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 150px">
                                <option value="1">Vin</option>

                            </select>
                        </td>

                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 55px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('giftcode/giftcodemktuse') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                    </table>
                </div>
            <div class="formRow">
                </div>
        </form>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <tbody id="reportvt">
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>
<div class="pagination">
    <div id="pagination"></div>
</div>
<h1 id="resultsearch" style="position: absolute;top: 50%;left: 50%"></h1>
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
    }
    .tdmoney {
        text-align: right;
    }
</style>
<script>

$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
});
$("#search_tran").click(function () {
    var fromDatetime = $("#toDate").val();
    var toDatetime = $("#fromDate").val();
    if (fromDatetime > toDatetime) {
        alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
        return false;
    }
    if($("#money").val() == 1){
        giftcodevin();
    }else if($("#money").val() == 0){
        giftcodexu();
    }

});

$(document).ready(function () {
    $("#toDate").val(getFirtDayOfMonth());
    $("#fromDate").val(getLastDayOfMonth());
    giftcodevin();
});
function giftcodexu(){
    var result = "";
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
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('giftcode/giftcodemktuseajax')?>",
        data: {
            toDate: $("#toDate").val(),
            fromDate: $("#fromDate").val(),
            money: $("#money").val(),
            source: $("#nguonxuat").val(),
            filterdate: $("#filterdate").val()
        },
        dataType: 'json',
        success: function (result1) {
            $("#spinner").hide();
            $("#resultsearch").html("");
            var ii = 2;
            $.each(result1.trans[1].trans, function (index, value) {
                ii++;
            });
            var jj = 2;
            $.each(result1.trans[3].trans, function (index, value) {
                jj++;
            });
            var kk = 2;
            $.each(result1.trans[5].trans, function (index, value) {
                kk++;
            });
            result += "<tr>";
            result += "<td colspan='1'></td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Mệnhgiá" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Số lượng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã dùng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tổng tiền đã dùng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã khóa" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Còn lại" + "</td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+ii+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Đại lý" + "</td>";
            result += "</tr>";
            for( var i = result1.trans[1].trans.length - 1; i >=0 ;i-- ){
                result += resultgiftcode(result1.trans[1].trans[i].faceValue, result1.trans[1].trans[i].quantity, result1.trans[1].trans[i].used,result1.trans[1].trans[i].lock);
                total1 += result1.trans[1].trans[i].quantity;
                total2 += result1.trans[1].trans[i].used;
                total3 += result1.trans[1].trans[i].lock;
                total10 +=  result1.trans[1].trans[i].used*result1.trans[1].trans[i].faceValue
            }
            result += sumresult(total1,total2,total3,total10);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+jj+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Marketing" + "</td>";
            result += "</tr>";
            for( var j = result1.trans[3].trans.length - 1; j >=0 ;j-- ){
                result += resultgiftcode(result1.trans[3].trans[j].faceValue, result1.trans[3].trans[j].quantity, result1.trans[3].trans[j].used,result1.trans[3].trans[j].lock);
                total4 += result1.trans[3].trans[j].quantity;
                total5 += result1.trans[3].trans[j].used;
                total6 += result1.trans[3].trans[j].lock;
                total11 +=  result1.trans[3].trans[j].used*result1.trans[3].trans[j].faceValue

            }
            result += sumresult(total4,total5,total6,total11);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+kk+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vận hành" + "</td>";
            result += "</tr>";
            for( var k = result1.trans[5].trans.length - 1; k >=0 ;k-- ){
                result += resultgiftcode(result1.trans[5].trans[k].faceValue, result1.trans[5].trans[k].quantity, result1.trans[5].trans[k].used,result1.trans[5].trans[k].lock);
                total7 += result1.trans[5].trans[k].quantity;
                total8 += result1.trans[5].trans[k].used;
                total9 += result1.trans[5].trans[k].lock;
                total12 +=  result1.trans[5].trans[k].used*result1.trans[5].trans[k].faceValue
            }

            result += sumresult(total7,total8,total9,total12);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += sumresulttong(total1+total4+total7, total2+total5+total8,total3+total6+total9,total10+total11+total12);
            $('#reportvt').html(result);
        }, error: function () {
            $("#spinner").hide();
            $("#resultsearch").html("Hệ thống quá tải.Vui lòng thử lại");
            $('#reportvt').html("");
        }, timeout: 40000
    });
}
function giftcodevin(){
    var result = "";
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
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('giftcode/giftcodemktuseajax')?>",
        data: {
            toDate: $("#toDate").val(),
            fromDate: $("#fromDate").val(),
            money: $("#money").val(),
            source: $("#nguonxuat").val(),
            filterdate: $("#filterdate").val()
        },
        dataType: 'json',
        success: function (result1) {
            $("#spinner").hide();
            $("#resultsearch").html("");
            var ii = 2;
            $.each(result1.trans[0].trans, function (index, value) {
                ii++;
            });
            var jj = 2;
            $.each(result1.trans[2].trans, function (index, value) {
                jj++;
            });
            var kk = 2;
            $.each(result1.trans[4].trans, function (index, value) {
                kk++;
            });
            result += "<tr>";
            result += "<td colspan='1'></td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Mệnhgiá" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Số lượng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã dùng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tổng tiền đã dùng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã khóa" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Còn lại" + "</td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+ii+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Đại lý" + "</td>";
            result += "</tr>";
            for( var i = result1.trans[0].trans.length - 1; i >=0 ;i-- ){
                result += resultgiftcode(result1.trans[0].trans[i].faceValue, result1.trans[0].trans[i].quantity, result1.trans[0].trans[i].used,result1.trans[0].trans[i].lock);
                total1 += result1.trans[0].trans[i].quantity;
                total2 += result1.trans[0].trans[i].used;
                total3 += result1.trans[0].trans[i].lock;
                total10 +=  result1.trans[0].trans[i].used*result1.trans[0].trans[i].faceValue
            }
            result += sumresult(total1,total2,total3,total10);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+jj+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Marketing" + "</td>";
            result += "</tr>";
            for( var j = result1.trans[2].trans.length - 1; j >=0 ;j-- ){
                result += resultgiftcode(result1.trans[2].trans[j].faceValue, result1.trans[2].trans[j].quantity, result1.trans[2].trans[j].used,result1.trans[2].trans[j].lock);
                total4 += result1.trans[2].trans[j].quantity;
                total5 += result1.trans[2].trans[j].used;
                total6 += result1.trans[2].trans[j].lock;
                total11 +=  result1.trans[2].trans[j].used*result1.trans[2].trans[j].faceValue

            }
            result += sumresult(total4,total5,total6,total11);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+kk+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vận hành" + "</td>";
            result += "</tr>";
            for( var k = result1.trans[4].trans.length - 1; k >=0 ;k-- ){
                result += resultgiftcode(result1.trans[4].trans[k].faceValue, result1.trans[4].trans[k].quantity, result1.trans[4].trans[k].used,result1.trans[4].trans[k].lock);
                total7 += result1.trans[4].trans[k].quantity;
                total8 += result1.trans[4].trans[k].used;
                total9 += result1.trans[4].trans[k].lock;
                total12 +=  result1.trans[4].trans[k].used*result1.trans[4].trans[k].faceValue
            }

            result += sumresult(total7,total8,total9,total12);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += sumresulttong(total1+total4+total7, total2+total5+total8,total3+total6+total9,total10+total11+total12);
            $('#reportvt').html(result);
        }, error: function () {
            $("#spinner").hide();
            $("#resultsearch").html("Hệ thống quá tải.Vui lòng thử lại");
            $('#reportvt').html("");
        }, timeout: 40000
    });

}

$('#money').change(function () {
    var val = $("#money option:selected").val();
    if (val == 1) {
        $("#labelvin").css("display", "block");
        $("#menhgiavin").css("display", "block");
        $("#menhgiaxu").css("display", "none");
    } else if (val == 0) {
        $("#menhgiaxu").css("display", "block");
        $("#labelvin").css("display", "block");
        $("#menhgiavin").css("display", "none");
    }
});
function sumresult(quantity,use,lock,money){
    var rs = "";
    rs += "<tr>";

    rs += "<td style='color: #0000ff;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right;'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(use) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(money) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(lock) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(quantity-use-lock) + "</td>";
    rs += "</tr>";

    return rs;
}
function sumresulttong(quantity,use,lock,money){
    var rs = "";
    rs += "<tr>";

    rs += "<td colspan='2' style='color: #0000ff;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right;'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(use) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(money) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(lock) + "</td>";
    rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(quantity-use-lock) + "</td>";
    rs += "</tr>";

    return rs;
}
function resultgiftcode(value,quantity,use,lock) {
    var rs = "";
    rs += "<tr>";
    rs += "<td  class='tdmoney'>" + commaSeparateNumber(value) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(use) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(use*value) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(lock) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity-use-lock) + "</td>";
    rs += "</tr>";

    return rs;
}
function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }
    return val;
}
function getFirtDayOfMonth() {
    var date = new Date();
    var thangtruoc = '';
    var ngaytruoc = '';
    var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    if (firstDay.getMonth() < 10) {
        thangtruoc = "0" + (firstDay.getMonth() + 1);
    }
    else {
        thangtruoc = firstDay.getMonth() + 1;
    }
    if (firstDay.getDate() < 10) {
        ngaytruoc = "0" + firstDay.getDate();
    }
    else {
        ngaytruoc = firstDay.getDate();
    }
    return firstDay.getFullYear() + '-' + (thangtruoc) + '-' + (ngaytruoc) + " " + "00:00:00";
}

function getLastDayOfMonth() {
    var date = new Date();
    var thangsau = '';
    var ngaysau = '';
    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    if (lastDay.getMonth() < 10) {
        thangsau = "0" + (lastDay.getMonth() + 1);
    }
    else {
        thangsau = lastDay.getMonth() + 1;
    }
    if (lastDay.getDate() < 10) {
        ngaysau = "0" + lastDay.getDate();
    }
    else {
        ngaysau = lastDay.getDate();
    }
    return lastDay.getFullYear() + '-' + (thangsau) + '-' + (ngaysau) + " " + "23:59:59";
}
</script>
