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
            <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>

            <div class="title">
                <h6>Lịch sử nạp tiền điện thoại</h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('report/cashoutbytopup') ?>" method="post">
                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="toDate" name="toDate"
                                           value="<?php echo $start_time ?>"> <span class="input-group-addon">
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
                                           value="<?php echo $end_time ?>"> <span class="input-group-addon">
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
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Nick name:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                            </td>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Số điện thoại:</label>
                            </td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="txtmobile" value="<?php echo $this->input->post('txtmobile') ?>"
                                       name="txtmobile"></td>


                        </tr>

                    </table>

                </div>

                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Mã giao dịch:</label>
                            </td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="magiaodich" value="<?php echo $this->input->post('magiaodich') ?>"
                                       name="magiaodich"></td>
                            <td><label style="margin-left: 70px;margin-bottom:-2px;width: 100px">Trạng thái:</label>
                            </td>
                            <td class="">
                                <select id="select_status" name="select_status"
                                        style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                    <option value="">Chọn</option>
                                    <option value="0" <?php if ($this->input->post('select_status') == "0") {
                                        echo "selected";
                                    } ?>>Thành công
                                    </option>
                                    <option value="1" <?php if ($this->input->post('select_status') == "1") {
                                        echo "selected";
                                    } ?>>Thất bại
                                    </option>
                                    <option value="23" <?php if ($this->input->post('select_status') == "23") {
                                        echo "selected";
                                    } ?>>Sai số điện thoại
                                    </option>
                                    <option value="30" <?php if ($this->input->post('select_status') == "30") {
                                        echo "selected";
                                    } ?>>Đang xử lý
                                    </option>
                                </select>
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>

                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Nhà cung cấp:</label>
                            </td>
                            <td class="">
                                <select id="select_partner" name="select_partner"
                                        style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                    <option value="" <?php if ($this->input->post('select_partner') == "") {
                                        echo "selected";
                                    } ?>>Chọn
                                    </option>
                                    <option value="vtc" <?php if ($this->input->post('select_partner') == "vtc") {
                                        echo "selected";
                                    } ?>>VTC
                                    </option>
                                    <option value="epay" <?php if ($this->input->post('select_partner') == "epay") {
                                        echo "selected";
                                    } ?>>EPay
                                    </option>

                                </select>
                            </td>

                            <td><label style="margin-left: 72px;margin-bottom:-2px;width: 120px">Thuê bao:</label>
                            </td>
                            <td class="">
                                <select id="select_dichvu" name="select_dichvu"
                                        style="margin-left: -25px;margin-bottom:-2px;width: 143px">
                                    <option value="" <?php if ($this->input->post('select_dichvu') == "") {
                                        echo "selected";
                                    } ?>>Chọn
                                    </option>
                                    <option value="1" <?php if ($this->input->post('select_dichvu') == "1") {
                                        echo "selected";
                                    } ?>>Trả trước
                                    </option>
                                    <option value="2" <?php if ($this->input->post('select_dichvu') == "2") {
                                        echo "selected";
                                    } ?>>Trả sau
                                    </option>

                                </select>
                            </td>
                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 65px">
                            </td>
                            <td>
                                <input type="reset"
                                       onclick="window.location.href = '<?php echo admin_url('report/cashoutbytopup') ?>'; "
                                       value="Reset" class="basic" style="margin-left: 20px">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
            <div class="formRow">
                <div class="row">
                    <div class="col-sm-2">
                        <h5>Tổng:<span style="color: #0000ff" id="summoney"></span></h5>
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2">
                        <h5>Tổng giao dịch:<span style="color: #0000ff" id="sumrecord"></span></h5>
                    </div>
                </div>
            </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>Mã giao dịch</td>
                    <td>Nick name</td>
                    <td>Điện thoại</td>
                    <td>Nhà mạng</td>
                    <td>Nhà cung cấp</td>
                    <td>Thuê bao</td>
                    <td>Tiền</td>
                    <td style="width:100px;">Mã lỗi dịch vụ</td>
                    <td>Mô tả</td>
                    <td>Mã lỗi Vinplay</td>
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
    function resultSearchTransction(stt, rid, nickName, target, amount, status, message, code, date,provider,partner,type) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + nickName + "</td>";
        rs += "<td>" + target + "</td>";
        rs += "<td>" + provider + "</td>";
        rs += "<td>" + partner + "</td>";
        if(type == 1){
            rs += "<td>" + "Trả trước" + "</td>";
        }else if(type == 2){
            rs += "<td>" + "Trả sau" + "</td>";
        }

        rs += "<td>" + commaSeparateNumber(amount) + "</td>";
        rs += "<td>" + status + "</td>";
        rs += "<td>" + message + "</td>";
        rs += "<td>" + code + "</td>";
        rs += "<td>" + date + "</td>";
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
            url: "<?php echo admin_url('report/cashoutbytopupajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                mobile: $("#txtmobile").val(),
                status: $("#select_status").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages: 1,
                tranid: $("#magiaodich").val(),
                partner : $("#select_partner").val(),
                type : $("#select_dichvu").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    var totalmoney = commaSeparateNumber(result.totalMoney);
                    var totalrecord = commaSeparateNumber(result.totalRecord);

                    $('#summoney').html(totalmoney);
                    $('#sumrecord').html(totalrecord);
					   $('#logaction').html("");

                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.total;
                    var totalmoney = commaSeparateNumber(result.totalMoney);
                    var totalrecord = commaSeparateNumber(result.totalRecord);

                    $('#summoney').html(totalmoney);
                    $('#sumrecord').html(totalrecord);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.referenceId, value.nickName, value.target, value.amount, value.status, value.message, value.code, value.timeLog,value.provider,value.partner,value.type);
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
                                    url: "<?php echo admin_url('report/cashoutbytopupajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        mobile: $("#txtmobile").val(),
                                        status: $("#select_status").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page,
                                        tranid: $("#magiaodich").val(),
                                        partner : $("#select_partner").val(),
                                        type : $("#select_dichvu").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.referenceId, value.nickName, value.target, value.amount, value.status, value.message, value.code, value.timeLog,value.provider,value.partner,value.type);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                    }, timeout: 40000
                                });
                            }
                            oldpage = page;
                        }
                    });
                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
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