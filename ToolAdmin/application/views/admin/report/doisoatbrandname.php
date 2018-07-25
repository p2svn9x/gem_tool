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
            <h4>Đối soát Brandname</h4>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('report/exportbrandname') ?>" method="post">

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
                                <tbody id="reportbrandname">


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
            url: "<?php echo admin_url('report/doisoatbrandnameajax')?>",
            data: {

                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()

            },

            dataType: 'json',
            success: function (result1) {
				$("#resultsearch").html("");
                console.log(result1.providers[0]);
                $("#spinner").hide();

                result += "<tr>";
                result += '<td class="moneysystem">'+"Nội dung"+'</td>';
                result += '<td class="moneysystem">'+"Số lượng"+'</td>';
                result += '<td class="moneysystem">'+"Đơn giá"+'</td>';
                result += '<td class="moneysystem">'+"Số tiền"+'</td>';
                result += "</tr>";
                result += resultbrandname("Mạng Viettel",result1.providers[0].sms,result1.providers[0].price,result1.providers[0].money);
                result += resultbrandname("Mạng Vinaphone",result1.providers[1].sms,result1.providers[1].price,result1.providers[1].money);
                result += resultbrandname("Mạng Mobifone",result1.providers[2].sms,result1.providers[2].price,result1.providers[2].money);
                result += resultbrandname("Mạng Khác",result1.providers[5].sms,result1.providers[5].price,result1.providers[5].money);
                result += resultbrandnamesum(result1.totalSms,result1.totalMoney);
                $('#reportbrandname').html(result);

            }, error: function () {
            $('#reportbrandname').html("");
            $("#spinner").hide();
            $("#error-popup").modal("show");
        }, timeout: 40000
        })
    });
    function resultbrandname(provider,sms,price,money) {
        var rs = "";
        rs += "<tr>";
        rs += "<td >"+ provider +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(sms) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(price) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(money) +"</td>";
        rs += "</tr>";

        return rs;
    }
    function resultbrandnamesum(sms,money) {
        var rs = "";
        rs += "<tr>";
        rs += "<td class='moneysystem'>"+ "Tổng cộng (đã bao gồm 10% VAT)" +"</td>";
        rs += "<td class='tdmoneybold'>"+ commaSeparateNumber(sms) +"</td>";
        rs += "<td class='tdmoney'>"+ "" +"</td>";
        rs += "<td class='tdmoneybold'>"+ commaSeparateNumber(money) +"</td>";
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