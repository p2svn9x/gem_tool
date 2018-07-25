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
                <h6>Top nạp thẻ</h6>
            </div>
            <form class="list_filter form" action="" method="get">
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
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Hiển thị:</label></td>
                            <td><select id="displaygame">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="2000">2000</option>
                                    <option value="5000">5000</option>

                                </select>
                            </td>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Tên Game:</label></td>

                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 123px">
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
                                <td>Tiền nạp</td>
                                <td>Phế tài xỉu</td>
                                <td>Tổng chuyển khoản</td>
                                <td>Tổng Vin</td>
                            </tr>
                            </thead>

                            <tbody id="loguserwin">
                            </tbody>
                            <h4 style="text-align: center;color:red" id="resultuserwin"></h4>
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
</div>
<script>
    $("#search_tran").click(function () {
        if($("#gamename").val()== ""){
            alert("Bạn chưa nhập tên game");
            return false;
        }
        $("#spinner").show();
        var result1 = "";
        var result2 = "";
        var result3 = "";
        var result4 = "";
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/topuserrechargeajax')?>",
            timeout: 20000,
            data: {
                display : $("#displaygame").val(),
                toDate: $("#toDate").val(),
                fromDate:  $("#fromDate").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                $("#tengame").html($("#gamename").val());

                if (result.topUserWin == "") {
                    $("#resultuserwin").html("Không tìm thấy kết quả");
                    $('#loguserwin').html("");
                } else {
                    $("#resultuserwin").html("");
                    stt = 1;
                    $.each(result.topUserWin, function (index, value) {
                        result1 += resultSearchTransction(stt, value.nickname, value.moneyWin,value.feeTX,value.tongCK,value.tongVin);
                        stt++
                    });
                    $('#loguserwin').html(result1);
                }



            }, error: function(xhr, textStatus, errorThrown){
                alert('request failed');
            }
        })
    });
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'DD-MM-YYYY'
        });

    });
    $(document).ready(function () {
        $("#toDate").val( moment().format('DD-MM-YYYY'));
        $("#fromDate").val( moment().format('DD-MM-YYYY'));
        $("#spinner").show();
        var result1 = "";
        var result2 = "";
        var result3 = "";
        var result4 = "";
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/topuserrechargeajax')?>",
            data: {
                display : $("#displaygame").val(),
                toDate: $("#toDate").val(),
                fromDate:  $("#fromDate").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                $("#tengame").html($("#gamename").val());

                if (result.topUserWin == "") {
                    $("#resultuserwin").html("Không tìm thấy kết quả");
                    $('#loguserwin').html("");
                } else {
                    $("#resultuserwin").html("");
                    stt = 1;
                    $.each(result.topUserWin, function (index, value) {
                        result1 += resultSearchTransction(stt, value.nickname, value.moneyWin,value.feeTX,value.tongCK,value.tongVin);
                        stt++
                    });
                    $('#loguserwin').html(result1);
                }

            }
        });


    });

    function resultSearchTransction(stt, nickname,moneywin,fee,totalck,totalvin) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(moneywin) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + commaSeparateNumber((totalck)*(-1)) + "</td>";
        rs += "<td>" + commaSeparateNumber(totalvin) + "</td>";
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