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
            <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
            <div class="title">
                <h6>Lịch sử cập nhật thẻ pendding</h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('report/reportupdatecard') ?>" method="post">
                <div class="formRow">
                    <table>
                        <tr>
                            <td>
                                <label for="param_name" class="formLeft" id="nameuser"
                                       style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                            <td class="item">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" id="toDate" name="toDate" value="<?php echo $start_time ?>"> <span class="input-group-addon">
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
                                    <input type="text" id="fromDate" name="fromDate" value="<?php echo $end_time ?>"> <span class="input-group-addon">
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
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name"></td>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 125px">Admin xử lý:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="txtnickname" value="<?php echo $this->input->post('txtnickname') ?>" name="txtnickname"></td>

                        </tr>

                    </table>

                </div>

                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Mã thẻ:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="txtmathe"  value="<?php echo $this->input->post('txtmathe') ?>" name="txtmathe"></td>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Mã serial:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="txtserial" value="<?php echo $this->input->post('txtserial') ?>" name="txtserial"></td>
                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Mã giao dịch:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="magiaodich" value="<?php echo $this->input->post('magiaodich') ?>" name="magiaodich"></td>

                            <td><label style="margin-left: 70px;margin-bottom:-2px;width: 100px">Loại thẻ:</label></td>
                            <td class="">
                                <select id="select_provider" name="select_provider"
                                        style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                    <option value="">Chọn</option>
                                    <option value="Viettel" <?php if($this->input->post('select_provider') == "Viettel" ){echo "selected";} ?>>Viettel</option>
                                    <option value="Mobifone" <?php if($this->input->post('select_provider') == "Mobifone" ){echo "selected";} ?>>Mobifone</option>
                                    <option value="Vinaphone" <?php if($this->input->post('select_provider') == "Vinaphone" ){echo "selected";} ?>>Vinaphone</option>
                                    <option value="Zing" <?php if($this->input->post('select_provider') == "Zing" ){echo "selected";} ?>>Zing</option>
                                    <option value="Vcoin" <?php if($this->input->post('select_provider') == "Vcoin" ){echo "selected";} ?>>Vcoin</option>
                                    <option value="Gate" <?php if($this->input->post('select_provider') == "Gate" ){echo "selected";} ?>>Gate</option>
                                    <option value="VietNamMobile" <?php if($this->input->post('select_provider') == "VietNamMobile" ){echo "selected";} ?>>VietNamMobile</option>
                                </select>
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="formRow">

                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Trạng thái:</label></td>
                            <td class="">
                                <select id="select_status" name="select_status"
                                        style="margin-left: 20px;margin-bottom:-2px;width: 143px">
                                    <option value="">Chọn</option>
                                    <option value="0" <?php if($this->input->post('select_status') == "0" ){echo "selected";} ?>>Thành công</option>
                                    <option value="1" <?php if($this->input->post('select_status') == "1" ){echo "selected";} ?>>Thất bại</option>
                                    <option value="30" <?php if($this->input->post('select_status') == "30" ){echo "selected";} ?>>Đang xử lý</option>
                                    <option value="31" <?php if($this->input->post('select_status') == "31" ){echo "selected";} ?>>Thẻ đã nạp trước đó</option>
                                    <option value="32" <?php if($this->input->post('select_status') == "32" ){echo "selected";} ?>>Thẻ bị khóa</option>
                                    <option value="33" <?php if($this->input->post('select_status') == "33" ){echo "selected";} ?>>Thẻ chưa kích hoạt</option>
                                    <option value="34" <?php if($this->input->post('select_status') == "34" ){echo "selected";} ?>>Thẻ hết hạn</option>
                                    <option value="35" <?php if($this->input->post('select_status') == "35" ){echo "selected";} ?>>Sai mã thẻ</option>
                                    <option value="36" <?php if($this->input->post('select_status') == "36" ){echo "selected";} ?>>Mã serial không đúng</option>
                                </select>
                            </td>
                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 50px">
                            </td>
                            <td>
                                <input type="reset"
                                       onclick="window.location.href = '<?php echo admin_url('report/reportupdatecard') ?>'; "
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
                <div class="row">
                    <div class="col-sm-2">
                        <h5>Viettel:<span style="color: #0000ff" id="money1"></span></h5>
                    </div>
                    <div class="col-sm-2">
                        <h5>Vinaphone:<span style="color: #0000ff" id="money2"></span></h5>
                    </div>
                    <div class="col-sm-2">
                        <h5>Mobifone:<span style="color: #0000ff" id="money3"></span></h5>
                    </div>
                    <div class="col-sm-2">
                        <h5>Gate:<span style="color: #0000ff" id="money6"></span></h5>
                    </div>

                </div>
            </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>Mã giao dịch</td>
                    <td>Nick name</td>
                    <td>Admin xử lý</td>
                    <td>Thẻ</td>
                    <td>Serial</td>
                    <td>Mã thẻ</td>
                    <td>Mệnh giá</td>
                    <td>Mã lỗi dịch vụ</td>
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
    function resultSearchTransction(stt,rid, nickName,actor, provider, serial, pin,amount, status,message,code,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + nickName + "</td>";
        rs += "<td>" + actor + "</td>";
        rs += "<td>" + provider + "</td>";
        rs += "<td>" + serial + "</td>";
        rs += "<td>" + pin + "</td>";
        rs += "<td>" + commaSeparateNumber(amount) + "</td>";
        rs += "<td>"+status+"</td>";
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
            url: "<?php echo admin_url('report/reportupdatecardajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                provider: $("#select_provider").val(),
                serial : $("#txtserial").val(),
                mathe: $("#txtmathe").val(),
                status: $("#select_status").val(),
                toDate: $("#toDate").val(),
                fromDate :   $("#fromDate").val(),
                pages : 1,
                tranid : $("#magiaodich").val(),
                txtnickname: $("#txtnickname").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.trans == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
					   $('#summoney').html("");
                    $('#sumrecord').html("");
                    $('#money1').html("");
                    $('#money2').html("");
                    $('#money3').html("");
                    $('#money6').html("");
                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.totalPage;
                    var totalmoney = commaSeparateNumber(result.moneyReponse[0].value);
                    var totalrecord = commaSeparateNumber(result.totalRecord);
                    var total1 = commaSeparateNumber(result.moneyReponse[1].value);
                    var total2 = commaSeparateNumber(result.moneyReponse[2].value);
                    var total3 = commaSeparateNumber(result.moneyReponse[3].value);
                    var total6 = commaSeparateNumber(result.moneyReponse[6].value);
                    $('#summoney').html(totalmoney);
                    $('#sumrecord').html(totalrecord);
                    $('#money1').html(total1);
                    $('#money2').html(total2);
                    $('#money3').html(total3);
                    $('#money6').html(total6);
                    stt = 1;
                    $.each(result.trans, function (index, value) {
                        result += resultSearchTransction(stt, value.referenceId, value.nickName,value.actor, value.provider, value.serial, value.pin, value.amount, value.status, value.message, value.code, value.plusMoneyLog);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if(oldpage>0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('report/reportupdatecardajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        provider: $("#select_provider").val(),
                                        serial: $("#txtserial").val(),
                                        mathe: $("#txtmathe").val(),
                                        status: $("#select_status").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page,
                                        tranid : $("#magiaodich").val(),
                                        txtnickname: $("#txtnickname").val()

                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.trans, function (index, value) {
                                            result += resultSearchTransction(stt, value.referenceId, value.nickName,value.actor, value.provider, value.serial, value.pin, value.amount, value.status, value.message, value.code, value.plusMoneyLog);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
										   $('#summoney').html("");
											$('#sumrecord').html("");
											$('#money1').html("");
											$('#money2').html("");
											$('#money3').html("");
											$('#money6').html("");
                                        $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                    },timeout : 20000
                                });
                            }
                            oldpage = page;
                        }
                    });
                }

            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
				   $('#summoney').html("");
                    $('#sumrecord').html("");
                    $('#money1').html("");
                    $('#money2').html("");
                    $('#money3').html("");
                    $('#money6').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : 20000
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


</script>