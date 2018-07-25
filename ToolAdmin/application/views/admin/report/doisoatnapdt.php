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
            <h4>Đối soát nạp điện thoại</h4>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('report/doisoatnapdt') ?>" method="post">

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

                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Nhà cung cấp:</label>
                        </td>
                        <td class="">
                            <select id="select_partner" name="select_partner"
                                    style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                <option value="vtc" <?php if ($this->input->post('select_partner') == "vtc") {
                                    echo "selected";
                                } ?>>VTC
                                </option>
                                <option value="epay" <?php if ($this->input->post('select_partner') == "epay") {
                                    echo "selected";
                                } ?>>EPay
                                </option>
								 <option value="1pay" <?php if ($this->input->post('select_partner') == "1pay") {
                                    echo "selected";
                                } ?>>1 Pay
                                </option>
								 <option value="abtpay" <?php if ($this->input->post('select_partner') == "abtpay") {
                                    echo "selected";
                                } ?>>abtpay
                                </option>

                            </select>
                        </td>

                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Dịch vụ:</label>
                        </td>
                        <td class="">
                            <select id="select_dichvu" name="select_dichvu"
                                    style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                <option value="" <?php if ($this->input->post('select_dichvu') == "") {
                                    echo "selected";
                                } ?>>Tất cả
                                </option>
                                <option value="1" <?php if ($this->input->post('select_dichvu') == "1") {
                                    echo "selected";
                                } ?>>Trả trước
                                </option>
                                <option value="2" <?php if ($this->input->post('select_dichvu') == "2") {
                                    echo "selected";
                                } ?>>Trả sau
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
    var total6 = 0;
    var total7 = 0;
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('report/doisoatnapdtajax')?>",
        data: {
            toDate: $("#toDate").val(),
            fromDate: $("#fromDate").val(),
            partner: $("#select_partner").val(),
            dichvu: $("#select_dichvu").val()
        },

        dataType: 'json',
        success: function (result1) {
	$("#resultsearch").html("");
            $("#spinner").hide();

            var ii = 2;
            $.each(result1.moneyResponse[1].trans, function (index, value) {
                if (value.quantity > 0) {
                    ii++;
                }
            });
            var jj = 2;
            $.each(result1.moneyResponse[2].trans, function (index, value) {
                if (value.quantity > 0) {
                    jj++;
                }
            });
            var kk = 2;
            $.each(result1.moneyResponse[3].trans, function (index, value) {
                if (value.quantity > 0) {
                    kk++;
                }
            });
            var mm = 2;
            $.each(result1.moneyResponse[4].trans, function (index, value) {
                if (value.quantity > 0) {
                    mm++;
                }
            });
            var nn = 2;
            $.each(result1.moneyResponse[5].trans, function (index, value) {
                if (value.quantity > 0) {
                    nn++;
                }
            });
            result += "<tr>";
            result += "<td colspan='1'></td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Mệnhgiá" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Số lượng" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tổng tiền nạp điện thoại" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tỉ lệ" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tiền chiết khấu" + "</td>";
            result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tiền trả đối tác" + "</td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+ii+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Viettel" + "</td>";
            result += "</tr>";
            for (var i = result1.moneyResponse[1].trans.length - 1; i >= 0; i--) {
                if(result1.moneyResponse[1].trans[i].quantity > 0) {
                    result += resultviettel(result1.moneyResponse[1].trans[i].faceValue, result1.moneyResponse[1].trans[i].quantity, result1.moneyResponse[1].trans[i].moneyTotal);
                    total1 += result1.moneyResponse[1].trans[i].quantity;
                    if ($("#select_partner").val() == "epay") {
                        total7 += result1.moneyResponse[1].trans[i].moneyTotal * 0.04;
                    } else if ($("#select_partner").val() == "vtc") {
                        total7 += result1.moneyResponse[1].trans[i].moneyTotal * 0.035;
                    }
                }
            }

            result += sumresultviettel(total1, result1.moneyResponse[1].value);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+jj+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vinaphone" + "</td>";
            result += "</tr>";
            for (var j = result1.moneyResponse[2].trans.length - 1; j >= 0; j--) {
                if(result1.moneyResponse[2].trans[j].quantity > 0) {
                    result += resultvina(result1.moneyResponse[2].trans[j].faceValue, result1.moneyResponse[2].trans[j].quantity, result1.moneyResponse[2].trans[j].moneyTotal);
                    total2 += result1.moneyResponse[2].trans[j].quantity;
                    if ($("#select_partner").val() == "epay") {
                        total7 += result1.moneyResponse[2].trans[j].moneyTotal * 0.055;
                    } else if ($("#select_partner").val() == "vtc") {
                        total7 += result1.moneyResponse[2].trans[j].moneyTotal * 0.057;
                    }
                }
            }
            result += sumresultvina(total2, result1.moneyResponse[2].value);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+kk+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Mobifone" + "</td>";
            result += "</tr>";
            for (var k = result1.moneyResponse[3].trans.length - 1; k >= 0; k--) {
                if(result1.moneyResponse[3].trans[k].quantity > 0) {
                    result += resultmobi(result1.moneyResponse[3].trans[k].faceValue, result1.moneyResponse[3].trans[k].quantity, result1.moneyResponse[3].trans[k].moneyTotal);
                    total3 += result1.moneyResponse[3].trans[k].quantity;
                    if ($("#select_partner").val() == "epay") {
                        if ($("#select_dichvu").val() == "1") {
                            total7 += result1.moneyResponse[3].trans[k].moneyTotal * 0.056;
                        }
                        else if ($("#select_dichvu").val() == "2") {
                            total7 += result1.moneyResponse[3].trans[k].moneyTotal * 0.057;
                        }else if($("#select_dichvu").val() == ""){
                            total7 += result1.moneyResponse[3].trans[k].moneyTotal * 0.056;
                        }

                    }

                    else if ($("#select_partner").val() == "vtc") {
                        total7 += result1.moneyResponse[3].trans[k].moneyTotal * 0.058;
                    }
                }
            }
            result += sumresultmobi(total3, result1.moneyResponse[3].value);
            result += "<tr>";
            result += "<td colspan='6' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+mm+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vietnam Mobile" + "</td>";
            result += "</tr>";
            for (var m = result1.moneyResponse[4].trans.length - 1; m >= 0; m--) {
                if(result1.moneyResponse[4].trans[m].quantity > 0) {
                    result += resultvietnam(result1.moneyResponse[4].trans[m].faceValue, result1.moneyResponse[4].trans[m].quantity, result1.moneyResponse[4].trans[m].moneyTotal);
                    total4 += result1.moneyResponse[4].trans[m].quantity;
                    if ($("#select_partner").val() == "epay") {
                        if ($("#select_dichvu").val() == "1") {
                            total7 += result1.moneyResponse[4].trans[m].moneyTotal * 0.07;
                        }
                        else if ($("#select_dichvu").val() == "2") {
                            total7 += result1.moneyResponse[4].trans[m].moneyTotal * 0;
                        } else if ($("#select_dichvu").val() == "") {
                            total7 += result1.moneyResponse[4].trans[m].moneyTotal * 0.07;
                        }
                    }

                    else if ($("#select_partner").val() == "vtc") {
                        if ($("#select_dichvu").val() == "1") {
                            total7 += result1.moneyResponse[4].trans[m].moneyTotal * 0.073;
                        }
                        else if ($("#select_dichvu").val() == "2") {
                            total7 += result1.moneyResponse[4].trans[m].moneyTotal * 0;
                        }
                        else if ($("#select_dichvu").val() == "") {
                            total7 += result1.moneyResponse[4].trans[m].moneyTotal * 0.073;
                        }
                    }
                }

            }
            result += sumresultvietnam(total4, result1.moneyResponse[4].value);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";
            result += "<tr>";
            result += "<td rowspan='"+nn+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Gmobile" + "</td>";
            result += "</tr>";
            for (var n = result1.moneyResponse[5].trans.length - 1; n >= 0; n--) {
                if(result1.moneyResponse[5].trans[n].quantity > 0) {
                    result += resultgmobile(result1.moneyResponse[5].trans[n].faceValue, result1.moneyResponse[5].trans[n].quantity, result1.moneyResponse[5].trans[n].moneyTotal);
                    total5 += result1.moneyResponse[5].trans[n].quantity;
                    if ($("#select_partner").val() == "epay") {
                        if ($("#select_dichvu").val() == "1") {
                            total7 += result1.moneyResponse[5].trans[n].moneyTotal * 0.062;
                        }
                        else if ($("#select_dichvu").val() == "2") {
                            total7 += result1.moneyResponse[5].trans[n].moneyTotal * 0;
                        }else  if ($("#select_dichvu").val() == "") {
                            total7 += result1.moneyResponse[5].trans[n].moneyTotal * 0.062;
                        }
                    }

                    else if ($("#select_partner").val() == "vtc") {
                        if ($("#select_dichvu").val() == "1") {
                            total7 += result1.moneyResponse[5].trans[n].moneyTotal * 0.063;
                        }
                        else if ($("#select_dichvu").val() == "2") {
                            total7 += result1.moneyResponse[5].trans[n].moneyTotal * 0;
                        }else if ($("#select_dichvu").val() == "") {
                            total7 += result1.moneyResponse[5].trans[n].moneyTotal * 0.063;
                        }
                    }
                }
            }
            result += sumresultgmobile(total5, result1.moneyResponse[5].value);
            result += "<tr>";
            result += "<td colspan='7' style='height: 50px'></td>";
            result += "</tr>";

            total6 = result1.moneyResponse[0].value;
            result += sumresult(total1 + total2 + total3 + total4 + total5, total6, total7);
            $('#reportvt').html(result);

        }, error: function () {
            $('#reportvt').html("");
            $("#spinner").hide();
            $("#error-popup").modal("show");
        }, timeout: 40000
    })
})
;

