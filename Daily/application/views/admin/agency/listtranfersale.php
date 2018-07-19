<section class="content-header">
    <h1>
        Lịch sử chuyển khoản bán vin
    </h1>
</section>
<form action="<?php echo base_url("agency/listtranfersale/$nickname")?>" method="post">
    <input type="hidden" value="<?php echo $admin_info->status ?>" id="statususer" name="statususer">
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
                                        <input type="text" id="nickname" name="nickname" class="form-control" value="<?php echo $nickname?>">
                                    </div>

                                    <input type="hidden" id="hdnnickname"  name="hdnnickname" class="form-control"
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
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <label class="col-sm-1 control-label">Tháng:</label>

                                    <div class="col-sm-2">
                                        <div class="input-group date" id="datetimepicker1">
                                            <input type="text" class="form-control" id="fromDate" name="fromDate"> <span
                                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                        </div>
										 <input type="hidden" id="startDate">  
                                            <input type="hidden" id="endDate"> 
                                    </div>
                                    <label class="col-sm-1 control-label" style="display:none">Đến ngày:</label>

                                    <div class="col-sm-2" style="display:none">
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
                                                                 onclick="window.location.href = '<?php echo base_url('agency/listtranfersale') ?>'; ">
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="form-group">
                                <div class="row">

                                    <?php if (isset($nickname)): ?>
                                        <input type="hidden" id="nickname" class="form-control"
                                               value="<?php echo $nickname ?>">
                                    <?php else: ?>
                                        <input type="hidden" id="nickname" value="<?php echo $admin_info->nickname ?>">
                                    <?php endif; ?>
                                    <div class="col-sm-1"></div>
                                    <label class="col-sm-1 control-label">Tháng:</label>

                                    <div class="col-sm-2">
                                        <div class="input-group date" id="datetimepicker1">
                                            <input type="text" class="form-control" id="fromDate"> <span
                                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                        </div>
										 <input type="hidden" id="startDate">  
                                            <input type="hidden" id="endDate">
                                    </div>
                                    <label class="col-sm-1 control-label" style="display:none">Đến ngày:</label>

                                    <div class="col-sm-2" style="display:none">
                                        <div class="input-group date" id="datetimepicker2">
                                            <input type="text" class="form-control" id="toDate"> <span
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
                            </div>
                        <?php endif; ?>
						<div style="width: 100%;float: left;color: #ff0000;" id="error"></div>
						 <div style="width: 100%;text-align: left;margin-bottom: 20px;color: #ff0000" id="totalvinsend"></div>
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tài khoản chuyển</th>
                                    <th>Tài khoản nhận</th>
                                    <th>Số vin gửi</th>
                                    <th>Số vin nhận</th>
                                    <th>Phí chuyển khoản</th>
                                    <th>Trạng thái</th>
                                    <th>Thời gian</th>
                                    <th>Status</th>
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
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        width: 400px; /* width of the spinner gif */
        height: 100px; /*hight of the spinner gif +2px to fix IE8 issue */
    }
</style>


