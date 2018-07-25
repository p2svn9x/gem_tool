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
            <h4>Đối soát 9029</h4>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('report/exportdoisoat9029') ?>" method="post">

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
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 70px">
                        </td>
                        <td style="">
                            <input type="submit" id="exportexel" value="Xuất Exel" class="button blueB"
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
                                <tbody id="reportvmg">


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
        font-weight: 600;

        color: #000000;
    }

    .tdmoney {

        text-align: right;
    }
    .tdmoneybold {
        font-weight: 600;
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
    });

    $("#search_tran").click(function () {
        var result = "";
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/doisoat9029ajax')?>",
            data: {

                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()

            },

            dataType: 'json',
            success: function (result1) {
				$("#resultsearch").html("");
                $("#spinner").hide();

                result += "<tr>";
                result += '<td rowspan="2" style="vertical-align: middle;" class="moneysystem">'+""+'</td>';
                result += '<td colspan="3" class="moneysystem">'+"Viettel"+'</td>';
                result += '<td colspan="3" class="moneysystem">'+"Mobifone"+'</td>';
                result += '<td colspan="3" class="moneysystem">'+"Vinaphone"+'</td>';
                result += "</tr>";
                result += "<tr>";
                result += "<td class='moneysystem' >"+'Đơn giá'+"</td>";
                result += "<td class='moneysystem' >"+'Số lượng'+"</td>";
                result += "<td class='moneysystem' >"+'Tổng tiền'+"</td>";
                result += "<td class='moneysystem' >"+'Đơn giá'+"</td>";
                result += "<td class='moneysystem' >"+'Số lượng'+"</td>";
                result += "<td class='moneysystem' >"+'Tổng tiền'+"</td>";
                result += "<td class='moneysystem' >"+'Đơn giá'+"</td>";
                result += "<td class='moneysystem' >"+'Số lượng'+"</td>";
                result += "<td class='moneysystem' >"+'Tổng tiền'+"</td>";
                result += "</tr>";
                var total1 = 0;
                var total2 = 0;
                var total3 = 0;
                var total4 = 0;
                var total5 = 0;
                var total6 = 0;
                var i=0;
                for( var j = result1.moneyReponse[1].trans.length - 1; j >=0 ;j-- ){
                    result += resultviettel(result1.moneyReponse[1].trans[j].faceValue,result1.moneyReponse[1].trans[j].quantity,result1.moneyReponse[3].trans[j].faceValue,result1.moneyReponse[3].trans[j].quantity,result1.moneyReponse[2].trans[j].faceValue,result1.moneyReponse[2].trans[j].quantity);
                    total1 += dongiaviettel(result1.moneyReponse[1].trans[j].faceValue)*result1.moneyReponse[1].trans[j].quantity ;
                    total2 += dongiavinamobi(result1.moneyReponse[3].trans[j].faceValue)*result1.moneyReponse[3].trans[j].quantity ;
                    total3 += dongiavinamobi(result1.moneyReponse[2].trans[j].faceValue)*result1.moneyReponse[2].trans[j].quantity ;
                    total4 += result1.moneyReponse[1].trans[j].quantity;
                    total5 += result1.moneyReponse[3].trans[j].quantity;
                    total6 += result1.moneyReponse[2].trans[j].quantity;
                    i++;
                }
                result += resultsum(total1,total2,total3,total4,total5,total6);
                $('#reportvmg').html(result);
            }, error: function () {
            $('#reportvmg').html("");
            $("#spinner").hide();
            $("#error-popup").modal("show");
        }, timeout: 40000
        })
    });


    function resultviettel(menhgia1,soluong1,menhgia2,soluong2,menhgia3,soluong3) {
        var rs = "";
        rs += "<tr>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(menhgia1) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiaviettel(menhgia1)) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(soluong1) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiaviettel(menhgia1)*soluong1) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiavinamobi(menhgia2)) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(soluong2) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiavinamobi(menhgia2)*soluong2) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiavinamobi(menhgia3)) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(soluong3) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(dongiavinamobi(menhgia3)*soluong3) +"</td>";

        rs += "</tr>";

        return rs;
    }
    function dongiaviettel(dongia){
        var strresult = 0;
        if (dongia == 100000) {
            strresult = 60000;
        } else if (dongia == 50000) {
            strresult = 30000;
        }
        else if (dongia == 30000) {
            strresult = 18000;
        }
        else if (dongia == 20000) {
            strresult = 12000;
        }
        else if (dongia == 15000) {
            strresult = 9000;
        }
        else if (dongia == 10000) {
            strresult = 6000;
        }
        else if (dongia == 5000) {
            strresult = 3000;
        }
        else if (dongia == 4000) {
            strresult = 2400;
        }
        else if (dongia == 3000) {
            strresult = 1800;
        }
        else if (dongia == 2000) {
            strresult = 1200;
        }
        else if (dongia == 1000) {
            strresult = 600;
        }

        return strresult;

    }
    function dongiavinamobi(dongia){
        var strresult = 0;
        if (dongia == 100000) {
            strresult = 65000;
        } else if (dongia == 50000) {
            strresult = 32500;
        }
        else if (dongia == 30000) {
            strresult = 19500;
        }
        else if (dongia == 20000) {
            strresult = 13000;
        }
        else if (dongia == 15000) {
            strresult = 9750;
        }
        else if (dongia == 10000) {
            strresult = 6500;
        }
        else if (dongia == 5000) {
            strresult = 3250;
        }
        else if (dongia == 4000) {
            strresult = 2600;
        }
        else if (dongia == 3000) {
            strresult = 1950;
        }
        else if (dongia == 2000) {
            strresult = 1300;
        }
        else if (dongia == 1000) {
            strresult = 650;
        }

        return strresult;

    }

    function resultsum(money1,money2,money3,quantity1,quantity2,quantity3) {
        var rs = "";
        rs += "<tr>";
        rs += "<td colspan='3' class='tdmoneybold'>"+ commaSeparateNumber(quantity1) +"</td>";
        rs += "<td  class='tdmoneybold'>"+ commaSeparateNumber(money1) +"</td>";
        rs += "<td colspan='2' class='tdmoneybold'>"+ commaSeparateNumber(quantity2) +"</td>";
        rs += "<td  class='tdmoneybold'>"+ commaSeparateNumber(money2) +"</td>";
        rs += "<td colspan='2' class='tdmoneybold'>"+ commaSeparateNumber(quantity3) +"</td>";
        rs += "<td class='tdmoneybold'>"+ commaSeparateNumber(money3) +"</td>";
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