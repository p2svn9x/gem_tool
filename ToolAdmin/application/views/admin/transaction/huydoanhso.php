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
                <h6>Trừ phí đại lý</h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('transaction/huydoanhso') ?>" method="post">
                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="toDate" name="toDate"
                                           value="<?php echo $start_time; ?>"> <span
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
                                           value="<?php echo $end_time; ?>"> <span
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
                            <td><label style="margin-left: 20px;margin-bottom:-2px;width: 110px">Nick name gửi:</label>
                            </td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                            </td>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 118px">Nick name nhận:</label>
                            </td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="nicknamere" value="<?php echo $this->input->post('nicknamere') ?>"
                                       name="nicknamere">
                            </td>



                        </tr>

                    </table>

                </div>

                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Doanh số:</label>
                            <td><select id="doanhso" name="doanhso" style="margin-bottom:-2px;width: 160px">
                                    <option value="" <?php if ($this->input->post('doanhso') == "") {
                                        echo "selected";
                                    } ?>>Tất cả
                                    </option>
                                    <option value="1" <?php if ($this->input->post('doanhso') == "1") {
                                        echo "selected";
                                    } ?>>Cộng
                                    </option>
                                    <option value="0" <?php if ($this->input->post('doanhso') == "0") {
                                        echo "selected";
                                    } ?>>Hủy
                                    </option>
                                </select>
                            </td>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Trạng thái:</label>
                            </td>
                            <td><select id="status" name="status" style="margin-bottom:-2px;width: 160px">
                                    <option value="" <?php if ($this->input->post('status') == "") {
                                        echo "selected";
                                    } ?>>Chọn
                                    </option>

                                    <option value="1" <?php if ($this->input->post('status') == "1") {
                                        echo "selected";
                                    } ?>>Tài khoản thường chuyển đại lý cấp 1
                                    </option>
                                    <option value="2" <?php if ($this->input->post('status') == "2") {
                                        echo "selected";
                                    } ?>>Tài khoản thường chuyển đại lý cấp 2
                                    </option>
                                    <option value="3" <?php if ($this->input->post('status') == "3") {
                                        echo "selected";
                                    } ?>>Đại lý cấp 1 chuyển tài khoản thường
                                    </option>
                                    <option value="4" <?php if ($this->input->post('status') == "4") {
                                        echo "selected";
                                    } ?>>Đại lý cấp 1 chuyển đại lý cấp 1
                                    </option>
                                    <option value="5" <?php if ($this->input->post('status') == "5") {
                                        echo "selected";
                                    } ?>>Đại lý cấp 1 chuyển đại lý cấp 2
                                    </option>
                                    <option value="6" <?php if ($this->input->post('status') == "6") {
                                        echo "selected";
                                    } ?>>Đại lý cấp 2 chuyển tài khoản thường
                                    </option>
                                    <option value="7" <?php if ($this->input->post('status') == "7") {
                                        echo "selected";
                                    } ?>>Đại lý cấp 2 chuyển đại lý cấp 1
                                    </option>
                                    <option value="8" <?php if ($this->input->post('status') == "8") {
                                        echo "selected";
                                    } ?>>Đại lý cấp 2 chuyển đại lý cấp 2
                                    </option>
                                </select></td>

                            <td style="">
                                <input type="submit" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 70px">
                            </td>
                            <td>
                                <input type="reset"
                                       onclick="window.location.href = '<?php echo admin_url('transaction/huydoanhso') ?>'; "
                                       value="Reset" class="basic" style="margin-left: 20px">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
            <div class="formRow"><h5>Tổng bán:<span style="color: #0000ff" id="summoney"></span></h5></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>Tài khoản chuyển</td>
                    <td>Tài khoản nhận</td>
                    <td>Số vin gửi</td>
                    <td>Số vin nhận</td>
                    <td>Phí chuyển khoản</td>
                    <td>Trạng thái</td>
                    <td>Doanh số</td>
                    <td>Thời gian</td>
                    <td>Hủy doanh số</td>
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
<form class="list_filter form" action="<?php echo admin_url('transaction/huydoanhso') ?>" method="post">
<div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p id="statuspenđing"></p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="submit" value="Đóng" data-dismiss="modal"
                       aria-hidden="true">
            </div>
        </div>
    </div>
