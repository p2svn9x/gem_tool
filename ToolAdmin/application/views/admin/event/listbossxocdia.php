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
    <div class="wrapper">
        <?php $this->load->view('admin/message', $this->data); ?>
        <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
        <link rel="stylesheet"
              href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
        <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>

        <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>

        <div class="widget">
            <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>

            <div class="title">
                <h6>Danh sách chủ bàn xóc đĩa </h6>
            </div>
            <form class="list_filter form" action="<?php echo admin_url('event/listbossxocdia') ?>" method="post">
                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Nick name:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                            </td>
                            <td><label style="margin-left: 70px;margin-bottom:-2px;width: 100px">Trạng thái:</label></td>
                            <td><select id="sl-status" name="sl-status" style="margin-bottom:-2px;width: 160px">
                                    <option value="1" <?php if ($this->input->post('sl-status') == "1") {
                                        echo "selected";
                                    } ?>>Đang chạy
                                    </option>
                                    <option value="0" <?php if ($this->input->post('sl-status') == "0") {
                                        echo "selected";
                                    } ?>>Đã hủy
                                    </option>


                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="formRow">
                    <table>
                        <tr>
                            <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Phòng:</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="txtroom" value="<?php echo $this->input->post('txtroom') ?>" name="txtroom">
                            </td>
                            <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tiền cược :</label></td>
                            <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                       id="txtmoney" value="<?php echo $this->input->post('txtmoney') ?>" name="txtmoney">
                            </td>
                            <td style="">
                                <input type="submit" id="search_tran" value="Tìm kiếm" class="button blueB"
                                       style="margin-left: 123px">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr style="height: 20px;">
                    <td>STT</td>
                    <td>SessionID</td>
                    <td>Nickname </td>
                    <td>RoomID</td>
                    <td>Mức cược phòng</td>
                    <td>Password</td>
                    <td>Roomname</td>
                    <td>Quỹ khởi tạo</td>
                    <td>Quỹ hiện tại</td>
                    <td>Trạng thái</td>
                    <td>Phê</td>
                    <td>Lợi nhuận</td>
                    <td>Thời gian</td>
                </tr>
                </thead>
                <tbody id="logaction">
                </tbody>
            </table>
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
        <ul id="pagination-demo" class="pagination-sm"></ul>
    </div>

</div>

<script>


    function resultSearchTransction(stt, ssid, nickname,roomid,moneybet ,password,roomname,fundint,fund,status,fee,revenue,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + ssid + "</td>";
        rs += "<td>" + nickname+ "</td>";
        rs += "<td>" + roomid  + "</td>";
        rs += "<td>" + commaSeparateNumber(moneybet)  + "</td>";
        rs += "<td>" + password + "</td>";
        rs += "<td>" + roomname + "</td>";
        rs += "<td>" + commaSeparateNumber(fundint )  + "</td>";
        rs += "<td>" + commaSeparateNumber(fund)  + "</td>";
        if(status == 0){
            rs += "<td>" + "Đã hủy" + "</td>";
        }else if(status == 1){
            rs += "<td>" + "Đang chạy" + "</td>";
        }
        rs += "<td>" + commaSeparateNumber(fee)  + "</td>";
        rs += "<td>" + commaSeparateNumber(revenue)  + "</td>";
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {

        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('event/listbossxocdiaajax')?>",
            data: {
                    nickname: $("#filter_iname").val(),
                    status : $("#sl-status").val(),
                    room: $("#txtroom").val(),
                    money:$( "#txtmoney").val()
            },

            dataType: 'json',
            success: function (result) {
                    console.log(result);

                $("#spinner").hide();
                if (result.bossList == "") {
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    var stt = 1;
                    $.each(result.bossList, function (index, value) {
                        result += resultSearchTransction(stt, value.sessionId, value.nickname, value.roomId,value.moneyBet,value.password,value.roomName,value.fundInitial,value.fund,value.status,value.fee,value.revenue,value.createTime);
                        stt++;

                    });
                    $('#logaction').html(result);
               }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : 40000
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