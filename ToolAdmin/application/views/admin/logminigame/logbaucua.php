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
    <div class="widget">
        <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
         <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
        <div class="title">
            <h6>Lịch sử bầu cua</h6>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('logminigame/logbaucua') ?>" method="post">
            <div class="formRow">
            <table>
                <tr>
                    <td>
                        <label for="param_name" class="formLeft" id="nameuser"
                               style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                    <td class="item">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" id="toDate" name="toDate" value="<?php echo $this->input->post('toDate') ?>"> <span class="input-group-addon">
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
                        <td><label  style="margin-left:70px;margin-bottom:-2px;width: 80px;">Nick name:</label></td>
                        <td ><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"  id="nickname" value="<?php echo $this->input->post('nickname') ?>" name="nickname"></td>
                    </tr>
                </table>
        </div>
            <div class="formRow">
                <table>
                    <tr>
                        <td><label  id = "labelvin" style="margin-left: 60px;margin-bottom:-2px;width: 90px;">Phòng vin:</label></td>

                        <td><select id="menhgiavin" name="menhgiavin"
                                    style="margin-left: 0px;margin-bottom:-2px;width: 150px;">
                                <option value="" <?php if($this->input->post('menhgiavin') == "" ){echo "selected";} ?> >Chọn</option>
                                <option value="1000" <?php if($this->input->post('menhgiavin') == "1000" ){echo "selected";} ?>>1K Vin</option>
                                <option value="10000" <?php if($this->input->post('menhgiavin') == "10000" ){echo "selected";} ?>>10K Vin</option>
                                <option value="100000" <?php if($this->input->post('menhgiavin') == "100000" ){echo "selected";} ?>>100K Vin</option>
                            </select></td>
                        <td><label  id = "labelxu" style="margin-left: 80px;margin-bottom:-2px;width: 85px;">Phòng xu:</label></td>
                        <td><select id="menhgiaxu" name="menhgiaxu"
                                    style="margin-left: 0px;margin-bottom:-2px;width: 150px;">
                                <option value="" <?php if($this->input->post('menhgiaxu') == "" ){echo "selected";} ?>>Chọn</option>
                                <option value="10000" <?php if($this->input->post('menhgiaxu') == "10000" ){echo "selected";} ?>>10K Xu</option>
                                <option value="100000" <?php if($this->input->post('menhgiaxu') == "100000" ){echo "selected";} ?>>100K Xu</option>
                                <option value="1000000" <?php if($this->input->post('menhgiaxu') == "1000000" ){echo "selected";} ?>>1000K Xu</option>

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
                                <option value="0" <?php if($this->input->post('money') == "0" ){echo "selected";} ?>>Xu</option>
                            </select>
                        </td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 40px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('logminigame/logbaucua') ?>'; "
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
                <td>Phòng</td>
                <td>Kết quả</td>
                <td>Tiền đặt bầu</td>
                <td>Tiền đặt cua</td>
                <td>Tiền đặt tôm</td>
                <td>Tiền đặt cá</td>
                <td>Tiền đặt gà</td>
                <td>Tiền đặt hưou</td>
                <td>Tiền thưởng bầu</td>
                <td>Tiền thưởng cua</td>
                <td>Tiền thưởng tôm</td>
                <td>Tiền thưởng cá</td>
                <td>Tiền thưởng gà</td>
                <td>Tiền thưởng hưou</td>
                <td>Tiền</td>
                <td>Ngày tạo</td>
            </tr>
            </thead>
            <tbody id="logaction">
            </tbody>
        </table>

    </div>