</div>
</form>
<script src="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/jquery.dataTables.min.css">
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

    function resultSearchTransction(stt, namesend, namerecive, moneysend, moneyrecive, fee, status, date, topds) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + namesend + "</td>";
        rs += "<td>" + namerecive + "</td>";
        rs += "<td>" + commaSeparateNumber(moneysend) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyrecive) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + statustranfer(status) + "</td>";
        if (status == 1 || status == 2 || status == 3 || status == 6) {
            if (topds == 1) {
                rs += "<td>" + "Được tính doanh số" + "</td>";
            } else if (topds == 0) {
                rs += "<td>" + "Không được tính doanh số" + "</td>";
            }
        } else {
            rs += "<td></td>";
        }
        rs += "<td>" + date + "</td>";
        if (status == 1 || status == 2 || status == 3 || status == 6) {

            if (topds == 1) {
                rs += "<td>" + "<input type='button' id='huydoanhso' value='Hủy' class='button blueB' style='margin-left: 70px' onclick=\"huydoanhso('" + namesend + "','" + namerecive + "','" + date + "',0)\" >" + "</td>";
            }
            else if (topds == 0) {
                rs += "<td>" + "<input type='button' id='congdoanhso' value='Cộng' class='button redB' style='margin-left: 70px' onclick=\"congdoanhso('" + namesend + "','" + namerecive + "','" + date + "',1)\" >" + "</td>";
            }
        } else {
            rs += "<td></td>";
        }
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
            url: "<?php echo admin_url('transaction/huydoanhsoajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                nicknamere : $("#nicknamere").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                status: $("#status").val(),
                topds : $("#doanhso").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
						$("#resultsearch").html("");
                    var totalPage = result.total;
                    var totalmoney = commaSeparateNumber(result.totalVinSend);
                    $('#summoney').html(totalmoney);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.status, value.trans_time, value.top_ds);
                        stt++;

                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
                        "ordering": true,
                        "searching": true,
                        "paging": false,
                        "draw": false
                    });
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('transaction/huydoanhsoajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        nicknamere : $("#nicknamere").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        status: $("#status").val(),
                                        topds : $("#doanhso").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
										$("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.status, value.trans_time, value.top_ds);
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
                                            "ordering": true,
                                            "searching": true,
                                            "paging": false,
                                            "draw": false
                                        });

                                    }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : timeOutApi
                                });
                            }
                            oldPage = page;
                        }
                    });

                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : timeOutApi
        })

    });
	 $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
    function statustranfer(feetran) {
        var strresult;
        switch (feetran) {
            case 1:
                strresult = "Tài khoản thường chuyển đại lý cấp 1";
                break;
            case 2:
                strresult = "Tài khoản thường chuyển đại lý cấp 2";
                break;
            case 3:
                strresult = "Đại lý cấp 1 chuyển tài khoản thường";
                break;
            case 4:
                strresult = "Đại lý cấp 1 chuyển đại lý cấp 1";
                break;
            case 5:
                strresult = "Đại lý cấp 1 chuyển đại lý cấp 2";
                break;
            case 6:
                strresult = "Đại lý cấp 2 chuyển tài khoản thường";
                break;
            case 7:
                strresult = "Đại lý cấp 2 chuyển đại lý cấp 1";
                break;
            case 8:
                strresult = "Đại lý cấp 2 chuyển đại lý cấp 2";
                break;
        }
        return strresult;
    }


    function huydoanhso(nicknamesend, nicknamerecive, date, topds) {
            if(!confirm('Bạn chắc chắn muốn hủy doanh số đại lý ?'))
            {
                return false;
            }

        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/doanhsoajax')?>",
            data: {
                ns: nicknamesend,
                nr: nicknamerecive,
                date: date,
                tds: topds
            },

            dataType: 'json',
            success: function (result) {
                $("#bsModal3").modal("show");
                $("#statuspenđing").css({"color":"blue"});
                $("#statuspenđing").html("Hủy doanh số thành công");

            }
        });
    }

    function congdoanhso(nicknamesend, nicknamerecive, date, topds) {
        if(!confirm('Bạn chắc chắn muốn cộng doanh số đại lý ?'))
        {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/doanhsoajax')?>",
            data: {
                ns: nicknamesend,
                nr: nicknamerecive,
                date: date,
                tds: topds
            },

            dataType: 'json',
            success: function (result) {
                $("#bsModal3").modal("show");
                $("#statuspenđing").css({"color":"blue"});
                $("#statuspenđing").html("Cộng doanh số thành công");

            }
        });
    }

</script>