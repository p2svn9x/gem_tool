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
        <h6> Chi tiết lô code free poker tour</h6>
    </div>
    <form class="list_filter form" action="<?php echo admin_url('loggamebai/reportlocodefree') ?>" method="post">
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
                <td><label style="margin-left: 100px;margin-bottom:-2px;width: 120px">Id:</label></td>
                <td><input type="text" style="margin-left: -50px;margin-bottom:-2px;width: 150px"
                           id="txt_id" value="<?php echo $this->input->post('txt_id') ?>" name="txt_id">
                </td>
                <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Actor:</label></td>
                <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                           id="nickname" value="<?php echo $this->input->post('nickname') ?>" name="nickname">
                </td>


            </tr>
        </table>
    </div>

    <div class="formRow">
        <table>
            <tr>
                <td><label style="margin-left: 47px;margin-bottom:-2px;width: 100px">Loại Code:</label></td>
                <td><select id="typecode" name="typecode"
                            style="margin-left: 20px;margin-bottom:-2px;width: 150px">
                        <option value="-1" <?php if ($this->input->post('typecode') == "-1") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="1" <?php if ($this->input->post('typecode') == "1") {
                            echo "selected";
                        } ?>>Daily
                        </option>
                        <option value="2" <?php if ($this->input->post('typecode') == "2") {
                            echo "selected";
                        } ?>>Vip
                        </option>
                    </select></td>
                <td>
                    <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                           class="formLeft">Giá trị code: </label>
                </td>
                <td class="item"><select id="select_gtcode" name="select_gtcode"
                                         style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                        <option value="-1">Chọn</option>
                        <option value="10000" <?php if ($this->input->post('select_gtcode') == "10000") {
                            echo "selected";
                        } ?>>10K
                        </option>
                        <option value="50000" <?php if ($this->input->post('select_gtcode') == "50000") {
                            echo "selected";
                        } ?> >50K
                        </option>
                        <option value="100000" <?php if ($this->input->post('select_gtcode') == "100000") {
                            echo "selected";
                        } ?> >100K
                        </option>
                        <option value="200000" <?php if ($this->input->post('select_gtcode') == "200000") {
                            echo "selected";
                        } ?> >200K
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
                        <td>ID</td>
                        <td>Tên game</td>
                        <td>Loại code</td>
                        <td>Số lượng</td>
                        <td>Mệnh giá</td>
                        <td>Hạn sử dụng</td>
                        <td>Ngày tạo</td>
                        <td>Người tạo</td>
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
        function resultSearchTransction(id, gamename, type, quantity, amount, expire, createTime, creater) {

            var rs = "";
            rs += "<tr>";
            rs += "<td>" + id + "</td>";
            rs += "<td>" + gamename + "</td>";
            if(type == 1 ){
                rs += "<td>" + "Daily" + "</td>";
            }else if(type == 2){
                rs += "<td>" + "Vip" + "</td>";
            }
            rs += "<td>" + commaSeparateNumber(quantity) + "</td>";
            rs += "<td>" + commaSeparateNumber(amount) + "</td>";

            if(expire != null ){
                rs += "<td>" + moment.unix(expire/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
            }else{
                rs += "<td>" + "" + "</td>";
            }
            if(createTime != null ){
                rs += "<td>" + moment.unix(createTime/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
            }else{
                rs += "<td>" + "" + "</td>";
            }
            rs += "<td>" + creater + "</td>";
            rs += "</tr>";
            return rs;
        }
        $(document).ready(function () {
            var result = "";
            $('#pagination-demo').css("display", "block");
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('loggamebai/reportlocodefreeajax')?>",
                data: {
                    toDate: $("#toDate").val(),
                    fromDate: $("#fromDate").val(),
                    id : $("#txt_id").val(),
                    amount: $("#select_gtcode").val(),
                    nickname:$("#nickname").val(),
                    typecode: $("#typecode").val()

                },

                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res == "") {
                        $('#pagination-demo').css("display", "none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
                    } else {
                        $("#resultsearch").html("");
                        $.each(res, function (index, value) {
                            result += resultSearchTransction( value.id, value.gamename, value.type, value.quantity, value.amount, value.expire, value.createTime, value.creater);

                        });
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