$("#exportexel").click(function () {
    $("#checkAll").table2excel({
        exclude: ".noExl",
        name: "Excel Document Name",
        filename: "Reportnapdt",
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true
    });
});


function sumresult(quantity, money, moneytotal) {
    var rs = "";
    rs += "<tr>";
    if (quantity != 0) {
        rs += "<td></td>"
        rs += "<td  style='color: #0000ff;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right;'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + "" + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(Math.round(moneytotal)) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(money - Math.round(moneytotal)) + "</td>";
        rs += "</tr>";
    }
    return rs;
}
function resultviettel(provider, quantity, money) {
    var rs = "";
    rs += "<tr>";


    rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
    if ($("#select_partner").val() == "epay") {

        rs += "<td class='tdmoney'>" + 4.0 + "%" + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.04)) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.04)) + "</td>";
    } else if ($("#select_partner").val() == "vtc") {
        rs += "<td class='tdmoney'>" + 3.5 + "%" + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.035)) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.035)) + "</td>";
    }

    rs += "</tr>";

    return rs;
}
function sumresultviettel(quantity, money) {
    var rs = "";
    rs += "<tr class='moneysystem'>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
    if ($("#select_partner").val() == "epay") {
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 4.0 + "%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.04)) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.04)) + "</td>";
    } else if ($("#select_partner").val() == "vtc") {
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 3.5 + "%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.035)) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.035)) + "</td>";
    }

    rs += "</tr>";
    return rs;
}
function resultvina(provider, quantity, money) {
    var rs = "";
    rs += "<tr>";

    rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
    if ($("#select_partner").val() == "epay") {
        rs += "<td class='tdmoney'>" + 5.5 + "%" + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.055)) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.055)) + "</td>";
    } else if ($("#select_partner").val() == "vtc") {
        rs += "<td class='tdmoney'>" + 5.7 + "%" + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.057)) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.057)) + "</td>";
    }

    rs += "</tr>";

    return rs;
}
function sumresultvina(quantity, money) {
    var rs = "";
    rs += "<tr class='moneysystem'>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
    if ($("#select_partner").val() == "epay") {
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 5.5 + "%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.055)) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.055)) + "</td>";
    } else if ($("#select_partner").val() == "vtc") {
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 5.7 + "%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.057)) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.057)) + "</td>";
    }
    rs += "</tr>";
    return rs;
}

