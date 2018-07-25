<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
<link rel="stylesheet"
      href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
<script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
<script
    src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
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
    <?php $this->load->view('admin/error')?>
    <div class="wrapper">
        <?php $this->load->view('admin/message', $this->data); ?>
		
        <div class="formRow">
            <h4>Đối soát thẻ nạp</h4>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('report/doisoatthe') ?>" method="post">

            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" id="toDate" name="toDate" value="<?php echo $start_time ?>"> <span
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
                                <input type="text" id="fromDate" name="fromDate" value="<?php echo $end_time ?>"> <span
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
                        <td><label style="margin-left: 70px;margin-bottom:-2px;width: 100px">Loại thẻ:</label></td>
                        <td class="">
                            <select id="select_provider" name="select_provider"
                                    style="margin-left: 0px;margin-bottom:-2px;width: 143px">
								<option value="Gate" <?php if ($this->input->post('select_provider') == "Gate") {
                                    echo "selected";
                                } ?>>Gate
                                </option>
                               
                                <option
                                    value="Mobifone" <?php if ($this->input->post('select_provider') == "Mobifone") {
                                    echo "selected";
                                } ?>>Mobifone
                                </option>
                                <option
                                    value="Vinaphone" <?php if ($this->input->post('select_provider') == "Vinaphone") {
                                    echo "selected";
                                } ?>>Vinaphone
                                </option>
                                <option value="Vcoin" <?php if ($this->input->post('select_provider') == "Vcoin") {
                                    echo "selected";
                                } ?>>Vcoin
                                </option>
                                
                                <option value="MegaCard" <?php if ($this->input->post('select_provider') == "MegaCard") {
                                    echo "selected";
                                } ?>>MegaCard
                                </option>
								 <option value="Viettel" <?php if ($this->input->post('select_provider') == "Viettel") {
                                    echo "selected";
                                } ?>>Viettel
                                </option>
                            </select>
                        </td>
						<td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Nhà cung cấp:</label></td>
                        <td class="">
                            <select id="select_partner" name="select_partner"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 143px">
                                <option value="">Chọn</option>
                                <option value="maxpay" <?php if ($this->input->post('select_partner') == "maxpay") {
                                    echo "selected";
                                } ?>>Maxpay
                                </option>
                                <option value="abtpay" <?php if ($this->input->post('select_partner') == "abtpay") {
                                    echo "selected";
                                } ?>>Abtpay
                                </option>
                            </select>
                        </td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 70px">
                        </td>
                        <td style="">
                            <input type="button" id="exportexel" value="Xuất Exel" class="button blueB"
                                   style="margin-left: 20px">
                        </td>
                    </tr>
                    </table>
                </div>
        </form>

        <div class="widget">
            <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>

            <div id="widget">


                <div class="formRow">
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                                <tbody id="reportvt">
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
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

    .moneysystem {
        font-weight: 500;
        font-size: 16px;
        color: #000000;
    }

    .tdmoney {
        text-align: right;
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
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.table2excel.js"></script>
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
		 $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
     $("#search_tran").click(function () {
        var result = "";
        var total1 = 0;
        var total2 = 0;
        var total3 = 0;
        var total4 = 0;
        var total5 = 0;
        var total7 = 0;
        var total8 = 0;
		var total9 = 0;
        var total6 = 0;
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/doisoattheajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                provider: $("#select_provider").val(),
                serial: $("#txtserial").val(),
                mathe: $("#txtmathe").val(),
                status: $("#select_status").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages: 1,
                tranid: $("#magiaodich").val(),
				partner: $("#select_partner").val(),
            },

            dataType: 'json',
            success: function (result1) {
                $("#spinner").hide();
				 $("#resultsearch").html("");
                var ii = 2;
                $.each(result1.moneyReponse[1].trans, function (index, value) {
                    if(value.quantity > 0) {
                        ii++;
                    }
                });
                var jj = 2;
                $.each(result1.moneyReponse[2].trans, function (index, value) {
                    if(value.quantity > 0) {
                        jj++;
                    }
                });
                var kk = 2;
                $.each(result1.moneyReponse[3].trans, function (index, value) {
                    if(value.quantity > 0) {
                        kk++;
                    }
                });
                var mm = 2;
                $.each(result1.moneyReponse[4].trans, function (index, value) {
                    if(value.quantity > 0) {
                        mm++;
                    }
                });
                var nn = 2;
                $.each(result1.moneyReponse[5].trans, function (index, value) {
                    if(value.quantity > 0) {
                        nn++;
                    }
                });
                var oo = 2;
                $.each(result1.moneyReponse[6].trans, function (index, value) {
                    if(value.quantity > 0) {
                        oo++;
                    }
                });
				
				var pp = 2;
            $.each(result1.moneyReponse[7].trans, function (index, value) {
                if (value.quantity > 0) {
                    pp++;
                }
            });
                result += "<tr>";
                result += "<td colspan='1'></td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Mệnhgiá" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Số lượng" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tiền nạp" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tỉ lệ" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tiền thực thu" + "</td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+ii+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Viettel" + "</td>";
                result += "</tr>";
                for( var i = result1.moneyReponse[1].trans.length - 1; i >=0 ;i-- ){
                    if(result1.moneyReponse[1].trans[i].quantity > 0) {
                        result += resultviettel(result1.moneyReponse[1].trans[i].faceValue, result1.moneyReponse[1].trans[i].quantity, result1.moneyReponse[1].trans[i].moneyTotal);
                        total1 += result1.moneyReponse[1].trans[i].quantity;
                        total6 += result1.moneyReponse[1].trans[i].moneyTotal * 0.82;
                    }
                }
//                $.each(result1.moneyReponse[8].trans, function (index, value) {
//                    result += resultviettel(value.faceValue, value.quantity, value.moneyTotal);
//                    total1 += value.quantity;
//                    total6 += value.moneyTotal * 0.82;
//                });
                result += sumresultviettel(total1,result1.moneyReponse[1].value);
                result += "<tr>";
                result += "<td colspan='6' style='height: 50px'></td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+jj+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vinaphone" + "</td>";
                result += "</tr>";
                for( var j = result1.moneyReponse[2].trans.length - 1; j >=0 ;j-- ){
                    if(result1.moneyReponse[2].trans[j].quantity > 0) {
                    result += resultvinamobi(result1.moneyReponse[2].trans[j].faceValue, result1.moneyReponse[2].trans[j].quantity, result1.moneyReponse[2].trans[j].moneyTotal);
                    total2 += result1.moneyReponse[2].trans[j].quantity;
                    total6 += result1.moneyReponse[2].trans[j].moneyTotal * 0.825;
                    }
                }
                result += sumresultvinamobi(total2,result1.moneyReponse[2].value);
                result += "<tr>";
                result += "<td colspan='6' style='height: 50px'></td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+kk+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Mobifone" + "</td>";
                result += "</tr>";
                for( var k = result1.moneyReponse[3].trans.length - 1; k >=0 ;k-- ){
                    if(result1.moneyReponse[3].trans[k].quantity > 0) {
                        result += resultvinamobi(result1.moneyReponse[3].trans[k].faceValue, result1.moneyReponse[3].trans[k].quantity, result1.moneyReponse[3].trans[k].moneyTotal);
                        total3 += result1.moneyReponse[3].trans[k].quantity;
                        total6 += result1.moneyReponse[3].trans[k].moneyTotal * 0.825;
                    }
                }

                result += sumresultvinamobi(total3,result1.moneyReponse[3].value);
                result += "<tr>";
                result += "<td colspan='6' style='height: 50px'></td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+mm+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Gate" + "</td>";
                result += "</tr>";
                for( var m = result1.moneyReponse[4].trans.length - 1; m >=0 ;m-- ){
                    if(result1.moneyReponse[4].trans[m].quantity > 0) {
                        result += resultgate(result1.moneyReponse[4].trans[m].faceValue, result1.moneyReponse[4].trans[m].quantity, result1.moneyReponse[4].trans[m].moneyTotal);
                        total4 += result1.moneyReponse[4].trans[m].quantity;
                        total6 += result1.moneyReponse[4].trans[m].moneyTotal * 0.85;
                    }
                }

                result += sumresultgate(total4,result1.moneyReponse[4].value);
                result += "<tr>";
                result += "<td colspan='6' style='height: 50px'></td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+nn+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "MegaCard ko VAT" + "</td>";
                result += "</tr>";
                for( var n = result1.moneyReponse[5].trans.length - 1; n >=0 ;n-- ){
                    if(result1.moneyReponse[5].trans[n].quantity > 0) {
                        result += resultmega(result1.moneyReponse[5].trans[n].faceValue, result1.moneyReponse[5].trans[n].quantity, result1.moneyReponse[5].trans[n].moneyTotal);
                        total7 += result1.moneyReponse[5].trans[n].quantity;
                        total6 += result1.moneyReponse[5].trans[n].moneyTotal * 0.905;
                    }
                }
                result += sumresultmega(total7,result1.moneyReponse[5].value);
                result += "<tr>";
                result += "<td colspan='6' style='height: 50px'></td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+oo+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "MegaCard có VAT" + "</td>";
                result += "</tr>";
                for( var o = result1.moneyReponse[6].trans.length - 1; o >=0 ;o-- ){
                    if(result1.moneyReponse[6].trans[o].quantity > 0) {
                        result += resultmegavat(result1.moneyReponse[6].trans[o].faceValue, result1.moneyReponse[6].trans[o].quantity, result1.moneyReponse[6].trans[o].moneyTotal);
                        total8 += result1.moneyReponse[6].trans[o].quantity;
                        total6 += result1.moneyReponse[6].trans[o].moneyTotal * 0.91;
                    }
                }
                result += sumresultmegavat(total8,result1.moneyReponse[6].value);
                result += "<tr>";
                result += "<td colspan='6' style='height: 50px'></td>";
                result += "</tr>";
				
                result += "<tr>";
            result += "<td rowspan='" + pp + "' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vcoin" + "</td>";
            result += "</tr>";
            for (var p = result1.moneyReponse[7].trans.length - 1; p >= 0; p--) {
                if (result1.moneyReponse[7].trans[p].quantity > 0) {
                    result += resultvcoin(result1.moneyReponse[7].trans[p].faceValue, result1.moneyReponse[7].trans[p].quantity,result1.moneyReponse[7].trans[p].moneyTotal,result1.moneyReponse[7].value);
                    total9 += result1.moneyReponse[7].trans[p].quantity;
                    if(result1.moneyReponse[7].trans[p].moneyTotal < 200000000){
                        total6 += result1.moneyReponse[7].trans[p].moneyTotal * 0.88;
                    }else if(result1.moneyReponse[7].trans[p].moneyTotal >= 200000000 && result1.moneyReponse[7].trans[p].moneyTotal < 500000000){
                        total6 += result1.moneyReponse[7].trans[p].moneyTotal * 0.89;
                    }else if(result1.moneyReponse[7].trans[p].moneyTotal >= 500000000){
                        total6 += result1.moneyReponse[7].trans[p].moneyTotal * 0.90;
                    }

                }
            }
            result += sumresultvcoin(total9, result1.moneyReponse[7].value,result1.moneyReponse[7].value);
            result += "<tr>";
            result += "<td colspan='6' style='height: 50px'></td>";
            result += "</tr>";

            total5 = result1.moneyReponse[1].value + result1.moneyReponse[2].value + result1.moneyReponse[3].value + result1.moneyReponse[4].value + result1.moneyReponse[5].value + result1.moneyReponse[6].value + result1.moneyReponse[7].value;
            result += sumresult(total1 + total2 + total3 + total4 + total7 + total8 + total9, total5, total6);
                $('#reportvt').html(result);

            }, error: function () {
                $('#reportvt').html("");
                $("#spinner").hide();
                $("#error-popup").modal("show");
            }, timeout: 40000
        })
    });

    $("#exportexel").click(function () {
        $("#checkAll").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "Report",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });


    function sumresult(quantity,money,moneytotal){
        var rs = "";
        rs += "<tr>";

            rs += "<td></td>"
            rs += "<td  style='color: #0000ff;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
            rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right;'>" + commaSeparateNumber(quantity) + "</td>";
            rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(money) + "</td>";
            rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + "" + "</td>";
            rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(Math.round(moneytotal)) + "</td>";
            rs += "</tr>";

        return rs;
    }
    function resultviettel(provider, quantity, money) {
        var rs = "";
        rs += "<tr>";

            rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
            rs += "<td class='tdmoney'>" + 82 +"%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.82)) + "</td>";

            rs += "</tr>";

        return rs;
    }
    function sumresultviettel(quantity, money) {
        var rs = "";
        rs += "<tr class='moneysystem'>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" +  82 +"%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>"+ commaSeparateNumber(Math.round(money * 0.82)) +"</td>";
        rs += "</tr>";
        return rs;
    }
    function resultvinamobi(provider, quantity, money) {
        var rs = "";
        rs += "<tr>";

            rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
            rs += "<td class='tdmoney'>" + 82.5+"%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.825)) + "</td>";

            rs += "</tr>";

        return rs;
    }
    function sumresultvinamobi(quantity, money) {
        var rs = "";
        rs += "<tr class='moneysystem'>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + 82.5+"%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>"+ commaSeparateNumber(Math.round(money * 0.825)) +"</td>";
        rs += "</tr>";
        return rs;
    }
    function resultgate(provider, quantity, money) {
        var rs = "";
        rs += "<tr>";

            rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
            rs += "<td class='tdmoney'>" + 85+"%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.85)) + "</td>";

            rs += "</tr>";

        return rs;
    }
    function sumresultgate(quantity, money) {
        var rs = "";
        rs += "<tr class='moneysystem'>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + 85+"%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>"+ commaSeparateNumber(Math.round(money * 0.85)) +"</td>";
        rs += "</tr>";
        return rs;
    }

    function resultmega(provider, quantity, money) {
        var rs = "";
        rs += "<tr>";

        rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td class='tdmoney'>" + "90,5"+"%" + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.905)) + "</td>";

        rs += "</tr>";

        return rs;
    }
    function sumresultmega(quantity, money) {
        var rs = "";
        rs += "<tr class='moneysystem'>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + "90,5"+"%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>"+ commaSeparateNumber(Math.round(money * 0.905)) +"</td>";
        rs += "</tr>";
        return rs;
    }
    function resultmegavat(provider, quantity, money) {
        var rs = "";
        rs += "<tr>";

        rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td class='tdmoney'>" + "91"+"%" + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.91)) + "</td>";

        rs += "</tr>";

        return rs;
    }
    function sumresultmegavat(quantity, money) {
        var rs = "";
        rs += "<tr class='moneysystem'>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + "91"+"%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>"+ commaSeparateNumber(Math.round(money * 0.91)) +"</td>";
        rs += "</tr>";
        return rs;
    }
	
	function resultvcoin(provider, quantity, money, summoney) {
    var rs = "";
    rs += "<tr>";

    rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
    if (summoney < 200000000) {
        rs += "<td class='tdmoney'>" + "88" + "%" + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.88)) + "</td>";
    } else if (summoney >= 200000000 && summoney < 500000000) {
        rs += "<td class='tdmoney'>" + "89" + "%" + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.89)) + "</td>";
    } else if (summoney >= 500000000) {
        rs += "<td class='tdmoney'>" + "90" + "%" + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.9)) + "</td>";
    }

    rs += "</tr>";

    return rs;
}
function sumresultvcoin(quantity, money, summoney) {
    var rs = "";
    rs += "<tr class='moneysystem'>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";

    if (summoney < 200000000) {
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + "88" + "%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.88)) + "</td>";
    } else if (summoney >= 200000000 && summoney < 500000000) {
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + "89" + "%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.89)) + "</td>";
    } else if (summoney >= 500000000) {
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + "90" + "%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.9)) + "</td>";
    }
    rs += "</tr>";
    return rs;
}
</script>


<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>