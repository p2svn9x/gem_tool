<section class="content-header">
    <h1>
        Lịch sử chuyển khoản bán vin
    </h1>
</section>
<form action="<?php echo base_url("agency/listtranfersellvin")?>" method="post">
<input type="hidden" value="<?php echo $admin_info->status ?>" id="statususer" name="statususer">
 <input type="hidden" value="<?php echo $admin_info->nickname ?>" id="hdnnickname1" name="hdnnickname1">
     <input type="hidden" value="<?php echo $admin_info->id ?>" id="hdnparentidagent" name="hdnparentidagent">
    <input type="hidden" value="<?php echo $parrentid ?>" id="hdnparentidagentlevel2" name="hdnparentidagentlevel2">
<input type="hidden" id="page1"  name="page1" >
<input type="hidden" value="<?php echo $listnn ?>" id="listdaily1">
<input type="hidden" value="<?php echo $listnn1 ?>" id="listdaily2">
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">

                    <?php if ($admin_info->status == "A"): ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1"></div>

                                    <label class="col-sm-1 control-label" style="width: 150px">NickName </label>
                                    <div class="col-sm-2">
                                        <input type="text" id="nickname" name="nickname" class="form-control" value="<?php echo $this->input->post("nickname")?>">
                                    </div>

                                    <input type="hidden" id="hdnnickname"  class="form-control"
                                           value="<?php echo $nickname ?>">
                                <label class="col-sm-1 control-label">Trạng thái</label>

                                <div class="col-sm-2">
                                    <select class="form-control" id="status" name="status" >
                                        <option value="">Chọn</option>

                                        <option value="1" <?php if($this->input->post("status")== "1"){echo "selected";}  ?>>Tài khoản thường chuyển đại lý cấp 1</option>
                                        <option value="2" <?php if($this->input->post("status")== "2"){echo "selected";}  ?>>Tài khoản thường chuyển đại lý cấp 2</option>
                                        <option value="3" <?php if($this->input->post("status")== "3"){echo "selected";}  ?>>Đại lý cấp 1 chuyển tài khoản thường</option>
                                        <option value="4" <?php if($this->input->post("status")== "4"){echo "selected";}  ?>>Đại lý cấp 1 chuyển đại lý cấp 1</option>
                                        <option value="5" <?php if($this->input->post("status")== "5"){echo "selected";}  ?>>Đại lý cấp 1 chuyển đại lý cấp 2</option>
                                        <option value="6" <?php if($this->input->post("status")== "6"){echo "selected";}  ?>>Đại lý cấp 2 chuyển tài khoản thường</option>
                                        <option value="7" <?php if($this->input->post("status")== "7"){echo "selected";}  ?>>Đại lý cấp 2 chuyển đại lý cấp 1</option>
                                        <option value="8" <?php if($this->input->post("status")== "8"){echo "selected";}  ?>>Đại lý cấp 2 chuyển đại lý cấp 2</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                        <div class="form-group">
						<form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <label class="col-sm-1 control-label">Từ ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="text" class="form-control" id="fromDate" name="fromDate" value="<?php echo $start_time?>"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <label class="col-sm-1 control-label">Đến ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input type="text" class="form-control" id="toDate" name="toDate" value="<?php echo $end_time?>"><span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <div class="col-sm-1"><input type="button" value="Tìm kiếm" name="submit"
                                                             class="btn btn-primary pull-right" id="search_tran"></div>
                                <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                             class="btn btn-primary pull-left" id="reset"
                                                             onclick="window.location.href = '<?php echo base_url('agency/listtranfersellvin') ?>'; ">
                                </div>
								
								 <div class="col-sm-1"><input type="button" value="Xuất Exel" name="submit"
                                             class="btn btn-primary pull-left" id="exportexel">
								</div>
                            </div>
							</form>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
						<form action="" method="POST">
                            <div class="row">
                                <?php if (isset($nickname)): ?>
                                    <input type="hidden" id="nickname" class="form-control"
                                           value="<?php echo $nickname ?>">
                                <?php else: ?>
                                    <input type="hidden" id="nickname" value="<?php echo $admin_info->nickname ?>">
                                <?php endif; ?>
                                <div class="col-sm-1"></div>
                                <label class="col-sm-1 control-label">Từ ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="text" class="form-control" id="fromDate" name="fromDate" value="<?php echo $start_time?>"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <label class="col-sm-1 control-label">Đến ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input type="text" class="form-control" id="toDate" name="toDate" value="<?php echo $end_time?>"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <div class="col-sm-1"><input type="button" value="Tìm kiếm" name="submit"
                                                             class="btn btn-primary pull-right" id="search_tran"></div>
                                <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                             class="btn btn-primary pull-left" id="reset"
                                                             onclick="window.location.href = '<?php echo base_url('agency/listtranfer') ?>'; ">
                                </div>
                            </div>
							</form>
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-12">
                        <table  id="example3" class="table" style="margin-bottom: 0px;border-top: 0px;display:none">
                            <tr>
                                <td style="width: 50px;border-top: 0px" ><b>Tổng vin gửi:</b></td>
                                <td id="totalvinsend" style="width: 50px;border-top: 0px"></td>
                                <td  style="width: 40px;border-top: 0px"><b>Tổng vin nhận:</b></td>
                                <td id="totalvinreceive" style="width: 50px;border-top: 0px"></td>
                                <td  style="width: 30px;border-top: 0px"><b>Tổng Phí:</b></td>
                                <td id="totalvinfee" style="width: 50px;border-top: 0px"></td>
                            </tr>
                        </table>
						  <table style="width:100%;margin-bottom:5px;">
                                <tr>
                                    <td colspan="5"><input type="button" value="Cập nhật" id="btnupdate" style="float:right" class="btn btn-primary pull-right"></td>
                                </tr>
                            </table>
							<div style="width: 100%;float: left;color: #ff0000;" id="error"></div>
                        <table id="example2" class="table table-bordered table-hover" style="table-layout: fixed;word-wrap: break-word;">
                            <thead>
                            <tr>
                                <th>STT</th>
                                    <th>TK chuyển</th>
                                    <th>TK nhận</th>
                                    <th>Số vin gửi</th>
                                    <th>Số vin nhận</th>
                                    <th>Phí</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Thời gian</th>
                                    <?php if ($admin_info->status == "D"): ?>
                                    <th><input type="checkbox" id="select_all"/>Hành động</th>
                                    <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody id="logaction">

                            </tbody>

                        </table>

                        <div id="spinner" class="spinner" style="display:none;">
                            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                 alt="Loading"/>
                        </div>
                        <div class="text-center pull-right">
                            <ul id="pagination-demo" class="pagination-lg"></ul>
                        </div>
                        <h1 id="resultsearch"></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<style>
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
    }

    #resultsearch {
        top: 50%;
        left: 50%;
        margin-left: 0px; /* half width of the spinner gif */
        margin-top: 0px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        width: 400px; /* width of the spinner gif */
        height: 100px; /*hight of the spinner gif +2px to fix IE8 issue */
    }
