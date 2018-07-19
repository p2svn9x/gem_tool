<section class="content-header">
    <h1>
          Top doanh số đại lý cấp 2
    </h1>
</section>

<input type="hidden" value="<?php echo $admin_info->status ?>" id="statususer">

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <?php if ($admin_info->status == "A"): ?>
                            <label class="col-sm-1 control-label" style="width: 150px">NickName </label>
                            <div class="col-sm-2">
                                <input type="text" id="nickname" name="nickname" class="form-control" value="<?php echo $this->input->post("nickname")?>">
                            </div>
                            <?php else:?>
                                <input type="hidden" id="hdnnickname" class="form-control" value="<?php echo $admin_info->nickname ?>">
                            <?php endif?>
                            <label class="col-sm-1 control-label">Từ ngày:</label>

                            <div class="col-sm-2">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" class="form-control" id="fromDate" name="fromDate"
                                           value="<?php echo $this->input->post("fromDate") ?>"> <span
                                        class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                </div>
                            </div>
                            <label class="col-sm-1 control-label">Đến ngày:</label>
                            <div class="col-sm-2">
                                <div class="input-group date" id="datetimepicker2">
                                    <input type="text" class="form-control" id="toDate" name="toDate"
                                           value="<?php echo $this->input->post("toDate") ?>"> <span
                                        class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                </div>
                            </div>
                            <div class="col-sm-1"><input type="submit" value="Tìm kiếm" name="submit"
                                                         class="btn btn-primary pull-right" id="search_tran"></div>
                            <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                         class="btn btn-primary pull-left" id="reset"
                                                         onclick="window.location.href = '<?php echo base_url('agency/topdoanhsocap2') ?>'; ">
                            </div>
                        </div>
                    </div>

	<div style="width: 100%;float: left;color: #ff0000;" id="error"></div>
                    <div class="col-sm-12" id="table1">


                        <div id="spinner" class="spinner" style="">
                            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                 alt="Loading"/>
                        </div>
                        <h1 id="resultsearch"></h1>
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
<script src="<?php echo public_url('admin') ?>/plugins/jQuery/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url('admin') ?>/plugins/jQuery//jquery.dataTables.min.css">

<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
    $(document).ready(function () {
        //sort table
        $("#fromDate").val(getFirtDayOfMonth());
        $("#toDate").val(getLastDayOfMonth());
        $("#spinner").show();
        if ($("#statususer").val() == "A") {
            topDoanhSoAdmin();
        } else if ($("#statususer").val() == "D") {
            topDoanhSoAgent();
        }
    });
    $("#search_tran").click(function () {
        $("#spinner").show();
        if ($("#statususer").val() == "A") {
            topDoanhSoAdmin();
        } else if ($("#statususer").val() == "D") {
            topDoanhSoAgent();
        }
    });
    function listtopdoanhso(stt, agentName, nickName, total) {
        var html = "";
        html += "<tr>";
        html += "<td style='text-align: center'>" + (stt +1) + "</td>";
        html += "<td>" + agentName + "</td>";
        html += "<td>" + nickName + "</td>";
        html += "<td>" + commaSeparateNumber(total) + "</td>";
        html += "</tr>";
        return html;
    }
    function listtopdoanhsoAgent(index, agentName, nickName, total) {
        var html = "";
        html += "<tr>";
        html += "<td style='text-align: center'>" + (index +1) + "</td>";
        html += "<td>" + agentName + "</td>";
        html += "<td>" + nickName + "</td>";
        html += "<td style='display: none'>" + commaSeparateNumber(total) + "</td>";
        html += "</tr>";
        return html;
    }
    function topDoanhSoAdmin() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/topDoanhSoCap2') ?>",
            data: {
                nickName: $("#nickname").val(),
                timestart: $("#fromDate").val(),
                timeend: $("#toDate").val()
            },
            dataType: 'json',
            success: function (data) {
				$("#error").html("");
                $("#spinner").hide();
                var result = "";
                if (data.transactions == "") {

                } else {
                    var i = 1;
                    result += '<table id="myTable" class="tablesorter table table-bordered table-hover">';
                    result += ' <thead>';
                    result += ' <tr>';
                    result += ' <th style="text-align: center">TOP</th>';
                    result += ' <th>Đại lý cấp 1</th>';
                    result += ' <th>Đại lý cấp 2</th>';
                    result += ' <th>Doanh số</th>';
                    result += ' </tr>';
                    result += ' </thead>';
                    result += '<tbody>';
                    $.each(data.transactions, function (index, value) {
                        result += listtopdoanhso(index, value.agentName, value.nickName, value.total);
                        i++;
                    });
                    result += '</tbody>';
                    result += '</table>';
                    $('#table1').html(result);

                }
            }
			,error: function(){
									$("#spinner").hide();
									$("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
								},
								timeout:30000
        });
    }
    function topDoanhSoAgent() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/topDoanhSoCap2') ?>",
            data: {
                nickName: $("#hdnnickname").val(),
                timestart: $("#fromDate").val(),
                timeend: $("#toDate").val()
            },
            dataType: 'json',
            success: function (data) {
				$("#error").html("");
                $("#spinner").hide();
                if (data.transactions == "") {
                } else {
                    var i = 1;
                    var result = "";
                    result += '<table id="TblAgent" class="tablesorter table table-bordered table-hover">';
                    result += ' <thead>';
                    result += ' <tr>';
                    result += ' <th style="text-align: center">TOP</th>';
                    result += ' <th>Đại lý cấp 1</th>';
                    result += ' <th>Đại lý cấp 2</th>';
                    result += ' <th>Doanh số</th>';
                    result += ' </tr>';
                    result += ' </thead>';
                    result += '<tbody>';
                    $.each(data.transactions, function (index, value) {
                        result += listtopdoanhsoAgent(index, value.agentName, value.nickName, value.total);
                    });
                    result += '</tbody>';
                    result += '</table>';
                    $('#table1').html(result);


                }
            },error: function(){
									$("#spinner").hide();
									$("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
								},
								timeout:30000
        });
    }
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
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
        return firstDay.getFullYear() + '-' + (thangtruoc) + '-' + (ngaytruoc) + " " + "00:00:00";
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
        return lastDay.getFullYear() + '-' + (thangsau) + '-' + (ngaysau) + " " + "23:59:59";
    }
</script>
