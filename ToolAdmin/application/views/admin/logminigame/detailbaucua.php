<?php $this->load->view('admin/logminigame/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Lịch sử chi tiết phiên bầu cua</h6>
        </div>
        <input type="hidden" id="phienbc" value="<?php echo $rid ?>">
        <div class="formRow">
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;line-height: 25px">
                <td>Phiên</td>
                <td>Nick name</td>
                <td>Phòng</td>
                <td>Tiền đặt bầu</td>
                <td>Tiền đặt cua</td>
                <td>Tiền đặt tôm</td>
                <td>Tiền đặt cá</td>
                <td>Tiền đặt gà</td>
                <td>Tiền đặt hưou</td>
                <td>Tiền</td>
                <td>Ngày tạo</td>
            </tr>
            </thead>
            <tbody id="logaction">
            </tbody>
        </table>

    </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
<div class="container" style="margin-top:150px;">
    <div class="text-center">
        <ul id="pagination-demo" class="pagination-lg"></ul>
    </div>
    <h1 id="resultsearch" style="position: absolute;top: 50%;left: 50%"></h1>
</div>
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


<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
</div>
<script>
$("#toDate").datepicker({dateFormat: 'yy-mm-dd'});
$("#fromDate").datepicker({dateFormat: 'yy-mm-dd'});
$("#search_tran").click(function () {
    var from = $("#fromDate").datepicker('getDate');
    var to = $("#toDate").datepicker('getDate');
    if (to > from) {
        alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
        return false;
    }
});
function resultlogbaucua(referid,nickname,room,bet_bau,bet_cua,bet_tom,bet_ca,bet_ga,bet_huou,money_type,time_log) {
    var rs = "";
    rs += "<tr>";
    rs += "<td>"+referid+"</td>";
    rs += "<td>" + nickname + "</td>";
    rs += "<td>" + commaSeparateNumber(room) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_bau) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_cua) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_tom) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_ca) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_ga) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_huou) + "</td>";
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
    var result = "";
    var oldpage = 0;
    $('#pagination-demo').css("display","block");
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('logminigame/detailbaucuaajax')?>",
        data: {
            phienbc : $("#phienbc").val(),
            pages : 1
        },

        dataType: 'json',
        success: function (result) {
            $("#spinner").hide();
            var totalPage = result.total;
            var countrow  = result.totalRecord;
            $("#num").html(countrow) ;
            $.each(result.transactions, function (index, value) {
                result += resultlogbaucua(value.referent_id,value.user_name,value.room,value.bet_bau,value.bet_cua,value.bet_tom,value.bet_ca,value.bet_ga,value.bet_huou,value.money_type,value.time_log)
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
                            url: "<?php echo admin_url('logminigame/detailbaucuaajax')?>",
                            data: {
                                phienbc : $("#phienbc").val(),
                                pages : page
                            },
                            dataType: 'json',
                            success: function (result) {
                                $("#spinner").hide();
                                $.each(result.transactions, function (index, value) {
                                    result += resultlogbaucua(value.referent_id, value.user_name, value.room, value.bet_bau, value.bet_cua, value.bet_tom, value.bet_ca, value.bet_ga, value.bet_huou, value.money_type, value.time_log);
                                });
                                $('#logaction').html(result);
                            }
                        });
                    }
                    oldpage = page;
                }
            });

        }
    })


});
function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }
    return val;
}
</script>