</style>


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
        var fromDatetime = $("#fromDate").val();
        var toDatetime = $("#toDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
		if ($("#statususer").val() == "D") {
			  $("#spinner").show();
            listTranferAgent();
        } else {
			  $("#spinner").show();
            listTranferAdmin();

        }
    });
	$("#exportexel").click(function () {
    $("#example2").table2excel({
        exclude: ".noExl",
        name: "Excel Document Name",
        filename: "listtranfer",
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true
    });
});
    function resulttranferlist(stt, namesend, namerecive, moneysend, moneyrecive, fee,mota, status, date, process) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td class ='idnamesend'>" + namesend + "</td>";
        rs += "<td class = 'idnamerecive'>" + namerecive + "</td>";
        rs += "<td class='mns'>" + commaSeparateNumber(moneysend) + "</td>";
        rs += "<td class='mnr'>" + commaSeparateNumber(moneyrecive) + "</td>";
        rs += "<td class='f'>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + mota + "</td>";
        rs += "<td>" + statustranfer(status) + "</td>";
        rs += "<td class='time'>" + date + "</td>";
        rs += "<td>";

        if (process == 1) {
            rs += "<input type='checkbox' value='Đã Duyệt' id='chk"+stt+"' checked=checked class='chk'  onchange=\"TransactionAccess('" + namesend + "','" + namerecive + "','" + date + "',0,'chk"+stt+"')\"> <span style='color:blue'> Đã Duyệt </span>";
        }
        else {
            rs += "<input type='checkbox' value='Chưa Duyệt'  class='chk' onchange=\"TransactionAccessCancel('" + namesend + "','" + namerecive + "','" + date + "',1)\"><span style='color:red'> Chưa Duyệt </span>";
        }

        rs += "</td>";
        rs += "</tr>";
        return rs;
    }
    function resulttranferlistAdmin(stt, namesend, namerecive, moneysend, moneyrecive, fee, mota,status, date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td class ='idnamesend'>" + namesend + "</td>";
        rs += "<td class = 'idnamerecive'>" + namerecive + "</td>";
        rs += "<td class='mns'>" + commaSeparateNumber(moneysend) + "</td>";
        rs += "<td class='mnr'>" + commaSeparateNumber(moneyrecive) + "</td>";
        rs += "<td class='f'>" + commaSeparateNumber(fee) + "</td>";
		  rs += "<td>" + mota + "</td>";
        rs += "<td>" + statustranfer(status) + "</td>";
        rs += "<td>" + date + "</td>";

        rs += "</tr>";
        return rs;
    }
    function csstextdaily() {
        var listdl1 = $("#listdaily1").val().split(',');
        var listdl2 = $("#listdaily2").val().split(',');
        $("table tr td.idnamesend").each(function (index, value) {
            $.each(listdl1, function (index1, value1) {
                if (value1 == value.innerHTML) {
                    $(this).text().css("color", "red");
                }
            });
        });
        $("table tr td.idnamerecive").each(function (index, value) {
            $.each(listdl2, function (index1, value1) {
                if (value1 == value.innerHTML) {
                    $(this).text().css("color", "red");
                }
            });
        });

    }

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
                strresult = "TK thường chuyển DL cấp 1";
                break;
            case 2:
                strresult = "TK thường  chuyển DL cấp 2";
                break;
            case 3:
                strresult = "DL cấp 1 chuyển TK thường";
                break;
            case 4:
                strresult = "DL cấp 1 chuyển DL cấp 1";
                break;
            case 5:
                strresult = "DL cấp 1 chuyển DL cấp 2";
                break;
            case 6:
                strresult = "DL cấp 2 chuyển TK thường";
                break;
            case 7:
                strresult = "DL cấp 2 chuyển DL cấp 1";
                break;
            case 8:
                strresult = "DL cấp 2 chuyển DL cấp 2";
                break;
        }
        return strresult;
    }
    function listTranferAgent() {
        if ($("#hdnparentidagent").val() == $("#hdnparentidagentlevel2").val()) {
            listAgent();
        }
      else if($("#hdnnickname1").val()==$("#nickname").val()){
            listAgent();
        }
        else {
            $("#spinner").hide();
            $('#logaction').html("Không tìm thấy kết quả");
        }
    }
    function listAgent() {
        var oldpage = 1;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/historyTransferAgent1') ?>",
            data: {
                nickname: $("#nickname").val(),
                status: "",
                timestart:  $('#fromDate').val(),
                timeend:  $('#toDate').val(),
                topds: 1,
                p: 1
            },
            dataType: 'json',
            success: function (data) {
                var result = "";
				 $("#error").html("");
                $("#spinner").hide();
                var countrow = data.totalRecord;
                $("#totalvinsend").html(commaSeparateNumber(data.totalVinSend));
                $("#totalvinreceive").html(commaSeparateNumber(data.totalVinSend));
                $("#totalvinfee").html(commaSeparateNumber(data.totalFee));
                $("#num").html(countrow);
                if (data.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html(result);
                } else {
                    stt = 1;
                    $.each(data.transactions, function (index, value) {
                        if ($("#hdnnickname1").val() == value.nick_name_send) {
                            result += resulttranferlist(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_send, value.status, value.trans_time, value.process);
                        }
                        else {
                            result += resulttranferlist(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.process);
                        }
                        stt++
                    });
                    $('#logaction').html(result);
                    $("#resultsearch").html("");
                    $('#pagination-demo').css("display", "block");
                    $('#pagination-demo').twbsPagination({
                        totalPages: data.total,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            oldpage = page;
                            if (page > 0) {
                                var result = "";
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('TranferAjax/historyTransferAgent1') ?>",
                                    data: {
                                        nickname: $("#nickname").val(),
                                        status: $("#status").val(),
                                        timestart: $('#fromDate').val(),
                                        timeend: $('#toDate').val(),
                                        p: page
                                    },
                                    dataType: 'json',
                                    success: function (data) {
                                        $("#spinner").hide();
										$("#error").html("");
                                        stt = 1;
                                        $.each(data.transactions, function (index, value) {
                                            if ($("#hdnnickname1").val() == value.nick_name_send) {
                                                result += resulttranferlist(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_send, value.status, value.trans_time, value.process);
                                            }
                                            else {
                                                result += resulttranferlist(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.process);
                                            }
                                            stt++
                                        });
                                        $('#logaction').html(result);
                                        csstextdaily();
                                        $('#pagination-demo').css("display", "block");
                                    }
									,error: function(){
										$("#spinner").hide();
										$("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
									},
									timeout:30000
                                });
                            }
                        }
                    });
                }
            }
			,error: function(){
                     $("#spinner").hide();
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:30000
        });
    }
    function listTranferAdmin() {
		var oldpage = 1;
        if ($("#hdnnickname").val() != "") {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('TranferAjax/historyTransferAdmin1') ?>",
                data: {
                    nickname: $("#hdnnickname").val(),
                    status: $("#status").val(),
                    timestart: $("#fromDate").val(),
                    timeend: $("#toDate").val(),
                    p: 1
                },
                dataType: 'json',
                success: function (data) {
                    var result = "";
					$("#error").html("");
                    $("#totalvinsend").html(commaSeparateNumber(data.totalVinSend));
                    $("#totalvinreceive").html(commaSeparateNumber(data.totalVinSend));
                    $("#totalvinfee").html(commaSeparateNumber(data.totalFee));
                    $("#spinner").hide();
                    if (data.transactions == "") {
                        $('#pagination-demo').css("display", "none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
                        $('#logaction').html(result);
                    } else {
                        stt = 1;
                        $.each(data.transactions, function (index, value) {
                            if ($("#hdnnickname1").val() == value.nick_name_send) {
                                result += resulttranferlistAdmin(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_send, value.status, value.trans_time, value.process);
                            }
                            else {
                                result += resulttranferlistAdmin(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.process);
                            }
                            stt++
                        });
                        $('#logaction').html(result);
                        $('#pagination-demo').css("display", "block");
                    
                    //click page
                    var countrow = data.totalRecord;
                    $("#num").html(countrow);
                    $("#resultsearch").html("");
                    $('#pagination-demosearch').css("display", "none");
                    $('#pagination-demo').twbsPagination({
                        totalPages: data.total,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            oldpage = page;
                            if (page > 1) {
                                var result = "";
                                $("#page1").val(page);
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('TranferAjax/historyTransferAdmin1') ?>",
                                    data: {
                                        nickname: $("#hdnnickname").val(),
                                        status: $("#status").val(),
                                        timestart: $("#fromDate").val(),
                                        timeend: $("#toDate").val(),
                                        p: page
                                    },
                                    dataType: 'json',
                                    success: function (data) {
                                        $("#spinner").hide();
										$("#error").html("");
                                        if (data.transactions == "") {
                                            $('#pagination-demo').css("display", "none");
                                            $("#resultsearch").html("Không tìm thấy kết quả");
                                            $('#logaction').html(result);
                                        } else {
                                            stt = 1;
                                            $.each(data.transactions, function (index, value) {
                                                if ($("#hdnnickname1").val() == value.nick_name_send) {
                                                    result += resulttranferlistAdmin(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_send, value.status, value.trans_time, value.process);
                                                }
                                                else {
                                                    result += resulttranferlistAdmin(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.process);
                                                }
                                                stt++
                                            });
                                            $('#logaction').html(result);
                                            csstextdaily();
                                            $('#pagination-demo').css("display", "block");
                                        }
                                    }
									,error: function(){
										$("#spinner").hide();
										$("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
									},
									timeout:30000
                                });
                            }
                        }
                     });
					}
                }
				,error: function(){
					$("#spinner").hide();
					$("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
				},
				timeout:30000
            });
        }
        else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('TranferAjax/historyTransferAdmin1') ?>",
                data: {
                    nickname: $("#nickname").val(),
                    status: $("#status").val(),
                    timestart: $("#fromDate").val(),
                    timeend: $("#toDate").val(),
                    topds: 1,
                    p: 1
                },
                dataType: 'json',
                success: function (data) {
                    var result = "";
					$("#error").html("");
                    $("#totalvinsend").html(commaSeparateNumber(data.totalVinSend));
                    $("#totalvinreceive").html(commaSeparateNumber(data.totalVinSend));
                    $("#totalvinfee").html(commaSeparateNumber(data.totalFee));
                    $("#spinner").hide();
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    $("#resultsearch").html("");
                    $('#pagination-demosearch').css("display", "none");
					$('#pagination-demo').css("display", "block");
                    $("#spinner").hide();

                    if (data.transactions == "") {
                        $('#pagination-demo').css("display", "none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
                        $('#logaction').html(result);
                    } else {
                        stt = 1;
                        $.each(data.transactions, function (index, value) {
                            if ($("#hdnnickname1").val() == value.nick_name_send) {
                                result += resulttranferlistAdmin(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_send, value.status, value.trans_time, value.process);
                            }
                            else {
                                result += resulttranferlistAdmin(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.process);
                            }
                            stt++
                        });
                        $('#logaction').html(result);
                    //click page
                    $('#pagination-demo').twbsPagination({
                        totalPages: data.total,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            oldpage = page;
                            if (page > 1) {
                                var result = "";
                                $("#page1").val(page);
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('TranferAjax/historyTransferAdmin1') ?>",
                                    data: {
                                        nickname: $("#nickname").val(),
                                        status: $("#status").val(),
                                        timestart: $("#fromDate").val(),
                                        timeend: $("#toDate").val(),
                                        p: page
                                    },
                                    dataType: 'json',
                                    success: function (data) {
                                        $("#spinner").hide();
										$("#error").html("");
                                        if (data.transactions == "") {
                                            $('#pagination-demo').css("display", "none");
                                            $("#resultsearch").html("Không tìm thấy kết quả");
                                            $('#logaction').html(result);
                                        } else {
                                            stt = 1;
                                            $.each(data.transactions, function (index, value) {
                                                if ($("#hdnnickname1").val() == value.nick_name_send) {
                                                    result += resulttranferlistAdmin(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_send, value.status, value.trans_time, value.process);
                                                }
                                                else {
                                                    result += resulttranferlistAdmin(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.process);
                                                }
                                                stt++
                                            });
                                            $('#logaction').html(result);
                                            csstextdaily();
                                        }
                                    }
									,error: function(){
										$("#spinner").hide();
										$("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
									},
									timeout:30000
                                });
                            }
                        }
                    });
				}
			}
				,error: function(){
					$("#spinner").hide();
					$("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
				},
				timeout:30000
            });
        }
    }
	function TransactionAccess(nicknamesend, nicknamerecive, date, status,id) {

        if (document.getElementById(id).checked == true) {
            return false;
        } else {
            var box= confirm("Bạn có chắc chắn muốn bỏ duyệt giao dịch này?");
            if (box==true)
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('TranferAjax/UpdateProcess')?>",
                    data: {
                        nicknamesend: nicknamesend,
                        nicknamereceive: nicknamerecive,
                        date: date,
                        status: status
                    },

                    dataType: 'json',
                    success: function (result) {
                        var baseurl = "<?php echo base_url('agency/listtranfersellvin')?>";
                        window.location.href = baseurl;
                    }
					
                });
            else
                document.getElementById(id).checked = true;

        }
    }
    function TransactionAccessCancel(nicknamesend, nicknamerecive, date, status) {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/UpdateProcess')?>",
            data: {
                nicknamesend: nicknamesend,
                nicknamereceive: nicknamerecive,
                date: date,
                status: status
            },

            dataType: 'json',
            success: function (result) {
                var baseurl = "<?php echo base_url('agency/listtranfersellvin')?>";
                window.location.href = baseurl;
            }
        });
    }

    $('#select_all').click(function(e){
        var table= $(e.target).closest('table');
        $('td input:checkbox',table).prop('checked',this.checked);

    });
    $('#btnupdate').click(function(e){
        $('#example2').find('tr').each(function () {
            var row = $(this);
            var  nick_name_send= $(this).find(".idnamesend").text();
            var  nick_name_receive= $(this).find(".idnamerecive").text();
            var  time= $(this).find(".time").text();
            if (row.find('input[type="checkbox"]').is(':checked')) {
                TransactionAccessCancel(nick_name_send,nick_name_receive,time,1);
            }
            else{
                TransactionAccessCancel(nick_name_send,nick_name_receive,time,0);
            }
        });

    });
</script>