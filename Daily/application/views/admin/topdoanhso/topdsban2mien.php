<section class="content-header">
    <h1>
        Top doanh số bán 2 miền
    </h1>
</section>

<input type="hidden" value="<?php echo $admin_info->status ?>" id="statususer">
<input type="hidden" value="<?php echo $admin_info->nickname ?>" id="nickname">
<input type="hidden" value="<?php echo $admin_info->nickname ?>" id="hdnnickname">
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-1 control-label">Tháng:</label>

                            <div class="col-sm-2">
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" class="form-control" id="fromDate" name="fromDate"
                                           value="<?php echo $this->input->post("fromDate") ?>">
                                    <span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
                                    <input type="hidden" id="startDate">
                                    <input type="hidden" id="endDate">
                                </div>
                            </div>
                            <label class="col-sm-1 control-label" style="display:none">Đến ngày:</label>

                            <div class="col-sm-2" style="display:none">
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
                                                         onclick="window.location.href = '<?php echo base_url('agency/topdoanhso') ?>'; ">
                            </div>
                        </div>
                    </div>

                    <div style="width: 100%;float: left;color: #ff0000;" id="error"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6" id="table1">
                        <h3>Miền Bắc</h3>

                        <h1 id="resultsearch"></h1>
                    </div>
                    <div id="spinner" class="spinner" style="">
                        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                             alt="Loading"/>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6" id="table2">
                        <h3>Miền Nam</h3>

                        <h1 id="resultsearch1"></h1>
                    </div>
                    <div id="spinner1" class="spinner" style="">
                        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                             alt="Loading"/>
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
            format: 'MM/YYYY',

        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
    $(document).ready(function () {

        $("#spinner").show();
        $("#fromDate").val(getFirtDayOfMonth());
        var queryDate = $("#fromDate").val();
        dateParts = queryDate.match(/(\d+)/g);
        $("#startDate").val(FirstDayOfMonth(dateParts[1],dateParts[0]));
        $("#endDate").val(LastDayOfMonth(dateParts[1],dateParts[0]));


        topDoanhSoAgent();
        topDoanhSoAgent1();

    });
    $("#search_tran").click(function () {
        $("#spinner").show();
        var queryDate = $("#fromDate").val();
        dateParts = queryDate.match(/(\d+)/g);
        $("#startDate").val(FirstDayOfMonth(dateParts[1],dateParts[0]));
        $("#endDate").val(LastDayOfMonth(dateParts[1],dateParts[0]));

        topDoanhSoAgent();
        topDoanhSoAgent1();

    });

    function listtopdoanhsoAgent(index, agentName, nickName, total,bonusFix,bonusMore,bonusTotal,bonusByVinCash,bonusByVinplayCard,percent) {
        var html = "";
        html += "<tr>";
        html += "<td style='text-align: center'>" + (index +1) + "</td>";
        html += "<td>" + agentName + "</td>";
        html += "<td>" + nickName + "</td>";
        html += "<td style='display: none'>" + commaSeparateNumber(total) + "</td>";

        if($("#hdnnickname").val()==nickName){
            html += "<td style='display:none>" + commaSeparateNumber(bonusFix) + "</td>";
            html += "<td >" + commaSeparateNumber(bonusMore) + "</td>";
            html += "<td style='display:none>" + commaSeparateNumber(bonusTotal) + "</td>";
            html += "<td style='display:none'>" + commaSeparateNumber(bonusByVinCash) + "</td>";
            html += "<td style='display:none'>" + commaSeparateNumber(bonusByVinplayCard) + "</td>";
            html += "<td style='display:none'>" + percent +' %' + "</td>";
        }
        else{
            html += "<td style='display:none></td>";
            html += "<td ></td>";
            html += "<td style='display:none></td>";
            html += "<td style='display:none'></td>";
            html += "<td style='display:none'></td>";
            html += "<td style='display:none'></td>";
        }

        html += "</tr>";
        return html;
    }

    function topDoanhSoAgent() {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/topDoanhSoBanDlMien') ?>",
            data: {
                nickName: "tongdailymb",
                timestart: $("#startDate").val(),
                timeend: $("#endDate").val(),
                month: $("#fromDate").val()
            },
            cache: true,
            dataType: 'json',
            success: function (data) {
                $("#spinner").hide();
                $("#error").html("");
                if (data.transactions == "") {
                    $('#table1').html("");
                } else {
                    var i = 1;
                    var result = "";
                    result += '<table id="TblAgent" class="tablesorter table table-bordered table-hover">';
                    result += ' <thead>';
                    result += ' <tr>';
                    result += ' <th style="text-align: center">TOP</th>';
                    result += ' <th>Tên đại lý</th>';
                    result += ' <th>Nickname</th>';
                    result += ' <th style="display: none">Doanh số</th>';
                    result += ' <th style="display:none">Thưởng cố định(Vin)</th>';
                    result += ' <th>Thưởng doanh số(Vin)</th>';
                    result += ' <th style="display:none">Tổng thưởng(Vin)</th>';
                    result += ' <th style="display:none">Thưởng vin</th>';
                    result += ' <th style="display:none">Thưởng vinCard</th>';
                    result += ' <th style="display:none">% Chuyển đổi</th>';
                    result += ' </tr>';
                    result += ' </thead>';
                    result += '<tbody>';
                    $.each(data.transactions, function (index, value) {
                        result += listtopdoanhsoAgent(index, value.agentName, value.nickName, value.total,value.bonusFix,value.bonusMore,value.bonusTotal,value.bonusByVinCash,value.bonusByVinplayCard,value.percent);
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


    function topDoanhSoAgent1() {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TranferAjax/topDoanhSoBanDlMien') ?>",
            data: {
                nickName: "tongdailymn",
                timestart: $("#startDate").val(),
                timeend: $("#endDate").val(),
                month: $("#fromDate").val()
            },
            cache: true,
            dataType: 'json',
            success: function (data) {
                $("#spinner1").hide();
                $("#error").html("");
                if (data.transactions == "") {
                    $('#table2').html("");
                } else {
                    var i = 1;
                    var result = "";
                    result += '<table id="TblAgent" class="tablesorter table table-bordered table-hover">';
                    result += ' <thead>';
                    result += ' <tr>';
                    result += ' <th style="text-align: center">TOP</th>';
                    result += ' <th>Tên đại lý</th>';
                    result += ' <th>Nickname</th>';
                    result += ' <th style="display: none">Doanh số</th>';
                    result += ' <th style="display:none">Thưởng cố định(Vin)</th>';
                    result += ' <th>Thưởng doanh số(Vin)</th>';
                    result += ' <th style="display:none">Tổng thưởng(Vin)</th>';
                    result += ' <th style="display:none">Thưởng vin</th>';
                    result += ' <th style="display:none">Thưởng vinCard</th>';
                    result += ' <th style="display:none">% Chuyển đổi</th>';
                    result += ' </tr>';
                    result += ' </thead>';
                    result += '<tbody>';
                    $.each(data.transactions, function (index, value) {
                        result += listtopdoanhsoAgent(index, value.agentName, value.nickName, value.total,value.bonusFix,value.bonusMore,value.bonusTotal,value.bonusByVinCash,value.bonusByVinplayCard,value.percent);
                    });

                    result += '</tbody>';
                    result += '</table>';
                    $('#table2').html(result);


                }
            },error: function(){
                $("#spinner1").hide();
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
