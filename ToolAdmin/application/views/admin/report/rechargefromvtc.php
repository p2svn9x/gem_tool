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
                <h6>Lịch sử nạp vin qua VTC</h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('report/rechargefromvtc') ?>" method="post">
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
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Mã giao dịch:</label>
                            </td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="magiaodich" value="<?php echo $this->input->post('magiaodich') ?>"
                                       name="magiaodich"></td>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Nick name:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                            </td>

                        </tr>

                    </table>

                </div>

                <div class="formRow">
                    <table>
                        <tr>

                            <td><label style="margin-left: 28px;margin-bottom:-2px;width: 100px">Mệnh giá:</label></td>
                            <td class="">
                                <select id="select_price" name="select_price"
                                        style="margin-left: 20px;margin-bottom:-2px;width: 143px">
                                    <option value="">Chọn</option>
                                    <option value="10000" <?php if ($this->input->post('select_price') == "10000") {
                                        echo "selected";
                                    } ?>>10K
                                    </option>
                                    <option value="20000" <?php if ($this->input->post('select_price') == "20000") {
                                        echo "selected";
                                    } ?>>20K
                                    </option>
                                    <option value="50000" <?php if ($this->input->post('select_price') == "50000") {
                                        echo "selected";
                                    } ?>>50K
                                    </option>
                                    <option value="100000" <?php if ($this->input->post('select_price') == "100000") {
                                        echo "selected";
                                    } ?>>100K
                                    </option>
                                    <option value="200000" <?php if ($this->input->post('select_price') == "200000") {
                                        echo "selected";
                                    } ?>>200K
                                    </option>
                                    <option value="500000" <?php if ($this->input->post('select_price') == "500000") {
                                        echo "selected";
                                    } ?>>500K
                                    </option>
                                </select>
                            </td>
                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 50px">
                            </td>

                        </tr>
                    </table>
                </div>
            </form>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>Mã giao dịch</td>
                    <td>Nick name</td>
                    <td>Mệnh giá</td>
                    <td>Mã lỗi</td>
                    <td>Mô tả</td>
                    <td>Thời gian yêu cầu</td>
                    <td>Thời gian đáp ứng</td>
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
    function resultSearchTransction(stt, rid, nickName, price, error, description, timerequest, timeresponse) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + nickName + "</td>";
        rs += "<td>" + commaSeparateNumber(price) + "</td>";
        rs += "<td>" + error + "</td>";
        rs += "<td>" + description + "</td>";
        if (timerequest == null) {
            rs += "<td>" + "" + "</td>";
        } else {
            rs += "<td>" + timerequest + "</td>";
        }
        if (timeresponse == null) {
            rs += "<td>" + "" + "</td>";
        } else {
            rs += "<td>" + timeresponse + "</td>";
        }
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
            url: "<?php echo admin_url('report/rechargefromvtcajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val().replace(/[-:  +]/g, ''),
                fromDate: $("#fromDate").val().replace(/[-:  +]/g, ''),
                pages: 1,
                tranid: $("#magiaodich").val(),
                price: $("#select_price").val()
            },

            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                if (res.trans == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");

                    var stt = 1;
                    $.each(res.trans, function (index, value) {
                        result += resultSearchTransction(stt, value.transId, value.nickName, value.price, value.responseCode, value.description, value.timeRequest, value.timeResponse);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: 10,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldpage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('report/rechargefromvtcajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val().replace(/[-:  +]/g, ''),
                                        fromDate: $("#fromDate").val().replace(/[-:  +]/g, ''),
                                        pages: page,
                                        tranid: $("#magiaodich").val(),
                                        price: $("#select_price").val()

                                    },
                                    dataType: 'json',
                                    success: function (res) {
                                        $("#spinner").hide();
                                        if (res.trans == "") {
                                            $('#pagination-demo').css("display", "none");
                                            $('#logaction').html("");
                                        } else {
                                            $("#resultsearch").html("");
                                            stt = 1;
                                            $.each(res.trans, function (index, value) {
                                                result += resultSearchTransction(stt, value.transId, value.nickName, value.price, value.responseCode, value.description, value.timeRequest, value.timeResponse);
                                                stt++;
                                            });
                                            $('#logaction').html(result);
                                        }
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                    }, timeout: timeOutApi
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