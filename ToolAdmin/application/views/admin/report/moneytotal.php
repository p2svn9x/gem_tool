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
<h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>

<div class="title">
    <h6>Tổng số vin hiện tại</h6>
</div>
<form class="list_filter form" action="<?php echo admin_url('report/moneytotal') ?>" method="post">
    <div class="formRow">

        <table>
            <tr>
                <td>
                    <label for="param_name" class="formLeft" id="nameuser"
                           style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                <td class="item">
                    <div class="input-group date" id="datetimepicker1">
                        <input type="text" id="toDate" name="toDate" value="<?php echo $start_time?>"> <span class="input-group-addon">
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
                        <input type="text" id="fromDate" name="fromDate" value="<?php echo $end_time?>" > <span class="input-group-addon">
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
                           onclick="window.location.href = '<?php echo admin_url('report/moneytotal') ?>'; "
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
        <td>Người chơi</td>
        <td>Bot</td>
        <td>Đại lý tổng</td>
        <td>Đại lý cấp 1</td>
        <td style="width:100px;">Đại lý cấp 2</td>
        <td>Tổng tiền</td>
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

<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
</div>
<div class="text-center">
    <ul id="pagination-demo" class="pagination-sm"></ul>

</div>


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
    });
    function resultSearchTransction(stt,moneyuser, moneybot, moneyagent, moneyagent1, moneyagent2, totalmoney, date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyuser) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneybot) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyagent) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyagent1) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyagent2) + "</td>";
        rs += "<td>" + commaSeparateNumber(totalmoney) + "</td>";
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/moneytotalajax')?>",
            // url: "http://192.168.0.251:8082/api_backend",
            data: {
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages : 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.totals == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                }else {
                    var totalPage = 10;
                    stt = 1;
                    $.each(result.totals, function (index, value) {
                        result += resultSearchTransction(stt, value.moneyUser, value.moneyBot, value.moneySuperAgent, value.moneyAgent1,value.moneyAgent2,value.total,value.timeLog);
                        stt++;

                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('report/moneytotalajax')?>",
                                    // url: "http://192.168.0.251:8082/api_backend",
                                    data: {
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages : page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.totals, function (index, value) {
                                            result += resultSearchTransction(stt, value.moneyUser, value.moneyBot, value.moneySuperAgent, value.moneyAgent1,value.moneyAgent2,value.total,value.timeLog);
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                $('#logaction').html("");
                $("#spinner").hide();
                $("#error-popup").modal("show");
            }, timeout: 40000
                                });
                            }
                            oldPage = page;
                        }
                    });
                }
            }, error: function () {
                $('#logaction').html("");
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