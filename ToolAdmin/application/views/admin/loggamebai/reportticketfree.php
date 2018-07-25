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
        <h6> Thống kê vé free </h6>
    </div>
    <form class="list_filter form" action="<?php echo admin_url('loggamebai/reportticketfree') ?>" method="post">
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
                <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Nickname:</label></td>
                <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                           id="nickname" value="<?php echo $this->input->post('nickname') ?>" name="nickname">
                </td>


            </tr>
        </table>
    </div>

    <div class="formRow">
        <table>
            <tr>
                <td>
                    <label for="param_name" style="width: 120px;margin-bottom:-3px;margin-left: 23px;"
                           class="formLeft">Nguồn tạo: </label>
                </td>
                <td class="item"><select id="select_source" name="select_source"
                                         style="margin-left: 27px;margin-bottom:-2px;width: 142px">
                        <option value="-1">Chọn</option>
                        <option value="1" <?php if ($this->input->post('select_source') == 1) {
                            echo "selected";
                        } ?>>TopDay
                        </option>
                        <option value="2" <?php if ($this->input->post('select_source') == 2) {
                            echo "selected";
                        } ?>>TopWeek
                        </option>
                        <option value="3" <?php if ($this->input->post('select_source') == 3) {
                            echo "selected";
                        } ?>>TopMonth
                        </option>
                        <option value="4" <?php if ($this->input->post('select_source') == 4) {
                            echo "selected";
                        } ?>>TopYear
                        </option>
                        <option value="5" <?php if ($this->input->post('select_source') == 5) {
                            echo "selected";
                        } ?>>Code
                        </option>

                    </select>
                </td>
                <td>
                    <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                           class="formLeft">Giá trị vé: </label>
                </td>
                <td class="item"><select id="select_gtve" name="select_gtve"
                                         style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                        <option value="-1">Chọn</option>
                        <option value="10000" <?php if ($this->input->post('select_gtve') == "10000") {
                            echo "selected";
                        } ?>>10K
                        </option>
                        <option value="50000" <?php if ($this->input->post('select_gtve') == "50000") {
                            echo "selected";
                        } ?> >50K
                        </option>
                        <option value="100000" <?php if ($this->input->post('select_gtve') == "100000") {
                            echo "selected";
                        } ?> >100K
                        </option>
                        <option value="200000" <?php if ($this->input->post('select_gtve') == "200000") {
                            echo "selected";
                        } ?> >200K
                        </option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="formRow">
        <table>
            <tr>

                <td>
                    <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                           class="formLeft">Trạng thái: </label>
                </td>

                <td class="item"><select id="select_tt" name="select_tt"
                                         style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                        <option value="-1"<?php if ($this->input->post('select_tt') == "") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="0" <?php if ($this->input->post('select_tt') == "0") {
                            echo "selected";
                        } ?>>Chưa active
                        </option>
                        <option value="1" <?php if ($this->input->post('select_tt') == "1") {
                            echo "selected";
                        } ?>>Đã active
                        </option>
                        <option value="2" <?php if ($this->input->post('select_tt') == "2") {
                            echo "selected";
                        } ?>>Hết hiệu lực
                        </option>

                    </select>

                </td>

                <td>
                    <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                           class="formLeft"> Hiển thị: </label>
                </td>
                <td class="item"><select id="record" name="record"
                                         style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                        <option value="50" <?php if ($this->input->post('record') == 20) {
                            echo "selected";
                        } ?> >50
                        </option>
                        <option value="100" <?php if ($this->input->post('record') == 50) {
                            echo "selected";
                        } ?>>100
                        </option>
                        <option value="200" <?php if ($this->input->post('record') == 100) {
                            echo "selected";
                        } ?>>200
                        </option>
                        <option value="500" <?php if ($this->input->post('record') == 200) {
                            echo "selected";
                        } ?>>500
                        </option>
                        <option value="1000" <?php if ($this->input->post('record') == 500) {
                            echo "selected";
                        } ?>>1000
                        </option>

                    </select>
                </td>

            </tr>
        </table>
    </div>

    <div class="formRow">
        <table>
            <tr>
                <td><label style="margin-left: 47px;margin-bottom:-2px;width: 100px">Tour Id:</label></td>
                <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                           id="txt_tourid" value="<?php echo $this->input->post('txt_tourid') ?>" name="txt_tourid">
                </td>
                <td><label style="margin-left: 47px;margin-bottom:-2px;width: 100px">Loại Tour:</label></td>
                <td><select id="typetour" name="typetour"
                            style="margin-left: 30px;margin-bottom:-2px;width: 150px">
                        <option value="-1" <?php if ($this->input->post('typetour') == "-1") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="1" <?php if ($this->input->post('typetour') == "1") {
                            echo "selected";
                        } ?>>Daily
                        </option>
                        <option value="2" <?php if ($this->input->post('typetour') == "2") {
                            echo "selected";
                        } ?>>Vip
                        </option>
                    </select></td>
            </tr>
        </table>
    </div>
    <div class="formRow">
        <table>
            <tr>
                <td><label style="margin-left: 47px;margin-bottom:-2px;width: 100px">Tình trạng:</label></td>
                <td><select id="select_ttr" name="select_ttr" style="margin-left: 15px;margin-bottom:-2px;width: 150px">
                        <option value="-1" <?php if ($this->input->post('select_ttr') == "-1") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="0" <?php if ($this->input->post('select_ttr') == "0") {
                            echo "selected";
                        } ?>>Chưa sử dụng
                        </option>
                        <option value="1" <?php if ($this->input->post('select_ttr') == "1") {
                            echo "selected";
                        } ?>>Đã sử dụng
                        </option>
                    </select></td>
                <td><label style="margin-left: 47px;margin-bottom:-2px;width: 100px">Loại tài khoản:</label></td>
                <td><select id="select_tk" name="select_tk" style="margin-left: 30px;margin-bottom:-2px;width: 150px">
                        <option value="-1" <?php if ($this->input->post('select_tk') == "-1") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="0" <?php if ($this->input->post('select_tk') == "0") {
                            echo "selected";
                        } ?>>Tài khoản thường
                        </option>
                        <option value="1" <?php if ($this->input->post('select_tk') == "1") {
                            echo "selected";
                        } ?>>Tài khoản bot
                        </option>
                    </select></td>
                <td style="">
                    <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
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
                        <td>Nickname</td>
                        <td>Vé</td>
                        <td>Tour type</td>
                        <td>Trạng thái</td>
                        <td>Create Time</td>
                        <td>Available Time</td>
                        <td>Limit Time</td>
                        <td>Create Type</td>
                        <td>Loại tài khoản</td>
                        <td>Addition Info</td>
                        <td>Tour ID</td>
                        <td>Use Time</td>
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
    function resultSearchTransction(id, nickname, ticket, typetour, status, createtime, availableTime, limitTime, createType, useTime, addInfo, isbot, tourid) {

        var rs = "";
        rs += "<tr>";

        rs += "<td>" + id + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(ticket) + "</td>";
        rs += "<td>" + typetour + "</td>";
        if(status == 0 ){
            rs += "<td>" + "Chưa sử dụng" + "</td>";
        }else if(status == 1){
            rs += "<td>" + "Đã sử dụng" + "</td>";
        }
        if(createtime != null ){
            rs += "<td>" + moment.unix(createtime/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
        }else{
            rs += "<td>" + "" + "</td>";
        }
        if(availableTime != null ){
            rs += "<td>" + moment.unix(availableTime/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
        }else{
            rs += "<td>" + "" + "</td>";
        }
        if(limitTime != null ){
            rs += "<td>" + moment.unix(limitTime/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
        }else{
            rs += "<td>" + "" + "</td>";
        }
        rs += "<td>" + createType + "</td>";


        if(isbot == 0 ){
            rs += "<td>" + "Tài khoản thường" + "</td>";
        }else if(isbot == 1){
            rs += "<td>" + "Tài khoản bot" + "</td>";
        }
        rs += "<td>" + addInfo + "</td>";
        rs += "<td>" + tourid + "</td>";
        if(useTime != null ){
            rs += "<td>" + moment.unix(useTime/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
        }else{
            rs += "<td>" + "" + "</td>";
        }
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
		 $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
		
	})
	
   $("#search_tran").click(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('loggamebai/ticketfreeajax')?>",
            data: {
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                id : $("#txt_id").val(),
                nickname:$("#nickname").val(),
                source: $("#select_source").val(),
                gtve: $("#select_gtve").val(),
                status: $("#select_tt").val(),
                record: $("#record").val(),
                tourid: $("#txt_tourid").val(),
                typetour: $("#typetour").val(),
                tinhtrang: $("#select_ttr").val(),
                taikhoan: $("#select_tk").val(),
                page : 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.tickets == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					 $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    $.each(result.tickets, function (index, value) {
                        result += resultSearchTransction( value.id, value.nickname, value.ticket, value.tourType, value.used, value.createTime, value.availableTime, value.limitTime, value.createType, value.useTime, value.addInfo, value.isBot, value.tourId);

                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: 10,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('loggamebai/ticketfreeajax')?>",
                                    data: {
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        id : $("#txt_id").val(),
                                        nickname:$("#nickname").val(),
                                        source: $("#select_source").val(),
                                        gtve: $("#select_gtve").val(),
                                        status: $("#select_tt").val(),
                                        record: $("#record").val(),
                                        tourid: $("#txt_tourid").val(),
                                        typetour: $("#typetour").val(),
                                        tinhtrang: $("#select_ttr").val(),
                                        taikhoan: $("#select_tk").val(),
                                        page : page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        $.each(result.tickets, function (index, value) {
                                            result += resultSearchTransction( value.id, value.nickname, value.ticket, value.tourType, value.used, value.createTime, value.availableTime, value.limitTime, value.createType, value.useTime, value.addInfo, value.isBot, value.tourId);
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $("#resultsearch").html("");
                                        $("#error-popup").modal("show");
                                    }, timeout: timeOutApi
                                });
                            }
                            oldPage = page;
                        }
                    });

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