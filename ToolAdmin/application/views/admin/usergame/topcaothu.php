<?php $this->load->view('admin/usergame/head', $this->data) ?>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <div class="widget">
        <div class="title">
            <h6>Top cao thủ</h6>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('usergame') ?>" method="get">
            <div class="formRow">
                <table>
                    <tr>
                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Tiền:</label></td>
                        <td><select id="money_type">
                                <option value="vin">Vin</option>
                                <option value="xu">Xu</option>
                        </select>
                        </td>
                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Hiển thị:</label></td>
                        <td><select id="displaytop">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </td>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 50px;margin-bottom:-2px;width: 100px">Ngày:</label></td>
                        <td class="item"><input name="created"
                                                value="<?php echo $this->input->get('created') ?>" id="toDate"
                                                type="text" class="datepicker"/></td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 123px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('usergame/topcaothu') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>STT</td>
                            <td>Nickname</td>
                            <td>Tiền thắng</td>
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
        <ul id="pagination-demosearch" class="pagination-lg"></ul>
    </div>
    <h1 id="resultsearch" style="position: absolute;top: 50%;left: 50%"></h1>
</div>
<script>
    $("#toDate").datepicker({dateFormat: 'dd-mm-yy'});
    $("#toDate").datepicker('setDate', new Date());
$("#search_tran").click(function () {
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('usergame/topcaothuajax')?>",
        data: {
            display: $("#displaytop").val(),
            money: $("#money_type").val(),
            date: $("#toDate").val()
        },
        dataType: 'json',
        success: function (result) {
            $("#spinner").hide();
            var totalPage = result.total;
            console.log(totalPage);
            if (result.userList == null || result.userList == "") {
                $("#resultsearch").html("Không tìm thấy kết quả");
                $('#logaction').html("");
            } else {
                $("#resultsearch").html("");
                stt = 1;
                $.each(result.userList, function (index, value) {
                    result += resultSearchTransction(stt, value.nickname, value.moneyWin);
                    stt++
                });
                $('#logaction').html(result);
            }

        }
    })
});
function resultSearchTransction(stt, nickname,moneywin) {
    var rs = "";
    rs += "<tr>";
    rs += "<td>" + stt + "</td>";
    rs += "<td>" + nickname + "</td>";
    rs += "<td>" + commaSeparateNumber(moneywin) + "</td>";
    rs += "</tr>";
    return rs;
}
$(document).ready(function () {
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('usergame/topcaothuajax')?>",
        data: {
            display: $("#displaytop").val(),
            money: $("#money_type").val(),
            date: $("#toDate").val()
        },
        dataType: 'json',
        success: function (result) {
            $("#spinner").hide();
            var totalPage = result.total;
            console.log(totalPage);
            if (result.userList == null || result.userList == "") {
                $("#resultsearch").html("Không tìm thấy kết quả");
                $('#logaction').html("");
            } else {
                $("#resultsearch").html("");
                stt = 1;
                $.each(result.userList, function (index, value) {
                    result += resultSearchTransction(stt, value.nickname, value.moneyWin);
                    stt++
                });
                $('#logaction').html(result);
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