<?php $this->load->view('admin/logminigame/head', $this->data) ?>
<div class="line"></div>
<?php if($role == false): ?>
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        </div>
    </div>
<?php else: ?>
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
            <h6>Lịch sử cao thấp </h6>
            <div class="num f12">Tổng số: <b id="num"></b></div>
        </div>

        <form class="list_filter form" action="<?php echo admin_url('logminigame/logcaothap') ?>" method="post">
            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" id="toDate" name = "toDate" value="<?php echo $this->input->post('toDate') ?>"> <span class="input-group-addon">
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
                                <input type="text" id="fromDate" name="fromDate" value="<?php echo $this->input->post('fromDate') ?>"> <span class="input-group-addon">
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
                        <td><label  style="margin-left: 50px;margin-bottom:-2px;width: 80px;">Phiên:</label></td>
                        <td ><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"  id="phienbc" value="<?php echo $this->input->post('phienbc') ?>" name="phienbc"></td>
                        <td><label  style="margin-left:68px;margin-bottom:-2px;width: 80px;">Nick name:</label></td>
                        <td ><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"  id="nickname" value="<?php echo $this->input->post('nickname') ?>" name="nickname"></td>
                    </tr>
                </table>
            </div>
            <div class="formRow">
                <table>
                    <tr>
                        <td><label  id = "labelvin" style="margin-left: 57px;margin-bottom:-2px;width: 92px;">Phòng vin:</label></td>

                        <td><select id="menhgiavin" name="menhgiavin"
                                    style="margin-left: 0px;margin-bottom:-2px;width: 150px;">
                                <option value="" <?php if($this->input->post('menhgiavin') == "" ){echo "selected";} ?>>Chọn</option>
                                <option value="1000" <?php if($this->input->post('menhgiavin') == "1000" ){echo "selected";} ?>>1K Vin</option>
                                <option value="10000" <?php if($this->input->post('menhgiavin') == "10000" ){echo "selected";} ?>>10K Vin</option>
                                <option value="50000" <?php if($this->input->post('menhgiavin') == "50000" ){echo "selected";} ?>>50K Vin</option>
                                <option value="100000" <?php if($this->input->post('menhgiavin') == "100000" ){echo "selected";} ?>>100K Vin</option>
                                <option value="500000" <?php if($this->input->post('menhgiavin') == "500000" ){echo "selected";} ?>>500K Vin</option>
                            </select></td>
                        <td><label  id = "labelxu" style="margin-left: 65px;margin-bottom:-2px;width: 80px;">Phòng xu:</label></td>
                        <td><select id="menhgiaxu" name="menhgiaxu"
                                    style="margin-left: 15px;margin-bottom:-2px;width: 150px;">
                                <option value="" <?php if($this->input->post('menhgiaxu') == "" ){echo "selected";} ?>>Chọn</option>
                                <option value="10000" <?php if($this->input->post('menhgiaxu') == "10000" ){echo "selected";} ?>>10K Xu</option>
                                <option value="100000" <?php if($this->input->post('menhgiaxu') == "100000" ){echo "selected";} ?>>100K Xu</option>
                                <option value="500000" <?php if($this->input->post('menhgiaxu') == "500000" ){echo "selected";} ?>>500K Xu</option>
                                <option value="1000000" <?php if($this->input->post('menhgiaxu') == "1000000" ){echo "selected";} ?>>1M Xu</option>
                                <option value="5000000" <?php if($this->input->post('menhgiaxu') == "5000000" ){echo "selected";} ?>>5M Xu</option>

                            </select></td>

                    </tr>
                    </table>
                </div>
            <div class="formRow">
                <table>
                    <tr>
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tiền:</label></td>
                        <td class="">
                            <select id="money" name="money"
                                    style="margin-bottom:-2px;width: 150px">
                                <option value="1" <?php if($this->input->post('money') == "1" ){echo "selected";} ?>>Vin</option>
                                <option value="0"  <?php if($this->input->post('money') == "0" ){echo "selected";} ?>>Xu</option>
                            </select>
                        </td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 40px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('logminigame/logcaothap') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="formRow"></div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td>Phiên</td>
                <td>Nick name</td>
                <td style="width:100px;">Cửa đặt</td>
                <td style="width:100px;">Bước</td>
                <td>Phòng chơi</td>
                <td style="width:100px;">Kết quả</td>
                <td>Số tiền nhận được</td>
                <td>Quân bài</td>
                <td>Hũ hiện tại</td>
                <td>Quỹ hiện tại</td>
                <td>Loại tiền</td>
                <td>Ngày tạo</td>
            </tr>
            </thead>
            <tbody id="logaction">

            </tbody>
        </table>
    </div>
