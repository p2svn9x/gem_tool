<section class="content-header">
    <h1>
        Danh sách giao dịch trong 24h
    </h1>
</section>
<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-1 control-label">Hành động</label>

                            <div class="col-sm-2">

                                    <select id="action" class="form-control">
                                        <option value="" <?php if ($this->input->post("action") == "") {echo "selected";} ?>>Chọn hành động</option>
                                        <option value="1"<?php if ($this->input->post("action") == "1") {echo "selected";} ?>>Đóng băng</option>
                                        <option value="2" <?php if ($this->input->post("action") == "2") {echo "selected";} ?>>Đã mở</option>
                                        <option value="0" <?php if ($this->input->post("action") == "0") {echo "selected";} ?>>Đã đóng băng</option>
                                    </select>

                            </div>
                            <div class="col-sm-1"><input type="submit" value="Tìm kiếm" name="submit"
                                                         class="btn btn-primary pull-right" id="search_tran"></div>
                            <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                         class="btn btn-primary pull-left" id="reset"
                                                         onclick="window.location.href = '<?php echo base_url('freeze') ?>'; ">
                            </div>
                        </div>
                    </div>
            <div class="row">
                <input type="hidden" value="<?php echo $admin_info->nickname ?>" id="nickname" name="nickname">
                <input type="hidden" value="<?php echo $admin_info->status ?>" id="statususer"
                       name="statususer">

                <div class="col-sm-12">
                    <?php if (isset($message) && $message): ?>
                        <?php echo $message ?>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12">
                    <div class="error" style="margin-bottom: 10px;color: #ff0000;font-size: 14px"></div>
                    <table id="example2" class="table table-bordered table-hover" style="table-layout: fixed;word-wrap: break-word;">
                        <thead>
                        <tr>
                            <th style="width:3%">STT</th>
                            <th style="width:10%">TK chuyển</th>
                            <th style="width:10%">TK nhận</th>
                            <th style="width:7%">Số vin gửi</th>
                            <th style="width:7%">Số vin nhận</th>
                            <th style="width:5%">Phí</th>
                            <th style="width:20%">Mô tả</th>
                            <th style="width:20%">Trạng thái</th>
                            <th style="width:15%">Thời gian</th>
                            <th style="width:10%">Hành động</th>
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
    </div>
</section>
<style>
    .spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px;
        margin-top: -50px;
        text-align: center;
        z-index: 1234;
        overflow: auto;
        width: 100px;
        height: 102px;
    }
