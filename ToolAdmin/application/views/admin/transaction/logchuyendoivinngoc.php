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
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.table2excel.js"></script>
    <div class="widget">
        <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>

        <div class="title">
            <h6>Lịch sử chuyển đổi vin</h6>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('transaction/logchuyendoivinngoc') ?>"
              method="post">
            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 120px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" id="toDate" name="toDate"
                                       value="<?php echo $start_time; ?>"> <span class="input-group-addon">
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
                                       value="<?php echo $end_time; ?>"> <span class="input-group-addon">
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
                        <td><label style="margin-left: 100px;margin-bottom:-2px;width: 100px">Nick name:</label>
                        </td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                        </td>


                        <td>
                            <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                                   class="formLeft"> Mã lỗi: </label>
                        </td>
                        <td class="item"><select id="select_error" name="select_error"
                                                 style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                                <option value="-1" <?php if ($this->input->post('select_error') == "-1") {
                                    echo "selected";
                                } ?> >Tất cả
                                </option>
                                <option value="0" <?php if ($this->input->post('select_error') == "0") {
                                    echo "selected";
                                } ?>>Thành công
                                </option>
                                <option value="8" <?php if ($this->input->post('select_error') == "8") {
                                    echo "selected";
                                } ?>>Không đủ tiền
                                </option>
                                <option value="10" <?php if ($this->input->post('select_error') == "10") {
                                    echo "selected";
                                } ?>>Quá hạn mức đổi tiền
                                </option>
                                <option value="11" <?php if ($this->input->post('select_error') == "11") {
                                    echo "selected";
                                } ?>>Cấm đổi tiền
                                </option>
                            </select>
                        </td>

                    </tr>

                </table>

            </div>

            <div class="formRow">

                <table>
                    <tr>
                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 170px">Mã giao dịch
                                Merchant:</label></td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="txt_merchant" value="<?php echo $this->input->post('txt_merchant') ?>"
                                   name="txt_merchant"></td>


                        <td>
                            <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                                   class="formLeft"> Merchant: </label>
                        </td>
                        <td class="item"><select id="select_merchant" name="select_merchant"
                                                 style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                                <option
                                    value="HamCaMap" <?php if ($this->input->post('select_merchant') == "HamCaMap") {
                                    echo "selected";
                                } ?> >Hàm Cá Mập
                                </option>
                            </select>
                        </td>
                    </tr>

                </table>

            </div>
            <div class="formRow">

                <table>
                    <tr>
                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 170px">Mã giao dịch
                                Vinplay:</label></td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="txt_vinplay" value="<?php echo $this->input->post('txt_vinplay') ?>"
                                   name="txt_vinplay"></td>


                        <td>
                            <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                                   class="formLeft">Chuyển đổi: </label>
                        </td>
                        <td class="item"><select id="select_type" name="select_type"
                                                 style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                                <option value="" <?php if ($this->input->post('select_type') == "") {
                                    echo "selected";
                                } ?> >Tất cả
                                </option>
                                <option value="0" <?php if ($this->input->post('select_type') == "0") {
                                    echo "selected";
                                } ?> >Cộng vin
                                </option>
                                <option value="1" <?php if ($this->input->post('select_type') == "1") {
                                    echo "selected";
                                } ?> >Trừ vin
                                </option>
                            </select>
                        </td>
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
                <div class="col-sm-2">
                    <h5>Tổng tiền:<span style="color: #0000ff" id="summoney"></span></h5>
                </div>
                <div class="col-sm-3">
                    <h5>Tổng tiền chuyển đổi:<span style="color: #0000ff" id="summoneychange"></span></h5>
                </div>
                <div class="col-sm-2">
                    <h5>Phí chuyển đổi:<span style="color: #0000ff" id="feechange"></span></h5>
                </div>
                <div class="col-sm-2">
                    <h5>Tổng giao dịch:<span style="color: #0000ff" id="sumgd"></span></h5>
                </div>
            </div>

        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td>Nickname</td>
                <td>MerchantId</td>
                <td>MerchantTransId</td>
                <td>transNo</td>
                <td>Money</td>
                <td>Loại tiền</td>
                <td>Loại chuyển đổi</td>
                <td>ExchangeMoney</td>
                <td>Phí</td>
                <td>Code</td>
                <td>IP</td>
                <td>Ngày tạo</td>
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
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
    <div class="text-center">
        <ul id="pagination-demo" class="pagination-sm"></ul>
    </div>

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
    function resultSearchTransction(nickname, merchantId, merchantTransId, transNo, money, moneyType, type, exchangeMoney, fee, code, ip, createTime) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + merchantId + "</td>";
        if (merchantTransId != null) {
            rs += "<td>" + merchantTransId + "</td>";
        } else {
            rs += "<td>" + "" + "</td>";
        }

        rs += "<td>" + transNo + "</td>";
        rs += "<td>" + commaSeparateNumber(money) + "</td>";
        rs += "<td>" + moneyType + "</td>";
        if (type == 1) {
            rs += "<td>" + "Trừ vin" + "</td>";
        } else if (type == 0) {
            rs += "<td>" + "Cộng vin" + "</td>";
        }
        rs += "<td>" + commaSeparateNumber(exchangeMoney) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + commaSeparateNumber(code) + "</td>";
        rs += "<td>" + ip + "</td>";
        rs += "<td>" + createTime + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
		$("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
   $("#search_tran").click(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/logchuyendoivinngocajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                mid: $("#select_merchant").val(),
                tid: $("#txt_merchant").val(),
                tno: $("#txt_vinplay").val(),
                type: $("#select_type").val(),
                code: $("#select_error").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.trans == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#summoney').html("");
                    $('#summoneychange').html("");
                    $('#feechange').html("");
                    $('#sumgd').html("");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    $('#summoney').html(commaSeparateNumber(result.totalMoney));
                    $('#summoneychange').html(commaSeparateNumber(result.totalExchangeMoney));
                    $('#feechange').html(commaSeparateNumber(result.totalFee));
                    $('#sumgd').html(commaSeparateNumber(result.totalTrans));

                    $.each(result.trans, function (index, value) {
                        result += resultSearchTransction(value.nickname, value.merchantId, value.merchantTransId, value.transNo, value.money, value.moneyType, value.type, value.exchangeMoney, value.fee, value.code, value.ip, value.createTime);
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: 10,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('transaction/logchuyendoivinngocajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        mid: $("#select_merchant").val(),
                                        tid: $("#txt_merchant").val(),
                                        tno: $("#txt_vinplay").val(),
                                        type: $("#select_type").val(),
                                        code: $("#select_error").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        if (result.trans == "") {
                                            $('#pagination-demo').css("display", "none");
                                            $("#resultsearch").html("Không tìm thấy kết quả");
                                            $('#summoney').html("");
                                            $('#summoneychange').html("");
                                            $('#feechange').html("");
                                            $('#sumgd').html("");
                                            $('#logaction').html("");
                                        } else {
                                            $("#resultsearch").html("");

                                            $.each(result.trans, function (index, value) {
                                                result += resultSearchTransction(value.nickname, value.merchantId, value.merchantTransId, value.transNo, value.money, value.moneyType, value.type, value.exchangeMoney, value.fee, value.code, value.ip, value.createTime);

                                            });
                                            $('#logaction').html(result);
                                        }
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $('#summoney').html("");
                                        $('#summoneychange').html("");
                                        $('#feechange').html("");
                                        $('#sumgd').html("");
                                        $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                    }, timeout: timeOutApi
                                });
                            }
                            oldPage = page;
                        }
                    });
                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $('#summoney').html("");
                $('#summoneychange').html("");
                $('#feechange').html("");
                $('#sumgd').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: timeOutApi
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