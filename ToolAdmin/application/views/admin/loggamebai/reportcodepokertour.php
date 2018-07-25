<?php $this->load->view('admin/loggamebai/head', $this->data) ?>
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
    <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>

    <div class="widget">
    <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>

    <div class="title">
        <h6>Thống kê code free poker tour </h6>
    </div>
    <form class="list_filter form" action="<?php echo admin_url('loggamebai/reportcodepokertour') ?>" method="post">
    <div class="formRow">
        <table>
            <tr>
                <td>
                    <label for="param_name" class="formLeft" id="nameuser"
                           style="margin-left: 70px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                <td class="item">
                    <div class="input-group date" id="datetimepicker1">
                        <input type="text" id="toDate" name="toDate"
                               value="<?php echo $this->input->post('toDate') ?>"> <span class="input-group-addon">
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
                        <input type="text" id="fromDate" name="fromDate"
                               value="<?php echo $this->input->post('fromDate') ?>"> <span
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
                <td>
                    <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                           class="formLeft"> Tìm theo: </label>
                </td>
                <td class="item"><select id="search_type" name="search_type"
                                         style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                        <option value="0" <?php if ($this->input->post('search_type') == 0) {
                            echo "selected";
                        } ?> >Thời gian tạo
                        </option>
                        <option value="1" <?php if ($this->input->post('search_type') == 1) {
                            echo "selected";
                        } ?>>Thời gian sử dụng
                        </option>
                    </select>
                </td>
                <td style="">
                    <input type="submit" id="search_tran" value="Tìm kiếm" class="button blueB"
                           style="margin-left: 70px">
                </td>

            </tr>
        </table>
    </div>

    </form>

    <div class="formRow">
        <div class="row">
            <div class="col-xs-12">
                <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                    <thead>
                    <tr style="height: 20px;">
                        <td>Mệnh giá</td>
                        <td>Số lượng</td>
                        <td>Chưa kích hoạt</td>
                        <td>Đã dùng</td>
                        <td>Đã khóa</td>
                        <td>Hết hạn</td>
                        <td>Còn lại</td>
                    </tr>
                    </thead>
                    <tbody id="logaction">
                    </tbody>
                </table>
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
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD 00:00:00'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD 23:59:59'
        });

    });
    $("#search_tran").click(function () {
        var fromDatetime = $("#toDate").val();
        var toDatetime = $("#fromDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });
        function resultSearchTransction(amount, total, totalInactive, totalUsed, totalLocked, totalExpired, totalRemain) {

            var rs = "";
            rs += "<tr>";
            rs += "<td>" + commaSeparateNumber(amount) + "</td>";
            rs += "<td>" + commaSeparateNumber(total) + "</td>";
            rs += "<td>" + commaSeparateNumber(totalInactive) + "</td>";
            rs += "<td>" + commaSeparateNumber(totalUsed) + "</td>";
            rs += "<td>" + commaSeparateNumber(totalLocked) + "</td>";
            rs += "<td>" + commaSeparateNumber(totalExpired) + "</td>";
            rs += "<td>" + commaSeparateNumber(totalRemain) + "</td>";
            rs += "</tr>";
            return rs;
        }

    function resultSum(total, totalInactive, totalUsed, totalLocked, totalExpired, totalRemain) {

        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + "Tổng" + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(total) + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(totalInactive) + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(totalUsed) + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(totalLocked) + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(totalExpired) + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(totalRemain) + "</td>";
        rs += "</tr>";
        return rs;
    }
        $(document).ready(function () {
            var total1 = 0;
            var total2 = 0;
            var total3 = 0;
            var total4 = 0;
            var total5 = 0;
            var total6 = 0;
            var result = "";
            $('#pagination-demo').css("display", "block");
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('loggamebai/reportcodepokertourajax')?>",
                data: {
                    toDate: $("#toDate").val(),
                    fromDate: $("#fromDate").val(),
                    search : $("#search_type").val()
                },

                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res == "") {
                        $('#pagination-demo').css("display", "none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
                    } else {
                        $("#resultsearch").html("");
                        if(res[10000]){
                            result += resultSearchTransction(res[10000].amount, res[10000].total,res[10000].totalInactive,res[10000].totalUsed, res[10000].totalLocked, res[10000].totalExpired,res[10000].totalRemain);
                            total1 +=  res[10000].total;total2 +=  res[10000].totalInactive;total3 +=  res[10000].totalUsed;total4 +=  res[10000].totalLocked;total5 +=  res[10000].totalExpired;total6 +=  res[10000].totalRemain;
                        }else{
                            result += resultSearchTransction(10000,0,0,0,0,0,0,0);
                            total1 += 0;total2 +=  0;total3 +=  0;total4 +=  0;total5 +=  0;total6 += 0;

                        }
                        if(res[50000]){
                            result += resultSearchTransction(res[50000].amount, res[50000].total,res[50000].totalInactive,res[50000].totalUsed, res[50000].totalLocked, res[50000].totalExpired,res[50000].totalRemain);
                            total1 +=  res[50000].total;total2 +=  res[50000].totalInactive;total3 +=  res[50000].totalUsed;total4 +=  res[50000].totalLocked;total5 +=  res[50000].totalExpired;total6 +=  res[50000].totalRemain;
                        }else{
                            result += resultSearchTransction(50000,0,0,0,0,0,0,0);
                            total1 += 0;total2 +=  0;total3 +=  0;total4 +=  0;total5 +=  0;total6 += 0;
                        }
                        if(res[100000]){
                            result += resultSearchTransction(res[100000].amount, res[100000].total,res[100000].totalInactive,res[100000].totalUsed, res[100000].totalLocked, res[100000].totalExpired,res[100000].totalRemain);
                            total1 +=  res[100000].total;total2 +=  res[100000].totalInactive;total3 +=  res[100000].totalUsed;total4 +=  res[100000].totalLocked;total5 +=  res[100000].totalExpired;total6 +=  res[100000].totalRemain;
                        }else{
                            result += resultSearchTransction(100000,0,0,0,0,0,0,0);
                            total1 += 0;total2 +=  0;total3 +=  0;total4 +=  0;total5 +=  0;total6 += 0;
                        }
                        if(res[200000]){
                            result += resultSearchTransction(res[200000].amount, res[200000].total,res[200000].totalInactive,res[200000].totalUsed, res[200000].totalLocked, res[200000].totalExpired,res[200000].totalRemain);
                            total1 +=  res[200000].total;total2 +=  res[200000].totalInactive;total3 +=  res[200000].totalUsed;total4 +=  res[200000].totalLocked;total5 +=  res[200000].totalExpired;total6 +=  res[200000].totalRemain;
                        }else{
                            result += resultSearchTransction(200000,0,0,0,0,0,0,0);
                            total1 += 0;total2 +=  0;total3 +=  0;total4 +=  0;total5 +=  0;total6 += 0;
                        }
                        result += resultSum(total1,total2,total3,total4,total5,total6);
                        $('#logaction').html(result);

                    }
                }, error: function () {
                    $("#spinner").hide();
                    $('#logaction').html("");
                    $("#resultsearch").html("");
                    $("#error-popup").modal("show");
                }, timeout: timeOutApi
            })

    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>