</style>
<script>
    $(document).ready(function () {
        $("#spinner").show();
        if ($("#statususer").val() == "D") {
            listAgent($("#action").val());
        } else {
            listAdmin($("#action").val())

        }
    });
    $("#search_tran").click(function () {
        $("#spinner").show();
        if ($("#statususer").val() == "D") {
            listAgent($("#action").val());
        } else {
            listAdmin($("#action").val())

        }
    });
    //danh sach giao dich dong bang cua dai ly
    function resulttranferlist(stt, namesend, namerecive, moneysend, moneyrecive, fee, mota, status, date, process, transctionNo) {
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

        if (process == 1 && status>2) {
            rs += "<input type='button' value='Đóng băng''  class='btn btn-primary' onclick=\"TransactionAccess('" + transctionNo + "')\"> ";
        }
        if (process == 2) {
            rs += "<input type='button' value='Đã mở'  value='Đã Đóng Băng' class='btn btn-primary' disabled=disabled> ";
        }
        if (process == 0) {
            rs += "<input type='button' value='Đã Đóng Băng' class='btn btn-primary' disabled=disabled >";
        }

        rs += "</td>";
        rs += "</tr>";
        return rs;
    }
    //danh sach giao dich dong bang cua admin
    function resulttranferlistAdmin(stt, namesend, namerecive, moneysend, moneyrecive, fee, mota, status, date,process) {
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
        rs += "<td>";
        if (process == 1) {
            rs += "<span>Chưa đóng băng</span>";
        }
        if (process == 2) {
            rs += "Đã mở";
        }
        if (process == 0) {
            rs += "<span>Đã đóng băng</span>";
        }
        rs += "</td>";
        rs += "</tr>";
        return rs;
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
    function TransactionAccess(transactionNo) {
        var box = confirm("Bạn có chắc chắn muốn đóng băng giao dịch này? Giao dịch này sẽ không được tính doanh số sau khi đóng băng");
        if (box == true) {
            $.blockUI({ message: '<h1><img src="<?php echo public_url('admin/images/gif-load.gif') ?>" /> Vui lòng chờ...</h1>' });
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('TranferAjax/closeFreeze')?>",
                data: {
                    transactionNo: transactionNo,
                },
                dataType: 'json',
                success: function (result) {
                    $.unblockUI();
                    if (result.errorCode == "0") {
                        $(".error").html("Đóng băng thành công");
                        window.location.href="freeze";
                    }
                    else if (result.errorCode == "1001") {
                        $(".error").html("User chưa login");
                    }
                    else if (result.errorCode == "1043") {
                        $(".error").html("Không tìm thấy giao dịch chuyển tiền");
                    }
                    else if (result.errorCode == "1042") {
                        $(".error").html("Không đủ tiền dể đóng băng");
                    }
                    else if (result.errorCode == "1017") {
                        $(".error").html("Số tiền đóng băng bằng 0");
                    }
                    else if (result.errorCode == "1030") {
                        $(".error").html("Lỗi hệ thống");
                    }
                    else if (result.errorCode == "1034") {
                        $(".error").html("Lỗi hệ thống");
                    }
                    else if (result.errorCode == "1031") {
                        $(".error").html("Lỗi hệ thống");
                    }
                }
				,error: function(){
                    $.unblockUI();
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
            });

        }

    }
    //list agent
    function listAgent($freeze) {
    var oldpage=1;
	 var result = "";
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/freezeAgent') ?>",
            data: {
                nickname: $("#nickname").val(),
                page: 1,
                freeze: $freeze
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                var result = "";
                $("#spinner").hide();
                if (data.listTranfer == "") {
                    $("#logaction").html("");
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    $("#resultsearch").html("");
					if(oldpage==1){
						 stt = 1;
							$.each(data.listTranfer, function (index, value) {
								result += resulttranferlist(stt, value.nick_send, value.nick_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.is_freeze_money, value.transaction_no);
								stt++
							});
							$('#logaction').html(result);
					}
                    $('#pagination-demo').twbsPagination({
                        totalPages: 1000,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                           oldpage=page;
							if(oldpage>1){
								result = "";
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('TranferAjax/freezeAgent') ?>",
                                    data: {
                                        nickname: $("#nickname").val(),
                                        page: page,
                                        freeze: $freeze
                                    },
                                    cache: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(data.listTranfer, function (index, value) {
                                            result += resulttranferlist(stt, value.nick_send, value.nick_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.is_freeze_money, value.transaction_no);
                                            stt++
                                        });
                                        $('#logaction').html(result);
                                    }
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
                    timeout:50000
        });
    }
    //list admin
    function listAdmin($freeze) {
       var oldpage=1;
	    var result = "";
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/freezeAdmin') ?>",
            data: {
                page: 1,
                freeze: $freeze
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
               
                $("#spinner").hide();
                if (data.listTranfer == "") {
                    $("#logaction").html("");
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
					if(oldpage==1){
						 stt = 1;
							$.each(data.listTranfer, function (index, value) {
								result += resulttranferlistAdmin(stt, value.nick_send, value.nick_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.is_freeze_money);
								stt++
							});
							$('#logaction').html(result);
					}
                    $('#pagination-demo').twbsPagination({
                        totalPages: 1000,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
							oldpage=page;
							if(oldpage>1){
								result = "";
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('TranferAjax/freezeAdmin') ?>",
                                    data: {
                                        page: page,
                                        freeze: $freeze
                                    },
                                    cache: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(data.listTranfer, function (index, value) {
                                            result += resulttranferlistAdmin(stt, value.nick_send, value.nick_receive, value.money_send, value.money_receive, value.fee, value.des_receive, value.status, value.trans_time, value.is_freeze_money);
                                            stt++
                                        });
                                        $('#logaction').html(result);
                                    }
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
                    timeout:50000
        });
    }
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>