<script>
    $(function () {
         $('#datetimepicker1').datetimepicker({
            format: 'MM/YYYY',

        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
    $("#search_tran").click(function () {
		$("#spinner").show();
        var queryDate = $("#fromDate").val();
        dateParts = queryDate.match(/(\d+)/g);
        $("#startDate").val(FirstDayOfMonth(dateParts[1],dateParts[0]));
        $("#endDate").val(LastDayOfMonth(dateParts[1],dateParts[0]));
       listTranfer();
    });

    function resulttranferlist(stt, namesend, namerecive, moneysend, moneyrecive, fee, status, date,topds) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td class ='idnamesend'>" + namesend + "</td>";
        rs += "<td class = 'idnamerecive'>" + namerecive + "</td>";
        rs += "<td>" + commaSeparateNumber(moneysend) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyrecive) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + statustranfer(status) + "</td>";
        rs += "<td>" + date + "</td>";
        if(topds==1){
            rs += "<td>Cộng doanh số</td>";
        }
        else{
            rs += "<td>Hủy doanh số</td>";
        }
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        $("#spinner").show();
		$("#fromDate").val(getFirtDayOfMonth());
        var queryDate = $("#fromDate").val();
        dateParts = queryDate.match(/(\d+)/g);
        $("#startDate").val(FirstDayOfMonth(dateParts[1],dateParts[0]));
        $("#endDate").val(LastDayOfMonth(dateParts[1],dateParts[0]));
            listTranfer();
    });

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
    function listTranfer() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/historyTransferSale') ?>",
            data: {
                nicknamegui:"",
                nicknamenhan: $("#nickname").val(),
                status: $("#status").val(),
                timestart: $("#startDate").val(),
                timeend: $("#endDate").val(),
                month: $("#fromDate").val(),
                topds:1,
                p: 1
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
				 $("#error").html("");
                var countrow = result.totalRecord;
                $("#num").html(countrow);
				  $("#totalvinsend").html("Tổng số vin nhận:"+commaSeparateNumber(result.totalVinSend));
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    $("#resultsearch").html("");
                    $('#pagination-demo').twbsPagination({
                        totalPages: result.total,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            $("#spinner").show();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('TranferAjax/historyTransferSale') ?>",
                                data: {
                                    nicknamegui:"",
                                    nicknamenhan: $("#hdnnickname").val(),
                                    status: $("#status").val(),
                                    timestart: $("#startDate").val(),
									timeend: $("#endDate").val(),
									month: $("#fromDate").val(),
                                    p: page
                                },
                                dataType: 'json',
                                success: function (result) {
                                    $("#spinner").hide();
									  $("#totalvinsend").html("Tổng số vin nhận:"+commaSeparateNumber(result.totalVinSend));
									$("#error").html("");
                                    stt = 1;
                                    $.each(result.transactions, function (index, value) {
                                        result += resulttranferlist(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.status, value.trans_time,value.top_ds);
                                        stt++
                                    });
                                    $('#logaction').html(result);
                                    csstextdaily();
                                }
								,error: function(){
									$("#spinner").hide();
									$("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
								},
								timeout:30000
                            });
                        }
                    });
                }
            },error: function(){
                     $("#spinner").hide();
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:30000
        });
    }
//tinh tong
     function getFirtDayOfMonth() {
        var date = new Date();
        var thangtruoc = '';
        var ngaytruoc = '';
        var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        if (firstDay.getMonth() < 10) {
            thangtruoc = "0" + (firstDay.getMonth() + 1);
        }
        else {
            thangtruoc = firstDay.getMonth() + 1;
        }
        if (firstDay.getDate() < 10) {
            ngaytruoc = "0" + firstDay.getDate();
        }
        else {
            ngaytruoc = firstDay.getDate();
        }
        $("#startDate").val( firstDay.getFullYear() + '-' + (thangtruoc) + '-' + (ngaytruoc) + " " + "00:00:00")
        return thangtruoc +'/'+firstDay.getFullYear();
    }

    function getLastDayOfMonth() {
        var date = new Date();
        var thangsau = '';
        var ngaysau = '';
        var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        if (lastDay.getMonth() < 10) {
            thangsau = "0" + (lastDay.getMonth() + 1);
        }
        else {
            thangsau = lastDay.getMonth() + 1;
        }
        if (lastDay.getDate() < 10) {
            ngaysau = "0" + lastDay.getDate();
        }
        else {
            ngaysau = lastDay.getDate();
        }
         $("#endDate").val(lastDay.getFullYear() + '-' + (thangsau) + '-' + (ngaysau) + " " + "23:59:59")
        return lastDay.getFullYear() + '-' + (thangsau) + '-' + (ngaysau) + " " + "23:59:59";
    }
    function LastDayOfMonth(Year, Month) {
        var nowDate=new Date((new Date(Year, Month,1))-1 );
        return formatLastDate(nowDate);
    }
     function formatLastDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate() +" 23:59:59",
                year = d.getFullYear() ;
 
            if (month.length < 2) month = '0' + month;
            if (day.length < 11) day = '0' + day;
            
            return [year, month, day].join('-');
    }
    function FirstDayOfMonth(Year, Month) {
        var nowDate=new Date(Year, Month-1, 1);
        return formatFirstDate(nowDate);
    }
     function formatFirstDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate() +" 00:00:00",
                year = d.getFullYear() ;
 
            if (month.length < 2) month = '0' + month;
            if (day.length < 11) day = '0' + day;
            ;
            return [year, month, day].join('-');
        }
</script>