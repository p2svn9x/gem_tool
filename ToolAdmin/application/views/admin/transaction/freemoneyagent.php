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
                <h6>Danh sách đóng băng tiền đại lý </h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('transaction/exportfreemoneyagent') ?>" method="post">

                <div class="formRow">

                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="toDate" name="toDate"
                                           value="<?php echo $this->input->post("toDate") ?>"> <span
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
                                           value="<?php echo $this->input->post("fromDate") ?>"> <span
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
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Nick name:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                            </td>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Trạng thái:</label>
                            </td>
                            <td class="item"><select id="statusdb" name="statusdb"
                                                     style="margin-left: 27px;margin-bottom:-2px;width: 142px">
                                    <option value="" <?php if ($this->input->post('statusdb') == "") {
                                        echo "selected";
                                    } ?>>Chọn</option>
                                    <option value="1" <?php if ($this->input->post('statusdb') == "1") {
                                        echo "selected";
                                    } ?>>Đang đóng băng
                                    </option>
                                    <option value="0" <?php if ($this->input->post('statusdb') == "0") {
                                        echo "selected";
                                    } ?>>Đã mở đóng băng
                                    </option>

                                </select>
                            </td>
                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 123px">
                            </td>
                            <td style="">
                                <input type="button" id="exportexel" value="Xuất Exel" class="button blueB"
                                       style="margin-left: 20px">
                            </td>
                            <td>
                                <input type="reset"
                                       onclick="window.location.href = '<?php echo admin_url('transaction/freemoneyagent') ?>'; "
                                       value="Reset" class="basic" style="margin-left: 20px">
                            </td>
                        </tr>

                    </table>

                </div>
            </form>
            <div class="formRow"></div>
            <input type="hidden" value="<?php echo $admin_info->Status ?>" id="statusopen">

            <div id="spinner" class="spinner" style="display:none;">
                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
            </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>Session id</td>
                    <td>Nickname</td>
                    <td>Tiền đóng băng</td>
                    <td>Thời gian</td>
                    <?php if ($admin_info->Status == "W" || $admin_info->Status == "A" ||  $admin_info->Status == "C"): ?>
                        <td>Mở đóng băng</td>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody id="logaction">
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p id="statuspenđing" style="color: #0000ff"></p>
                </div>
                <div class="modal-footer">
                    <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                           aria-hidden="true">
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <ul id="pagination-demo" class="pagination-sm"></ul>

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
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.table2excel.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

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

    $(document).ready(function () {
		$("#resultsearch").html("Vui lòng ấn nút tìm kiếm");


        $("#exportexel").click(function () {
            $("#checkAll").table2excel({
                exclude: ".noExl",
                name: "lichsudongbangdaily",
                filename: "LichSuDongBangDaiLy",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true
            });
        });
	})
      $("#search_tran").click(function () {
        var oldPage = 0;
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/freemoneyagentajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages: 1,
                status: $("#statusdb").val()
            },

            dataType: 'json',
            success: function (result) {

                $("#spinner").hide();
                if (result.length == 0) {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					 $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    stt = 1;
                    $.each(result, function (index, value) {
                        result += resultSearchTransction(stt, value.sessionId, value.nickname, value.money, value.createTime,value.status);
                        stt++;
                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
						"retrieve": true,
                        "ordering": true,
                        "searching": false,
                        "paging": false,
                        "draw": false
                    });
                    $('#pagination-demo').twbsPagination({
                        totalPages: 200,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('transaction/freemoneyagentajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page,
                                        status: $("#statusdb").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result, function (index, value) {
                                            result += resultSearchTransction(stt, value.sessionId, value.nickname, value.money, value.createTime,value.status);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
											"retrieve": true,
                                            "ordering": true,
                                            "searching": false,
                                            "paging": false,
                                            "draw": false
                                        });
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                    }, timeout: 40000
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
            }, timeout: 40000
        })
    });
    function resultSearchTransction(stt, sesionid, nickname, money, date, status) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + sesionid + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(money) + "</td>";
        rs += "<td>" + moment.unix(date / 1000).format("DD MMM YYYY hh:mm a") + "</td>";
        if ($("#statusopen").val() == "A" || $("#statusopen").val() == "W" || $("#statusopen").val() == "Q" ||  $("#statusopen").val() == "C") {
            if (status == 1) {

                rs += "<td>" + "<input type='button' id='updatecard' value='Mở đóng băng' class='button blueB'  onclick=\"opendongbang('" + sesionid + "','" + nickname + "','" + money + "')\" >" + "</td>";
            }else{
                rs += "<td>" + "" + "</td>";
            }
        }
        rs += "</tr>";
        return rs;
    }


    function opendongbang(referentid, nickname, money) {
        if (!confirm('Bạn chắc chắn muốn mở đóng băng ?')) {
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/openmoneyagentajax')?>",
            data: {
                sid: referentid,
                nickname: nickname,
                money: money

            },

            dataType: 'text',
            success: function (result) {

                $("#spinner").hide();
                if (result == 0) {

                    $("#bsModal3").modal("show");
                    $("#statuspenđing").html("Bạn mở đóng băng thành công");
                } else if (result == 1) {
                    $("#statuspenđing").html("Bạn mở đóng băng không thành công");
                }

            }, error: function () {
                $("#spinner").hide();
                $("#bsModal11").modal("show");
            }, timeout: 20000
        });


    }

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


</script>