function resultmobi(provider, quantity, money) {
    var rs = "";
    rs += "<tr>";

    rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
    if ($("#select_partner").val() == "epay") {
        if ($("#select_dichvu").val() == "1") {
            rs += "<td class='tdmoney'>" + 5.6 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.056)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.056)) + "</td>";
        } else if ($("#select_dichvu").val() == "2") {
            rs += "<td class='tdmoney'>" + 5.7 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.057)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.057)) + "</td>";
        }else  if ($("#select_dichvu").val() == "") {
            rs += "<td class='tdmoney'>" + 5.6 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.056)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.056)) + "</td>";
        }

    } else if ($("#select_partner").val() == "vtc") {
        rs += "<td class='tdmoney'>" + 5.8 + "%" + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.058)) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.058)) + "</td>";
    }

    rs += "</tr>";

    return rs;
}
function sumresultmobi(quantity, money) {
    var rs = "";
    rs += "<tr class='moneysystem'>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
    if ($("#select_partner").val() == "epay") {
        if ($("#select_dichvu").val() == "1") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 5.6 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.56)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.056)) + "</td>";
        }
        else if ($("#select_dichvu").val() == "2") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 5.7 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.057)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.057)) + "</td>";
        } else if ($("#select_dichvu").val() == "") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 5.6 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.56)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.056)) + "</td>";
        }
    } else if ($("#select_partner").val() == "vtc") {
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 5.8 + "%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.058)) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.058)) + "</td>";
    }
    rs += "</tr>";
    return rs;
}