</div>
<?php endif; ?>
<style>
    td{
        word-break: break-all;
    }
    thead{
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
        <ul id="pagination-demo" class="pagination-sm"></ul>
    </div>

</div>
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
function resultlogbaucua(referid,nickname,room,dice,bet_bau,bet_cua,bet_tom,bet_ca,bet_ga,bet_huou,prize_bau,prize_cua,prize_tom,prize_ca,prize_ga,prize_huou,money_type,time_log) {
    var rs = "";
    rs += "<tr>";
    rs += "<td><a style='color: #0000FF' href='detailbaucua/"+referid+"'>"+referid+"</a>" + "</td>";
    rs += "<td>" + nickname + "</td>";
    rs += "<td>" + commaSeparateNumber(room) + "</td>";
    rs += "<td>" + dice + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_bau) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_cua) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_tom) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_ca) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_ga) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_huou) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_bau) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_cua) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_tom) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_ca) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_ga) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_huou) + "</td>";
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
    var result = "";
    var oldpage = 0;
    $('#pagination-demo').css("display","block");
    $("#spinner").show();
    if($("#money").val()==1) {
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('logminigame/logbaucuaajax')?>",
            data: {
                phienbc: $("#phienbc").val(),
                nickname: $("#nickname").val(),
                roomvin : $("#menhgiavin").val(),
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
					 $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    $.each(result.transactions, function (index, value) {
                        result += resultlogbaucua(value.referent_id,value.user_name,value.room,replacedice(value.dices),value.bet_bau,value.bet_cua,value.bet_tom,value.bet_ca,value.bet_ga,value.bet_huou,value.prize_bau,value.prize_cua,value.prize_tom,value.prize_ca,value.prize_ga,value.prize_huou,value.money_type,value.time_log);
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
                                    url: "<?php echo admin_url('logminigame/logbaucuaajax')?>",
                                    data: {
                                        phienbc: $("#phienbc").val(),
                                        nickname: $("#nickname").val(),
                                        roomvin : $("#menhgiavin").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        money : $("#money").val(),
                                        pages : page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        $.each(result.transactions, function (index, value) {
                                            result += resultlogbaucua(value.referent_id, value.user_name, value.room, replacedice(value.dices), value.bet_bau, value.bet_cua, value.bet_tom, value.bet_ca, value.bet_ga, value.bet_huou, value.prize_bau, value.prize_cua, value.prize_tom, value.prize_ca, value.prize_ga, value.prize_huou, value.money_type, value.time_log);
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
            url: "<?php echo admin_url('logminigame/logbaucuaajax')?>",
            data: {
                phienbc: $("#phienbc").val(),
                nickname: $("#nickname").val(),
                roomxu : $("#menhgiaxu").val(),
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
                } else {
                    $("#resultsearch").html("");
                    $.each(result.transactions, function (index, value) {
                        result += resultlogbaucua(value.referent_id,value.user_name,value.room,replacedice(value.dices),value.bet_bau,value.bet_cua,value.bet_tom,value.bet_ca,value.bet_ga,value.bet_huou,value.prize_bau,value.prize_cua,value.prize_tom,value.prize_ca,value.prize_ga,value.prize_huou,value.money_type,value.time_log);
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
                                    url: "<?php echo admin_url('logminigame/logbaucuaajax')?>",
                                    data: {
                                        phienbc: $("#phienbc").val(),
                                        nickname: $("#nickname").val(),
                                        roomxu : $("#menhgiaxu").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        money : $("#money").val(),
                                        pages :page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        $.each(result.transactions, function (index, value) {
                                            result += resultlogbaucua(value.referent_id, value.user_name, value.room, replacedice(value.dices), value.bet_bau, value.bet_cua, value.bet_tom, value.bet_ca, value.bet_ga, value.bet_huou, value.prize_bau, value.prize_cua, value.prize_tom, value.prize_ca, value.prize_ga, value.prize_huou, value.money_type, value.time_log);
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
function replacedice(str){
   return str.replace(/0/g,"bầu").replace(/1/g,"cua").replace(/2/g,"tôm").replace(/3/g,"cá").replace(/4/g,"gà").replace(/5/g,"hưou");
}
function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }
    return val;
}
</script>
