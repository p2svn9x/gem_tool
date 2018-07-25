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
            <h5 id="resultsearch" style="color: red;margin-left: 20px"></h5>

            <div class="title">
                <h6>Tổng hoàn trả phí đại lý</h6>
            </div>
            <form class="list_filter form">
                <div class="formRow">

                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Nick name:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                            </td>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tháng:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="toDate" name="toDate"> <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                </div>


                            </td>
                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 123px">
                            </td>
                            <td>
                                <input type="reset"
                                       onclick="window.location.href = '<?php echo admin_url('transaction/refundfee') ?>'; "
                                       value="Reset" class="basic" style="margin-left: 20px">
                            </td>

                        </tr>

                    </table>

                </div>
            </form>
            <div class="formRow"></div>
            <div id="spinner" class="spinner" style="display:none;">
                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
            </div>
            <table width="100%" class="table table-bordered" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>Nickname</td>
                    <td>Phí DL 1</td>
                    <td>Phí DL 2</td>
                    <td>Phí DL 2 khác</td>
                    <td>Tổng phí</td>
                </tr>
                </thead>
                <tbody id="logaction">
                </tbody>
                <tbody id="logactionsum">
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: #0000ff">SUCCESS</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                               aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="bsModal4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color:red">ERROR</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                               aria-hidden="true">
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
        top: 80%;
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

    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'MM/YYYY'
        });
        var startdate = moment().subtract(-30, "days").format("DD-MM-YYYY");
        console.log(startdate);
    });
    $("#search_tran").click(function () {
        $("#spinner").show();
        var total1 = 0;
        var total2 = 0;
        var total3 = 0;
        var total4 = 0;
        var total5 = 0;
        var total6 = 0;
        var res = "";
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/refundfeeajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                month: $("#toDate").val()
            },

            dataType: 'json',
            success: function (result) {

                var  result1 = [];
                console.log(result);
                $("#spinner").hide();
                if (result.length == 0) {
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                    $('#logactionsum').html("");
                } else {
                    $("#resultsearch").html("");
                    var stt = 1;
                    result.forEach(function (a) {
                        if (!this[a.nickname]) {
                            this[a.nickname] = { nickname: a.nickname, fee1: 0 ,fee2:0,fee2More:0,fee:0};
                            result1.push(this[a.nickname]);
                        }
                        this[a.nickname].fee1 += a.fee1;
                        this[a.nickname].fee2 += a.fee2;
                        this[a.nickname].fee2More += a.fee2More;
                        this[a.nickname].fee += a.fee;
                    }, Object.create(null));

                    $.each(result1, function (index, value) {
                        res += resultSearchTransction(stt, value.nickname, value.fee1, value.fee2,value.fee,value.fee2More);
                        stt++;
                        total1 += value.fee1;
                        total2 += value.fee2;
                        total3 += value.fee2More;
                        total6 += value.fee;

                    });
                    $('#logaction').html(res);
                    $('#logactionsum').html(resultSumTransaction(total1,total2,total3,total6));
                }
            }, error: function () {
                $('#logactionsum').html("");
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: 40000
        })
    });

    $(document).ready(function () {
        var total1 = 0;
        var total2 = 0;
        var total3 = 0;
        var total4 = 0;
        var total5 = 0;
        var total6 = 0;
        $("#toDate").val(moment().subtract('month', 1).format('MM/YYYY'));
        $("#spinner").show();
        var res = ""
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/refundfeeajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                month: $("#toDate").val()
            },

            dataType: 'json',
            success: function (result) {
                var  result1 = [];
                console.log(result);
                $("#spinner").hide();
                if (result.length == 0) {
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                    $('#logactionsum').html("");
                } else {
                    $("#resultsearch").html("");
                    var stt = 1;
                    result.forEach(function (a) {
                        if (!this[a.nickname]) {
                            this[a.nickname] = { nickname: a.nickname, fee1: 0 ,fee2:0,fee2More:0,fee:0};
                            result1.push(this[a.nickname]);
                        }
                        this[a.nickname].fee1 += a.fee1;
                        this[a.nickname].fee2 += a.fee2;
                        this[a.nickname].fee2More += a.fee2More;
                        this[a.nickname].fee += a.fee;
                    }, Object.create(null));

                    $.each(result1, function (index, value) {
                        res += resultSearchTransction(stt, value.nickname, value.fee1, value.fee2,value.fee,value.fee2More);
                        stt++;
                        total1 += value.fee1;
                        total2 += value.fee2;
                        total3 += value.fee2More;
                        total6 += value.fee;

                    });
                    $('#logaction').html(res);
                    $('#logactionsum').html(resultSumTransaction(total1,total2,total3,total6));
                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $('#logactionsum').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: 40000
        })
    });
    function resultSearchTransction(stt, nickname, fee1, fee2,  fee,  fee2khac) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(fee1) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee2) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee2khac) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "</tr>";
        return rs;
    }

    function resultSumTransaction(fee1, fee2,fee2khac,fee) {
        var rs = "";
        rs += "<tr>";
        rs += "<td colspan='2'>" + "Tổng" + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(fee1) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(fee2) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(fee2khac) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(fee) + "</td>";
        rs += "</tr>";
        return rs;
    }

</script>

<script>

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }

</script>