function resultvietnam(provider, quantity, money) {
    var rs = "";
    rs += "<tr>";

    rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
    if ($("#select_partner").val() == "epay") {
        if ($("#select_dichvu").val() == "1") {
            rs += "<td class='tdmoney'>" + 7.0 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.07)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.07)) + "</td>";
        } else if ($("#select_dichvu").val() == "2") {
            rs += "<td class='tdmoney'>" + 0 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + 0 + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
        }else  if ($("#select_dichvu").val() == "") {
            rs += "<td class='tdmoney'>" + 7.0 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.07)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.07)) + "</td>";
        }
    } else if ($("#select_partner").val() == "vtc") {
        if ($("#select_dichvu").val() == "1") {
            rs += "<td class='tdmoney'>" + 7.3 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.073)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.073)) + "</td>";
        } else if ($("#select_dichvu").val() == "2") {
            rs += "<td class='tdmoney'>" + 0 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + 0 + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
        }else if ($("#select_dichvu").val() == "") {
            rs += "<td class='tdmoney'>" + 7.3 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.073)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.073)) + "</td>";
        }
    }

    rs += "</tr>";

    return rs;
}
function sumresultvietnam(quantity, money) {
    var rs = "";
    rs += "<tr class='moneysystem'>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
    if ($("#select_partner").val() == "epay") {
        if ($("#select_dichvu").val() == "1") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 7.0 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.07)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.07)) + "</td>";
        }
        else if ($("#select_dichvu").val() == "2") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 0 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 0 + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money) + "</td>";
        }else if ($("#select_dichvu").val() == "") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 7.0 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.07)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.07)) + "</td>";
        }
    } else if ($("#select_partner").val() == "vtc") {

        if ($("#select_dichvu").val() == "1") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 7.3 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.073)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.073)) + "</td>";
        } else if ($("#select_dichvu").val() == "2") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 0 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 0 + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money) + "</td>";
        }else if ($("#select_dichvu").val() == "") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 7.3 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.073)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.073)) + "</td>";
        }
    }

    rs += "</tr>";
    return rs;
}
function resultgmobile(provider, quantity, money) {
    var rs = "";
    rs += "<tr>";

    rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
    if ($("#select_partner").val() == "epay") {
        if ($("#select_dichvu").val() == "1") {
            rs += "<td class='tdmoney'>" + 6.2 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.062)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.062)) + "</td>";
        } else if ($("#select_dichvu").val() == "2") {
            rs += "<td class='tdmoney'>" + 0 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + 0 + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
        }else  if ($("#select_dichvu").val() == "") {
            rs += "<td class='tdmoney'>" + 6.2 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.062)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.062)) + "</td>";
        }
    } else if ($("#select_partner").val() == "vtc") {
        if ($("#select_dichvu").val() == "1") {
            rs += "<td class='tdmoney'>" + 6.3 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.063)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.063)) + "</td>";
        } else if ($("#select_dichvu").val() == "2") {
            rs += "<td class='tdmoney'>" + 0 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + 0 + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
        }else  if ($("#select_dichvu").val() == "") {
            rs += "<td class='tdmoney'>" + 6.3 + "%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money * 0.063)) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money - Math.round(money * 0.063)) + "</td>";
        }
    }

    rs += "</tr>";

    return rs;

}
function sumresultgmobile(quantity, money) {
    var rs = "";
    rs += "<tr class='moneysystem'>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
    rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
    if ($("#select_partner").val() == "epay") {
        if ($("#select_dichvu").val() == "1") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 6.2 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.062)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.062)) + "</td>";
        }
        else if ($("#select_dichvu").val() == "2") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 0 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 0 + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money) + "</td>";
        }else if ($("#select_dichvu").val() == "") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 6.2 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.062)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.062)) + "</td>";
        }
    } else if ($("#select_partner").val() == "vtc") {

        if ($("#select_dichvu").val() == "1") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 6.3 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.063)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.063)) + "</td>";
        } else if ($("#select_dichvu").val() == "2") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 0 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 0 + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money) + "</td>";
        }else  if ($("#select_dichvu").val() == "") {
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + 6.3 + "%" + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(Math.round(money * 0.063)) + "</td>";
            rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>" + commaSeparateNumber(money - Math.round(money * 0.063)) + "</td>";
        }
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