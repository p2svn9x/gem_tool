<?php if($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
    <section class="content-header">
        <h1>
            Thống kê giftcode đã xuất
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <h4 id="resultsearch" style="color: red"></h4>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-1 control-label" for="exampleInputEmail1">Tiền</label>

                                <div class="col-sm-2">
                                    <select class="form-control" id="money" name="money">
                                        <option value="1">Vin</option>
                                        <option value="0">Xu</option>
                                    </select>
                                </div>
                                <label class="col-sm-1 control-label">Nguồn xuất:</label>

                                <div class="col-sm-2">
                                    <select id="nguonxuat" class="form-control">
                                        <option value="">Giftcode marketing</option>
                                        <?php foreach($source as $row): ?>
                                            <option value="<?php echo $row->key ?>"><?php echo "------" . $row->name ?></option>
                                        <?php endforeach; ?>
                                        <option value="">Giftcode vận hành</option>
                                        <?php foreach($sourcevh as $row): ?>
                                            <option value="<?php echo $row->key ?>"><?php echo "------" . $row->name ?></option>
                                        <?php endforeach; ?>
                                        <option value="">Giftcode đại lý</option>
                                        <?php foreach ($list as $row): ?>
                                            <option value="<?php echo $row->key ?>"><?php echo  "------" . $row->nickname ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label id="labelvin" class="col-sm-1 control-label">Tìm theo</label>

                                <div class="col-sm-2">
                                    <select name="filterdate" class="form-control" id="filterdate">
                                        <option value="1" <?php if ($this->input->post("filterdate") == "1") {echo "selected";} ?>>Ngày tạo</option>
                                        <option value="2" <?php if ($this->input->post("filterdate") == "2") {echo "selected";} ?>>Ngày sử dụng</option>
                                    </select>
                                </div>


                            </div>

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-1 control-label">Từ ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="text" class="form-control" id="fromDate"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <label class="col-sm-1 control-label">Đến ngày:</label>

                                <div class="col-sm-2">
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
                                                             onclick="window.location.href = '<?php echo base_url('user/reportgc') ?>'; ">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover">
                                <tbody id="reportvt">
                                </tbody>
                            </table>

                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                     alt="Loading"/>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
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
    .tdmoney {
        text-align: right;
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
        if($("#money").val() == 1){
            giftcodevin();
        }else if($("#money").val() == 0){
            giftcodexu();
        }

    });

    $(document).ready(function () {
        $("#fromDate").val(getFirtDayOfMonth());
        $("#toDate").val(getLastDayOfMonth());
        giftcodevin();
    });
    function giftcodexu(){
        var result = "";
        var total1 = 0;
        var total2 = 0;
        var total3 = 0;
        var total4 = 0;
        var total5 = 0;
        var total6 = 0;
        var total7 = 0;
        var total8 = 0;
        var total9 = 0;
        var total10 = 0;
        var total11 = 0;
        var total12 = 0;
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("user/reportgcajax") ?>",
            data: {
                roomvin: $("#roomvin").val(),
                fromDate: $("#fromDate").val(),
                toDate: $("#toDate").val(),
                money: $("#money").val(),
                nguonxuat : $("#nguonxuat").val(),
                filterdate: $("#filterdate").val()

            },
            dataType: 'json',
            success: function (result1) {
                $("#spinner").hide();
                $("#resultsearch").html("");
                var ii = 2;
                $.each(result1.trans[1].trans, function (index, value) {
                    ii++;
                });
                var jj = 2;
                $.each(result1.trans[3].trans, function (index, value) {
                    jj++;
                });
                var kk = 2;
                $.each(result1.trans[5].trans, function (index, value) {
                    kk++;
                });
                result += "<tr>";
                result += "<td colspan='1'></td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Mệnhgiá" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Số lượng" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã dùng" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tổng tiền đã dùng" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã khóa" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Còn lại" + "</td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+ii+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Đại lý" + "</td>";
                result += "</tr>";
                for( var i = result1.trans[1].trans.length - 1; i >=0 ;i-- ){
                    result += resultgiftcode(result1.trans[1].trans[i].faceValue, result1.trans[1].trans[i].quantity, result1.trans[1].trans[i].used,result1.trans[1].trans[i].lock);
                    total1 += result1.trans[1].trans[i].quantity;
                    total2 += result1.trans[1].trans[i].used;
                    total3 += result1.trans[1].trans[i].lock;
                    total10 +=  result1.trans[1].trans[i].used*result1.trans[1].trans[i].faceValue
                }
                result += sumresult(total1,total2,total3,total10);
                result += "<tr>";
                result += "<td colspan='7' style='height: 50px'></td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+jj+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Marketing" + "</td>";
                result += "</tr>";
                for( var j = result1.trans[3].trans.length - 1; j >=0 ;j-- ){
                    result += resultgiftcode(result1.trans[3].trans[j].faceValue, result1.trans[3].trans[j].quantity, result1.trans[3].trans[j].used,result1.trans[3].trans[j].lock);
                    total4 += result1.trans[3].trans[j].quantity;
                    total5 += result1.trans[3].trans[j].used;
                    total6 += result1.trans[3].trans[j].lock;
                    total11 +=  result1.trans[3].trans[j].used*result1.trans[3].trans[j].faceValue

                }
                result += sumresult(total4,total5,total6,total11);
                result += "<tr>";
                result += "<td colspan='7' style='height: 50px'></td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+kk+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vận hành" + "</td>";
                result += "</tr>";
                for( var k = result1.trans[5].trans.length - 1; k >=0 ;k-- ){
                    result += resultgiftcode(result1.trans[5].trans[k].faceValue, result1.trans[5].trans[k].quantity, result1.trans[5].trans[k].used,result1.trans[5].trans[k].lock);
                    total7 += result1.trans[5].trans[k].quantity;
                    total8 += result1.trans[5].trans[k].used;
                    total9 += result1.trans[5].trans[k].lock;
                    total12 +=  result1.trans[5].trans[k].used*result1.trans[5].trans[k].faceValue
                }

                result += sumresult(total7,total8,total9,total12);
                result += "<tr>";
                result += "<td colspan='7' style='height: 50px'></td>";
                result += "</tr>";
                result += sumresulttong(total1+total4+total7, total2+total5+total8,total3+total6+total9,total10+total11+total12);
                $('#reportvt').html(result);
            }, error: function () {
                $("#spinner").hide();
                $("#resultsearch").html("Hệ thống quá tải.Vui lòng thử lại");
                $('#reportvt').html("");
            }, timeout: 40000
        });
    }
    function giftcodevin(){
        var result = "";
        var total1 = 0;
        var total2 = 0;
        var total3 = 0;
        var total4 = 0;
        var total5 = 0;
        var total6 = 0;
        var total7 = 0;
        var total8 = 0;
        var total9 = 0;
        var total10 = 0;
        var total11 = 0;
        var total12 = 0;
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("user/reportgcajax") ?>",
            data: {
                roomvin: $("#roomvin").val(),
                fromDate: $("#fromDate").val(),
                toDate: $("#toDate").val(),
                money: $("#money").val(),
                nguonxuat : $("#nguonxuat").val(),
                filterdate: $("#filterdate").val()

            },
            dataType: 'json',
            success: function (result1) {
                $("#spinner").hide();
                $("#resultsearch").html("");
                var ii = 2;
                $.each(result1.trans[0].trans, function (index, value) {
                    ii++;
                });
                var jj = 2;
                $.each(result1.trans[2].trans, function (index, value) {
                    jj++;
                });
                var kk = 2;
                $.each(result1.trans[4].trans, function (index, value) {
                    kk++;
                });
                result += "<tr>";
                result += "<td colspan='1'></td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Mệnhgiá" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Số lượng" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã dùng" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tổng tiền đã dùng" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Đã khóa" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Còn lại" + "</td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+ii+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Đại lý" + "</td>";
                result += "</tr>";
                for( var i = result1.trans[0].trans.length - 1; i >=0 ;i-- ){
                    result += resultgiftcode(result1.trans[0].trans[i].faceValue, result1.trans[0].trans[i].quantity, result1.trans[0].trans[i].used,result1.trans[0].trans[i].lock);
                    total1 += result1.trans[0].trans[i].quantity;
                    total2 += result1.trans[0].trans[i].used;
                    total3 += result1.trans[0].trans[i].lock;
                    total10 +=  result1.trans[0].trans[i].used*result1.trans[0].trans[i].faceValue
                }
                result += sumresult(total1,total2,total3,total10);
                result += "<tr>";
                result += "<td colspan='7' style='height: 50px'></td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+jj+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Marketing" + "</td>";
                result += "</tr>";
                for( var j = result1.trans[2].trans.length - 1; j >=0 ;j-- ){
                    result += resultgiftcode(result1.trans[2].trans[j].faceValue, result1.trans[2].trans[j].quantity, result1.trans[2].trans[j].used,result1.trans[2].trans[j].lock);
                    total4 += result1.trans[2].trans[j].quantity;
                    total5 += result1.trans[2].trans[j].used;
                    total6 += result1.trans[2].trans[j].lock;
                    total11 +=  result1.trans[2].trans[j].used*result1.trans[2].trans[j].faceValue

                }
                result += sumresult(total4,total5,total6,total11);
                result += "<tr>";
                result += "<td colspan='7' style='height: 50px'></td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+kk+"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vận hành" + "</td>";
                result += "</tr>";
                for( var k = result1.trans[4].trans.length - 1; k >=0 ;k-- ){
                    result += resultgiftcode(result1.trans[4].trans[k].faceValue, result1.trans[4].trans[k].quantity, result1.trans[4].trans[k].used,result1.trans[4].trans[k].lock);
                    total7 += result1.trans[4].trans[k].quantity;
                    total8 += result1.trans[4].trans[k].used;
                    total9 += result1.trans[4].trans[k].lock;
                    total12 +=  result1.trans[4].trans[k].used*result1.trans[4].trans[k].faceValue
                }

                result += sumresult(total7,total8,total9,total12);
                result += "<tr>";
                result += "<td colspan='7' style='height: 50px'></td>";
                result += "</tr>";
                result += sumresulttong(total1+total4+total7, total2+total5+total8,total3+total6+total9,total10+total11+total12);
                $('#reportvt').html(result);
            }, error: function () {
                $("#spinner").hide();
                $("#resultsearch").html("Hệ thống quá tải.Vui lòng thử lại");
                $('#reportvt').html("");
            }, timeout: 40000
        });

    }

    $('#money').change(function () {
        var val = $("#money option:selected").val();
        if (val == 1) {
            $("#labelvin").css("display", "block");
            $("#menhgiavin").css("display", "block");
            $("#menhgiaxu").css("display", "none");
        } else if (val == 0) {
            $("#menhgiaxu").css("display", "block");
            $("#labelvin").css("display", "block");
            $("#menhgiavin").css("display", "none");
        }
    });
    function sumresult(quantity,use,lock,money){
        var rs = "";
        rs += "<tr>";

        rs += "<td style='color: #0000ff;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right;'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(use) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(lock) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(quantity-use-lock) + "</td>";
        rs += "</tr>";

        return rs;
    }
    function sumresulttong(quantity,use,lock,money){
        var rs = "";
        rs += "<tr>";

        rs += "<td colspan='2' style='color: #0000ff;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right;'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(use) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(lock) + "</td>";
        rs += "<td style='color: blue;font-size: 20px;font-weight:700;text-align: right'>" + commaSeparateNumber(quantity-use-lock) + "</td>";
        rs += "</tr>";

        return rs;
    }
    function resultgiftcode(value,quantity,use,lock) {
        var rs = "";
        rs += "<tr>";
        rs += "<td  class='tdmoney'>" + commaSeparateNumber(value) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(use) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(use*value) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(lock) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity-use-lock) + "</td>";
        rs += "</tr>";

        return rs;
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