</div>
<?php endif;?>
<style>.spinner {
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
<div class="clear mt30"></div>
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
        var fromDatetime = $("#toDate").val();
        var toDatetime = $("#fromDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }

    });

    function resultlogcaothap(tran_id,nickName,pot_bet,step,bet_value,result,prize,cards,current_pot,current_fund,money_type,time_log) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>"+tran_id+"</td>";
        rs += "<td>" + nickName + "</td>";
        if(pot_bet == 0){
            rs += "<td>" +"Dưới"+ "</td>";
        }else if(pot_bet == 1){
            rs += "<td>" +"Trên"+ "</td>";
        }
        rs += "<td>" + step + "</td>";
        rs += "<td>" + commaSeparateNumber(bet_value) + "</td>";
        if(result == 4){
            rs += "<td>" + "Thắng" + "</td>";
        }else if(result == 5){
            rs += "<td>" + "Thua" + "</td>";
        }else if(result == 7){
            rs += "<td>" + "Nổ hũ" + "</td>";
        }
        else{
            rs += "<td>" + " " + "</td>";
        }
        rs += "<td>" + commaSeparateNumber(prize) + "</td>";
        rs += "<td>" + cards + "</td>";
        rs += "<td>" + commaSeparateNumber(current_pot) + "</td>";
        rs += "<td>" + commaSeparateNumber(current_fund) + "</td>";
        if(money_type == 0){
            rs += "<td>" + "xu" + "</td>";
        }else if(money_type == 1){
            rs += "<td>" + "vin" + "</td>";
        }
        rs += "<td>" + time_log + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
		$("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
   $("#search_tran").click(function () {
        var oldpage = 0;
        $('#pagination-demo').css("display","block");
        $("#spinner").show();
        if($("#money").val()==1) {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('logminigame/logcaothapajax')?>",
                data: {
                    nickname: $("#nickname").val(),
                    phienbc: $("#phienbc").val(),
                    roomvin: $("#menhgiavin").val(),
                    toDate: $("#toDate").val(),
                    fromDate: $("#fromDate").val(),
                    money : $("#money").val(),
                    pages :1
                },
                dataType: 'json',
                success: function (result) {
                    $("#spinner").hide();
                    var totalPage = result.total;
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    if (result.transactions == "") {
                        $('#pagination-demo').css("display","none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
						  $('#logaction').html("");
                    } else {
                        $("#resultsearch").html("");
                        $.each(result.transactions, function (index, value) {
                            result += resultlogcaothap(value.tran_id,value.nickName,value.pot_bet,value.step,value.bet_value,value.result,value.prize,value.cards,value.current_pot,value.current_fund,value.money_type,value.time_log);
                        });
                        $('#logaction').html(result);
                        $('#pagination-demo').twbsPagination({
                            totalPages: totalPage,
                            visiblePages: 5,
                            onPageClick: function (event, page) {
                                if(oldpage > 0) {
                                    $("#spinner").show();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo admin_url('logminigame/logcaothapajax')?>",
                                        data: {
                                            nickname: $("#nickname").val(),
                                            phienbc: $("#phienbc").val(),
                                            roomvin: $("#menhgiavin").val(),
                                            toDate: $("#toDate").val(),
                                            fromDate: $("#fromDate").val(),
                                            money : $("#money").val(),
                                            pages : page
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            $("#spinner").hide();
                                            $.each(result.transactions, function (index, value) {
                                                result += resultlogcaothap(value.tran_id, value.nickName, value.pot_bet, value.step, value.bet_value, value.result, value.prize, value.cards, value.current_pot, value.current_fund, value.money_type, value.time_log);
                                            });
                                            $('#logaction').html(result);
                                        }
                                    });
                                }
                                oldpage = page;
                            }
                        });
                    }

                }
            })
        }else if($("#money").val()== 0){
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('logminigame/logcaothapajax')?>",
                data: {
                    nickname: $("#nickname").val(),
                    phienbc: $("#phienbc").val(),
                    roomxu: $("#menhgiaxu").val(),
                    toDate: $("#toDate").val(),
                    fromDate: $("#fromDate").val(),
                    money : $("#money").val(),
                    pages :1
                },
                dataType: 'json',
                success: function (result) {
                    var totalPage = result.total;
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    $("#spinner").hide();
                    if (result.transactions == "") {
                        $('#pagination-demo').css("display","none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
                    } else {
                        $("#resultsearch").html("");
                        $.each(result.transactions, function (index, value) {
                            result += resultlogcaothap(value.tran_id,value.nickName,value.pot_bet,value.step,value.bet_value,value.result,value.prize,value.cards,value.current_pot,value.current_fund,value.money_type,value.time_log);
                        });
                        $('#logaction').html(result);
                        $('#pagination-demo').twbsPagination({
                            totalPages: totalPage,
                            visiblePages: 5,
                            onPageClick: function (event, page) {
                                if(oldpage>0) {
                                    $("#spinner").show();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo admin_url('logminigame/logcaothapajax')?>",
                                        data: {
                                            nickname: $("#nickname").val(),
                                            phienbc: $("#phienbc").val(),
                                            roomxu: $("#menhgiaxu").val(),
                                            toDate: $("#toDate").val(),
                                            fromDate: $("#fromDate").val(),
                                            money : $("#money").val(),
                                            pages: page
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            $("#spinner").hide();
                                            $.each(result.transactions, function (index, value) {
                                                result += resultlogcaothap(value.tran_id, value.nickName, value.pot_bet, value.step, value.bet_value, value.result, value.prize, value.cards, value.current_pot, value.current_fund, value.money_type, value.time_log);
                                            });
                                            $('#logaction').html(result);
                                        }
                                    });
                                }
                                oldpage = page;
                            }
                        });
                    }

                }
            })
        }
    });


    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>
