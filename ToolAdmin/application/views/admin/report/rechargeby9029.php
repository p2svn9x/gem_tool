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
                <h6>Lịch sử nạp vin 9029</h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('report/rechargeby9029') ?>" method="post">
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
                            <td><label style="margin-left: 70px;margin-bottom:-2px;width: 100px">Mệnh giá:</label></td>
                            <td class="">
                                <select id="select_amout" name="select_amout"
                                        style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                    <option value="">Chọn</option>
                                    <option value="1000" <?php if($this->input->post('select_amout') == "1000" ){echo "selected";} ?>>1.000</option>
                                    <option value="2000" <?php if($this->input->post('select_amout') == "2000" ){echo "selected";} ?>>2.000</option>
                                    <option value="3000" <?php if($this->input->post('select_amout') == "3000" ){echo "selected";} ?>>3.000</option>
                                    <option value="4000" <?php if($this->input->post('select_amout') == "4000" ){echo "selected";} ?>>4.000</option>
                                    <option value="5000" <?php if($this->input->post('select_amout') == "5000" ){echo "selected";} ?>>5.000</option>
                                    <option value="10000" <?php if($this->input->post('select_amout') == "10000" ){echo "selected";} ?>>10.000</option>
                                    <option value="15000" <?php if($this->input->post('select_amout') == "15000" ){echo "selected";} ?>>15.000</option>
                                    <option value="20000" <?php if($this->input->post('select_amout') == "20000" ){echo "selected";} ?>>20.000</option>
                                    <option value="30000" <?php if($this->input->post('select_amout') == "30000" ){echo "selected";} ?>>30.000</option>
                                    <option value="50000" <?php if($this->input->post('select_amout') == "50000" ){echo "selected";} ?>>50.000</option>
                                    <option value="100000" <?php if($this->input->post('select_amout') == "100000" ){echo "selected";} ?>>100.000</option>
                                </select>
                            </td>
                        </tr>

                    </table>

                </div>

                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Mã giao dịch:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="txtgiaodich"  value="<?php echo $this->input->post('txtgiaodich') ?>" name="txtgiaodich"></td>
                            <td><label style="margin-left: 70px;margin-bottom:-2px;width: 100px">Trạng thái:</label></td>
                            <td class="">
                                <select id="select_status" name="select_status"
                                        style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                    <option value="">Chọn</option>
                                    <option value="0" <?php if($this->input->post('select_status') == "0" ){echo "selected";} ?>>Thành công</option>
                                </select>
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Điện thoại:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="txtmobile"  value="<?php echo $this->input->post('txtmobile') ?>" name="txtmobile"></td>
                            <td style="">
                                <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 50px">
                            </td>
                            <td>
                                <input type="reset"
                                       onclick="window.location.href = '<?php echo admin_url('report/rechargeby9029') ?>'; "
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
                    <td>Nick name</td>
                    <td>Điện thoại</td>
                    <td>Tin nhắn gửi</td>
                    <td>Mệnh giá</td>
                    <td>Mã trả về 1 pay</td>
                    <td>Mã giao dịch</td>
                    <td>Mô tả</td>
                    <td>Vin</td>
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
    function resultSearchTransction(stt,nickname, mobile, momess, amout, errormess,rid, description,money,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + mobile + "</td>";
        rs += "<td>" + momess + "</td>";
        rs += "<td>" + commaSeparateNumber(amout) + "</td>";
        rs += "<td>" + errormess + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + description + "</td>";
        rs += "<td>" + commaSeparateNumber(money) + "</td>";
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
            url: "<?php echo admin_url('report/rechargeby9029ajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                amout: $("#select_amout").val(),
                mobile : $("#txtmobile").val(),
                rid : $("#txtgiaodich").val(),
                status: $("#select_status").val(),
                toDate: $("#toDate").val(),
                fromDate :   $("#fromDate").val(),
                pages : 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					 $('#logaction').html("");
                } else {
						$("#resultsearch").html("");
                    var totalPage = result.totalPages;
                    var totalmoney = commaSeparateNumber(result.totalMoney);
                    var totalrecord = commaSeparateNumber(result.totalSuccess);
                    $('#summoney').html(totalmoney);
                    $('#sumrecord').html(totalrecord);

                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.nickname,value.mobile, value.moMessage, value.amount, value.errorMessage, value.requestId, value.des, value.money, value.timeLog);
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
                                    url: "<?php echo admin_url('report/rechargeby9029ajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        amout: $("#select_amout").val(),
                                        mobile : $("#txtmobile").val(),
                                        rid : $("#txtgiaodich").val(),
                                        status: $("#select_status").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate :   $("#fromDate").val(),
                                        pages: page

                                    },
                                    dataType: 'json',
                                    success: function (result) {
										$("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.nickname,value.mobile, value.moMessage, value.amount, value.errorMessage, value.requestId, value.des, value.money, value.timeLog);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : 40000
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
            },timeout : 40000
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