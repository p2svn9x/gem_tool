<section class="content-header">
    <h1>
        Doanh số
    </h1>
</section>
<input type="hidden" value="<?php echo $admin_info->status ?>" id="statususer">

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <?php if ($admin_info->status == "A"): ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <?php if (isset($nickname) && isset($id)): ?>
                                    <div class="col-sm-2">
                                        <input type="hidden" id="nickname" class="form-control"
                                               value="<?php echo $listnn1 ?>">
                                        <input type="hidden" id="nickname1" class="form-control"
                                               value="<?php echo $listnn2 ?>">

                                    </div>
                                <?php else: ?>

                                    <div class="col-sm-2">
                                        <input type="hidden" id="nickname" class="form-control"
                                               value="<?php echo $listnn1 ?>">
                                        <input type="hidden" id="nickname1" class="form-control"
                                               value="<?php echo $listnn2 ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
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
                                <div class="col-sm-1"><input type="submit" value="Tìm kiếm" name="submit"
                                                             class="btn btn-primary pull-right" id="search_tran"></div>
                                <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                             class="btn btn-primary pull-left" id="reset"
                                                             onclick="window.location.href = '<?php echo base_url('agency/doanhso') ?>'; ">
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <input type="hidden" id="nickname" class="form-control"
                               value="<?php echo $listnn1 ?>">
                        <input type="hidden" id="nickname1" class="form-control"
                               value="<?php echo $listnn2 ?>">

                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" id="nickname" value="<?php echo $listnn1 ?>">
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
                                <div class="col-sm-1"><input type="submit" value="Tìm kiếm" name="submit"
                                                             class="btn btn-primary pull-right" id="search_tran"></div>
                                <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                             class="btn btn-primary pull-left" id="reset"
                                                             onclick="window.location.href = '<?php echo base_url('agency/doanhso') ?>'; ">
                                    <input type="hidden" id="nickname" name="nickname">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
					<div style="width: 100%;float: left;color: #ff0000;" id="error"></div>
                    <div class="col-sm-12">
                        <table id="sum_table" class="table table-bordered table-hover" style="table-layout: fixed;word-wrap: break-word;">
                            <thead>
                            <tr class="titlerow">
                                <td>STT</td>
                                <td>Nick name</td>
                                <td>Doanh số mua</td>
                                <td>Doanh số bán</td>
                                <td>Tổng doanh số</td>
                                <td>Phí mua</td>
                                <td>Phí bán</td>
                                <td>Tổng phí</td>
                                <td>Tổng phí hoàn trả</td>
								<td style="display:none">Hoàn trả vin</td>
                                <td style="display:none">Hoàn trả vinCard</td>
                                <td style="display:none">% Chuyển đổi</td>
                                <td> Chức năng</td>
                            </tr>
                            </thead>
                            <tbody id="logaction">

                            </tbody>
                            <tbody id="logaction1">

                            </tbody>
                            <tr id="totaldoanhso">
                                <td colspan="2">Tổng:</td>

                                <td class="rowDataSd" id="dsmua1"></td>
                                <td class="rowDataSd" id="dsban1"></td>
                                <td class="rowDataSd" id="tongds1"></td>
                                <td class="rowDataSd" id="pmua1"></td>
                                <td class="rowDataSd" id="pban1"></td>
                                <td class="rowDataSd" id="tongp1"></td>
                                <td class="rowDataSd" id="phiht1"></td>
								<td class="rowDataSd" id="thuongvin" style="display:none"></td>
                                <td class="rowDataSd" id="thuongvincard" style="display:none"></td>
                            </tr>

                        </table>

                        <div id="spinner" class="spinner" style="display:none;">
                            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                 alt="Loading"/>
                        </div>
                        <div class="text-center pull-right">
                            <ul id="pagination-demo" class="pagination-lg"></ul>
                            <ul id="pagination-demosearch" class="pagination-lg"></ul>
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
            format: 'MM/YYYY',

        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
   $(document).ready(function(){
    $("#fromDate").val(getFirtDayOfMonth());
        var queryDate = $("#fromDate").val();
        dateParts = queryDate.match(/(\d+)/g);
        $("#startDate").val(FirstDayOfMonth(dateParts[1],dateParts[0]));
        $("#endDate").val(LastDayOfMonth(dateParts[1],dateParts[0]));
    });
    $("#search_tran").click(function () {
        var fromDatetime = $("#fromDate").val();
        var toDatetime = $("#toDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
        $("#spinner").show();
		var queryDate = $("#fromDate").val();
        dateParts = queryDate.match(/(\d+)/g);
        $("#startDate").val(FirstDayOfMonth(dateParts[1],dateParts[0]));
        $("#endDate").val(LastDayOfMonth(dateParts[1],dateParts[0]));
        if ($("#statususer").val() == "D") {
            listdoanhsoAgent($("#nickname").val(), 1, "#logaction");
            if($("#nickname1").val()!= ""){
                listdoanhsoAgent($("#nickname1").val(), 2, "#logaction1");
            }
        } else {
            listdoanhsoAdmin($("#nickname").val(), 1, "#logaction");
            if($("#nickname1").val()!= "") {
                listdoanhsoAdmin($("#nickname1").val(), 2, "#logaction1");
            }
        }
    });


    function resulttranferlistAdmin(stt, nickname, dsmua1, dsban1, dsmua2, dsban2, pmua1, pban1, pmua2, pban2, tyle,daily,totalFeeByVinCash,totalFeeByVinplayCard,percent) {
        var rs = "";
		 if(dsmua1>0 || dsban1>0 || dsmua2>0 || dsban2>0 ) {
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td class='rowDataSd1'><a href='/agency/listtranfersale/"+nickname+"'>" + commaSeparateNumber(dsmua1 + dsmua2) + "</a></td>";
        rs += "<td class='rowDataSd2'><a href='/agency/listtranferbuy/"+nickname+"'>" + commaSeparateNumber(dsban1 + dsban2) + "</a></td>";
        rs += "<td class='rowDataSd3'>" + commaSeparateNumber(dsmua1 + dsban1 + dsmua2 + dsban2) + "</td>";
        rs += "<td class='rowDataSd4'>" + commaSeparateNumber(pmua1 + pmua2) + "</td>";
        rs += "<td class='rowDataSd5'>" + commaSeparateNumber(pban1 + pban2) + "</td>";
        rs += "<td class='rowDataSd6'>" + commaSeparateNumber(pmua1 + pban1 + pmua2 + pban2) + "</td>";
        rs += "<td class='rowDataSd7'>" + commaSeparateNumber(tyle) + "</td>";
		rs += "<td class='rowDataSd8' style='display:none'>" + commaSeparateNumber(totalFeeByVinCash) + "</td>";
        rs += "<td class='rowDataSd9' style='display:none'>" + commaSeparateNumber(totalFeeByVinplayCard) + "</td>";
        rs += "<td class='rowDataSd10' style='display:none'>" + percent +' %' +"</td>";
        rs += "<td>" + daily + "</td>";
        rs += "</tr>";
		}
        return rs;
    }
    function resulttranferlistAgent(stt, nickname, dsmua1, dsban1, dsmua2, dsban2, pmua1, pban1, pmua2, pban2, tyle,daily,totalFeeByVinCash,totalFeeByVinplayCard,percent) {
        var rs = "";
		
		 if(dsmua1>0 || dsban1>0 || dsmua2>0 || dsban2>0 ) {
			rs += "<tr>";
			rs += "<td>" + stt + "</td>";
			rs += "<td>" + nickname + "</td>";
			rs += "<td class='rowDataSd1'>" + commaSeparateNumber(dsmua1 + dsmua2) + "</a></td>";
			rs += "<td class='rowDataSd2'>" + commaSeparateNumber(dsban1 + dsban2) + "</a></td>";
			rs += "<td class='rowDataSd3'>" + commaSeparateNumber(dsmua1 + dsban1 + dsmua2 + dsban2) + "</td>";
			rs += "<td class='rowDataSd4'>" + commaSeparateNumber(pmua1 + pmua2) + "</td>";
			rs += "<td class='rowDataSd5'>" + commaSeparateNumber(pban1 + pban2) + "</td>";
			rs += "<td class='rowDataSd6'>" + commaSeparateNumber(pmua1 + pban1 + pmua2 + pban2) + "</td>";
			rs += "<td class='rowDataSd7'>" + commaSeparateNumber(tyle) + "</td>";
			rs += "<td class='rowDataSd8' style='display:none'>" + commaSeparateNumber(totalFeeByVinCash) + "</td>";
            rs += "<td class='rowDataSd9' style='display:none'>" + commaSeparateNumber(totalFeeByVinplayCard) + "</td>";
            rs += "<td class='rowDataSd10' style='display:none'>" + percent +' %' +"</td>";
			rs += "<td>" + daily + "</td>";
			rs += "</tr>";
		 }
		
        return rs;
		
    }
    $(document).ready(function () {
        $("#fromDate").val(getFirtDayOfMonth());
        $("#toDate").val(getLastDayOfMonth());
        $("#spinner").show();
        if ($("#statususer").val() == "D") {
            listdoanhsoAgent($("#nickname").val(), 1, "#logaction");
            if($("#nickname1").val()!= ""){
                listdoanhsoAgent($("#nickname1").val(), 2, "#logaction1");}

        } else {
            listdoanhsoAdmin($("#nickname").val(), 1, "#logaction");
            if($("#nickname1").val()!= ""){
                listdoanhsoAdmin($("#nickname1").val(), 2, "#logaction1");}
        }
    });
    var totalDSM = 0;
    var totalDSB = 0;
    var totalDS = 0;
    var totalPM = 0;
    var totalPB = 0;
    var totalP = 0;
    var totalPHT = 0;
    function listdoanhsoAgent(nickname, type, id) {
        var rs = "";
        stt = 1
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('TranferAjax/listdoanhsoAgent') ?>",
                data: {
                    nickname: nickname,
                     timestart: $("#startDate").val(),
                      timeend: $("#endDate").val(),
                    status: "",
					month: $("#fromDate").val(),
                },
                dataType: 'json',
                success: function (data) {
                    $("#spinner").hide();
					 $("#error").html("");
                        $("#resultsearch").html("");
						
                        $.each(data.transactions, function (index, value) {
                            if (type == 1) {
                                rs += resulttranferlistAgent(stt, value.nickName, value.totalBuy1, value.totalSale1, value.totalBuy2, value.totalSale2, value.totalFeeBuy1, value.totalFeeSale1, value.totalFeeBuy2, value.totalFeeSale2, value.totalFee,"Đại lý cấp 1",value.totalFeeByVinCash,value.totalFeeByVinplayCard,value.percent);
                                stt++;
                            }
                            else if (type == 2) {
                                rs += resulttranferlistAgent(stt, value.nickName, value.totalBuy1, value.totalSale1, value.totalBuy2, value.totalSale2, value.totalFeeBuy1, value.totalFeeSale1, value.totalFeeBuy2, value.totalFeeSale2, value.totalFee,"Đại lý cấp 2",value.totalFeeByVinCash,value.totalFeeByVinplayCard,value.percent);
                                stt++
                            }
                        });
						
                        $(id).html(rs);
                    
                        var total=0;
                        var total1=0;
                        var total2=0;
                        var total3=0;
                        var total4=0;
                        var total5=0;
                        var total6=0;
						var total7=0;
						var total8=0;
                        $(".rowDataSd1" ).each(function( index ) {
                            total +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#dsmua1").text(commaSeparateNumber(total));
                        });
                        $(".rowDataSd2" ).each(function( index ) {
                            total1 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#dsban1").text(commaSeparateNumber(total1));
                        });
                        $(".rowDataSd3" ).each(function( index ) {
                            total2 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#tongds1").text(commaSeparateNumber(total2));
                        });
                        $(".rowDataSd4" ).each(function( index ) {
                            total3 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#pmua1").text(commaSeparateNumber(total3));
                        });
                        $(".rowDataSd5" ).each(function( index ) {
                            total4 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#pban1").text(commaSeparateNumber(total4));
                        });
                        $(".rowDataSd6" ).each(function( index ) {
                            total5 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#tongp1").text(commaSeparateNumber(total5));
                        });
                        $(".rowDataSd7" ).each(function( index ) {
                            total6 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#phiht1").text(commaSeparateNumber(total6));
                        });
						  $(".rowDataSd8" ).each(function( index ) {
                            total7 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#thuongvin").text(commaSeparateNumber(total7));
                        });
						  $(".rowDataSd9" ).each(function( index ) {
                            total8 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#thuongvincard").text(commaSeparateNumber(total8));
                        });
                    }
					,error: function(){
                     $("#spinner").hide();
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:50000
            });

    }
    function listdoanhsoAdmin(nickname, type, id) {
        var rs = "";
       
        stt = 1
       
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('TranferAjax/listdoanhsoAdmin') ?>",
                data: {
                    nickname: nickname,
                    timestart: $("#startDate").val(),
                    timeend: $("#endDate").val(),
                    status: "",
					month: $("#fromDate").val(),
                },
				cache: true,
                dataType: 'json',
                success: function (data) {
                    $("#spinner").hide();
					$("#error").html("");
                    $("#resultsearch").html("");
                    $.each(data.transactions, function (index, value) {
                        if (type == 1) {
                            rs += resulttranferlistAdmin(stt, value.nickName, value.totalBuy1, value.totalSale1, value.totalBuy2, value.totalSale2, value.totalFeeBuy1, value.totalFeeSale1, value.totalFeeBuy2, value.totalFeeSale2, value.totalFee,"Đại lý cấp 1",value.totalFeeByVinCash,value.totalFeeByVinplayCard,value.percent);
                            stt++;
                        }
                        else if (type == 2) {
                            rs += resulttranferlistAdmin(stt, value.nickName, value.totalBuy1, value.totalSale1, value.totalBuy2, value.totalSale2, value.totalFeeBuy1, value.totalFeeSale1, value.totalFeeBuy2, value.totalFeeSale2, value.totalFee,"Đại lý cấp 2",value.totalFeeByVinCash,value.totalFeeByVinplayCard,value.percent);
                            stt++
                        }
                    });
                    $(id).html(rs);

                    var total=0;
                    var total1=0;
                    var total2=0;
                    var total3=0;
                    var total4=0;
                    var total5=0;
                    var total6=0;
					var total7=0;
					var total8=0;
                    $(".rowDataSd1" ).each(function( index ) {
                        total +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#dsmua1").text(commaSeparateNumber(total));
                    });
                    $(".rowDataSd2" ).each(function( index ) {
                        total1 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#dsban1").text(commaSeparateNumber(total1));
                    });
                    $(".rowDataSd3" ).each(function( index ) {
                        total2 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#tongds1").text(commaSeparateNumber(total2));
                    });
                    $(".rowDataSd4" ).each(function( index ) {
                        total3 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#pmua1").text(commaSeparateNumber(total3));
                    });
                    $(".rowDataSd5" ).each(function( index ) {
                        total4 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#pban1").text(commaSeparateNumber(total4));
                    });
                    $(".rowDataSd6" ).each(function( index ) {
                        total5 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#tongp1").text(commaSeparateNumber(total5));
                    });
                    $(".rowDataSd7" ).each(function( index ) {
                        total6 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#phiht1").text(commaSeparateNumber(total6));
                    });
					 $(".rowDataSd8" ).each(function( index ) {
                            total7 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#thuongvin").text(commaSeparateNumber(total7));
                     });
					$(".rowDataSd9" ).each(function( index ) {
                            total8 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                            $("#thuongvincard").text(commaSeparateNumber(total8));
                        });
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
            case 8:
                strresult = "Đại lý cấp 2 chuyển đại lý cấp 2";
                break;
        }
        return strresult;
    }
    //tinh tong
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